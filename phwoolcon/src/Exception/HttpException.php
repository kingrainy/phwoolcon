<?php

namespace Phwoolcon\Exception;

use Phalcon\Http\Response;
use RuntimeException;

class HttpException extends RuntimeException
{
    protected $headers = [];

    public function __construct($message, $code, $headers = null)
    {
        parent::__construct($message, $code);
        $headers and $this->headers = (array)$headers;
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    /*public function toResponse()
    {
        $response = new Response($this->getMessage(), $this->getCode());
        $headers = $this->getHeaders();
        foreach ($headers as $name => $value) {
            if (is_numeric($name)) {
                list($name, $value) = explode(':', $value);
            }
            $response->setHeader(trim($name), trim($value));
        }
        return $response;
    }*/
    public function toResponse($contents = null, $headers = [])
    {
        $response = new Response();
        $response->setStatusCode($this->getCode());
        $headers = empty($headers) ? $this->igetHeaders() : $headers;
        foreach ($headers as $name => $value) {
            if (is_numeric($name)) {
                list($name, $value) = explode(':', $value);
            }
            $response->setHeader(trim($name), trim($value));
        }
        $response->setContent(empty($contents) ? $this->getBody() : $contents); //设置响应内容
        return $response;
    }

    public function igetHeaders()
    {
        return [
            'content-type: application/vnd.api+json',
            'exception-type: HttpException',
        ];
    }

    public function getBody()
    {
        return json_encode([
            'jsonapi' => ['version' => '1.0'],
            'error' => $this->getCode(),
            'error_reason' => $this->getMessage()
        ]);
    }
}
