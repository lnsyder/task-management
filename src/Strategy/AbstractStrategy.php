<?php

namespace App\Strategy;

use App\Entity\LkpProvider;
use Symfony\Component\DependencyInjection\ContainerInterface;

abstract class AbstractStrategy
{
    /**
     * @var LkpProvider
     */
    protected LkpProvider $provider;

    /**
     * @var ContainerInterface
     */
    protected ContainerInterface $container;
    public function __construct(ContainerInterface $container, LkpProvider $provider)
    {
        $this->provider = $provider;
        $this->container = $container;
    }
}