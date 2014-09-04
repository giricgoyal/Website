#!/bin/bash

cd server
source env/bin/activate
cd serverproject
python manage.py runserver

