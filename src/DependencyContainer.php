<?php

namespace DannyXCII\DependencyInjection;

use DannyXCII\DependencyInjection\Exception\NotFoundException;
use Psr\Container\ContainerInterface;

class DependencyContainer implements ContainerInterface
{
    private array $container = [];

    /**
     * @param string $key
     * @param mixed $value
     *
     * @return void
     */
    public function add(string $key, mixed $value): void
    {
        $this->container[$key] = $value;
    }

    /**
     * @param $id
     *
     * @return mixed
     *
     * @throws NotFoundException
     */
    public function get($id): mixed
    {
        if (!$this->has($id)) {
            throw new NotFoundException("Dependency not found $id");
        }

        return $this->container[$id];
    }

    /**
     * @param string $id
     *
     * @return bool
     */
    public function has(string $id): bool
    {
        return isset($this->container[$id]);
    }
}