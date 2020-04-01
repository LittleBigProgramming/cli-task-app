<?php

namespace Acme;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ShowCommand extends Command {

    private $database;
    /**
     * ShowCommand constructor.
     * @param DatabaseAdapter $database
     */
    public function __construct(DatabaseAdapter $database)
    {
        $this->database = $database;

        parent::__construct();
    }

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

    /**
     * @param OutputInterface $output
     */
    private function showTasks(OutputInterface $output)
    {
        if (!$tasks = $this->database->fetchAll('tasks'))
        {
            $output->writeln('<info>No tasks at the moment!</info>');
            return 0;
        }

        $table = new Table($output);

        $table->setHeaders(['Id', 'Description'])
              ->setRows($tasks)
              ->render();
    }
}