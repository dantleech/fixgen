<?php

namespace DTL\Fixgen\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class GenerateCommand extends Command
{
    public function __construct(
    )
    {
        parent::__construct();
    }

    public function configure()
    {
        $this->setName('generate');
        $this->setDescription('Generate and insert fixtures');
        $this->addArgument('file', InputArgument::REQUIRED, 'Fixture file');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
    }
}
