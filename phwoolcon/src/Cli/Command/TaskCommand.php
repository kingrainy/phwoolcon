<?php

/**
 * 命令行处理任务
 * @author: wangyu <wangyu@ledouya.com>
 * @createTime: 2018/4/23 9:12
 */

namespace Phwoolcon\Cli\Command;

use Exception;
use Phwoolcon\Cli\Command;
use Phwoolcon\Config;
use Phwoolcon\Log;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class TaskCommand extends Command
{
    protected $outputTimestamp = true;

    protected function configure()
    {
        $this->setDescription('Command line execute task.');

        $optional = InputOption::VALUE_OPTIONAL;
        $this->addOption('name', null, $optional, 'The task processing class and processing function')
            ->addOption('options', null, $optional, 'Custom options, URL query string', '');
    }

    public function fire()
    {
        set_time_limit(0);
        $name = $this->input->getOption('name');
        $options = $this->input->getOption('options');
        if (empty($name)) {
            $this->info($this->getDescription());
            $this->comment('Usage:');
            $this->info('bin\cli task --name App\Test\Services\Tasks\TestTask::test');
            $this->output->writeln('');
            return false;
        }
        $classArray = explode('::', $name, 2);
        if (empty($classArray[0]) || empty($classArray[1]) || !class_exists($classArray[0]) || !method_exists($classArray[0], $classArray[1])) {
            $this->output->writeln('');
            $this->error('Processing class or processing function not exists');
            $this->output->writeln('');
            return false;
        }
        $parameters = [];
        if ($options) {
            parse_str($options, $parameters);
        }
        try {
            $returnValue = call_user_func($name, $parameters);
            if (is_array($returnValue)) {
                $returnValue = json_encode($returnValue, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            } elseif (is_object($returnValue)) {
                $returnValue = json_encode($returnValue, JSON_FORCE_OBJECT);
            }
            $this->output->writeln('');
            $this->info($returnValue);
            $this->output->writeln('');
        } catch (\Exception $e) {
            $this->output->writeln('');
            $this->info($e->getMessage());
            $this->output->writeln('');
        }
    }
}
