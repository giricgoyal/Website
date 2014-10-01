# imports
from django.shortcuts import render
from django.contrib.auth.models import User
from app.models import UserAccount, AdminAccount
from rest_framework import viewsets, filters
from app.serializers import UserSerializer, UserAccountSerializer, AdminAccountSerializer

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
	filter_fields = ('userid', 'email', 'name', 'friends', 'datetimejoined') # specify filter fields

# user account view set
class AdminAccountViewSet(viewsets.ModelViewSet):
	queryset = AdminAccount.objects.all()
	serializer_class = AdminAccountSerializer
	# apply filters
	filter_backends = (filters.DjangoFilterBackend,) # filter to be applied on backend as well
	filter_fields = ('userid', 'username', 'password') # specify filter fields