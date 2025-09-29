# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is Denis Smetannikov's personal GitHub profile repository that generates his README.md dashboard. It's a PHP-based project that automatically updates the README with project statistics and information from various JBZoo repositories.

## Core Architecture

### Simple Profile Generator
- Single main class: `MarkdownTable` (currently deprecated)
- Uses JBZoo/Markdown library for generating README content
- Composer-based PHP 8.2+ project with minimal dependencies

### Dependencies
- **JBZoo/Toolbox-Dev**: Development tooling and testing framework
- **JBZoo/Markdown**: Markdown generation library
- **JBZoo Codestyle**: Comprehensive QA tooling (inherited via toolbox-dev)

## Common Commands

### Development
```bash
make update          # Install/update all dependencies
```

### Testing
```bash
make test           # Run PHPUnit tests
make codestyle      # Run all code quality checks
```

## Code Standards

### PHP Requirements
- PHP 8.2+ (supports 8.2, 8.3, 8.4)
- Strict types declaration required
- PSR-12 coding standard via JBZoo Codestyle rules

### Project Structure
- `src/` - Main source code (minimal, contains deprecated MarkdownTable class)
- `tests/` - PHPUnit tests extending JBZoo testing framework
- `build/` - Generated reports and coverage data
- GitHub Actions CI runs on PHP 8.2-8.4 with matrix testing

## Testing Framework

Uses JBZoo PHPUnit framework:
- Tests extend `AbstractPackageTest` base class
- Coverage reporting to Coveralls
- Multiple PHP version matrix testing in CI
- Generates HTML coverage reports in `build/coverage_html/`

## CI/CD Pipeline

GitHub Actions workflow runs:
1. **PHPUnit Tests** - Matrix testing across PHP versions with coverage
2. **Linters** - Code quality checks via `make codestyle`
3. **Reports** - Generates comprehensive analysis reports

All jobs run on Ubuntu with PHP versions 8.2, 8.3, and 8.4.
