<?php

namespace App\Strategy\Task;

interface TaskStrategyInterface
{
    public function getTasks();
    public function handleTasks();
}