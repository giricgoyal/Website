__author__ = 'giric'

from django.contrib.auth.models import User
from server.models import UserAccount, ArtistAccount
from rest_framework import serializers

class UserSerializer(serializers.HyperlinkedModelSerializer):
	class Meta:
		model = User
		fields = ('url', 'username', 'email', 'groups', 'password')

class UserAccountSerializer(serializers.HyperlinkedModelSerializer):
	api_url = serializers.SerializerMethodField('get_api_url')

	class Meta:
		model = UserAccount
		fields = ('url', 'firstname', 'lastname', 'username', 'password', 'datetimejoined')

	def get_api_url(self, obj):
		return "#/account/%s" % obj.id


class ArtistAccountSerializer(serializers.HyperlinkedModelSerializer):
	api_url = serializers.SerializerMethodField('get_api_url')

	class Meta:
		model = ArtistAccount
		fields = ('url', 'firstname', 'lastname', 'username', 'password', 'datetimejoined')

	def get_api_url(self, obj):
		return "#/account/%s" % obj.id




