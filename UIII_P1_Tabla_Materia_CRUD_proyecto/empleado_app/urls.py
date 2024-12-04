from django.urls import path
from empleado_app import views
urlpatterns = [
    path("inicio_vistaEmpleados",views.inicio_vistaEmpleados, name="inicio_vistaEmpleados"),
    path("registrarEmpleado/",views.registrarEmpleado,name="registrarEmpleado"),
    path("seleccionarEmpleado/<codigo>",views.seleccionarEmpleado,name="seleccionarEmpleado"),
    path("editarEmpleado/",views.editarEmpleado,name="editarEmpleado"),
    path("borrarEmpleado/<codigo>",views.borrarEmpleado,name="borrarEmpleado")
]
