# Generated by Django 3.0.8 on 2020-07-07 07:37

from django.db import migrations


class Migration(migrations.Migration):

    dependencies = [
        ('shop', '0003_product_photo'),
    ]

    operations = [
        migrations.RenameField(
            model_name='product',
            old_name='photo',
            new_name='image',
        ),
    ]