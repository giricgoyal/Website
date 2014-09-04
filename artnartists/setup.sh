#!/bin/bash

PROJECT="serverproject"
APP="app"
echo "... Creating virtual env for posix system ..."
virtualenv env
echo "... Activating virtual env ..."
source env/bin/activate
echo "... Installing packages ..."
pip install django
pip install djangorestframework
pip install django-filter
if [ ! -d "$PROJECT" ]; then
	django-admin.py startproject $PROJECT
	echo "... $PROJECT project created ..."
fi
cd $PROJECT
if [ ! -d "$APP" ]; then
	python manage.py startapp $APP
	echo "... $APP App started ..."
fi
if [ ! -f "__init__.py" ]; then
	cp $APP/__init__.py __init__.py
fi
echo "... done ..."