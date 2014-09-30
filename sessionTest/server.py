import os
import sys
import platform
import shutil

project = 'serverproject'
app = 'app'
server = 'server'
envNt = 'envWin'
envPosix = 'env'
env = ''
envActivate = ''
packages = [
			'pip install django',
			'pip install djangorestframework',
			'pip install django-filter'
			]

def debugLog(val):
	print "Logger : " + val

def debugError(val, e):
	print "Error : " + val + str(e)

def getEnv():
	global env, envActivate
	return env, envActivate

def system():
	global env, envActivate
	try:
		debugLog("System Info")
		debugLog("OS: " + os.name + " " + str(platform.system()) + " " + str(platform.release()) + " " + str(platform.version()) + "\n")
		if (os.name == "nt"):
			env = server + '/' + envNt
			envActivate = env + '/Scripts/activate_this.py'
		elif os.name == "posix":
			env = server + '/' + envPosix
			envActivate = env + '/bin/activate_this.py'
	except Exception as e:
		debugError("System Exception : ", e)

def checkDir(dir):
	try:
		if (os.path.isdir(dir)):
			return True
		return False
	except Exception as e:
		debugError("Check Dir Exception : ", e)

def checkFile(file):
	try:
		if (os.path.exists(file)):
			return True
		return False
	except Exception as e:
		debugError("Check File Exception : ", e);


def setup():
	global envActivate
	try :
		if (checkDir(server)):
			debugLog(server + " dir already present")
		else:
			os.makedirs(server)
			debugLog(server + " dir created")

		if (checkDir(env)):
			pass
		else:
			debugLog("Setting up " + env)
			os.system('virtualenv ' + env)

		debugLog("Activating virtual env")
		execfile(envActivate, dict(__file__=envActivate))
		debugLog("Virtual env active")
		debugLog("Installing packages")
		for package in packages:
			os.system(package)
		debugLog("Packages installed")

		debugLog("Creating project")
		os.chdir(server)
		if (checkDir(project)):
			debugLog("Project " + project + " already created")
		else:
			os.system('django-admin.py startproject ' + project)
			debugLog("Project " + project + " created")

		debugLog("Creating app")
		os.chdir(project)
		if (checkDir(app)):
			debugLog("App " + app + " already created")
		else:
			os.system('python manage.py startapp ' + app)
			debugLog("App " + app + " started")

		if (checkFile('__init__.py')):
			debugLog("__init__.py already present")
		else:
			shutil.copyfile(app + "/__init__.py","__init__.py")
			debugLog("__init__.py created")

	except Exception as e:
		debugError("Setup Exception : ", e)

def runserver():
	global envActivate
	try :
		os.chdir("../..")
		debugLog("Activating Virtual env")
		execfile(envActivate, dict(__file__=envActivate))
		debugLog("Running server")
		os.chdir(server + '/' + project)
		os.system("python manage.py runserver")

	except Exception as e:
		debugError("Run Server Exception : ", e)


system()
setup()
runserver()
