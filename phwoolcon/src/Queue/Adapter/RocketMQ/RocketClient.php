<?php
/**
 * Created by IntelliJ IDEA.
 * User: yeran
 * Date: 2018/5/12
 * Time: 上午12:52
 */

namespace Phwoolcon\Queue\Adapter\RocketMQ;



use core\service\asyn\tcp\ClientPool;

class RocketClient
{

    /**
     * @var
     */
    private $tcpClient;

    public function __construct( $host, $port, $connect_timeout,$persistence)
    {
        // 注册tcp连接，默认执行连接
        $this->tcpClient = ClientPool::getInstance()->getAsyncClient();
    }


    /**
     * 注册监听topic和tags
     *
     * @param $topic
     * @param $tags
     * @return $this
     */
    public function watchOnly($topic,$tags,$callback=null){
        // 发送第一次tcp请求，声明监听topic和tags

        $data = [
            'msg' => [
                'topic' => $topic,
                'tags'  => $tags
            ],
            'access' =>[
                'appid' => 'LD_yeran001',
                'accessKey' => ''
            ]
        ];
        ClientPool::getInstance()->send($this->tcpClient,json_encode($data), function ($result) use ($callback) {
            if($callback){
                call_user_func($callback,$result);
            }
            return $this;
        });

    }


    /**
     * 启动阻塞监听，如果收到新的消息，会通过回调传入
     *
     * @param $readTimeout
     */
    public function reserve($readTimeout){
        // 启动消息结果回调



        return new RowJob(1,"dasda");
    }


    /**
     *
     * 发送消息至队列
     *
     * @param $msg
     */
    public function send($msg){

    }


}