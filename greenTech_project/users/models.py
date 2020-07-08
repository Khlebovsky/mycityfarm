from django.db import models
from django.contrib.auth.models import AbstractUser


class CustomUser(AbstractUser):
    first_name = models.CharField(u'Имя', max_length=30, blank=False)
    last_name = models.CharField(u'Фамилия', max_length=30, blank=False)
    email = models.EmailField(blank=False)