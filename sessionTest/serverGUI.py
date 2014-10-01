import os, signal
import sys
import platform
import shutil
from Tkinter import *
import thread, time

class ManageApp(Frame):
	__project = ''
	__app = ''
	__server = ''
	__envNt = ''
	__envPosix = ''
	__pythonEnv = ''
	__env = ''
	__envActivate = ''
	__stopserver = None
	__websiteProject = ''
	__myPath = ''
	__packages = []

	def debugLog(self, val):
		print("Logger : " + val)

	def debugError(self, val, e):
		print("Error : " + val + str(e))

	def __getEnv(self):
		return self.__env, self.__envActivate

	def __getStopServer(self):
		return self.__stopserver


	def __checkDir(self, dir):
		try:
			if (os.path.isdir(dir)):
				return True
			return False
		except Exception as e:
			self.debugError("Check Dir Exception : ", e)


	def __checkFile(self, file):
		try:
			if (os.path.exists(file)):
				return True
			return False
		except Exception as e:
			self.debugError("Check File Exception : ", e);


	def __setupEnv(self):
		try :
			env, envActivate = self.__getEnv()		
			if (self.__checkDir(self.__pythonEnv)):
				pass
			else:
				self.debugLog("Creating pythonEnv dir")
				os.makedirs(self.__pythonEnv)
			
			if (self.__checkDir(env)):
				pass
			else:
				self.debugLog("Setting up " + env)
				os.system('virtualenv ' + env)

			self.debugLog("Activating virtual env")
			execfile(envActivate, dict(__file__=envActivate))
			self.debugLog("Virtual env active")
			self.debugLog("Installing packages")
			for package in self.__packages:
				os.system(package)
			self.debugLog("Packages installed")

		except Exception as e:
			self.debugError("Setup Exception : ", e)

	def __setupEnvSub(self):
		thread.start_new_thread(self.__setupEnv, ())
		
		
	def __setupServer(self):
		try :
			env, envActivate = self.__getEnv()
			if (self.__checkDir(self.__server)):
				self.debugLog(self.__server + " dir already present")
			else:
				os.makedirs(self.__server)
				self.debugLog(self.__server + " dir created")
			
			if (self.__checkDir(env)):
				self.debugLog("Activating virtual env")
				execfile(envActivate, dict(__file__=envActivate))
				self.debugLog("Virtual env active")
			else:
				self.debugLog("Setting up " + env)
				os.system('virtualenv ' + env)

				self.debugLog("Activating virtual env")
				execfile(envActivate, dict(__file__=envActivate))
				self.debugLog("Virtual env active")
				self.debugLog("Installing packages")
				for package in self.__packages:
					os.system(package)
				self.debugLog("Packages installed")
			
			
			self.debugLog("Creating project")
			os.chdir(self.__server)
			if (self.__checkDir(self.__project)):
				self.debugLog("Project " + self.__project + " already created")
			else:
				os.system('django-admin.py startproject ' + self.__project)
				self.debugLog("Project " + self.__project + " created")

			self.debugLog("Creating app")
			os.chdir(self.__project)
			if (self.__checkDir(self.__app)):
				self.debugLog("App " + self.__app + " already created")
			else:
				os.system('python manage.py startapp ' + self.__app)
				self.debugLog("App " + self.__app + " started")

			if (self.__checkFile('__init__.py')):
				self.debugLog("__init__.py already present")
			else:
				shutil.copyfile(self.__app + "/__init__.py","__init__.py")
				self.debugLog("__init__.py created")
			
		except Exception as e:
			self.debugError("Setup Exception : ", e)

	def __setupServerSub(self):
		thread.start_new_thread(self.__setupServer, ())

	def __runserver(self):
		try :
			env, envActivate = self.__getEnv()
			self.debugLog("Activating Virtual env")
			execfile(envActivate, dict(__file__=envActivate))
			self.debugLog("Running server")
			os.chdir(self.__server + '/' + self.__project)
			os.system("python manage.py runserver")
		except Exception as e:
			self.debugError("Run Server Exception : ", e)

	def __runserverSub(self):
		thread.start_new_thread(self.__runserver, ())

	def __stopserverFunc(self):
		try:
			self.debugLog("Stopping server")
			os.kill(0, self.__stopserver)
		except Exception as e:
			self.debugError("Stop server Exception : ", e)

	def __createWidgets(self):
		self.SETUPENV = Button(self)
		self.SETUPENV["text"] = "Setup Virtual Env"
		self.SETUPENV["fg"] = "black"
		self.SETUPENV["command"] = self.__setupEnvSub
		self.SETUPENV.pack({"side": "left"})
		
		self.SETUPSERVER = Button(self)
		self.SETUPSERVER["text"] = "Setup Server"
		self.SETUPSERVER["fg"] = "black"
		self.SETUPSERVER["command"] = self.__setupServerSub
		self.SETUPSERVER.pack({"side": "left"})

		self.RUNSERVER = Button(self)
		self.RUNSERVER["text"] = "Run Server"
		self.RUNSERVER["fg"] = "black"
		self.RUNSERVER["command"] = self.__runserverSub
		self.RUNSERVER.pack({"side": "left"})

		self.STOPSERVER = Button(self)
		self.STOPSERVER["text"] = "Stop Server"
		self.STOPSERVER["fg"] = "black"
		self.STOPSERVER["command"] = self.__stopserverFunc
		self.STOPSERVER.pack({"side": "left"})

		self.QUIT = Button(self)
		self.QUIT["text"] = "Quit"
		self.QUIT["fg"]   = "red"
		self.QUIT["command"] =  self.quit
		self.QUIT.pack({"side": "left"})

	def __init(self):
		try:
			self.__myPath = os.getcwd()
			self.__websiteProject = self.__myPath[(self.__myPath.rfind('\\') if os.name == "nt" else self.__myPath.rfind('/'))+1:]
			self.__project = 'serverproject'
			self.__app = 'app'
			self.__server = self.__myPath + '/../' + self.__websiteProject + 'Server'
			self.__pythonEnv = self.__myPath + '/../../pythonEnv/' + self.__websiteProject 
			self.__envNt = 'envWin'
			self.__envPosix = 'env'
			self.__packages = [
						'pip install django',
						'pip install djangorestframework',
						'pip install django-filter',
						'pip install pycrypto'
					]

			self.debugLog("System Info")
			self.debugLog("OS: " + os.name + " " + str(platform.system()) + " " + str(platform.release()) + " " + str(platform.version()))
			self.debugLog("Project: " + self.__websiteProject)
			self.debugLog("Setting path: " + self.__myPath)
			
			if (os.name == "nt"):
				self.__env = self.__pythonEnv + "/" + self.__envNt
				self.__envActivate = self.__env + '/Scripts/activate_this.py'
				self.__stopserver = signal.CTRL_BREAK_EVENT
			elif os.name == "posix":
				self.__env = self.__pythonEnv + "/" + self.__envPosix
				self.__envActivate = self.__env + '/bin/activate_this.py'
				self.__stopserver = None

		except Exception as e:
			self.debugError("System Exception : ", e)


	def __init__(self, master=None):
		Frame.__init__(self, master)
		self.pack()
		self.__init()
		self.__createWidgets()



root = Tk()
myapp = ManageApp(master=root)
myapp.master.title("Server Manager")
myapp.master.minsize(400, 400)
myapp.mainloop()