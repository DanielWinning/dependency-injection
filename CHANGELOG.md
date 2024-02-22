# Luma | Dependency Injection Component Change Log

### [Unreleased]
[patch]
- Add tag creation step to pipeline for main branch
- Remove tag creation step from pipeline for dev branch

### [1.2.0] - 2024-02-22
- Added CHANGELOG
- Added automated build pipeline
- `DependencyManager` now throws a RuntimeException if `loadDependenciesFromFile` is called with an invalid filetype (such as JSON).
- Increased test coverage to 100%