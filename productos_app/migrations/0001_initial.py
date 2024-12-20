# Generated by Django 5.1 on 2024-12-04 14:19

from django.db import migrations, models


class Migration(migrations.Migration):

    initial = True

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='Productos',
            fields=[
                ('id_producto', models.CharField(max_length=6, primary_key=True, serialize=False)),
                ('nombre', models.CharField(max_length=100)),
                ('tipo', models.CharField(max_length=100)),
                ('precio', models.PositiveSmallIntegerField()),
                ('descripcion', models.CharField(max_length=100)),
                ('cantidad', models.PositiveSmallIntegerField()),
            ],
        ),
    ]
