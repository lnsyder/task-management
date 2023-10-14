<?php

namespace App\Strategy\Task;

use App\Strategy\AbstractStrategy;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Provider2 extends AbstractStrategy implements TaskStrategyInterface
{
    /**
     * @return array
     * @throws GuzzleException
     */
    public function getTasks(): array
    {
        $client = new Client();
        $response = $client->request($this->provider->getMethod(), $this->provider->getCredentials()['url']);
        return json_decode($response->getBody()->getContents(),true);
    }

    /**
     * @return array
     * @throws GuzzleException
     */
    public function handleTasks(): array
    {
        $tasks = $this->getTasks();
        $handledTasks = array();
        foreach ($tasks as $task) {
            foreach ($task as $key => $value){
                $estimatedDuration = $value['estimated_duration'];
                $employeeEstimatedDuration = $value['level'] * $value['estimated_duration'];
            }
            $handledTasks[] = array(
                "task_name" => $key,
                "estimated_duration" => $estimatedDuration,
                "employee_estimated_duration" => $employeeEstimatedDuration,
            );
        }
        return $handledTasks;
    }
}