<?php

namespace App\Repository;

use App\Entity\TblEmployee;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TblEmployee>
 *
 * @method TblEmployee|null find($id, $lockMode = null, $lockVersion = null)
 * @method TblEmployee|null findOneBy(array $criteria, array $orderBy = null)
 * @method TblEmployee[]    findAll()
 * @method TblEmployee[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TblEmployeeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TblEmployee::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(TblEmployee $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(TblEmployee $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }
}
