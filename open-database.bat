@echo off
REM ========================================
REM  OPEN DATABASE MANAGER (phpMyAdmin)
REM ========================================

echo Opening phpMyAdmin...
start http://localhost:8081
echo.
echo If nothing opened, copy this URL to your browser:
echo http://localhost:8081
echo.
echo Login credentials:
echo Username: root
echo Password: secret
echo.
timeout /t 3 >nul
