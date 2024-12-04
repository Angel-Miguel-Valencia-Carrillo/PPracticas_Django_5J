from django.urls import path
from ventas_app import views
urlpatterns = [
    path("inicio_vistaVenta",views.inicio_vistaVenta, name="inicio_vistaVenta"),
    path("registrarVenta/",views.registrarVenta,name="registrarVenta"),
    path("seleccionarVenta/<id_venta>",views.seleccionarVenta,name="seleccionarVenta"),
    path("editarVenta/",views.editarVenta,name="editarVenta"),
    path("borrarVenta/<id_venta>",views.borrarVenta,name="borrarVenta")
]
