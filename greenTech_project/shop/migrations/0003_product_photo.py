# Generated by Django 3.0.8 on 2020-07-07 07:33

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('shop', '0002_auto_20200707_1151'),
    ]

    operations = [
        migrations.AddField(
            model_name='product',
            name='photo',
            field=models.ImageField(default='no image', upload_to='image/'),
            preserve_default=False,
        ),
    ]
