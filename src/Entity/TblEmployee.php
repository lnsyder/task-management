<?php

namespace App\Entity;

/**
 * TblEmployee
 */
class TblEmployee
{
    public const DEVELOPER = 1;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private int $employeeId;


    /**
     * @var int
     */
    private int $kindId;

    /**
     * @var string
     */
    private string $name;

    /**
     * @var int
     */
    private int $level;

    /**
     * @return int
     */
    public function getEmployeeId(): int
    {
        return $this->employeeId;
    }

    /**
     * @param int $employeeId
     */
    public function setEmployeeId(int $employeeId): void
    {
        $this->employeeId = $employeeId;
    }

    /**
     * @return int
     */
    public function getKindId(): int
    {
        return $this->kindId;
    }

    /**
     * @param int $kindId
     */
    public function setKindId(int $kindId): void
    {
        $this->kindId = $kindId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @param int $level
     */
    public function setLevel(int $level): void
    {
        $this->level = $level;
    }
}
