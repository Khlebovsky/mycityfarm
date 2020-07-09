from django.urls import path
from . import views


urlpatterns = [
    path('', views.WikiCategoryView.as_view(), name = 'wiki'),
    path('category/<int:pk>/', views.WikiView.as_view(), name = 'wiki-category'),
    #path('category/<int:pk>/article/<int:pk>/', views.ArticleDetailView.as_view(), name = 'article_detail')
]
