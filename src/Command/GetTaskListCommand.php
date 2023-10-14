<?php

namespace App\Command;

use App\Service\Task\TaskService;
use Doctrine\ORM\Exception\NotSupported;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class GetTaskListCommand extends Command
{
    protected static $defaultName = 'app:get-task-list';
    protected static string $defaultDescription = 'Get and handle all tasks from providers';

    /**
     * @var ContainerInterface
     */
    private ContainerInterface $container;

    public function __construct(ContainerInterface $container, string $name = null)
    {
        parent::__construct($name);
        $this->container = $container;
    }


    protected function configure(): void
    {
        $this
            ->setDescription(self::$defaultDescription);
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return string
     * @throws NotSupported
     * @throws \ReflectionException
     */
    protected function execute(InputInterface $input, OutputInterface $output): string
    {

        $output->writeln([
            'Get Task List',
            '===============================',
            'Start At:' . date('d-m-Y H:i:s'),// Start
            '',
        ]);
        $service = new TaskService($this->container);
        $service->handleTaskList();
        $output->writeln([
            'Get Task List',
            '===============================',
            'Completed At:' . date('d-m-Y H:i:s'),// Start
            '',
        ]);
        return true;
    }
}
