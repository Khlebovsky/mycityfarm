from django.urls import path
from . import views


urlpatterns = [
    path('', views.WikiView.as_view(), name = 'wiki'),
    path('article/<int:pk>/', views.ArticleDetailView.as_view(), name = 'article_detail')
]
