from django.urls import path
from productos_app import views
urlpatterns = [
    path("",views.inicio_vista, name="inicio_vista"),
    path("registrarProducto/",views.registrarProducto,name="registrarProducto"),
    path("seleccionarProducto/<id_producto>",views.seleccionarProducto,name="seleccionarProducto"),
    path("editarProducto/",views.editarProducto,name="editarPrducto"),
    path("borrarProducto/<id_producto>",views.borrarProductoo,name="borrarProducto")
]
