<?php

namespace Acme;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SayHelloCommand extends Command
{
    /**
     * apply setter config
     */
    public function configure() 
    {
        $this->setName("SayHelloTo")
                ->setDescription("Offer greeting to a person.")
                ->addArgument('name', InputArgument::REQUIRED, 'Your name.');
    }
    
    public function execute(InputInterface $input, OutputInterface $output) 
    {
        $name = $input->getArgument('name');
            $msg = "Hello, " . "<comment>" . $name . "</comment>";
            
            $output->writeln($msg);
    }
}
