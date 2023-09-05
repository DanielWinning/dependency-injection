# Dependency Injection Package

[![Latest Stable Version](https://poser.pugx.org/dannyxcii/dependency-injection/v)](//packagist.org/packages/dannyxcii/dependency-injection)
[![Total Downloads](https://poser.pugx.org/dannyxcii/dependency-injection/downloads)](//packagist.org/packages/dannyxcii/dependency-injection)
[![License](https://poser.pugx.org/dannyxcii/dependency-injection/license)](//packagist.org/packages/dannyxcii/dependency-injection)

A PHP package for managing dependencies and dependency injection.

## Installation

You can install this package via [Composer](https://getcomposer.org/):

```bash
composer require dannyxcii/dependency-injection
```

## Usage

### DependencyContainer

The `DependencyContainer` class provides a simple way to manage and retrieve dependencies. You can add and retrieve 
dependencies as follows:

```php
use Dannyxcii\DependencyInjection\DependencyContainer;

// Create a container
$container = new DependencyContainer();

// Add a dependency
$container->add('myDependency', new MyDependency());

// Retrieve a dependency
$dependency = $container->get('myDependency');
```

### DependencyManager

The `DependencyManager` class allows you to load dependencies from a YAML configuration file and register them in a 
`DependencyContainer`. Here's an example of how to use it:

```php
use Dannyxcii\DependencyInjection\DependencyContainer;
use Dannyxcii\DependencyInjection\DependencyManager;

// Create a container
$container = new DependencyContainer();

// Create a manager and load dependencies from a YAML file
$manager = new DependencyManager($container);
$manager->loadDependenciesFromFile('path/to/dependencies.yaml');
```

In your YAML configuration file (`dependencies.yaml`), you can define services and their arguments for injection.

### Example Configuration

Here's an example of a `dependencies.yaml` file that demonstrates how to define services and their arguments for injection:

```yaml
services:
    Namespace\TestClass:
        arguments:
            - 'testing!'
    Namespace\MyCustomService:
        arguments:
            - '@Namespace\TestClass'
```

In this configuration:

- The `dependencies.yaml` file defines services and their dependencies.
- `Namespace\TestClass` is a service with constructor arguments.
- `Namespace\MyCustomService` is another service that depends on `Namespace\TestClass`. It injects the `TestClass` instance as a constructor argument.

## License

This package is open-source software licensed under the [GNU General Public License, version 3.0 (GPL-3.0)](https://opensource.org/licenses/GPL-3.0).