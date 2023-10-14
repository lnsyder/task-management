<?php

namespace App\Factory\Task;

use App\Entity\LkpProvider;
use App\Factory\AbstractFactory;

class TaskFactory extends AbstractFactory
{
    protected array $functions = array(
        LkpProvider::Provider1 => 'App\Strategy\Task\Provider1',
        LkpProvider::Provider2 => 'App\Strategy\Task\Provider2'
    );
}