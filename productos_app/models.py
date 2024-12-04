from django.db import models
# Create your models here.
class Productos(models.Model):
    id_producto=models.CharField(primary_key=True,max_length=6)
    nombre=models.CharField(max_length=100)
    tipo=models.CharField(max_length=100)
    precio=models.DecimalField(max_digits=10, decimal_places=2)
    descripcion=models.CharField(max_length=100)
    cantidad=models.PositiveSmallIntegerField()


    def __str__(self):
        return self.nombre
# Create your models here.
