@echo off
cd /d "%~dp0"
echo.
echo  Visio dev server
echo  http://localhost:3000/ro
echo.
echo  IMPORTANT: foloseste router.php pentru URL-uri /ro/proiecte/...
echo.
php -S localhost:3000 router.php
