<?php

namespace DannyXCII\DependencyInjection;

class DependencyContainer {
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
     * @param string $key
     *
     * @return mixed
     *
     * @throws \Exception
     */
    public function get(string $key): mixed
    {
        if (isset($this->container[$key])) {
            return $this->container[$key];
        }
        throw new \Exception("Dependency not found: $key");
    }
}