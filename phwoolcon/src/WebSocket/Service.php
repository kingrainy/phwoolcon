<?php

/**
 * Created by PhpStorm.
 * User: kingrainy
 * Date: 2018/1/24
 * Time: 上午9:32
 */

namespace Phwoolcon\WebSocket;

use Phwoolcon\Config;
use GatewayWorker\Lib\Gateway;

class Service extends Gateway
{

    public static $registerAddress = '127.0.0.1:12345';

}