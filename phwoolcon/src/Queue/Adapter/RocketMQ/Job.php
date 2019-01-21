<?php
namespace Phwoolcon\Queue\Adapter\RocketMQ;

use Phwoolcon\Queue\Adapter\JobInterface;
use Phwoolcon\Queue\Adapter\JobTrait;


class Job implements JobInterface
{
    use JobTrait;

    protected function _delete()
    {
        $this->connection->delete($this->rawJob);
    }

    protected function _release($delay = 0)
    {
        $priority = Pheanstalk::DEFAULT_PRIORITY;
        $this->connection->release($this->rawJob, $priority, $delay);
    }

    public function attempts()
    {
        $stats = $this->connection->statsJob($this->rawJob);
        return (int)$stats->reserves;
    }

    /**
     * Bury the job in the queue.
     *
     * @return void
     */
    public function bury()
    {
        $this->connection->bury($this->rawJob);
    }

    /**
     * Get the job identifier.
     *
     * @return integer
     */
    public function getJobId()
    {
        return $this->rawJob->getId();
    }

    public function getRawBody()
    {
        return $this->rawJob->getData();
    }
}
