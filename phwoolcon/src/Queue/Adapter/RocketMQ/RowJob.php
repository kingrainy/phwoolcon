<?php
/**
 * Created by IntelliJ IDEA.
 * User: yeran
 * Date: 2018/5/12
 * Time: 上午1:15
 */

namespace Phwoolcon\Queue\Adapter\RocketMQ;


class RowJob
{

    private $messageId;
    private $data;

    /**
     * RowJob constructor.
     * @param $messageId
     * @param $data
     */
    public function __construct($messageId, $data)
    {
        $this->messageId = $messageId;
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getMessageId()
    {
        return $this->messageId;
    }

    /**
     * @param mixed $messageId
     */
    public function setMessageId($messageId)
    {
        $this->messageId = $messageId;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }





}