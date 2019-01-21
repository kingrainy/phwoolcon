<?php

namespace Phwoolcon\Controller;

use core\service\security\AES;
use core\service\security\KeyConfig;
use InvalidArgumentException;
use Phwoolcon\Config;
use phwoolcon\core\common\CodeMsg;
use Phwoolcon\ErrorCodes;
use Phwoolcon\Log;
use Phwoolcon\Router;

/**
 * Class Api
 * @package Phwoolcon\Controller
 *
 * @method \Phalcon\Http\Response jsonReturn(array $array, $httpCode = 200, $contentType = 'application/json')
 */
trait Api
{
    protected $jsonApiContentType = 'application/vnd.api+json';
    protected $jsonApiVersion = ['version' => '1.0'];

    public function initialize()
    {
        Router::disableCsrfCheck();
        Router::disableSession();
    }

    public function missingMethod()
    {
        Router::throw404Exception(json_encode([
            'jsonapi' => $this->jsonApiVersion,
            'errors' => [
                [
                    'status' => 404,
                    'code' => 404,
                    'title' => '404 Not Found',
                ],
            ],
        ]), $this->jsonApiContentType);
    }

    /**
     * Returns JSON API data
     * @see http://jsonapi.org/format/#document-resource-objects
     *
     * @param array $data SHOULD contain `id` and `type`, MAY contain `attributes`, `relationships`, `links`
     * @param array $meta
     * @param array $extraData
     * @param int $status
     * @return \Phalcon\Http\Response
     */
    public function jsonApiReturnData(array $data, array $meta = [], array $extraData = [], $status = 200)
    {
        $extraData['jsonapi'] = $this->jsonApiVersion;
        $extraData['data'] = $data;
        $meta and $extraData['meta'] = $meta;
        return $this->jsonReturn($extraData, $status, $this->jsonApiContentType);
    }

    /**
     * Returns JSON API error
     * @see http://jsonapi.org/format/#errors
     *
     * @param array $errors Each error SHOULD contain `code` and `title`,
     *                      MAY contain `id`, `status`, `links`, `detail`, `source`
     * @param array $meta
     * @param array $extraData
     * @param int $status
     * @return \Phalcon\Http\Response
     */
    public function jsonApiReturnErrors(array $errors, array $meta = [], array $extraData = [], $status = 400)
    {
        foreach ($errors as &$error) {
            isset($error['code']) and $error['code'] = (string)$error['code'];
        }
        unset($error);
        $extraData['jsonapi'] = $this->jsonApiVersion;
        $extraData['errors'] = $errors;
        $meta and $extraData['meta'] = $meta;
        return $this->jsonReturn($extraData, $status, $this->jsonApiContentType);
    }

    public function jsonApiReturnMeta(array $meta, array $extraData = [], $status = 200)
    {
        $extraData['jsonapi'] = $this->jsonApiVersion;
        $extraData['meta'] = $meta;
        return $this->jsonReturn($extraData, $status, $this->jsonApiContentType);
    }

    /**
     * jsonApiReturn
     * @param mixed $errorCode 错误码
     * @param mixed $errorMsg 信息
     * @param array $data 返回数据
     * @param array $extraData 扩展数据
     * @param int $status 状态码
     * @param bool $is_encrypt 本次响应是否需要加密数据
     * @return \Phalcon\Http\Response
     * @author wangyu <wangyu@ledouya.com>
     * @createTime 2018/5/25 14:45
     */
    public function jsonApiReturn($errorCode, $errorMsg = null, array $data = null, array $extraData = [], $status = 200, $is_encrypt = true)
    {
        $extraData['jsonapi'] = $this->jsonApiVersion;
        if (!empty($data)) {
            if (true === $is_encrypt && true === Config::get('security.state.data') && !isset($data[ENCRYPT_FIELD_NAME])) {
                $extraData['data'][ENCRYPT_FIELD_NAME] = AES::aes128Encrypt(json_encode($data), Config::get('security.secret_key.data'), Config::get('security.secret_iv.data'));
            } else {
                $extraData['data'] = $data;
            }
        }
//        $extraData['error'] = $errorCode ?: 1;
        $extraData['error'] = $errorCode;
        if (!$errorMsg) {
            $errorCode = ErrorCodes::getCodeMsg($errorCode);
            $errorMsg = ($errorCode && count($errorCode) == 2) ? $errorCode[1] : '';
        }
        $extraData['error_reason'] = $errorMsg;
        return $this->jsonReturn($extraData, $status, $this->jsonApiContentType);
    }
}
