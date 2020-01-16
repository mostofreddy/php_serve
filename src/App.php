<?php

declare(strict_types=1);

namespace Smarttly\Phpserve;

use Symfony\Component\Console\Application;
use Smarttly\Phpserve\ServerCommand;

class App
{
    public static function run(): void
    {
        $app = new Application();
        static::add($app);
        static::execute($app);
    }

    protected static function execute(Application $app): void
    {
        $app->run();
    }

    protected static function add(Application $app): void
    {
        $cmd = new ServerCommand();
        $app->add($cmd);
        $app->setDefaultCommand($cmd->getName());
    }
}
