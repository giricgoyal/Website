__author__ = 'giric'

# imports
from django.contrib.auth.models import User
from app.models import UserAccount, UserAccountInfo
from rest_framework import serializers


# serializer classes

# User Serializer
class UserSerializer(serializers.HyperlinkedModelSerializer):
	class Meta:
		model = User
		fields = ('url', 'username', 'email', 'groups', 'password')

# User Account Serializer
class UserAccountSerializer(serializers.HyperlinkedModelSerializer):
	api_url = serializers.SerializerMethodField('get_api_url')

	class Meta:
		model = UserAccount
		fields = ('url', 'userid', 'username', 'password')

	
# User Account Info Serializer
class UserAccountInfoSerializer(serializers.HyperlinkedModelSerializer):
	api_url = serializers.SerializerMethodField('get_api_url')

	class Meta:
		model = UserAccountInfo
		fields = ('url', 'userid', 'firstname', 'lastname', 'datetimejoined')

	



