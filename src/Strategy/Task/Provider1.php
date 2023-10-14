<?php

namespace App\Strategy\Task;

use App\Strategy\AbstractStrategy;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Provider1 extends AbstractStrategy implements TaskStrategyInterface
{
    /**
     * @return array
     * @throws GuzzleException
     */
    public function getTasks(): array
    {
        $client = new Client();
        $response = $client->request($this->provider->getMethod(), $this->provider->getCredentials()['url']);
        return json_decode($response->getBody()->getContents(), true);
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
            $handledTasks[] = array(
                "task_name" => $task['id'],
                "estimated_duration" => $task['sure'],
                "employee_estimated_duration" => $task['zorluk'] * $task['sure'],
            );
        }
        return $handledTasks;
    }
}