<?php

namespace Acme;

use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
/**
 * Description of ShowCommand
 *
 * @author hungtran
 */
class ShowCommand extends Command
{   
    public function __construct(DatabaseAdapter $database) {
        $this->database = $database;
        parent::__construct();
    }


    public function configure() {
        $this->setName('show')
                ->setDescription('Show all tasks');
    }
    
    public function execute(InputInterface $input, OutputInterface $output) {
        $this->showTasks($output);
    }
    
}
