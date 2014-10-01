from django.db import models

# user account model
class UserAccount(models.Model):
	userid = models.CharField(max_length=257, blank=True, default='')
	username = models.CharField(max_length=257, blank=True, default='')
	password = models.CharField(max_length=257, blank=True, default='')
	accounttype = models.CharField(max_length=257, blank=True, default='')
	
	def save(self, *args, **kwargs):
		super(UserAccount, self).save(*args, **kwargs)

	def __unicode__(self):
		return self.userid

# user accountinfo model
class UserAccountInfo(models.Model):
	userid = models.CharField(max_length=257, blank=True, default='')
	firstname = models.CharField(max_length=257, blank=True, default='')
	middlename = models.CharField(max_length=257, blank=True, default='')
	lastname = models.CharField(max_length=257, blank=True, default='')
	gender = models.CharField(max_length=257, blank=True, default='')
	email = models.CharField(max_length=257, blank=True, default='')
	phonenumber = models.CharField(max_length=257, blank=True, default='')
	datetimejoined = models.DateTimeField(auto_now_add=True)

	def save(self, *args, **kwargs):
		super(UserAccountInfo, self).save(*args, **kwargs)

	def __unicode__(self):
		return self.userid

class Addresses(models.Model):
	addressid = models.CharField(max_length=257, blank=True, default='')
	userid = models.CharField(max_length=257, blank=True, default='')
	addresstype = models.CharField(max_length=257, blank=True, default='')
	addressline1 = models.CharField(max_length=257, blank=True, default='')
	addressline2 = models.CharField(max_length=257, blank=True, default='')
	country = models.CharField(max_length=257, blank=True, default='')
	state = models.CharField(max_length=257, blank=True, default='')
	city = models.CharField(max_length=257, blank=True, default='')
	zipcode = models.CharField(max_length=257, blank=True, default='')

	def save(self, *args, **kwargs):
		super(Addresses, self).save(*args, **kwargs)

	def __unicode__(self):
		return self.addressid


# use accountinfo model
class CustomerAccountInfo(models.Model):
	userid = models.CharField(max_length=257, blank=True, default='')
	firstname = models.CharField(max_length=257, blank=True, default='')
	
	def save(self, *args, **kwargs):
		super(CustomerAccountInfo, self).save(*args, **kwargs)

	def __unicode__(self):
		return self.userid


# use accountinfo model
class ArtistAccountInfo(models.Model):
	userid = models.CharField(max_length=257, blank=True, default='')
	firstname = models.CharField(max_length=257, blank=True, default='')
	
	def save(self, *args, **kwargs):
		super(ArtistAccountInfo, self).save(*args, **kwargs)

	def __unicode__(self):
		return self.userid