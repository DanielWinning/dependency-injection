<?php

namespace Luma\DependencyInjectionComponentTests;

use Luma\DependencyInjectionComponent\DependencyContainer;
use Luma\DependencyInjectionComponent\DependencyManager;
use Luma\DependencyInjectionComponent\Exception\NotFoundException;
use PHPUnit\Framework\TestCase;

class DependencyManagerTest extends TestCase
{
    /**
     * @return void
     */
    public function testItCreatesAnInstanceOfDependencyManager(): void
    {
        $container = new DependencyContainer();
        $manager = new DependencyManager($container);

        $this->assertInstanceOf(DependencyManager::class, $manager);
    }

    /**
     * @return void
     *
     * @throws NotFoundException
     */
    public function testItThrowsNoErrorLoadingFromYaml(): void
    {
        $container = new DependencyContainer();
        $manager = new DependencyManager($container);

        $this->expectNotToPerformAssertions();

        $manager->loadDependenciesFromFile($this->getTestServiceConfigPath());
    }

    /**
     * @return void
     *
     * @throws NotFoundException
     */
    public function testItReturnsExpectedDependency(): void
    {
        $container = new DependencyContainer();
        $manager = new DependencyManager($container);

        $manager->loadDependenciesFromFile($this->getTestServiceConfigPath());
        $arithmeticError = $container->get('arithmetic_error');

        $this->assertInstanceOf(\ArithmeticError::class, $arithmeticError);
        $this->assertEquals('Always the same error message', $arithmeticError->getMessage());
    }

    /**
     * @return string
     */
    private function getTestServiceConfigPath(): string
    {
        return sprintf('%s/%s', dirname(__FILE__, 3), 'services.yaml');
    }
}