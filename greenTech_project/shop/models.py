from django.db import models


class Product(models.Model):
    category = models.CharField(u'Категория', max_length=50, default="no category")
    title = models.CharField(u'Название', max_length=250)
    descritpion = models.TextField(u'Описание')
    price = models.CharField(u'Стоимость', max_length=50)
    image = models.ImageField(upload_to='image/')

    class Meta:
        verbose_name = 'Товар'
        verbose_name_plural = 'Товары'

    def __str__(self):
        return self.title

