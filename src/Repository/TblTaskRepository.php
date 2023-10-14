<?php

namespace App\Repository;

use App\Entity\TblTask;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\Exception;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TblTask>
 *
 * @method TblTask|null find($id, $lockMode = null, $lockVersion = null)
 * @method TblTask|null findOneBy(array $criteria, array $orderBy = null)
 * @method TblTask[]    findAll()
 * @method TblTask[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TblTaskRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TblTask::class);
    }

    /**
     * @param TblTask $entity
     * @param bool $flush
     * @return void
     */
    public function add(TblTask $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @param TblTask $entity
     * @param bool $flush
     * @return void
     */
    public function remove(TblTask $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @return false|array
     * @throws Exception
     */
    public function getTasksGroupByWeeks()
    {
        return $this->_em->getConnection()->fetchAllAssociative("SELECT
                                                                    task_week,
                                                                    jsonb_object_agg(employee_id, employee_tasks) AS tasks
                                                                FROM (
                                                                    SELECT
                                                                        task_week,
                                                                        employee_id,
                                                                        jsonb_agg(jsonb_build_object(
                                                                            'task_name', 'Name: '|| task_name,
                                                                            'employee_estimated_duration', 'Duration: '|| employee_estimated_duration
                                                                        )) AS employee_tasks
                                                                    FROM tbl_task
                                                                    GROUP BY task_week, employee_id
                                                                ) AS subquery
                                                                GROUP BY task_week
                                                                ORDER BY task_week;");
    }
}
