from django.db import models

# Create your models here.
class Provedor(models.Model):
    id_provedor=models.CharField(primary_key=True,max_length=6)
    nombre=models.CharField(max_length=100)
    tipo_de_producto=models.PositiveSmallIntegerField()
    direccion=models.CharField(max_length=100)
    telefono=models.PositiveSmallIntegerField()
    correo=models.CharField(max_length=100)
    cant_paquetes=models.PositiveSmallIntegerField()


    def __str__(self):
        return self.nombre