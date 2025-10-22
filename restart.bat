@echo off
REM ========================================
REM  RESTART YOUR DEVELOPMENT ENVIRONMENT
REM ========================================
REM Useful when things get weird
REM ========================================

echo.
echo ========================================
echo   RESTARTING EVERYTHING
echo ========================================
echo.

call stop.bat
echo.
echo Waiting 3 seconds...
timeout /t 3 /nobreak >nul
echo.
call start.bat
