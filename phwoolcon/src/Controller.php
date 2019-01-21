<?php

namespace Phwoolcon;

use core\base\Exception\ApiException;
use core\common\ErrorCode;
use core\service\security\AES;
use core\service\security\KeyConfig;
use core\service\security\Secret;
use Phalcon\Mvc\Controller as PhalconController;
use Phwoolcon\Controller\Api;

/**
 * Class Controllers
 * @package Phwoolcon
 *
 * @property \Phalcon\Http\Request $request
 * @property Session|Session\AdapterTrait $session
 * @property View $view
 */
abstract class Controller extends PhalconController
{

    use Api;

    const BROWSER_CACHE_ETAG = 'etag';
    const BROWSER_CACHE_CONTENT = 'content';

    protected $pageTitles = [];

    public function onConstruct()
    {

    }

    /**
     * 获取请求参数
     * @param mixed $name 参数名称，不传则为获取所有参数
     * @param string $default 默认值
     * @param mixed $filter 过滤函数，可以使用,分割的字符串以及正则表达式
     * @param mixed $is_validate 是否验证，如果该值不为false，则会对参数进行校验，例如参数为空或不合法等，如果该值为字符串，则提示信息为该值
     * @return array|mixed|null|string
     * @throws ApiException
     * @author wangyu <wangyu@ledouya.com>
     * @createTime 2018/4/20 9:51
     * @version 1.3.0
     */
    public function params($name = null, $default = '', $filter = null, $is_validate = false)
    {
        if ($value = $this->request->get($name)) {
            $input = $value;
            if (isset($input['_url'])) {
                unset($input['_url']);
            }
        }
        if (empty($input)) {
            $input_string = file_get_contents('php://input');
            $input_data = json_decode($input_string, true);
            if (is_array($input_data)) {
                $input = $input_data;
            } else {
                $input = [];
            }
            if (true === Config::get('security.state.data')) {
                $encrypt_string = null;
                if (is_array($input) && isset($input[ENCRYPT_FIELD_NAME])) {
                    $encrypt_string = $input[ENCRYPT_FIELD_NAME];
                    unset($input[ENCRYPT_FIELD_NAME]);
                }
                if (!empty($encrypt_string)) {
                    $contents = AES::aes128Decrypt($encrypt_string, Config::get('security.secret_key.data') ?: KeyConfig::SECRET_AES_KEY, Config::get('security.secret_iv.data') ?: KeyConfig::SECRET_AES_KEY);
                    unset($encrypt_string);
                    if (!empty($contents)) {
                        if (is_json($contents)) {
                            $decrypt_data = json_decode($contents, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
                        } elseif (is_xml($contents)) {
                            $decrypt_data = xml_decode($contents);
                        } else {
                            $decrypt_data = null;
                        }
                        if (!empty($decrypt_data) && is_array($decrypt_data)) {
                            $input = array_merge($input, $decrypt_data);
                        }
                        unset($contents, $decrypt_data);
                    }
                }
            }
        }
        if (empty($name)) { //获取全部变量
            $data = $input;
            $filters = isset($filter) ? $filter : 'htmlspecialchars';
            if ($filters) {
                if (is_string($filters)) {
                    $filters = explode(',', $filters);
                }
                foreach ($filters as $filter) {
                    $data = array_map_recursive($filter, $data); //参数过滤
                }
            }
        } elseif ((is_array($input) && isset($input[$name])) || is_string($input)) { //取值操作
            if (is_string($input)) {
                $data = $input;
            } else {
                $data = $input[$name];
            }
            $filters = isset($filter) ? $filter : 'htmlspecialchars';
            if ($filters) {
                if (is_string($filters)) {
                    if (0 === strpos($filters, '/')) {
                        if (1 !== preg_match($filters, (string)$data)) { //支持正则验证
                            if (false !== $is_validate) {
                                self::idebug('[ApiException] 参数获取异常，参数名称：' . $name);
                                throw new ApiException((true !== $is_validate && null !== $is_validate) ? $is_validate : '参数值校验失败', ErrorCode::INVALID_PARAMETER);
                            }
                            return isset($default) ? $default : null;
                        }
                    } else {
                        $filters = explode(',', $filters);
                    }
                } elseif (is_int($filters)) {
                    $filters = array($filters);
                }
                if (is_array($filters)) {
                    foreach ($filters as $filter) {
                        if (function_exists($filter)) {
                            $data = is_array($data) ? array_map_recursive($filter, $data) : $filter($data); //参数过滤
                        } else {
                            $data = filter_var($data, is_int($filter) ? $filter : filter_id($filter));
                            if (false === $data) {
                                if (false !== $is_validate) {
                                    self::idebug('[ApiException] 参数获取异常，参数名称：' . $name);
                                    throw new ApiException((true !== $is_validate && null !== $is_validate) ? $is_validate : '参数值校验失败', ErrorCode::INVALID_PARAMETER);
                                }
                                return isset($default) ? $default : null;
                            }
                        }
                    }
                }
            }
        } else {
            if (false !== $is_validate) {
                self::idebug('[ApiException] 参数获取异常，参数名称：' . $name);
                throw new ApiException((true !== $is_validate && null !== $is_validate) ? $is_validate : '参数值校验失败', ErrorCode::INVALID_PARAMETER);
            }
            $data = isset($default) ? $default : null; //变量默认值
        }
        is_array($data) && array_walk_recursive($data, 'secure_filter');
        return $data;
    }

    public function addPageTitle($title)
    {
        $this->pageTitles[] = $title;
        return $this;
    }

    public function getBrowserCache($pageId = null, $type = null)
    {
        $pageId or $pageId = $this->request->getURI();
        $cacheKey = md5($pageId);
        switch ($type) {
            case (static::BROWSER_CACHE_ETAG):
                return Cache::get('fpc-etag-' . $cacheKey);
            case (static::BROWSER_CACHE_CONTENT):
                return Cache::get('fpc-content-' . $cacheKey);
        }
        return [
            'etag' => Cache::get('fpc-etag-' . $cacheKey),
            'content' => Cache::get('fpc-content-' . $cacheKey),
        ];
    }

    public function getContentEtag(&$content)
    {
        return 'W/' . dechex(crc32($content));
    }

    /**
     * Q: Why make the `php://input` encapsulation?
     * A: I want to use it in service mode, which is impossible to pass data via `php://input` between processes.
     *    This is not exactly the same as the Phalcon's implementation.
     * @see \Phalcon\Http\Request::getRawBody()
     * @return string
     * @codeCoverageIgnore
     */
    protected function getRawPhpInput()
    {
        isset($_SERVER['RAW_PHP_INPUT']) or $_SERVER['RAW_PHP_INPUT'] = file_get_contents('php://input');
        return $_SERVER['RAW_PHP_INPUT'];
    }

    public function initialize()
    {
        $this->pageTitles = [__(Config::get('view.title_suffix'))];
        isset($this->view) and $this->view->reset();
    }

    /**
     * `Controllers::render(string $path[, string $view[, array $params]])`
     *
     * Or use two-parameter invocation: @since v1.1.6
     * `Controllers::render(string $path[, array $params])`
     *
     * @param  string $path
     * @param string|array $view
     * @param array $params
     * @return bool|\Phalcon\Mvc\View
     */
    public function render($path, $view = '', array $params = [])
    {
        $params['page_title'] = $this->pageTitles;
        return $this->view->render($path, $view, $params);
    }

    /**
     * 提示视图
     * @param $notice
     * @return bool|\Phalcon\Mvc\View
     */
    public function renderNotice($notice)
    {
        $this->view->setVars(['notice' => $notice]);
        return $this->view->render('auth', 'notice');

    }

    public function setBrowserCache($pageId = null, $type = null, $ttl = Cache::TTL_ONE_WEEK)
    {
        $pageId or $pageId = $this->request->getURI();
        $cacheKey = md5($pageId);
        $content = $this->response->getContent();
        $eTag = $this->getContentEtag($content);
        switch ($type) {
            case (static::BROWSER_CACHE_ETAG):
                Cache::set('fpc-etag-' . $cacheKey, $eTag, $ttl);
                break;
            case (static::BROWSER_CACHE_CONTENT):
                Cache::set('fpc-content-' . $cacheKey, $content, $ttl);
                break;
            default:
                Cache::set('fpc-etag-' . $cacheKey, $eTag, $ttl);
                Cache::set('fpc-content-' . $cacheKey, $content, $ttl);
                break;
        }
        $this->setBrowserCacheHeaders($eTag, $ttl);
        return $this;
    }

    public function setBrowserCacheHeaders($eTag, $ttl = Cache::TTL_ONE_WEEK)
    {
        $this->response->setHeader('Expires', gmdate(DateTime::RFC2616, time() + $ttl))
            ->setHeader('Cache-Control', 'public, max-age=' . $ttl)
            ->setHeader('Pragma', 'public')
            ->setHeader('Last-Modified', gmdate(DateTime::RFC2616))
            ->setEtag($eTag);
    }

    /**
     * response json content
     *
     * @param array $array
     * @param int $httpCode
     * @param string $contentType
     * @return \Phalcon\Http\Response
     */
    protected function jsonReturn(array $array, $httpCode = 200, $contentType = 'application/json')
    {
        return $this->response->setHeader('Content-Type', $contentType)
            ->setStatusCode($httpCode)
            ->setJsonContent($array);
    }

    /**
     * redirect url
     *
     * @param null $location
     * @param int $statusCode
     * @return \Phalcon\Http\Response
     */
    protected function redirect($location = null, $statusCode = 302)
    {
        return $this->response->redirect(url($location), true, $statusCode);
    }

    /**
     * Get input from request
     *
     * @param string $key
     * @param mixed $defaultValue
     * @return mixed
     */
    protected function input($key = null, $defaultValue = null)
    {
        return is_null($key) ? $_REQUEST : fnGet($_REQUEST, $key, $defaultValue);
    }

    /**
     * 调试日志
     * @param mixed $message 信息
     * @param string $type 类型
     * @author wangyu <wangyu@ledouya.com>
     * @createTime 2018/5/24 10:58
     */
    private static function idebug($message, $type = 'DEBUG')
    {
        if (IS_DEBUG) {
            debug($message, $type);
        }
    }
}
