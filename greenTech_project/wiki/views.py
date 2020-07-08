from django.views.generic import ListView, DetailView
from .models import Article


class WikiView(ListView):
    model = Article
    template_name = "wiki.html"


class ArticleDetailView(DetailView):
    model = Article
    template_name = "article_detail.html"


