<?php

namespace Phwoolcon;

use Phalcon\Di;
use Phwoolcon\Exception\InvalidConfigException;
use Phwoolcon\Queue\AdapterInterface;
use Phwoolcon\Queue\AdapterTrait;
use Phwoolcon\Queue\FailedLoggerDb;
use Workerman\MySQL\Connection as MySQL;

class Queue
{
    /**
     * @var Di
     */
    protected static $di;

    /**
     * @var static
     */
    protected static $instance;
    protected $config;
    /**
     * @var AdapterTrait[]|AdapterInterface[]
     */
    protected $connections = [];

    public function __construct($config)
    {
        //为避免消息队列中mysql的连接长时间没有通讯而被mysql服务端踢掉，所以在消息队列中使用该数据库类，该类当发生mysql gone away错误时，会自动重试一次
        global $mysql;
        $mysqlConfig = Config::get('database.connections.mysql');
        $mysql = new MySQL($mysqlConfig['host'], empty($mysqlConfig['port']) ? 3306 : $mysqlConfig['port'], $mysqlConfig['username'], $mysqlConfig['password'], $mysqlConfig['dbname'], $mysqlConfig['charset']); //实例化mysql组件并连接

        $this->config = $config;
        static::$di->has('queueFailLogger') or static::$di->setShared('queueFailLogger', function () use ($config) {
            $class = $config['failed_logger']['adapter'];
            return new $class($config['failed_logger']['options']);
        });
    }

    /**
     * @param string $name
     * @return AdapterTrait|AdapterInterface
     */
    protected function connect($name)
    {
        $queue = $this->config['queues'][$name];
        $connectionName = $queue['connection'];
        $connection = $this->config['connections'][$connectionName];
        $options = array_merge($connection, $queue['options']);
        $class = $connection['adapter'];
        // @codeCoverageIgnoreStart
        if (!$class || !class_exists($class)) {
            throw new InvalidConfigException("Invalid queue adapter {$class}, please check config file queue.php");
        }
        // @codeCoverageIgnoreEnd
        $instance = new $class(static::$di, $options, $name);
        // @codeCoverageIgnoreStart
        if (!$instance instanceof AdapterInterface) {
            throw new InvalidConfigException("Queue adapter {$class} should implement " . AdapterInterface::class);
        }
        // @codeCoverageIgnoreEnd
        return $instance;
    }

    public static function connection($name = null)
    {
        static::$instance === null and static::$instance = static::$di->getShared('queue');
        $queue = static::$instance;
        $name = $name ?: $queue->config['default'];

        if (!isset($queue->connections[$name])) {
            $queue->connections[$name] = $queue->connect($name);
        }

        return $queue->connections[$name];
    }

    /**
     * @return FailedLoggerDb
     */
    public static function getFailLogger()
    {
        return static::$di->getShared('queueFailLogger');
    }

    public static function register(Di $di)
    {
        static::$di = $di;
        $di->remove('queue');
        static::$instance = null;
        $di->setShared('queue', function () {
            return new static(Config::get('queue'));
        });
    }
}
