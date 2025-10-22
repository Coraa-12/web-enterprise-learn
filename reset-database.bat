@echo off
REM ========================================
REM  RESET DATABASE (DANGER ZONE!)
REM ========================================
REM This will DELETE ALL YOUR DATABASE DATA
REM Only use this if you want to start fresh
REM ========================================

echo.
echo ========================================
echo   WARNING: DATABASE RESET
echo ========================================
echo.
echo This will DELETE ALL your database data!
echo This cannot be undone!
echo.
set /p CONFIRM="Are you SURE? Type 'yes' to continue: "

if not "%CONFIRM%"=="yes" (
    echo.
    echo Cancelled. Your database is safe.
    echo.
    pause
    exit /b 0
)

echo.
echo Resetting database...
docker compose down -v
docker compose up -d

echo.
echo ========================================
echo   DATABASE HAS BEEN RESET
echo ========================================
echo.
echo All data has been deleted.
echo The environment is restarting with a fresh database.
echo.
pause
