__author__ = 'giric'

from django.contrib.auth.models import User
from server.models import UserAccount, UserAccountInfo, ArtistAccount, ArtistAccountInfo
from rest_framework import serializers

class UserSerializer(serializers.HyperlinkedModelSerializer):
	class Meta:
		model = User
		fields = ('url', 'username', 'email', 'groups', 'password')

class UserAccountSerializer(serializers.HyperlinkedModelSerializer):
	api_url = serializers.SerializerMethodField('get_api_url')

	class Meta:
		model = UserAccount
		fields = ('url', 'username', 'password')

	

class ArtistAccountSerializer(serializers.HyperlinkedModelSerializer):
	api_url = serializers.SerializerMethodField('get_api_url')

	class Meta:
		model = ArtistAccount
		fields = ('url', 'username', 'password')

	

class UserAccountInfoSerializer(serializers.HyperlinkedModelSerializer):
	api_url = serializers.SerializerMethodField('get_api_url')

	class Meta:
		model = UserAccountInfo
		fields = ('url', 'firstname', 'lastname', 'username', 'datetimejoined')

	

class ArtistAccountInfoSerializer(serializers.HyperlinkedModelSerializer):
	api_url = serializers.SerializerMethodField('get_api_url')

	class Meta:
		model = ArtistAccountInfo
		fields = ('url', 'firstname', 'lastname', 'username', 'datetimejoined')

	



