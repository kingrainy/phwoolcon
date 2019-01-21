<?php
/**
 * Created by IntelliJ IDEA.
 * User: yeran
 * Date: 2018/5/12
 * Time: 上午12:32
 */

namespace Phwoolcon\Cli\Command;

use Exception;
use Phwoolcon\Config;
use Phwoolcon\Log;
use Phwoolcon\Queue\Listener;
use Phwoolcon\Util\Timer;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Phwoolcon\Cli\Command;

class RocketQueueConsumeCommand extends Command
{
    protected $outputTimestamp = true;

    protected function configure()
    {
        $this->setDescription('Consume from a given rocketMQ')
            ->addArgument('queue', InputArgument::OPTIONAL, 'The queue name to consume from, e.g. async_email_sending');

        $optional = InputOption::VALUE_OPTIONAL;
        $this->addOption('topic', null, $optional, 'The queue topic to consume from')
            ->addOption('delay', null, $optional, 'Seconds to delay failed jobs', 0)
            ->addOption('interval', 'i', $optional, 'Seconds between jobs execution', 0)
            ->addOption('memory', null, $optional, 'The memory limit in megabytes', 128)
            ->addOption('sleep', null, $optional, 'Seconds to sleep when no job is available', 3)
            ->addOption('ttl', null, $optional, 'Seconds to keep this consumer running', 3600)
            ->addOption('tries', null, $optional, 'Number of times to attempt a job before logging it failed', 0)
            ->addOption('type', null, $optional, 'work type :fire;reserve', 'reserve');
    }

    public function fire()
    {

        $runningUnitTest = Config::runningUnitTest();
        $queueName = $this->input->getArgument('queue');

        $topic = $this->input->getOption('topic');
        $delay = $this->input->getOption('delay');
        $interval = $this->input->getOption('interval') * 1e6;
        $sleep = $this->input->getOption('sleep');
        $ttl = $this->input->getOption('ttl');
        $maxTries = $this->input->getOption('tries');

        $memory = $this->input->getOption('memory');
        $memoryLimit = $memory * 1024 * 1024;

        $listener = $this->getListener();
        Timer::start();
        $i = 0;
        while (true) {
            //   $this->info('---handler---');
            // Memory leak protect
            if (++$i >= 100) {
                if (memory_get_usage() > $memoryLimit) {
                    $runningUnitTest and $this->comment('Memory leak protection');
                    break;
                }
                $i = 0;
            }
            try {
                $listener->pop($queueName, $topic, $delay, $sleep, $maxTries);
                $interval and usleep($interval);
            } catch (Exception $e) {
                Log::exception($e);
                $this->error($e->getMessage());
                break;
            }
            // Exit when exceeds ttl, let process manager (e.g. supervisord) to start the listener again
            if (Timer::stop() >= $ttl) {
                break;
            }
        }
    }

    public function reserve(){
        $runningUnitTest = Config::runningUnitTest();
        $queueName = $this->input->getArgument('queue');

        $topic = $this->input->getOption('topic');
        $delay = $this->input->getOption('delay');
        $interval = $this->input->getOption('interval') * 1e6;
        $sleep = $this->input->getOption('sleep');
        $ttl = $this->input->getOption('ttl');
        $maxTries = $this->input->getOption('tries');

        $memory = $this->input->getOption('memory');
        $memoryLimit = $memory * 1024 * 1024;

        $listener = $this->getListener();
        Timer::start();
        $i = 0;
        while ($listener->reserve($queueName, $topic, $delay, $sleep, $maxTries)) {
            $this->info('---handler---');
            // Memory leak protect
            try {
                if (++$i >= 100) {
                    if (memory_get_usage() > $memoryLimit) {
                        $runningUnitTest and $this->comment('Memory leak protection');
                        break;
                    }
                    $i = 0;
                }


                $interval and usleep($interval);
            } catch (Exception $e) {
                Log::exception($e);
                $this->error($e->getMessage());
                break;
            }
            // Exit when exceeds ttl, let process manager (e.g. supervisord) to start the listener again
            if (Timer::stop() >= $ttl) {
                break;
            }
        }
    }



    /**
     * @return Listener
     */
    protected function getListener()
    {
        $di = $this->di;
        $listenerClass = Listener::class;
        $di->has($listenerClass) and $listenerClass = $di->getRaw($listenerClass);
        return new $listenerClass;
    }
}