<?php


use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerInterface;

abstract class AbstractService
{
    /**
     * @var ContainerInterface
     */
    protected ContainerInterface $container;

    /**
     * @var EntityManager
     */
    protected EntityManager $em;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->em = $this->container->get('doctrine')->getManager();
    }

    /**
     * @return ContainerInterface
     */
    public function getContainer(): ContainerInterface
    {
        return $this->container;
    }

    /**
     * @param ContainerInterface $container
     * @return $this
     */
    public function setContainer(ContainerInterface $container): AbstractService
    {
        $this->container = $container;
        return $this;
    }

    /**
     * @return EntityManager
     */
    public function getEm(): EntityManager
    {
        return $this->em;
    }

    /**
     * @param $em
     * @return $this
     */
    public function setEm($em): AbstractService
    {
        $this->em = $em;
        return $this;
    }
}