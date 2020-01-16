<?php

declare(strict_types=1);

namespace Smarttly\Phpserve;

use Symfony\Component\Console\Application;
use Smarttly\Phpserve\ServerCommand;

class App
{
    public static function run(): void
    {
        $cmd = new Application();
        static::add($cmd);
        static::execute($cmd);
    }

    protected static function execute(Application $cmd): void
    {
        $cmd->run();
    }

    protected static function add(Application $cmd): void
    {
        $cmd->add(new ServerCommand());
    }
}
