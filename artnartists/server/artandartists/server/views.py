from django.shortcuts import render

# Create your views here.

from django.contrib.auth.models import User, Group
from server.models import UserAccount, ArtistAccount
from rest_framework import viewsets
from server.serializers import UserSerializer, UserAccountSerializer, ArtistAccountSerializer

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

class ArtistAccountViewSet(viewsets.ModelViewSet):
	queryset = ArtistAccount.objects.all()
	serializer_class = ArtistAccountSerializer



