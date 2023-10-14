<?php

namespace App\Entity;

/**
 * TblTask
 */
class TblTask
{

    /**
     * @var int
     */
    private int $taskId;

    /**
     * @var string
     */
    private string $taskName;

    /**
     * @var string
     */
    private string $taskWeek;

    /**
     * @var int
     */
    private int $estimatedDuration;

    /**
     * @var int
     */
    private string $employeeEstimatedDuration;

    /**
     * @var LkpProvider
     */
    private LkpProvider $provider;

    /**
     * @var TblEmployee
     */
    private TblEmployee $employee;

    /**
     * @return int
     */
    public function getTaskId(): int
    {
        return $this->taskId;
    }

    /**
     * @param int $taskId
     */
    public function setTaskId(int $taskId): void
    {
        $this->taskId = $taskId;
    }

    /**
     * @return string
     */
    public function getTaskName(): string
    {
        return $this->taskName;
    }

    /**
     * @param string $taskName
     */
    public function setTaskName(string $taskName): void
    {
        $this->taskName = $taskName;
    }

    /**
     * @return int
     */
    public function getEstimatedDuration(): int
    {
        return $this->estimatedDuration;
    }

    /**
     * @param int $estimatedDuration
     */
    public function setEstimatedDuration(int $estimatedDuration): void
    {
        $this->estimatedDuration = $estimatedDuration;
    }

    /**
     * @return string
     */
    public function getEmployeeEstimatedDuration(): string
    {
        return $this->employeeEstimatedDuration;
    }

    /**
     * @param string $employeeEstimatedDuration
     */
    public function setEmployeeEstimatedDuration(string $employeeEstimatedDuration): void
    {
        $this->employeeEstimatedDuration = $employeeEstimatedDuration;
    }

    /**
     * @return LkpProvider
     */
    public function getProvider(): LkpProvider
    {
        return $this->provider;
    }

    /**
     * @param LkpProvider $provider
     */
    public function setProvider(LkpProvider $provider)
    {
        $this->provider = $provider;
        return $this;
    }

    /**
     * @return TblEmployee
     */
    public function getEmployee(): TblEmployee
    {
        return $this->employee;
    }

    /**
     * @param TblEmployee $employee
     */
    public function setEmployee(TblEmployee $employee)
    {
        $this->employee = $employee;
        return $this;
    }

    /**
     * @return string
     */
    public function getTaskWeek(): string
    {
        return $this->taskWeek;
    }

    /**
     * @param string $taskWeek
     */
    public function setTaskWeek(string $taskWeek): void
    {
        $this->taskWeek = $taskWeek;
    }

}
