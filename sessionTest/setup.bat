@echo off
set PROJECT=serverproject
set APP=app
IF EXIST server GOTO s1
	mkdir server

:s1
cd server

IF EXIST envWin GOTO s2
	echo ... Creating Virtual env for windows ...
	virtualenv envWin

:s2
echo ... Activating virtual env ...
envWin\Scripts\activate
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
deactivte
echo ... done ...


pause
