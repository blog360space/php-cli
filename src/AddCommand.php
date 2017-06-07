<?php

namespace Acme;

use Acme\DatabaseAdapter;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Description of AddCommand
 *
 * @author hungtran
 */
class AddCommand extends Command
{
    public function __construct(DatabaseAdapter $database) {
        $this->database = $database;        
        parent::__construct();
    }

    public function configure() {
        $this->setName('add')
                ->setDescription("Add a new task")
                ->addArgument('description', InputArgument::REQUIRED, 'Task description.');
    }
    
    public function execute(InputInterface $input, OutputInterface $output) {
        $description = $input->getArgument('description');
        $sql = "INSERT INTO tasks(id, description) VALUES(?, ?)";        
        
        
        $this->database->query($sql, [rand(1, 5000),$description]);
        $output->writeln('<info>Task added.</info>');
        
        $this->showTasks($output);
    }
}
