<?php

namespace Phwoolcon\Cache;

use ArrayIterator;
use Phwoolcon\Cache;
use Phwoolcon\Config;
use Phwoolcon\Db;
use Phwoolcon\Events;
use Phwoolcon\I18n;
use Phwoolcon\Router;
use Phwoolcon\View;

class Clearer
{
    const TYPE_ASSETS = 'assets';
    const TYPE_CONFIG = 'config';
    const TYPE_LOCALE = 'locale';
    const TYPE_META = 'meta';
    const TYPE_ROUTES = 'routes';
    const TYPE_LOADER = 'sloader';
    const TYPE_DATABASE = 'db';
    const TYPE_VOLT = 'pvolt';

    protected static $types = [
        self::TYPE_CONFIG => 'Clear config cache',
        self::TYPE_META => 'Clear model metadata',
        self::TYPE_LOCALE => 'Clear locale cache',
        self::TYPE_ASSETS => 'Clear assets cache',
        self::TYPE_ROUTES => 'Clear routes cache',
        self::TYPE_LOADER => 'Clear loader cache',
        self::TYPE_DATABASE => 'Clear database cache',
        self::TYPE_VOLT => 'Clear volt cache',
    ];

    public static function clear($types = null)
    {
        $types = array_flip((array)$types);
        $clearAll = true;
        $messages = new ArrayIterator();
        // @codeCoverageIgnoreStart
        if (isset($types['config'])) {
            $clearAll = false;
            Config::clearCache();
            $messages[] = 'Config cache cleared.';
        }
        // @codeCoverageIgnoreEnd
        if (isset($types['meta'])) {
            $clearAll = false;
            Db::clearMetadata();
            $messages[] = 'Model metadata cleared.';
        }
        if (isset($types['locale'])) {
            $clearAll = false;
            I18n::clearCache();
            $messages[] = 'Locale cache cleared.';
        }
        if (isset($types['assets'])) {
            $clearAll = false;
            View::clearAssetsCache();
            $messages[] = 'Assets cache cleared.';
        }
        if (isset($types['routes'])) {
            $clearAll = false;
            Router::clearCache();
            $messages[] = 'Routes cache cleared.';
        }
        if (isset($types['sloader'])) {
            $clearAll = false;
            self::clearLoaderCache();
            $messages[] = 'Loader cache cleared.';
        }
        if (isset($types['db'])) {
            $clearAll = false;
            self::clearDatabaseCache();
            $messages[] = 'Database cache cleared.';
        }
        if (isset($types['pvolt'])) {
            $clearAll = false;
            self::clearVoltCache();
            $messages[] = 'Volt cache cleared.';
        }
        if ($clearAll) {
            Cache::flush();
            Config::clearCache();
            Router::clearCache();
            self::clearLoaderCache();
            self::clearDatabaseCache();
            self::clearVoltCache();
            $messages[] = 'Cache cleared.';
        }
        Events::fire('cache:after_clear', $messages, $messages);
        return $messages;
    }

    /**
     * @return array
     * @codeCoverageIgnore
     */
    public static function getTypes()
    {
        return self::$types;
    }

    /**
     * @param array $types
     * @codeCoverageIgnore
     */
    public static function setTypes($types)
    {
        self::$types = $types;
    }

    /**
     * 清除加载缓存
     * @author wangyu <wangyu@ledouya.com>
     * @createTime 2018/5/3 14:58
     */
    public static function clearLoaderCache()
    {
        if ($files = glob(storagePath('cache') . '/loader*')) {
            foreach ($files as $file) {
                unlink($file);
            }
        }
    }

    /**
     * 清除数据库缓存
     * @author wangyu <wangyu@ledouya.com>
     * @createTime 2018/5/3 14:58
     */
    public static function clearDatabaseCache()
    {
        if ($files = glob(storagePath('db') . '/*')) {
            foreach ($files as $file) {
                unlink($file);
            }
        }
    }

    /**
     * 清除视图编译文件
     * @author wangyu <wangyu@ledouya.com>
     * @createTime 2018/5/5 18:06
     */
    public static function clearVoltCache()
    {
        if ($files = glob(storagePath('volt') . '/*')) {
            foreach ($files as $file) {
                unlink($file);
            }
        }
    }
}
