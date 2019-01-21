<?php
/**
 * Created by IntelliJ IDEA.
 * User: yeran
 * Date: 2018/5/11
 * Time: 下午6:34
 */

namespace Phwoolcon\Queue\Adapter;


use Phwoolcon\Queue\Adapter\RocketMQ\Job;
use Phwoolcon\Queue\Adapter\RocketMQ\RocketClient;
use Phwoolcon\Queue\AdapterInterface;
use Phwoolcon\Queue\AdapterTrait;

class RocketMQ implements AdapterInterface
{
    use AdapterTrait;
    protected $readTimeout = null;

    /**
     * @var RocketClient
     */
    private $connection;

    protected function connect(array $options)
    {
        // @codeCoverageIgnoreStart
        if ($this->connection) {
            return;
        }
        // @codeCoverageIgnoreEnd
        $this->connection = new RocketClient(
            $options['host'],
            $options['port'],
            $options['connect_timeout'],
            $options['persistence']
        );
        isset($options['read_timeout']) and $this->readTimeout = $options['read_timeout'];
    }

    public function pop($queue = null,$tags=null)
    {
        $queue = $this->getQueue($queue);

        if (($job = $this->connection->watchOnly($queue,$tags)->reserve($this->readTimeout))) {
            return new Job($this, $job, $queue);
        }
        return null;
    }

    public function reserve($queue = null,$tags=null){
        $queue = $this->getQueue($queue);
        $listener = $this->connection->watchOnly($queue,$tags);

        echo '----';
        while (($job = $listener->reserve($this->readTimeout))) {
            return new Job($this, $job, $queue);
        }
        echo '-finish---';
        return null;
    }

    public function pushRaw($payload, $queue = null, array $options = [])
    {
        $payload = (string)$payload;
        $priority = isset($options['priority']) ? $options['priority'] : Pheanstalk::DEFAULT_PRIORITY;
        $delay = isset($options['delay']) ? $options['delay'] : Pheanstalk::DEFAULT_DELAY;
        $timeToRun = isset($options['ttr']) ? $options['ttr'] : Pheanstalk::DEFAULT_TTR;
        return $this->connection->useTube($this->getQueue($queue))
            ->put($payload, $priority, $delay, $timeToRun);
    }

}