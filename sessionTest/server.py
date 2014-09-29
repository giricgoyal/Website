import os
import sys

project = 'serverproject'
app = 'app'
server = 'server'

def checkDir(dir):
	try:
		if (os.path.isdir(dir)):
			return True
		return False
	except Exception as e:
		print "Check Dir Exception : ", e
	
def checkFile(file):
	try:
		if (os.path.exists(file)):
			return True
		return False
	except Exception as e:
		print "Check File Exception : ", e
		

def setup():
	try :
		if (checkDir(server)):
			print server, " dir already present"
		else:
			os.makedirs(server)
			print server, " dir created"
		
		if (os.name == "nt"):
			print "a"
		elif os.name == "posix":
			print "b"
		print os.name
		print sys.platform
	except Exception as e:
		print "Setup Exception : ", e
	
def runserver():
	try :
		print "running server\n"
	except Exception as e:
		print "Setup Exception : ", e
	
	
setup()
runserver()
