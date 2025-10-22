# Copilot Instructions for web-enterprise-learn

## Project Mission

This is a **beginner-proof Docker-based PHP development environment** designed to replace XAMPP/Laragon for students with zero Docker/Git knowledge. Every design decision prioritizes simplicity and Windows compatibility over technical sophistication.

## Architecture Overview

**4-Container Stack:**

- `php` (PHP 8.3-FPM Alpine) - Custom built from `Dockerfile`, runs application code
- `nginx` (1.27-alpine) - Web server, forwards PHP requests to php:9000, serves from `/var/www/html/public`
- `mysql` (8.0) - Database with persistent `mysql-data` volume
- `phpmyadmin` (latest) - GUI database manager at port 8081

**Key Architectural Decisions:**

- MySQL over PostgreSQL: Students know MySQL from class, lowering cognitive load
- phpMyAdmin included: Matches XAMPP's visual database management
- Alpine base images: Smaller, faster downloads for slow student internet
- Port 8080 (not 80): Avoids conflicts with Skype/Discord common in student environments

## Critical Developer Workflows

**Target Users:** Repository maintainer (you) vs. end-users (students who never touch Git/terminal)

**Maintainer Workflow (Git-based):**

```bash
# Always work on dev branch
git checkout dev
# After testing, merge to main
git checkout main && git merge dev && git push origin main
# Update student template
git checkout student-template && git merge main && git push origin student-template
```

**Student Workflow (Zero-Git):**

```bash
# They only use these .bat files:
start.bat          # Runs: docker compose up -d --build
stop.bat           # Runs: docker compose down --remove-orphans
restart.bat        # Runs: stop.bat then start.bat
check-system.bat   # Validates Docker running + ports available
```

## Project-Specific Conventions

**Documentation Philosophy:** Assume ZERO technical knowledge. Every `.md` file uses:

- Conversational tone ("you", "your", emojis)
- Step-by-step with "click here, then here" precision
- Tables for comparisons (students love visual data)
- AI prompts users can copy-paste to ChatGPT/Claude for help
- Real-world scenarios ("What if Windows updates overnight?")

**File Naming Patterns:**

- `*.bat` files: User-facing, double-click scripts with verbose error messages
- `*-GUIDE.md`, `*-FIRST.md`: Documentation for specific audiences
- `GIT-*.md`: Maintainer-only documentation (students told to ignore)

**Code Style:**

- `.bat` files: Windows CMD syntax, extensive error checking, user-friendly messages
- PHP: PSR-4 autoloading (`App\` namespace → `src/`), PSR-12 formatting via php-cs-fixer
- Docker: Inline comments explaining "why" for educational purposes

## Key Integration Points

**Service Communication:**

- Nginx → PHP: FastCGI on `php:9000` (service name resolves via `app-net` network)
- PHP → MySQL: Connection via env vars `DB_HOST=mysql`, `DB_PORT=3306`
- All services use shared `app-net` Docker network for inter-container DNS

**External Access:**

- `:8080` → Nginx → Your PHP application
- `:8081` → phpMyAdmin (auto-configured to MySQL service)
- `:3306` → MySQL (exposed for external tools like MySQL Workbench)

**Volume Mounts:**

- `./ → /var/www/html`: Live code sync (edit files, instant refresh)
- `mysql-data:/var/lib/mysql`: Persistent database (survives `docker compose down`)
- `./docker/nginx/default.conf → /etc/nginx/conf.d/default.conf`: Custom Nginx routing

## Testing & Quality Tools

**Test Execution:**

```bash
# Via Makefile (requires make/WSL)
make test          # Runs Pest test suite
make analyse       # PHPStan static analysis
make format        # PHP-CS-Fixer (PSR-12)

# Via Docker directly (Windows-friendly)
docker compose run --rm php ./vendor/bin/pest
docker compose run --rm php ./vendor/bin/phpstan analyse
docker compose run --rm php ./vendor/bin/php-cs-fixer fix --allow-risky=yes
```

**No CI/CD:** Intentionally absent - students would find it confusing. Manual testing sufficient for educational use.

## When Modifying This Project

**DO:**

- Test changes on fresh `student-template` branch clone (simulate student experience)
- Update corresponding `.md` documentation (students read docs obsessively)
- Keep `.bat` files Windows-native (no WSL/bash dependencies)
- Add verbose error messages to scripts (students need hand-holding)
- Use tables and visual formatting in docs (cognitive load reduction)

**DON'T:**

- Add complexity without updating `TROUBLESHOOTING.md` (students will break things)
- Change ports without updating ALL docs (hardcoded in 10+ places)
- Remove phpMyAdmin (students need visual DB management)
- Assume Git knowledge in student-facing docs (they don't have it)
- Use technical jargon in error messages (write for 18-year-olds)

## Common Pitfalls

**Port Conflicts:** Skype/Discord use 8080. `check-system.bat` validates ports before start.

**Windows PATH Issues:** Why `.bat` files exist - students don't have `make` or understand PATH.

**Database Persistence:** `mysql-data` volume persists. Use `reset-database.bat` (with warnings!) to wipe.

**The `nul` File:** Windows quirk when redirecting to NUL. Add to `.gitignore`, never commit it.

## Essential File References

- `docker-compose.yml`: Service orchestration, the single source of truth for architecture
- `start.bat`: Most important script, includes Docker status checks and user-friendly errors
- `SETUP-FIRST.md`: 500+ line guide assuming zero Docker knowledge, includes AI prompts
- `TROUBLESHOOTING.md`: 50+ solved issues with step-by-step fixes
- `GIT-WORKFLOW.md`: Maintainer-only, explains protected branch strategy
- `public/status.php`: Visual dashboard showing service health (green/red indicators like XAMPP)

## Development Environment Setup

```bash
# For maintainers developing this boilerplate:
git clone https://github.com/Coraa-12/web-enterprise-learn.git
cd web-enterprise-learn
git checkout dev                    # Work on dev, not main
./start.bat                          # Or 'make up' if you have make
# Open http://localhost:8080/status.php to verify all services green
```

**Debugging Container Issues:**

```bash
docker compose logs php              # PHP-FPM logs
docker compose logs nginx            # Nginx access/error logs
docker compose exec php bash         # Get shell inside PHP container
docker compose ps                    # See all running containers
```
