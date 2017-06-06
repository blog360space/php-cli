#! /usr/bin/env php

<?php

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

//use Symfony\Component\Console\Application;
//
//require 'vendor/autoload.php';
//
//$app = new Application();

require 'vendor/autoload.php';

$app = new Application("Laracasts Demo", '1.0');
$app->register('sayHelloTo')
        ->setDescription("Offer greeting to a person")
        ->addArgument('name', InputArgument::REQUIRED, 'Your name.')
        ->setCode(function (InputInterface $input, OutputInterface $output) {
            $name = $input->getArgument('name');
            $msg = "Hello, " . "<comment>" . $name . "</comment>";
            
            $output->writeln($msg);
        });
        
$app->run();        