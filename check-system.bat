@echo off
REM ========================================
REM  SYSTEM CHECKER
REM ========================================
REM Run this FIRST to make sure everything is installed correctly
REM ========================================

echo.
echo ========================================
echo   CHECKING YOUR SYSTEM
echo ========================================
echo.
echo This will check if you have everything installed...
echo.

set ERROR_FOUND=0

REM Check if Docker is installed
echo [1/3] Checking if Docker is installed...
docker --version >nul 2>&1
if errorlevel 1 (
    echo [X] FAIL - Docker is NOT installed
    echo.
    echo You need to install Docker Desktop first.
    echo See SETUP-FIRST.md for instructions.
    echo.
    set ERROR_FOUND=1
) else (
    for /f "tokens=*" %%i in ('docker --version') do set DOCKER_VERSION=%%i
    echo [OK] PASS - !DOCKER_VERSION!
)

echo.

REM Check if Docker is running
echo [2/3] Checking if Docker is running...
docker info >nul 2>&1
if errorlevel 1 (
    echo [X] FAIL - Docker is installed but NOT running
    echo.
    echo Please start Docker Desktop:
    echo 1. Find the Docker icon in your taskbar
    echo 2. Click it and select "Open Dashboard"
    echo 3. Wait until it says "Docker Desktop is running"
    echo 4. Then run this check-system.bat again
    echo.
    set ERROR_FOUND=1
) else (
    echo [OK] PASS - Docker is running
)

echo.

REM Check if ports are available
echo [3/3] Checking if required ports are free...
netstat -ano | findstr ":8080" >nul 2>&1
if errorlevel 1 (
    echo [OK] PASS - Port 8080 is available
) else (
    echo [X] FAIL - Port 8080 is already in use
    echo.
    echo Something else is using port 8080.
    echo Common culprits: Skype, Discord, XAMPP, Laragon
    echo.
    echo Close those apps and try again.
    echo.
    set ERROR_FOUND=1
)

echo.
echo ========================================

if %ERROR_FOUND%==0 (
    echo   ALL CHECKS PASSED!
    echo ========================================
    echo.
    echo You're ready to go! Run start.bat to begin.
    echo.
) else (
    echo   SOME CHECKS FAILED
    echo ========================================
    echo.
    echo Please fix the issues above and run this again.
    echo Need help? See SETUP-FIRST.md or TROUBLESHOOTING.md
    echo.
)

pause
