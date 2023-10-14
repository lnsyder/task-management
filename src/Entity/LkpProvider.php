<?php

namespace App\Entity;

/**
 * LkpProvider
 */
class LkpProvider
{
    public const Provider1 = 1;
    public const Provider2 = 2;

    /**
     * @var int
     */
    private int $providerId;

    /**
     * @var int
     */
    private int $kindId;

    /**
     * @var string
     */
    private string $name;


    /**
     * @var string
     */
    private string $method;

    /**
     * @var array
     */
    private array $credentials;

    /**
     * @return int
     */
    public function getProviderId(): int
    {
        return $this->providerId;
    }

    /**
     * @param int $providerId
     */
    public function setProviderId(int $providerId): void
    {
        $this->providerId = $providerId;
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
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @param string $method
     */
    public function setMethod(string $method): void
    {
        $this->method = $method;
    }

    /**
     * @return array
     */
    public function getCredentials(): array
    {
        return $this->credentials;
    }

    /**
     * @param array $credentials
     */
    public function setCredentials(array $credentials): void
    {
        $this->credentials = $credentials;
    }
}
