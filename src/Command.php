<?php

namespace Acme;

use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Description of Command
 *
 * @author hungtran
 */
class Command extends SymfonyCommand {
    
    protected $database;
    
    protected function showTasks(OutputInterface $output) {
        
        if (! $taks = $this->database->fetchAll('tasks')) {            
            return $output->writeln("<info>No task at the moment.</info>");
        }
        
        $table = new Table($output);
        $table->setHeaders(['ID', 'DESCRIPTION'])
                ->setRows($taks)
                ->render();
    }
}
