@echo off
set PROJECT=serverproject
set APP=app
cd server
echo ... Installing Packages ...
pip install django
pip install djangorestframework
pip install django-filter

IF EXIST %PROJECT% GOTO s3
	django-admin.py startproject %PROJECT%
	echo ... %PROJECT% project created ...

:s3
cd %PROJECT%

IF EXIST %APP% GOTO s4
	python manage.py startapp %APP%
	echo ... %APP% App started ...
	
:s4

IF EXIST __init__.py GOTO s4
	cp %APP%/__init__.py __init__.py

:s4
echo ... done ...
pause
