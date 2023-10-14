<?php

namespace App\Command;

use App\Entity\LkpProvider;
use App\Entity\TblEmployee;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SeedDatabaseCommand extends Command
{
    protected static $defaultName = 'app:seed-database';
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct();

        $this->em = $em;
    }

    protected function configure()
    {
        $this
            ->setDescription('Seed the database with initial data')
            ->setHelp('This command seeds the database with initial data for your application');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return string
     */
    protected function execute(InputInterface $input, OutputInterface $output): string
    {
        $output->writeln([
            'Seeding the database...',
            '===============================',
            'Start At:' . date('d-m-Y H:i:s'),
            '',
        ]);

        $provider1 = new LkpProvider();
        $provider1->setName('Provider1');
        $provider1->setKindId(1);
        $provider1->setMethod('GET');
        $provider1->setCredentials(array('url' => 'http://www.mocky.io/v2/5d47f24c330000623fa3ebfa'));
        $this->em->persist($provider1);

        $provider2 = new LkpProvider();
        $provider2->setName('Provider2');
        $provider2->setKindId(1);
        $provider2->setMethod('GET');
        $provider2->setCredentials(array('url' => 'http://www.mocky.io/v2/5d47f235330000623fa3ebf7'));
        $this->em->persist($provider2);

        for ($i = 1; $i < 6; $i++) {
            $employee = new TblEmployee();
            $employee->setName('Developer' . $i);
            $employee->setKindId(1);
            $employee->setLevel($i);
            $this->em->persist($employee);
        }

        $this->em->flush();

        $output->writeln([
            'Database seeding',
            '===============================',
            'Completed At:' . date('d-m-Y H:i:s'),
            '',
        ]);
        return true;
    }


}