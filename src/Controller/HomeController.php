<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use App\Service\Task\TaskService;

class HomeController extends AbstractBaseController
{
    /**
     * @return Response
     */
    public function index(): Response
    {
        $parameters['weeks'] = (new TaskService($this->dependencyContainer))->getAllTasks();
        return $this->render('home/index.html.twig', $parameters);
    }
}