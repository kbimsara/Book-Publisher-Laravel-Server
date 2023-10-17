:: Created by HUNTER
@echo off
goto makeFolder
:makeFolder
echo ############################################
echo            Created by :- HUNTER
echo ############################################
set /p Input=Enter Your New Project Name:
echo ############################################
start cmd
composer create-project laravel/laravel "%Input%"
pause