@echo off
REM ========================================
REM  STOP YOUR DEVELOPMENT ENVIRONMENT
REM ========================================
REM This is like clicking "Stop All" in XAMPP
REM ========================================

echo.
echo ========================================
echo   STOPPING YOUR DEVELOPMENT ENVIRONMENT
echo ========================================
echo.

docker compose down --remove-orphans

if errorlevel 1 (
    echo.
    echo [ERROR] Could not stop containers!
    echo This usually means Docker is not running.
    echo.
    pause
    exit /b 1
)

echo.
echo ========================================
echo   SUCCESS! Everything has been stopped
echo ========================================
echo.
echo Your files and database are safe.
echo Run start.bat when you want to work again.
echo.
pause
