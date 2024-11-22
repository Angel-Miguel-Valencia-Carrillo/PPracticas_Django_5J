from django.urls import path
from cliente_app import views
urlpatterns = [
    path("",views.inicio_vista, name="inicio_vista"),
    path("registrarCliente/",views.registrarCliente,name="registrarCliente"),
    path("seleccionarCliente/<id_cliente>",views.seleccionarCliente,name="seleccionarCliente"),
    path("editarCliente/",views.editarCliente,name="editarClinte"),
    path("borrarCliente/<id_cliente>",views.borrarCliente,name="borrarCliente")
]
