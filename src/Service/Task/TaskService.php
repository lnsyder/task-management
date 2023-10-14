<?php

namespace App\Service\Task;

use AbstractService;
use App\Entity\LkpProvider;
use App\Entity\TblEmployee;
use App\Entity\TblTask;
use App\Factory\Task\TaskFactory;
use Doctrine\ORM\Exception\NotSupported;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use ReflectionException;

class TaskService extends AbstractService
{
    /**
     * @return void
     * @throws NotSupported
     * @throws ORMException
     * @throws OptimisticLockException
     * @throws ReflectionException
     */
    public function handleTaskList()
    {
        $providers = $this->getEm()->getRepository(LkpProvider::class)->findAll();
        $allEmployees = $this->getEm()->getRepository(TblEmployee::class)
            ->findBy(['kindId' => 1], ['level' => "DESC"]);
        $employeeTaskWeekCounter = array();

        /** @var TblEmployee $employee */
        foreach ($allEmployees as $employee) {
            $employeeTaskWeekCounter[$employee->getEmployeeId()] = 0;
        }

        foreach ($providers as $provider) {

            $taskFactory = new TaskFactory();
            $taskStrategy = $taskFactory->callClass($provider->getProviderId(), [$this->container, $provider]);
            $tasks = $taskStrategy->handleTasks();

            foreach ($tasks as $task) {
                $availableEmployeeId = array_search(min($employeeTaskWeekCounter), $employeeTaskWeekCounter);
                $availableEmployee = $this->getEm()->getReference(TblEmployee::class, $availableEmployeeId);

                $taskWeek = ($employeeTaskWeekCounter[$availableEmployee->getEmployeeId()]
                / 45 < 1 ? 1 : ceil($employeeTaskWeekCounter[$availableEmployee->getEmployeeId()] / 45));

                $tblTask = new TblTask();
                $tblTask->setEmployee($availableEmployee);
                $tblTask->setProvider($provider);
                $tblTask->setTaskName($task['task_name']);
                $tblTask->setEstimatedDuration($task['estimated_duration']);
                $tblTask->setEmployeeEstimatedDuration(
                    round($task['employee_estimated_duration'] / $availableEmployee->getLevel())
                );
                $tblTask->setTaskWeek($taskWeek);
                $this->getEm()->persist($tblTask);

                $employeeTaskWeekCounter[$availableEmployee->getEmployeeId()]
                    += round($task['employee_estimated_duration'] / $availableEmployee->getLevel());
            }
        }
        $this->getEm()->flush();
    }

    /**
     * @return mixed
     * @throws NotSupported
     */
    public function getAllTasks()
    {
        $tasks = $this->getEm()->getRepository(TblTask::class)->getTasksGroupByWeeks();
        foreach ($tasks as &$task){
            $task['tasks'] = json_decode($task['tasks'],JSON_OBJECT_AS_ARRAY);
        }
        return $tasks;
    }
}