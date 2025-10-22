# Use bash for all commands
SHELL := /bin/bash

# Define the base command to avoid repetition
DOCKER_COMPOSE ?= docker compose

## --------------------------------------
## Lifecycle Commands
## --------------------------------------

up:
	@echo "Bringing up the development environment..."
	$(DOCKER_COMPOSE) up -d --build

down:
	@echo "Shutting down the development environment..."
	$(DOCKER_COMPOSE) down --remove-orphans

restart: down up

## --------------------------------------
## Tooling Commands
## --------------------------------------

# Run any composer command, e.g., `make composer ARGS="require laravel/sail"`
composer:
	$(DOCKER_COMPOSE) run --rm php composer $(ARGS)

# Run the Pest test suite
test:
	@echo "Running the test suite..."
	$(DOCKER_COMPOSE) run --rm php ./vendor/bin/pest

# Run static analysis
analyse:
	@echo "Running static analysis..."
	$(DOCKER_COMPOSE) run --rm php ./vendor/bin/phpstan analyse

format:
	@echo "Formatting codebase..."
	$(DOCKER_COMPOSE) run --rm php ./vendor/bin/php-cs-fixer fix --allow-risky=yes

# Get a shell inside the PHP container
shell:
	$(DOCKER_COMPOSE) exec php bash

## --------------------------------------
## Housekeeping
## --------------------------------------

# Clean the project by removing all volumes and containers
clean:
	@echo "Destroying all containers and volumes..."
	$(DOCKER_COMPOSE) down -v --remove-orphans

.PHONY: up down restart composer shell clean