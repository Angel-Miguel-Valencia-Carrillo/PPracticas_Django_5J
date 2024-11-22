from django.urls import path
from empleado_app import views
urlpatterns = [
    path("",views.inicio_vista, name="inicio_vista"),
    path("registrarEmpleado/",views.registrarEmpleado,name="registrarEmpleado"),
    path("seleccionarEmpleado/<codigo>",views.seleccionarEmpleado,name="seleccionarEmpleado"),
    path("editarEmpleado/",views.editarEmpleado,name="editarEmpleado"),
    path("borrarEmpleado/<codigo>",views.borrarEmpleado,name="borrarEmpleado")
]
