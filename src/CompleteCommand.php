<?php

namespace Acme;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class CompleteCommand
 * @package Acme
 */
class CompleteCommand extends Command
{
    public function configure()
    {
        $this->setName('complete')
            ->setDescription('Complete a task by its id')
            ->addArgument('id', InputArgument::REQUIRED);
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $id = $input->getArgument('id');

        $this->database->query(
            'delete from tasks where id = :id',
            compact('id')
        );

        $output->writeln('<info>Task Completed!</info>');
        $this->showTasks($output);
        return 1;
    }
}
