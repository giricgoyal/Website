# imports
from django.conf.urls import patterns, include, url
from django.contrib import admin
from rest_framework import routers
from app import views

admin.autodiscover()

# router config
router = routers.DefaultRouter()
router.register(r'users',views.UserViewSet)
router.register(r'useraccount',views.UserAccountViewSet)
router.register(r'useraccountinfo',views.UserAccountInfoViewSet)
router.register(r'addresses',views.AddressesViewSet)
router.register(r'customeraccountinfo',views.CustomerAccountInfoViewSet)
router.register(r'artistaccountinfo',views.ArtistAccountInfoViewSet)

# url patterns
urlpatterns = patterns('',
    # Examples:
    # url(r'^$', 'tutorial.views.home', name='home'),
    # url(r'^blog/', include('blog.urls')),

    url(r'^admin/', include(admin.site.urls)),
	url(r'^', include(router.urls)),
	url(r'^api-auth/', include('rest_framework.urls', namespace='rest_framework')),
)