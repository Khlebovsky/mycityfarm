from django.views.generic import TemplateView


class ShopView(TemplateView):
    template_name = "shop.html"


