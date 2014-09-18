from django.db import models

# user account model
class UserAccount(models.Model):
	userid = models.CharField(max_length=257, blank=True, default='')
	email = models.CharField(max_length=257, blank=True, default='')
	name = models.CharField(max_length=257, blank=True, default='')
	friends = models.CharField(max_length=257, blank=True, default='')
	datetimejoined = models.DateTimeField(auto_now_add=True)

	def save(self, *args, **kwargs):
		super(UserAccount, self).save(*args, **kwargs)

	def __unicode__(self):
		return self.userid
