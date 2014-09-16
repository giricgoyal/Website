from django.db import models

# user account model
class UserAccount(models.Model):
	userid = models.CharField(max_length=257, blank=False, default='')
	username = models.CharField(max_length=257, blank=False, default='')
	password = models.CharField(max_length=257, blank=False, default='')
	accounttype = models.CharField(max_length=257, blank=False, default='')
	
	def save(self, *args, **kwargs):
		super(UserAccount, self).save(*args, **kwargs)

	def __unicode__(self):
		return self.userid

# user accountinfo model
class UserAccountInfo(models.Model):
	userid = models.CharField(max_length=257, blank=False, default='')
	firstname = models.CharField(max_length=257, blank=False, default='')
	lastname = models.CharField(max_length=257, blank=False, default='')
	email = models.CharField(max_length=257, blank=False, default='')
	phonenumber = models.IntegerField(blank=False, default=0)
	datetimejoined = models.DateTimeField(auto_now_add=True)

	def save(self, *args, **kwargs):
		super(UserAccountInfo, self).save(*args, **kwargs)

	def __unicode__(self):
		return self.userid


# use accountinfo model
class CustomerAccountInfo(models.Model):
	userid = models.CharField(max_length=257, blank=False, default='')
	firstname = models.CharField(max_length=257, blank=False, default='')
	lastname = models.CharField(max_length=257, blank=False, default='')
	email = models.CharField(max_length=257, blank=False, default='')
	phonenumber = models.IntegerField(blank=False, default=0)
	datetimejoined = models.DateTimeField(auto_now_add=True)

	def save(self, *args, **kwargs):
		super(CustomerAccountInfo, self).save(*args, **kwargs)

	def __unicode__(self):
		return self.userid


# use accountinfo model
class ArtistAccountInfo(models.Model):
	userid = models.CharField(max_length=257, blank=False, default='')
	firstname = models.CharField(max_length=257, blank=False, default='')
	lastname = models.CharField(max_length=257, blank=False, default='')
	email = models.CharField(max_length=257, blank=False, default='')
	phonenumber = models.IntegerField(blank=False, default=0)
	datetimejoined = models.DateTimeField(auto_now_add=True)

	def save(self, *args, **kwargs):
		super(ArtistAccountInfo, self).save(*args, **kwargs)

	def __unicode__(self):
		return self.userid