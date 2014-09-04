# imports
from django.shortcuts import render
from django.contrib.auth.models import User, Group
from server.models import UserAccount, UserAccountInfo, ArtistAccount, ArtistAccountInfo
from rest_framework import viewsets, filters
from server.serializers import UserSerializer, UserAccountSerializer, UserAccountInfoSerializer, ArtistAccountSerializer, ArtistAccountInfoSerializer

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
	filter_fields = ('username', 'password') # specify filter fields

# artist account view set
class ArtistAccountViewSet(viewsets.ModelViewSet):
	queryset = ArtistAccount.objects.all()
	serializer_class = ArtistAccountSerializer
	# apply filters
	filter_backends = (filters.DjangoFilterBackend,) # filter to be applied on backend as well
	filter_fields = ('username', 'password') # specify filter fields

# user account info view set
class UserAccountInfoViewSet(viewsets.ModelViewSet):
	queryset = UserAccountInfo.objects.all()
	serializer_class = UserAccountInfoSerializer
	# apply filters
	filter_backends = (filters.DjangoFilterBackend,) # filter to be applied on backend as well
	filter_fields = ('firstname', 'lastname', 'username', 'datetimejoined') # specify filter fields

# artist account info view set
class ArtistAccountInfoViewSet(viewsets.ModelViewSet):
	queryset = ArtistAccountInfo.objects.all()
	serializer_class = ArtistAccountInfoSerializer
	# apply filters
	filter_backends = (filters.DjangoFilterBackend,) # filter to be applied on backend as well
	filter_fields = ('firstname', 'lastname', 'username', 'datetimejoined') # specify filter fields


