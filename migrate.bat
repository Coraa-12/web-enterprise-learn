@echo off
REM ============================================================
REM   MIGRATE DATABASE - Run Laravel Migrations
REM ============================================================
REM   This script runs your database migrations to create
REM   or update database tables.
REM
REM   Double-click this to update your database schema!
REM ============================================================

echo.
echo ========================================
echo   Laravel Database Migration
echo ========================================
echo.

REM Check if Docker is running
docker info >nul 2>&1
if errorlevel 1 (
    echo [ERROR] Docker is not running!
    echo.
    echo Please start Docker Desktop first:
    echo 1. Look for the Docker icon in your Windows taskbar
    echo 2. If you don't see it, search for "Docker Desktop" in Windows Start menu
    echo 3. Wait until it says "Docker Desktop is running"
    echo 4. Then run this script again
    echo.
    pause
    exit /b 1
)

echo Running database migrations...
echo.
docker compose exec php php artisan migrate
echo.

if errorlevel 0 (
    echo [SUCCESS] Database migrations completed!
    echo.
    echo Your database tables are now up to date.
    echo You can manage them at: http://localhost:8081
) else (
    echo [ERROR] Migration failed!
    echo.
    echo Common fixes:
    echo 1. Make sure your containers are running: start.bat
    echo 2. Check if MySQL is ready: open-database.bat
    echo 3. Look at TROUBLESHOOTING.md for more help
)

echo.
pause
