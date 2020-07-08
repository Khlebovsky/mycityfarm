from django.urls import path
from . import views


urlpatterns = [
    path('', views.ShopView.as_view(), name = 'shop')
]
