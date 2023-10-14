<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ContainerInterface;

class AbstractBaseController extends AbstractController
{
    public ContainerInterface $dependencyContainer;

    public function __construct(ContainerInterface $dependencyContainer){
        $this->dependencyContainer =  $dependencyContainer;
    }
}