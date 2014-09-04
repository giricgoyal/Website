#!/bin/bash

echo "creating virtual env for posix system"
virtualenv ../env
echo "activating virtual env"
source ../env/bin/activate
echo "installing packages..."
pip install django
pip install djangorestframework
pip install django-filter



