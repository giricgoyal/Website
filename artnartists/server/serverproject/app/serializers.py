__author__ = 'giric'

# imports
from django.contrib.auth.models import User
from app.models import UserAccount, CustomerAccountInfo, ArtistAccountInfo, UserAccountInfo, Addresses
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
		fields = ('url', 'userid', 'username', 'password', 'accounttype')

	
# Customer Account Info Serializer
class UserAccountInfoSerializer(serializers.HyperlinkedModelSerializer):
	api_url = serializers.SerializerMethodField('get_api_url')

	class Meta:
		model = UserAccountInfo
		fields = ('url', 'userid', 'firstname', 'middlename', 'lastname', 'gender', 'email', 'phonenumber', 'datetimejoined')

# addresses Serializer
class AddressesSerializer(serializers.HyperlinkedModelSerializer):
	api_url = serializers.SerializerMethodField('get_api_url')

	class Meta:
		model = Addresses
		fields = ('url', 'addressid', 'userid', 'addresstype', 'addressline1', 'addressline2', 'country', 'state', 'city', 'zipcode')

# Customer Account Info Serializer
class CustomerAccountInfoSerializer(serializers.HyperlinkedModelSerializer):
	api_url = serializers.SerializerMethodField('get_api_url')

	class Meta:
		model = CustomerAccountInfo
		fields = ('url', 'userid', 'firstname')

# Artist Account Info Serializer
class ArtistAccountInfoSerializer(serializers.HyperlinkedModelSerializer):
	api_url = serializers.SerializerMethodField('get_api_url')

	class Meta:
		model = ArtistAccountInfo
		fields = ('url', 'userid', 'firstname')

	



