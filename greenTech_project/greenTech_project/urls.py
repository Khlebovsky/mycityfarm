from django.contrib import admin
from django.urls import path, include
from django.conf.urls.static import static
from django.contrib.staticfiles.urls import staticfiles_urlpatterns
from django.conf import settings


urlpatterns = [
    path('', include('main.urls')),
    path('admin/', admin.site.urls),
    path('users/', include('django.contrib.auth.urls')),
    path('shop/', include('shop.urls')),
    path('wiki/', include('wiki.urls'))
] 
 
urlpatterns += staticfiles_urlpatterns()