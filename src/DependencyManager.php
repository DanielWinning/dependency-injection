<?php

namespace DannyXCII\DependencyInjection;

use Symfony\Component\Yaml\Yaml;

class DependencyManager {
    private DependencyContainer $container;

    /**
     * @param DependencyContainer $container
     */
    public function __construct(DependencyContainer $container)
    {
        $this->container = $container;
    }

    /**
     * @param string $filename
     *
     * @return void
     *
     * @throws \Exception
     */
    public function loadDependenciesFromFile(string $filename): void {
        $loadedConfig = Yaml::parseFile($filename);

        if (is_null($loadedConfig)) {
            return;
        }

        if (!is_array($loadedConfig)) {
            throw new \RuntimeException("Invalid dependency configuration in YAML file: $filename");
        }

        if (isset($loadedConfig['services'])) {
            foreach ($loadedConfig['services'] as $alias => $config) {
                if (class_exists($alias)) {
                    if (isset($config['arguments']) && is_array($config['arguments'])) {
                        $arguments = [];
                        foreach ($config['arguments'] as $argument) {
                            if (is_string($argument) && str_starts_with($argument, '@')) {
                                // Argument is a reference to another service
                                $serviceAlias = ltrim($argument, '@');
                                $arguments[] = $this->container->get($serviceAlias);
                            } else {
                                // Argument is a plain value
                                $arguments[] = $argument;
                            }
                        }
                        // Instantiate the class with resolved arguments
                        $this->container->add($alias, new $alias(...$arguments));
                    } else {
                        // Instantiate the class without constructor arguments
                        $this->container->add($alias, new $alias());
                    }
                } else {
                    throw new \RuntimeException("Dependency class not found: $alias");
                }
            }
        }
    }
}