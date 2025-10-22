@echo off
REM ========================================
REM  OPEN YOUR WEBSITE IN BROWSER
REM ========================================

echo Opening your website...
start http://localhost:8080
echo.
echo If nothing opened, copy this URL to your browser:
echo http://localhost:8080
echo.
timeout /t 3 >nul
