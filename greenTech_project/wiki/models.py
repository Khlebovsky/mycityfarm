from django.db import models


class Category(models.Model):
    name = models.CharField(u'Категория', max_length=64)
    number = models.IntegerField(u'Номер категории', blank=False)

    class Meta:
        verbose_name = 'Категория'
        verbose_name_plural = 'Категории'

    def __str__(self):
        return self.name
    

class Article(models.Model):
    category = models.CharField(u'Категория', max_length=50, blank=False, default="no category")
    number = models.IntegerField(u'Номер статьи', blank=False)
    title = models.CharField(u'Название', max_length=250)
    body = models.TextField(u'Содержание')

    class Meta:
        verbose_name = 'Статья'
        verbose_name_plural = 'Статьи'

    def __str__(self):
        return self.title

