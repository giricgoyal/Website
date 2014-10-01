__author__ = 'giric'

# imports
from django.contrib.auth.models import User
from app.models import UserAccount, AdminAccount
from rest_framework import serializers


# serializer classes

# User Serializer
class UserSerializer(serializers.HyperlinkedModelSerializer):
	class Meta:
		model = User
		fields = ('url', 'username', 'email', 'password')

# User Account Serializer
class UserAccountSerializer(serializers.HyperlinkedModelSerializer):
	api_url = serializers.SerializerMethodField('get_api_url')

	class Meta:
		model = UserAccount
		fields = ('url', 'userid', 'email', 'name', 'friends', 'datetimejoined')

# Admin Account Serializer
class AdminAccountSerializer(serializers.HyperlinkedModelSerializer):
	api_url = serializers.SerializerMethodField('get_api_url')

	class Meta:
		model = AdminAccount
		fields = ('url', 'userid', 'username', 'password')