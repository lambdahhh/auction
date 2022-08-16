<?php

namespace App\Console;

class HelloCommand extends \Symfony\Component\Console\Command\Command
{
    protected function configure()
    {
        $this
            ->setName('hello')
            ->setDescription('hello command');
    }

    protected function execute(\Symfony\Component\Console\Input\InputInterface $input, \Symfony\Component\Console\Output\OutputInterface $output)
    {
        $output
            ->writeln('<info>Hello!</info>');

        return 0;
    }
}
