#! /usr/bin/env php

<?php

use Acme\AddCommand;
use Acme\CompleteCommand;
use Acme\DatabaseAdapter;
use Acme\ShowCommand;
use Symfony\Component\Console\Application;

require 'vendor/autoload.php';

try {
    $pdo = new PDO('sqlite:db.sqlite');
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (Exception $ex) {    
    echo $ex->getMessage();    
    exit(1);
}

$dbAdapter = new DatabaseAdapter($pdo);

$app = new Application("App Task", '1.0');
$app->add(new ShowCommand($dbAdapter)) ;
$app->add(new AddCommand($dbAdapter)) ;
$app->add(new CompleteCommand($dbAdapter)) ;

$app->run();        