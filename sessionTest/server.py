import os

project = 'serverproject'
app = 'app'

def checkDir(dir):
	if (os.path.isdir(dir)):
		return True
	return False
	
def checkFile(file):
	if (os.path.exists(file)):
		return True
	return False
		

def setup():
	if (checkDir("server")):
		print "server"
	
def runserver():
	print "running server\n"
	
setup()
runserver()
