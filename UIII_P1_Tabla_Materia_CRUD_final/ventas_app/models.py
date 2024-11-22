from django.db import models

# Create your models here.
class Venta(models.Model):
    id_venta=models.CharField(primary_key=True,max_length=6)
    id_cliente=models.CharField(primary_key=True,max_length=6)
    id_empleado=models.CharField(primary_key=True,max_length=6)
    id_producto=models.CharField(primary_key=True,max_length=6)
    fecha_venta=models.PositiveSmallIntegerField()
    cant=models.PositiveSmallIntegerField()
    importe_pagar=models.PositiveSmallIntegerField()


    def __str__(self):
        return self.nombre