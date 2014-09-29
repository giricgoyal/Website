@echo off
cd server
envWin\Scripts\activate
cd serverproject
python manage.py runserver
pause