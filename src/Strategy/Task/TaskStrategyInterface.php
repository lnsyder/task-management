<?php

namespace App\Strategy\Task;

use App\Entity\LkpProvider;

interface TaskStrategyInterface
{
    public function getTasks();
    public function handleTasks();
}