<?php

namespace Phwoolcon\Queue;

use Exception;
use Phwoolcon\Queue;
use Phwoolcon\Queue\Adapter\JobInterface;
use Phwoolcon\Queue\Adapter\JobTrait;
use Phwoolcon\Queue\Listener\Result;
use Throwable;

class Listener
{

    /**
     * Log a failed job into storage.
     *
     * @param JobInterface|JobTrait $job
     */
    protected function fail($job)
    {
        Queue::getFailLogger()->log($job->getQueue()->getConnectionName(), $job->getQueueName(), $job->getRawBody());
        $job->delete();
    }

    /**
     * Listen to the given queue.
     *
     * @param  string $connectionName
     * @param  string $queue
     * @param  int $delay
     * @param  int $sleep
     * @param  int $maxTries
     * @param null $tags
     * @return Result
     */
    public function pop($connectionName, $queue = null, $delay = 0, $sleep = 3, $maxTries = 0, $tags = null)
    {
        $connection = Queue::connection($connectionName);
        if ($job = $connection->pop($queue, $tags)) {
            return $this->process($queue, $job, $maxTries, $delay);
        }
        // Sleep the worker for the specified number of seconds, if no jobs
        sleep($sleep);
        return Result::success(null);
    }

    /**
     *
     * 阻塞监听
     *
     * @param $connectionName
     * @param null $queue
     * @param int $delay
     * @param int $sleep
     * @param int $maxTries
     * @param null $tags
     * @return bool
     */
    public function reserve($connectionName, $queue = null, $delay = 0, $sleep = 3, $maxTries = 0, $tags = null)
    {
        $connection = Queue::connection($connectionName);
        while ($job = $connection->reserve($queue, $tags)) {
            $this->process($queue, $job, $maxTries, $delay);
            return true;
        }
        return false;
    }

    /**
     * Process a given job from the queue.
     *
     * @param $queue
     * @param JobInterface|JobTrait $job
     * @param int $maxTries
     * @param int $delay
     * @return Result
     * @throws Exception
     * @throws Throwable
     */
    public function process($queue, JobInterface $job, $maxTries = 0, $delay = 0)
    {
        if ($maxTries > 0 && $job->attempts() > $maxTries) {
            $this->fail($job);
            return Result::failed($job);
        }
        try {
            $job->fire($queue);
            return Result::success($job);
        } catch (Exception $e) {
            // If we catch an exception, we will attempt to release the job back onto
            // the queue so it is not lost. This will let is be retried at a later
            // time by another listener (or the same one). We will do that here.
            if (!$job->isDeleted()) {
                $job->release($delay);
            }
            commandLineOutput($e->getFile() . ':' . $e->getLine() . ' ' . $e->getMessage(), 'ERROR');
//            throw $e;
        } // @codeCoverageIgnoreStart
        catch (Throwable $e) {
            if (!$job->isDeleted()) {
                $job->release($delay);
            }
            commandLineOutput($e->getFile() . ':' . $e->getLine() . ' ' . $e->getMessage(), 'ERROR');
//            throw $e;
        }
        // @codeCoverageIgnoreEnd
    }
}
