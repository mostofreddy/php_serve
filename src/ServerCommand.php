<?php

declare(strict_types=1);

namespace Smarttly\Phpserve;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Process\ProcessUtils;
use Symfony\Component\Process\PhpExecutableFinder;

class ServerCommand extends Command
{
    /** @var string $defaultName */
    protected static $defaultName = 'serve';

    /**
     * @return void
     */
    protected function configure(): void
    {
        $this
            ->setDescription('PHP Built-in web server')
            ->setHelp('PHP Built-in web server')
            ->addOption(
                'host',
                null,
                InputOption::VALUE_REQUIRED,
                'Host. Default: localhost',
                'localhost'
            )
            ->addOption(
                'port',
                null,
                InputOption::VALUE_REQUIRED,
                'Post. Default: localhost',
                '5005'
            )
            ->addOption(
                'target',
                null,
                InputOption::VALUE_REQUIRED,
                'Root path. Default: ./public',
                './public'
            );
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        $host = $input->getOption('host');
        $port = $input->getOption('port');
        $target = $input->getOption('target');
        
        $binary = ProcessUtils::validateInput(__METHOD__, (new PhpExecutableFinder())->find(false));

        $output->writeln("PHP development server started on <comment>http://{$host}:{$port}</comment>");

        $cmd = "{$binary} -S {$host}:{$port} -t {$target}";
        passthru($cmd);
    }
}
