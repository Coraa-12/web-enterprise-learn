@echo off
REM ============================================================
REM   LARAVEL HELPER - Common Commands Quick Access
REM ============================================================
REM   Quick access to frequently used Laravel commands
REM   No need to type long Docker commands!
REM ============================================================

echo.
echo ========================================
echo   Laravel Quick Commands
echo ========================================
echo.
echo What do you want to do?
echo.
echo [1] Run migrations (create/update database tables)
echo [2] Create a new controller
echo [3] Create a new model
echo [4] Create a new migration
echo [5] Clear all caches (fix weird errors)
echo [6] List all routes
echo [7] Open Tinker (Laravel console)
echo [8] View Laravel version
echo [9] Exit
echo.

set /p choice="Enter your choice (1-9): "

if "%choice%"=="1" goto migrate
if "%choice%"=="2" goto controller
if "%choice%"=="3" goto model
if "%choice%"=="4" goto migration
if "%choice%"=="5" goto cache
if "%choice%"=="6" goto routes
if "%choice%"=="7" goto tinker
if "%choice%"=="8" goto version
if "%choice%"=="9" goto end

echo Invalid choice!
pause
exit /b

:migrate
echo.
echo Running migrations...
docker compose exec php php artisan migrate
echo.
pause
exit /b

:controller
echo.
set /p name="Enter controller name (e.g., PostController): "
echo Creating controller: %name%
docker compose exec php php artisan make:controller %name%
echo.
echo [SUCCESS] Controller created at: app/Http/Controllers/%name%.php
echo.
pause
exit /b

:model
echo.
set /p name="Enter model name (e.g., Post): "
echo Creating model: %name%
docker compose exec php php artisan make:model %name%
echo.
echo [SUCCESS] Model created at: app/Models/%name%.php
echo.
pause
exit /b

:migration
echo.
set /p name="Enter migration name (e.g., create_posts_table): "
echo Creating migration: %name%
docker compose exec php php artisan make:migration %name%
echo.
echo [SUCCESS] Migration created in database/migrations/
echo Edit it, then run migrate.bat to apply!
echo.
pause
exit /b

:cache
echo.
echo Clearing all caches...
docker compose exec php php artisan cache:clear
docker compose exec php php artisan config:clear
docker compose exec php php artisan route:clear
docker compose exec php php artisan view:clear
echo.
echo [SUCCESS] All caches cleared!
echo This often fixes weird errors.
echo.
pause
exit /b

:routes
echo.
echo All registered routes:
echo.
docker compose exec php php artisan route:list
echo.
pause
exit /b

:tinker
echo.
echo Opening Tinker (Laravel console)
echo Type "exit" to close it
echo.
docker compose exec php php artisan tinker
pause
exit /b

:version
echo.
docker compose exec php php artisan --version
echo.
pause
exit /b

:end
exit /b
