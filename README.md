# Modern PHP Docker Boilerplate

A clean, stable, and professional Docker setup for modern PHP applications, designed for a smooth developer workflow and easy collaboration. Prepared for frameworks like Laravel or Symfony.

## Features

- **Containerized Environment**: Consistent setup for every developer.
- **Services**:
  - PHP 8.3-FPM (Alpine)
  - Nginx
  - PostgreSQL 16
- **Professional Workflow**:
  - `Makefile` for simple, memorable command shortcuts.
  - Composer for dependency management.
- **Code Quality Suite**:
  - **Testing**: Automated tests with Pest.
  - **Static Analysis**: Bug detection with PHPStan.
  - **Code Formatting**: Consistent style with PHP-CS-Fixer (PSR-12).

## Prerequisites

- Docker Engine or Docker Desktop
- `make` (On Windows, use WSL2 Ubuntu)
- Git

## Quick Start

1.  **Clone the repository:**
    ```bash
    git clone <your-repo-url>
    cd php-boilerplate
    ```

2.  **Build and launch the environment:**
    ```bash
    make up
    ```
    This will build the Docker images and start the containers in the background. Your application will be available at [http://localhost:8080](http://localhost:8080).

## Usage

This boilerplate uses a `Makefile` to simplify all common commands.

### Environment Lifecycle

-   **Start the environment:**
    ```bash
    make up
    ```
-   **Stop the environment:**
    ```bash
    make down
    ```
-   **Restart the environment:**
    ```bash
    make restart
    ```
-   **Destroy everything (containers AND database volumes):**
    ```bash
    make clean
    ```

### Development Tools

-   **Get a shell inside the PHP container:**
    ```bash
    make shell
    ```
-   **Run any Composer command:**
    ```bash
    make composer ARGS="<your-composer-command>"
    # Example:
    make composer ARGS="require laravel/framework"
    ```

### Code Quality

-   **Run the test suite:**
    ```bash
    make test
    ```
-   **Run static analysis:**
    ```bash
    make analyse
    ```
-   **Automatically format the codebase:**
    ```bash
    make format
    ```