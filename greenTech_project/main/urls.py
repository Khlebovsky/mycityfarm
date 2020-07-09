from django.urls import path
from . import views


urlpatterns = [
    path('', views.HomePageView.as_view(), name = 'home'),
    path('details/', views.DetailsPageView.as_view(), name = 'details'),
    path('cabinet/', views.CabinetView, name = 'cabinet'),
    path('cabinet/register', views.CabineRegistrtView, name = 'register'),
    path('wiki', views.WikiView, name = 'wiki'),
]