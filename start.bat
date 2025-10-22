@echo off
REM ========================================
REM  START YOUR DEVELOPMENT ENVIRONMENT
REM ========================================
REM This is like clicking "Start All" in XAMPP
REM ========================================

echo.
echo ========================================
echo   STARTING YOUR DEVELOPMENT ENVIRONMENT
echo ========================================
echo.
echo This might take 30-60 seconds...
echo Please wait while Docker starts everything.
echo.

REM Check if Docker is running
docker info >nul 2>&1
if errorlevel 1 (
    echo [ERROR] Docker is not running!
    echo.
    echo Please start Docker Desktop first:
    echo 1. Look for the Docker icon in your taskbar
    echo 2. Click it and wait for "Docker Desktop is running"
    echo 3. Then run this script again
    echo.
    pause
    exit /b 1
)

REM Start the containers
docker compose up -d --build

if errorlevel 1 (
    echo.
    echo [ERROR] Something went wrong!
    echo.
    echo Common solutions:
    echo - Make sure ports 8080 and 8081 are not in use
    echo - Close Skype, Discord, or other apps using these ports
    echo - Try running stop.bat first, then start.bat again
    echo.
    pause
    exit /b 1
)

echo.
echo ========================================
echo   SUCCESS! Your environment is running
echo ========================================
echo.
echo You can now access:
echo   - Your Website:     http://localhost:8080
echo   - Database Manager: http://localhost:8081
echo.
echo To stop everything, run: stop.bat
echo.
pause
