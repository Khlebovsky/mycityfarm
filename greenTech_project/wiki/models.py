from django.db import models


class Category(models.Model):
    name = models.CharField(u'Категория обучения', max_length=64)

    class Meta:
        verbose_name = 'Категория обучения'
        verbose_name_plural = 'Категории обучения'

    def __str__(self):
        return self.name


class Section(models.Model):
    name = models.CharField(u'Раздел для статей', max_length=64)
    number = models.IntegerField(u'Номер раздела', blank=False)
    category = models.CharField(u'Категория обучения', max_length=50, blank=False, default="no category")

    class Meta:
        verbose_name = 'Раздел статьи'
        verbose_name_plural = 'Разделы статей'

    def __str__(self):
        return self.name
    

class Article(models.Model):
    number = models.IntegerField(u'Номер статьи', blank=False)
    title = models.CharField(u'Название', max_length=250)
    body = models.TextField(u'Содержание')
    section = models.CharField(u'Раздел статьи', max_length=50, blank=False, default="no section")

    class Meta:
        verbose_name = 'Статья'
        verbose_name_plural = 'Статьи'

    def __str__(self):
        return self.title

