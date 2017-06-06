#! /usr/bin/env php

<?php

use Acme\RenderCommand;
use Symfony\Component\Console\Application;

require 'vendor/autoload.php';

$app = new Application("Laracasts Demo", '1.0');
$app->add(new RenderCommand());
        
$app->run();        