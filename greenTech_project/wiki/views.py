from django.views.generic import ListView, DetailView, TemplateView
from .models import Article, Category, Section


class WikiCategoryView(ListView):
    model = Category
    template_name = "wiki_category.html"


class WikiView(ListView):
    model = Section
    template_name = "wiki.html"


class ArticleDetailView(DetailView):
    model = Article
    template_name = "article_detail.html"


