:: Created by HUNTER
@echo off
goto makeFolder
:makeFolder
echo ############################################
echo            Created by :- HUNTER
echo ############################################
set /p Input=Enter Your New Project Name:
echo ############################################
npx create-react-app "%Input%"
cd "%Input%"
code .
pause