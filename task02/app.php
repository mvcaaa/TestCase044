#!/usr/bin/env php
<?php
/**
 * Created by Astashov Andrey <mvc.aaa@gmail.com>
 * Date: 11.02.2016 / 8:54
 */

// application.php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/src/ServeCommand.php';

use mvcaaa\phpdevtask02\ServeCommand;
use Symfony\Component\Console\Application;

$application = new Application();
$application->add(new ServeCommand());
$application->run();
