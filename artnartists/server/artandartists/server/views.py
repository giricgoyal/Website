from django.shortcuts import render

# Create your views here.

from django.contrib.auth.models import User, Group
from server.models import UserAccount, UserAccountInfo, ArtistAccount, ArtistAccountInfo
from rest_framework import viewsets, filters
from server.serializers import UserSerializer, UserAccountSerializer, UserAccountInfoSerializer, ArtistAccountSerializer, ArtistAccountInfoSerializer

class UserViewSet(viewsets.ModelViewSet):
	queryset = User.objects.all()
	serializer_class = UserSerializer
	'''
	def get_queryset(self):
		"""
		This view should return a list of all the purchases
		for the currently authenticated user.
		"""
		user = self.request.user
		return User.objects.filter(username=user)
	'''

class UserAccountViewSet(viewsets.ModelViewSet):
	queryset = UserAccount.objects.all()
	serializer_class = UserAccountSerializer
	filter_backends = (filters.DjangoFilterBackend,)
	filter_fields = ('username', 'password')

class ArtistAccountViewSet(viewsets.ModelViewSet):
	queryset = ArtistAccount.objects.all()
	serializer_class = ArtistAccountSerializer
	filter_backends = (filters.DjangoFilterBackend,)
	filter_fields = ('username', 'password')

class UserAccountInfoViewSet(viewsets.ModelViewSet):
	queryset = UserAccountInfo.objects.all()
	serializer_class = UserAccountInfoSerializer
	filter_backends = (filters.DjangoFilterBackend,)
	filter_fields = ('firstname', 'lastname', 'username', 'datetimejoined')

class ArtistAccountInfoViewSet(viewsets.ModelViewSet):
	queryset = ArtistAccountInfo.objects.all()
	serializer_class = ArtistAccountInfoSerializer
	filter_backends = (filters.DjangoFilterBackend,)
	filter_fields = ('firstname', 'lastname', 'username', 'datetimejoined')


