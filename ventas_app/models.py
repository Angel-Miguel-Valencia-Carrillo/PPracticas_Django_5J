from django.db import models

# Create your models here.
class Venta(models.Model):
    id_venta=models.CharField(primary_key=True,max_length=6)
    id_cliente=models.PositiveIntegerField()
    id_empleado=models.PositiveIntegerField()
    id_producto=models.PositiveIntegerField()
    fecha_venta=models.DateField((""), auto_now=False, auto_now_add=False)
    cant=models.IntegerField()
    importe_pagar=models.DecimalField(max_digits=10, decimal_places=2)


    def __str__(self):
        return self.nombre