__author__ = 'giric'

# imports
from django.contrib.auth.models import User
from server.models import UserAccount, UserAccountInfo, ArtistAccount, ArtistAccountInfo
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
		fields = ('url', 'username', 'password')

# Artist Account Serializer
class ArtistAccountSerializer(serializers.HyperlinkedModelSerializer):
	api_url = serializers.SerializerMethodField('get_api_url')

	class Meta:
		model = ArtistAccount
		fields = ('url', 'username', 'password')

	
# User Account Info Serializer
class UserAccountInfoSerializer(serializers.HyperlinkedModelSerializer):
	api_url = serializers.SerializerMethodField('get_api_url')

	class Meta:
		model = UserAccountInfo
		fields = ('url', 'firstname', 'lastname', 'username', 'datetimejoined')

	
# Artist Account Info Serializer
class ArtistAccountInfoSerializer(serializers.HyperlinkedModelSerializer):
	api_url = serializers.SerializerMethodField('get_api_url')

	class Meta:
		model = ArtistAccountInfo
		fields = ('url', 'firstname', 'lastname', 'username', 'datetimejoined')

	



