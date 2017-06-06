<?php

namespace Acme;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use ZipArchive;

class NewCommand extends Command
{
    /**
     *
     * @var Client
     */
    private $client;


    public function __construct(ClientInterface $client) 
    {
        $this->client = $client;
        parent::__construct();
    }
    
    /**
     * apply setter config
     */
    public function configure() 
    {
        $this->setName("new")
                ->setDescription("Create a new Laravel applycation.")
                ->addArgument('name', InputArgument::REQUIRED);
    }
    
    public function execute(InputInterface $input, OutputInterface $output) 
    {
        // check dir does not exist
        $directory = getcwd() . '/data/' . $input->getArgument('name');        
        $this->assertApplicationExist($directory, $output);
        
        $output->writeln("<comment>Processing...</comment>");
        
        // download nightly version of laravel
        //extract zip file
        $zipFile = $this->makeFileName();
        $this->download($zipFile)
                ->extract($zipFile, $directory)
                ->cleanUp($zipFile);
        
        //alert user process done        
        $output->writeln("<info>Application ready to go!!</info>");
    }
    
    private function makeFileName()
    {
        return getcwd() . '/laravel_' . md5(time() . uniqid()) . '.zip';
    }
    
    private function assertApplicationExist($dir, OutputInterface $output)
    {
        if (is_dir($dir)) {
            $msg = "<error>Application already exits!</error>";
            $output->writeln($msg);
            exit(1);
        }
    }
    
    private function download($zipFile)
    {
        $url = 'http://cabinet.laravel.com/latest.zip';
        $response = $this->client->get($url)->getBody();
        
        file_put_contents($zipFile, $response);
        
        return $this;
    }
    
    private function extract($zipFile, $directory)
    {
        $archive = new ZipArchive();
        $archive->open($zipFile);
        $archive->extractTo($directory);
        $archive->close(); 
        
        return $this;
    }
    
    private function cleanUp($zipFile)
    {
        @chmod($zipFile, 0777);
        @unlink($zipFile);
        
        return $this;
    }
}
