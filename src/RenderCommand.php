<?php

namespace Acme;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Description of RenderCommand
 *
 * @author hungtran
 */
class RenderCommand extends Command
{
    public function configure() {
        $this->setName('render')
                ->setDescription('Render some tabula data.');
    }
    
    public function execute(InputInterface $input, OutputInterface $output) {
        $table = new Table($output);
        
        $table->setHeaders(['Name', 'Age'])
                ->setRows([
                    ['Hung Gau', '31'],
                    ['Hoang Map', '35'],
                    ['Hung Tran', '31'],
                    ['Nhu Hanh', '28']
                ])
                ->render();
        
    }
}
