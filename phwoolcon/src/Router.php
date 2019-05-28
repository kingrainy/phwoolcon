<?php

namespace Phwoolcon;

use Closure;
use core\base\Exception\ApiException;
use Opis\Closure\SerializableClosure;
use Phalcon\Di;
use Phalcon\Http\Request;
use Phalcon\Http\Response;
use Phalcon\Mvc\Router as PhalconRouter;
use Phalcon\Mvc\Router\Route;
use Phwoolcon\Daemon\ServiceAwareInterface;
use Phwoolcon\Exception\Http\CsrfException;
use Phwoolcon\Exception\Http\NotFoundException;
use Phwoolcon\Exception\HttpException;
use Phwoolcon\Fsm\Exception;

/**
 * Class Router
 *
 * @package Phwoolcon
 *
 * @property Route[] $_routes
 * @method Route add($pattern, $paths = null, $httpMethods = null, $position = Router::POSITION_LAST)
 */
class Router extends PhalconRouter implements ServiceAwareInterface
{
    /**
     * @var Di
     */
    protected static $di;
    protected static $disableSession = true;
    protected static $disableCsrfCheck = false;
    protected static $runningUnitTest = false;
    protected static $useLiteHandler = true;
    protected static $currentUri = null;
    /**
     * @var Request
     */
    protected static $request;
    /**
     * @var static
     */
    protected static $router;
    protected $_uriSource = self::URI_SOURCE_SERVER_REQUEST_URI;
    protected $_sitePathPrefix;
    protected $_sitePathLength;

    protected static $cacheFile;

    /**
     * @var Response\Cookies
     */
    protected $cookies;
    /**
     * @var Response
     */
    protected $response;

    /**
     * @var Route[][]
     */
    protected $exactRoutes;

    /**
     * @var Route[][]
     */
    protected $regexRoutes;

    public function __construct()
    {
        parent::__construct(false);
        static::$runningUnitTest = Config::runningUnitTest();
        static::$useLiteHandler = Config::get('app.use_lite_router');
        // @codeCoverageIgnoreStart
        if ($this->_sitePathPrefix = Config::get('app.site_path')) {
            $this->_uriSource = self::URI_SOURCE_GET_URL;
            $this->_sitePathLength = strlen($this->_sitePathPrefix);
        }
        // @codeCoverageIgnoreEnd
        $this->removeExtraSlashes(true);
        if (Config::get('app.cache_routes')) {
            if (!$this->loadLocalCache()) {
                $this->loadRoutes();
                $this->saveLocalCache();
            }
        } else {
            $this->loadRoutes();
        }
        $this->cookies = static::$di->getShared('cookies');
        $this->response = static::$di->getShared('response');
        $this->response->setStatusCode(200);
    }

    /*    public function addRoutes(array $routes, $prefix = null, $filter = null)
        {
            $prefix and $prefix = rtrim($prefix, '/');
            foreach ($routes as $method => $methodRoutes) {
                foreach ($methodRoutes as $uri => $handler) {
                    $uri{0} == '/' or $uri = '/' . $uri;
                    $prefix and $uri = $prefix . $uri;
                    $uri == '/' or $uri = rtrim($uri, '/');
                    $this->quickAdd($method, $uri, $handler, $filter);
                }
            }
        }*/
    public function addRoutes(array $routes)
    {
        foreach ($routes as $route) {
            if (!$route[2] instanceof Closure) {
                $pattern = $route[1];
                $paths = $route[2];
                $method = $route[0];
                $filter = empty($route[3]) ? null : $route[3];
                $this->quickAdd($pattern, $paths, $method, $filter);
            } else {
                $pattern = $route[1];
                $function = $route[2];
                $method = $route[0];
                $filter = empty($route[3]) ? null : $route[3];
                $this->CquickAdd($pattern, $function, $method, $filter);
            }
        }
    }

    public static function checkCsrfToken()
    {
        static::$request or static::$request = static::$di->getShared('request');
        $request = static::$request;
        if ($request->isPost() && $request->get('_token') != Session::getCsrfToken()) {
            self::throwCsrfException();
        }
    }

    public static function clearCache()
    {
        is_file($file = static::$cacheFile) and unlink($file);
    }

    public static function disableCsrfCheck()
    {
        static::$disableCsrfCheck = true;
    }

    public static function disableSession()
    {
        static::$disableSession = true;
    }

    /*    public static function dispatch($uri = null)
        {
            try {
                static::$router === null and static::$router = static::$di->getShared('router');
                $router = static::$router;
                // @codeCoverageIgnoreStart
                if (!$uri && $router->_sitePathLength && $router->_uriSource == self::URI_SOURCE_GET_URL) {
                    list($uri) = explode('?', $_SERVER['REQUEST_URI']);
                    $uri = str_replace(basename($_SERVER['SCRIPT_FILENAME']), '', $uri);
                    if (substr($uri, 0, $router->_sitePathLength) == $router->_sitePathPrefix) {
                        $uri = substr($uri, $router->_sitePathLength);
                    }
                }
                // @codeCoverageIgnoreEnd
                Events::fire('router:before_dispatch', $router, ['uri' => $uri]);

                $realUri = $uri === null ? $router->getRewriteUri() : $uri;
                $handledUri = $realUri === '/' ? $realUri : rtrim($realUri, '/');
                static::$currentUri = $handledUri;

                static::$useLiteHandler ? $router->liteHandle($handledUri) : $router->handle($handledUri);
                ($route = $router->getMatchedRoute()) or static::throw404Exception();
                $controllerClass = $router->getControllerName();
                $controllerClass instanceof SerializableClosure and $controllerClass = $controllerClass->getClosure();
                if ($controllerClass instanceof Closure) {
                    static::$disableSession or Session::start();
                    static::$disableCsrfCheck or static::checkCsrfToken();
                    $response = $controllerClass();
                    if (!$response instanceof Response) {
                        // @var Response $realResponse
                        $realResponse = $router->response;
                        $realResponse->setContent($response);
                        $response = $realResponse;
                    }
                } else {
                    // @var Controller $controller
                    $controller = new $controllerClass;
                    method_exists($controller, 'initialize') and $controller->initialize();
                    static::$disableSession or Session::start();
                    static::$disableCsrfCheck or static::checkCsrfToken();
                    method_exists($controller, $method = $router->getActionName()) or static::throw404Exception();
                    $controller->{$method}();
                    $response = $controller->response;
                }
                Events::fire('router:after_dispatch', $router, ['response' => $response]);
                Session::end();
                return $response;
            } catch (HttpException $e) {
                Log::exception($e);
                return static::$runningUnitTest ? $e : $e->toResponse();
            }
        }*/

    /**
     * dispatch
     * @param null $uri
     * @return mixed|Response|\Phalcon\Http\ResponseInterface
     * @author wangyu <wangyu@ledouya.com>
     * @createTime 2018/12/8 8:41
     */
    public static function dispatch($uri = null)
    {
        try {
            static::$router === null and static::$router = static::$di->getShared('router');
            $router = static::$router;
            // @codeCoverageIgnoreStart
            if (!$uri && $router->_sitePathLength && $router->_uriSource == self::URI_SOURCE_GET_URL) {
                list($uri) = explode('?', $_SERVER['REQUEST_URI']);
                $uri = str_replace(basename($_SERVER['SCRIPT_FILENAME']), '', $uri);
                if (substr($uri, 0, $router->_sitePathLength) == $router->_sitePathPrefix) {
                    $uri = substr($uri, $router->_sitePathLength);
                }
            }
            if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
                $httpException = new HttpException(null, 204, ['Access-Control-Request-Headers: accept, content-type, token, key, authorization']);
                return $httpException->toResponse();
            }
            // @codeCoverageIgnoreEnd
            Events::fire('router:before_dispatch', $router, ['uri' => $uri]);

            $realUri = $uri === null ? $router->getRewriteUri() : $uri;
            $handledUri = $realUri === '/' ? $realUri : rtrim($realUri, '/');
            static::$currentUri = $handledUri;
            static::$useLiteHandler ? $router->liteHandle($handledUri) : $router->handle($handledUri);
            ($route = $router->getMatchedRoute()) or static::throw404Exception();
//此处匹配了route正则规则，不执行static::throw404Exception();
//采用的是原来传入函数形式的话则执行后面的404(在我的电脑上显示404，原因是我的访问地址经过了ld，重写apache规则后无404)；
            $module = $router->getModulename();
            if (!empty($module)) {
                $moduleDefinition = MODULES_PATH . '/' . $module . '/Module.php';
                if (is_file($moduleDefinition)) {
                    $moduleClass = 'App\\' . ucfirst($module) . '\\Module';
                    $moduleObject = new $moduleClass;
                    $moduleObject->registerAutoloaders(static::$di);
                    $moduleObject->registerServices(static::$di);
                }
            }
//            $namespace        = $router->getNamespaceName();
            $controllerName = $router->getControllerName();
//            die($controllerName);
            $controllerName instanceof SerializableClosure ? $controllerClass = $controllerName->getClosure() : $controllerClass = $controllerName;


            if ($controllerClass instanceof Closure) {
                static::$disableSession or Session::start();
                static::$disableCsrfCheck or static::checkCsrfToken();
                $response = $controllerClass();
                if (!$response instanceof Response) {
                    // @var Response $realResponse
                    $realResponse = $router->response;
                    $realResponse->setContent($response);
                    $response = $realResponse;
                }
            } else {
                if (empty($controllerName)) {
                    $controllerName = 'index';
                }
                if (!strpos($controllerName, "Controller")) {
                    $controllerName = ucfirst($controllerName) . "Controller";
                }
                $actionname = $router->getActionName() ? $router->getActionName() : "index";
                $params = $router->getParams();
                if (!empty($params)) {
                    foreach ($params as $key => $item) {
                        if (is_string($key)) {
                            unset($params[$key]);
                        }
                    }
                }
                if (array_key_exists('ptoken', $params)) unset($params['ptoken']);
                $prefix = 'App\\';

                if ($module) {
                    $prefix .= ucfirst($module);
                }
                $controllerClass = $prefix . "\Controllers\\" . $controllerName;
//                $controllerClass = $prefix.ucfirst($namespace) . "\Controllers\\" . $controllerName;
                /* @var Controller $controller */

//                var_dump($controllerClass);exit;
//                var_dump(class_exists($controllerClass));
//                exit;
                if (!class_exists($controllerClass)) {
                    $controllerClass = $prefix . "\\" . $controllerName;
//                    $controllerClass =  $prefix.ucfirst($namespace) . "\\" . $controllerName;
                }
//                die($controllerClass);
                $controller = new $controllerClass;
                method_exists($controller, 'initialize') and $controller->initialize();
                //      static::$disableSession or Session::start();
                static::$disableCsrfCheck or static::checkCsrfToken();
//                var_dump($params);
//                exit;
                if (method_exists($controller, $actionname)) {
                    //...用于php5.6以上,变量为数组，且不能为空
                    empty($params) ? $controller->{$actionname}() : $controller->{$actionname}(...$params);
                } elseif (method_exists($controller, $actionname . "Action")) {
                    empty($params) ? $controller->{$actionname}() : $controller->{$actionname}(...$params);
                } else {
                    static::throw404Exception();
                }
                $response = $controller->response;
            }
            Events::fire('router:after_dispatch', $router, ['response' => $response]);
            //      Session::end();
            return $response;
        } catch (HttpException $e) {
            Log::exception($e);
            return $e->toResponse();
            //return static::$runningUnitTest ? $e : $e->toResponse();
        } catch (\Exception $exception) {
            function_exists('debug') and debug('[Exception] File:[' . $exception->getFile() . '] ' . 'Line:[' . $exception->getLine() . '] ' . 'Message:[' . $exception->getMessage() . '] ', 'ERROR');
            //捕获异常
            $response = new Response(); //获取响应实例
            if (false !== strpos($exception->getMessage(), 'Warning - ') || false !== strpos($exception->getMessage(), 'Notice - ')) return self::exceptionResponse($response, $exception->getMessage(), 204);
            //判断是否为API异常
            if ($exception instanceof ApiException) {
                $response->setStatusCode(200); //设置HTTP状态码
                //批量设置ApiException中获取的header
                foreach ($exception->getHeaders() as $name => $value) {
                    if (is_numeric($name)) {
                        list($name, $value) = explode(':', $value);
                    }
                    $response->setHeader(trim($name), trim($value));
                }
                $response->setContent($exception->getBody()); //设置响应内容
            } else {
                return self::exceptionResponse($response, $exception->getMessage());
            }
            return $response;
        }
    }

    /**
     * @param string $template
     * @param string $pateTitle
     * @return string
     */
    public static function generateErrorPage($template, $pateTitle)
    {
        return View::make('errors', $template, ['page_title' => $pateTitle]);
    }

    /**
     * @codeCoverageIgnore
     * @return string
     */
    public static function getCurrentUri()
    {
        return self::$currentUri;
    }

    public function liteHandle($uri)
    {
        static::$request or static::$request = static::$di->getShared('request');
        $request = static::$request;

        $this->exactRoutes === null and $this->splitRoutes();

        $this->_matches = null;
        $this->_wasMatched = true;
        $this->_matchedRoute = null;

        $this->_namespace = $this->_defaultNamespace;
        $this->_module = $this->_defaultModule;
        $this->_controller = $this->_defaultController;
        $this->_action = $this->_defaultAction;
        $this->_params = $this->_defaultParams;

        $httpMethod = $request->getMethod();
        $matchedRoute = null;
        if (isset($this->exactRoutes[$httpMethod][$uri])) {
            $matchedRoute = $this->exactRoutes[$httpMethod][$uri];
            if ($beforeMatch = $matchedRoute->getBeforeMatch()) {
                if (!call_user_func_array($beforeMatch, [$uri, $matchedRoute, $this])) {
                    $matchedRoute = null;
                }
            }
        }
        if ($matchedRoute === null) {
            $regexRoutes = isset($this->regexRoutes[$httpMethod]) ? $this->regexRoutes[$httpMethod] : [];
            foreach ($regexRoutes as $pattern => $route) {
                if (preg_match($pattern, $uri, $matches)) {
                    if ($beforeMatch = $route->getBeforeMatch()) {
                        // @codeCoverageIgnoreStart
                        if (!call_user_func_array($beforeMatch, [$uri, $route, $this])) {
                            continue;
                        }
                        // @codeCoverageIgnoreEnd
                    }

                    $paths = $route->getPaths();
                    $parts = $paths;

                    foreach ($paths as $part => $position) {
                        $isPositionInt = is_int($position);
                        $isPositionString = is_string($position);
                        if (!$isPositionInt && !$isPositionString) {
                            continue;
                        }

                        if (isset($matches[$position])) {
                            /**
                             * Update the parts
                             */
                            $parts[$part] = $matches[$position];
                        } else {
                            /**
                             * Remove the path if the parameter was not matched
                             */
                            // @codeCoverageIgnoreStart
                            if ($isPositionInt) {
                                unset($parts[$part]);
                            }
                            // @codeCoverageIgnoreEnd
                        }
                    }

                    /**
                     * Update the matches generated by preg_match
                     */
                    $this->_matches = $matches;

                    $matchedRoute = $route;
                    break;
                }
            }
        }
        if ($matchedRoute) {
            $this->_matchedRoute = $matchedRoute;
            $this->_wasMatched = true;

            isset($paths) or $paths = $matchedRoute->getPaths();
            isset($parts) or $parts = $paths;

            /**
             * Check for a namespace
             */
            if (isset($parts['namespace'])) {
                $namespace = $parts['namespace'];
                if (!is_numeric($namespace)) {
                    $this->_namespace = $namespace;
                }
                unset($parts['namespace']);
            }

            /**
             * Check for a module
             */
            if (isset($parts['module'])) {
                $module = $parts['module'];
                if (!is_numeric($module)) {
                    $this->_module = $module;
                }
                unset($parts['module']);
            }

            /**
             * Check for a controller
             */
            if (isset($parts['controller'])) {
                $controller = $parts['controller'];
                if (!is_numeric($controller)) {
                    $this->_controller = $controller;
                }
                unset($parts['controller']);
            }

            /**
             * Check for an action
             */
            if (isset($parts['action'])) {
                $action = $parts['action'];
                if (!is_numeric($action)) {
                    $this->_action = $action;
                }
                unset($parts['action']);
            }

            $params = [];
            /**
             * Check for parameters
             */
            if (isset($parts['params'])) {
                $paramsStr = $parts['params'];
                if (is_string($paramsStr)) {
                    $strParams = trim($paramsStr, '/');
                    if ($strParams !== '') {
                        $params = explode('/', $strParams);
                    }
                }
                unset($parts['params']);
            }

            if ($params) {
                $this->_params = array_merge($params, $parts);
            } else {
                $this->_params = $parts;
            }
        }
    }

    protected function loadLocalCache()
    {
        if (!is_file(static::$cacheFile)) {
            return false;
        }
        try {
            if ($routes = include static::$cacheFile) {
                $this->_routes = unserialize($routes);
                return true;
            }
        } // @codeCoverageIgnoreStart
        catch (\Exception $e) {
            Log::exception($e);
        }
        return false;
        // @codeCoverageIgnoreEnd
    }

    protected function loadRoutes()
    {
        $this->_routes = [];
        is_file($file = ROOT_PATH . '/app/routes.php') ? include $file : print('路由文件位置存在问题');
        /*is_array($routes) ? $this->addRoutes($routes) : print("路由文件非数组形式,请更改");*/
    }

    /*    public function prefix($prefix, array $routes, $filter = null)
        {
            $this->addRoutes($routes, $prefix, $filter);
            return $this;
        }*/

    /*public function quickAdd($method, $uri, $handler, $filter = null)
   {
       $uri{0} == '/' or $uri = '/' . $uri;
       if ($isArrayHandler = is_array($handler)) {
           if (!$filter && isset($handler['filter'])) {
               $filter = $handler['filter'];
               unset($handler['filter']);
           }
           // Support for callable: ['Class', 'method']
           if (isset($handler[0]) && isset($handler[1])) {
               $handler['controller'] = $handler[0];
               $handler['action'] = $handler[1];
               unset($handler[0], $handler[1]);
           }
           empty($handler['controller']) and $handler = reset($handler);
       }
       if (is_string($handler)) {
           list($controller, $action) = explode('::', $handler);
           $handler = ['controller' => $controller, 'action' => $action];
       } elseif ($handler instanceof Closure) {
           $handler = ['controller' => new SerializableClosure($handler)];
       } elseif ($isArrayHandler && isset($handler['controller']) && $handler['controller'] instanceof Closure) {
           $handler['controller'] = new SerializableClosure($handler['controller']);
       }
       $method == 'ANY' and $method = null;
       $method == 'GET' and $method = ['GET', 'HEAD'];
       $route = $this->add($uri, $handler, $method);
       is_callable($filter) or $filter = null;
       $filter and $route->beforeMatch($filter);
       return $route;
   }*/
    public function quickAdd($pattern, $paths, $method, $filter = null)
    {
        $method == 'ANY' and $method = null;
        $method == 'GET' and $method = ['GET', 'HEAD'];
        $route = $this->add($pattern, $paths, $method);
        is_callable($filter) or $filter = null;
        $filter and $route->beforeMatch($filter);
        return $route;
    }

    public function CquickAdd($pattern, $function, $method, $filter = null)
    {
        $method == 'ANY' and $method = null;
        $method == 'GET' and $method = ['GET', 'HEAD'];
        $handler['controller'] = new SerializableClosure($function);
        $route = $this->add($pattern, $handler, $method);
        is_callable($filter) or $filter = null;
        $filter and $route->beforeMatch($filter);
        return $route;
    }

    /*public function CquickAdd($function, $method, $filter = null)
    {
        $method == 'ANY' and $method = null;
        $method == 'GET' and $method = ['GET', 'HEAD'];

        is_callable($filter) or $filter = null;
        $filter and $route->beforeMatch($filter);
        return $route;
    }*/


    public static function register(Di $di)
    {
        static::$di = $di;
        static::$cacheFile = storagePath('cache/routes.php');
        $di->remove('router');
        $di->setShared('router', function () {
            return new static();
        });
    }

    public function reset()
    {
        static::$disableSession = false;
        static::$disableCsrfCheck = false;
        static::$currentUri = null;
        $this->cookies->reset();
        $this->response->setContent('')
            ->resetHeaders()
            ->setStatusCode(200);
    }

    protected function saveLocalCache()
    {
        fileSaveArray(static::$cacheFile, serialize($this->_routes));
    }

    protected function splitRoutes()
    {
        $exactRoutes = [];
        $regexRoutes = [];
        /* @var Route[] $routes */
        $routes = array_reverse($this->_routes);
        foreach ($routes as $route) {
            $pattern = $route->getCompiledPattern();
            $methods = (array)$route->getHttpMethods();
            $methods or $methods = ['GET', 'HEAD', 'POST', 'PUT', 'DELETE'];
            if ($pattern{0} === '#') {
                foreach ($methods as $method) {
                    isset($regexRoutes[$method][$pattern]) or $regexRoutes[$method][$pattern] = $route;
                }
            } else {
                foreach ($methods as $method) {
                    isset($exactRoutes[$method][$pattern]) or $exactRoutes[$method][$pattern] = $route;
                }
            }
        }
        $this->exactRoutes = $exactRoutes;
        $this->regexRoutes = $regexRoutes;
    }

    public static function staticReset()
    {
        static::$router === null and static::$router = static::$di->getShared('router');
        static::$router->reset();
    }

    /**
     * @param string $content
     * @param string $contentType
     * @throws NotFoundException
     */
    public static function throw404Exception($content = null, $contentType = 'text/html')
    {
        /*!$content && static::$runningUnitTest and $content = '404 NOT FOUND';
        $content or $content = static::generateErrorPage('404', '404 NOT FOUND');*/
        empty($content) and $content = '404 NOT FOUND';
        throw new NotFoundException($content, ['content-type' => $contentType]);
    }

    /**
     * @param string $content
     * @param string $contentType
     * @throws CsrfException
     */
    public static function throwCsrfException($content = null, $contentType = 'text/html')
    {
        /*!$content && static::$runningUnitTest and $content = '403 FORBIDDEN';
        $content or $content = static::generateErrorPage('csrf', '403 FORBIDDEN');*/
        empty($content) and $content = '403 FORBIDDEN';
        throw new CsrfException($content, ['content-type' => $contentType]);
    }

    /**
     * @codeCoverageIgnore
     * @param bool $flag
     * @return bool
     */
    public static function useLiteHandler($flag = null)
    {
        $flag === null or static::$useLiteHandler = (bool)$flag;
        return static::$useLiteHandler;
    }

    /**
     * 异常响应
     * @param Response $response response对象
     * @param null $message 内容
     * @param int $code 异常代码
     * @param array $headers header列表
     * @return Response
     * @author wangyu <wangyu@ledouya.com>
     * @createTime 2018/5/19 15:42
     */
    public static function exceptionResponse(Response $response, $message = null, $code = 500, $headers = [])
    {
        $response->setStatusCode($code);
        $headers = [
            'content-type: application/vnd.api+json',
            'exception-type: HttpException',
        ];
        foreach ($headers as $name => $value) {
            if (is_numeric($name)) {
                list($name, $value) = explode(':', $value);
            }
            $response->setHeader(trim($name), trim($value));
        }
        $body = json_encode([
            'jsonapi' => ['version' => '1.0'],
            'error' => $code,
            'error_reason' => empty($message) ? 'Server down, please check log!' : $message
        ]);
        $response->setContent($body); //设置响应内容
        return $response;
    }

}
