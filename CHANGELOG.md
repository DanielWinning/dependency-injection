# Luma | Dependency Injection Component Change Log

### [1.2.2] - 2024-03-01
- Minor housekeeping; `package.json` cleanup, `composer.json` cleanup

### [1.2.1] - 2024-02-23
- Update build pipelines

### [1.2.0] - 2024-02-22
- Added CHANGELOG
- Added automated build pipeline
- `DependencyManager` now throws a RuntimeException if `loadDependenciesFromFile` is called with an invalid filetype (such as JSON).
- Increased test coverage to 100%