from django.views.generic import ListView
from .models import Product


class ShopView(ListView):
    model = Product
    template_name = "shop.html"


