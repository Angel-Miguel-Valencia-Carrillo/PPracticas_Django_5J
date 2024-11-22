from django.urls import path
from ventas_app import views
urlpatterns = [
    path("",views.inicio_vista, name="inicio_vista"),
    path("registrarVenta/",views.registrarVenta,name="registrarVenta"),
    path("seleccionarVenta/<id_venta>",views.seleccionarVenta,name="seleccionarVenta"),
    path("editarVenta/",views.editarVenta,name="editarVenta"),
    path("borrarVenta/<id_venta>",views.borrarVenta,name="borrarVenta")
]
