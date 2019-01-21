<?php
/**
 * Created by IntelliJ IDEA.
 * User: yeran
 * Date: 2018/1/22
 * Time: 下午3:11
 */

namespace Phwoolcon\Exception;

use Phwoolcon\Log;
use RuntimeException;
use Throwable;

class SysException extends RuntimeException{

    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        Log::error('-----'.$message);
    }
}
