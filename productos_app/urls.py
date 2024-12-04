from django.urls import path
from productos_app import views
urlpatterns = [
    path("inicio_Productos",views.inicio_Productos, name="inicio_Productos"),
    path("registrarProducto/",views.registrarProducto,name="registrarProducto"),
    path("seleccionarProducto/<id_producto>",views.seleccionarProducto,name="seleccionarProducto"),
    path("editarProducto/",views.editarProducto,name="editarPrducto"),
    path("borrarProducto/<id_producto>",views.borrarProducto,name="borrarProducto")
]
