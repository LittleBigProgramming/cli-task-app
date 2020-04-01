<?php

namespace Acme;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class ShowCommand
 * @package Acme
 */
class ShowCommand extends Command {

    public function configure()
    {
        $this->setName('show')
             ->setDescription('Show all tasks');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|void
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {

        return $output ? $this->showTasks($output) : 0;
    }
}