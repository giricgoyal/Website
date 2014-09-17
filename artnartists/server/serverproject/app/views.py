# imports
from django.shortcuts import render
from django.contrib.auth.models import User
from app.models import UserAccount, CustomerAccountInfo, ArtistAccountInfo, UserAccountInfo, Addresses
from rest_framework import viewsets, filters
from app.serializers import UserSerializer, UserAccountSerializer, UserAccountInfoSerializer, CustomerAccountInfoSerializer, ArtistAccountInfoSerializer, AddressesSerializer

# user view set
class UserViewSet(viewsets.ModelViewSet):
	queryset = User.objects.all()
	serializer_class = UserSerializer
	def get_queryset(self):
		# This view should return a list of all the purchases for the currently authenticated user.
		user = self.request.user
		return User.objects.filter(username=user)
	
# user account view set
class UserAccountViewSet(viewsets.ModelViewSet):
	queryset = UserAccount.objects.all()
	serializer_class = UserAccountSerializer
	# apply filters
	filter_backends = (filters.DjangoFilterBackend,) # filter to be applied on backend as well
	filter_fields = ('userid', 'username', 'password', 'accounttype') # specify filter fields

# Customer account info view set
class UserAccountInfoViewSet(viewsets.ModelViewSet):
	queryset = UserAccountInfo.objects.all()
	serializer_class = UserAccountInfoSerializer
	# apply filters
	filter_backends = (filters.DjangoFilterBackend,) # filter to be applied on backend as well
	filter_fields = ('userid', 'firstname', 'middlename', 'lastname', 'gender', 'email', 'phonenumber', 'datetimejoined') # specify filter fields

#Addresses view set
class AddressesViewSet(viewsets.ModelViewSet):
	queryset = Addresses.objects.all()
	serializer_class = AddressesSerializer
	#apply filters
	filter_backends = (filters.DjangoFilterBackend,) #filter to be applied on backend as well
	filter_fields = ('addressid', 'userid', 'addresstype',  'addressline1', 'addressline2', 'country', 'state', 'city', 'zipcode')


# Customer account info view set
class CustomerAccountInfoViewSet(viewsets.ModelViewSet):
	queryset = CustomerAccountInfo.objects.all()
	serializer_class = CustomerAccountInfoSerializer
	# apply filters
	filter_backends = (filters.DjangoFilterBackend,) # filter to be applied on backend as well
	filter_fields = ('userid', 'firstname') # specify filter fields

# artist account info view set
class ArtistAccountInfoViewSet(viewsets.ModelViewSet):
	queryset = ArtistAccountInfo.objects.all()
	serializer_class = ArtistAccountInfoSerializer
	# apply filters
	filter_backends = (filters.DjangoFilterBackend,) # filter to be applied on backend as well
	filter_fields = ('userid', 'firstname') # specify filter fields



