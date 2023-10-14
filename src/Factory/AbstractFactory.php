<?php


namespace App\Factory;

use ReflectionClass;

abstract class AbstractFactory
{
    /**
     * @var array
     */
    protected array $functions = array();

    /**
     * @param $classKey
     * @param $dependencies
     * @return object
     * @throws \ReflectionException
     */
    public function callClass($classKey, $dependencies): object
    {
        if (isset($this->functions[$classKey])) {
            $class = new ReflectionClass($this->functions[$classKey]);
            $class->newInstanceWithoutConstructor();
            return $class->newInstanceArgs($dependencies);
        }
        return $this;
    }
}