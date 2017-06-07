<?php

namespace Acme;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Description of CompleteCommand
 *
 * @author hungtran
 */
class CompleteCommand extends Command {
    
    public function __construct(DatabaseAdapter $database) {
        $this->database = $database;
        parent::__construct();
    }
    
    public function configure() {
        $this->setName('complete')
                ->setDescription("Complete a task by id")
                ->addArgument('id', InputArgument::REQUIRED);
    }
    
    public function execute(InputInterface $input, OutputInterface $output) {
        //check the id 
        $id = $input->getArgument('id');
        $sql = 'DELETE FROM tasks WHERE id = ?';
        $this->database->query($sql, [$id]);        
        $this->showTasks($output);
    }
}
