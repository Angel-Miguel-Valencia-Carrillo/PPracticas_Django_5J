from django.urls import path
from provedores_app import views
urlpatterns = [
    path("inicio_Provedores",views.inicio_Provedores, name="inicio_Provedores"),
    path("registrarProvedor/",views.registrarProvedor,name="registrarProvedor"),
    path("seleccionarProvedor/<id_Provedor>",views.seleccionarProvedor,name="seleccionarProvedor"),
    path("editarProvedor/",views.editarProvedor,name="editarProvedor"),
    path("borrarProvedor/<id_provedor>",views.borrarProvedor,name="borrarProvedor")
]
