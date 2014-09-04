from django.db import models

# user account model
class UserAccount(models.Model):
	username = models.CharField(max_length=24, blank=False, default='')
	password = models.CharField(max_length=24, blank=False, default='')
	
	def save(self, *args, **kwargs):
		super(UserAccount, self).save(*args, **kwargs)

	def __unicode__(self):
		return self.username


# use accountinfo model
class UserAccountInfo(models.Model):
	firstname = models.CharField(max_length=100, blank=False, default='')
	lastname = models.CharField(max_length=100, blank=False, default='')
	username = models.CharField(max_length=24, blank=False, default='')
	datetimejoined = models.DateTimeField(auto_now_add=True)

	def save(self, *args, **kwargs):
		super(UserAccount, self).save(*args, **kwargs)

	def __unicode__(self):
		return self.username