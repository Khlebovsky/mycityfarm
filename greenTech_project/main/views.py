from django.views.generic import TemplateView, RedirectView
from django.shortcuts import render, redirect


class HomePageView(TemplateView):
    template_name = "index.html"


class DetailsPageView(TemplateView):
    template_name = "details.html"


def CabinetView(request):
    return redirect("https://cabinet.mycityfarm.ru/")


def CabineRegistrtView(request):
    return redirect("https://cabinet.mycityfarm.ru/register")