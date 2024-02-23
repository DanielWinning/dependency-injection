# Luma | Dependency Injection Component Change Log

### [1.2.1] - 2024-02-22
- Add tag creation step to main branch pipeline

### [1.2.0] - 2024-02-22
- Added CHANGELOG
- Added automated build pipeline
- `DependencyManager` now throws a RuntimeException if `loadDependenciesFromFile` is called with an invalid filetype (such as JSON).
- Increased test coverage to 100%