# Generated by Django 5.1 on 2024-12-04 14:19

from django.db import migrations, models


class Migration(migrations.Migration):

    initial = True

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='Cliente',
            fields=[
                ('id_cliente', models.CharField(max_length=6, primary_key=True, serialize=False)),
                ('nombre', models.CharField(max_length=100)),
                ('fecha_nac', models.PositiveSmallIntegerField()),
                ('direccion', models.CharField(max_length=100)),
                ('telefono', models.PositiveSmallIntegerField()),
                ('correo', models.CharField(max_length=100)),
            ],
        ),
    ]
