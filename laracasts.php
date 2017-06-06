#! /usr/bin/env php

<?php
require 'vendor/autoload.php';

use Acme\SayHelloCommand;
use Symfony\Component\Console\Application;

$app = new Application("Laracasts Demo", '1.0');
$app->add(new SayHelloCommand());
        
$app->run();        