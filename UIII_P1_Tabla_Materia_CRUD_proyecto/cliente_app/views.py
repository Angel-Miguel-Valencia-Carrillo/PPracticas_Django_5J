from django.shortcuts import render,redirect
from .models import Cliente
# Create your views here.

def inicio_vistaClientes(request):
    losclientes=Cliente.objects.all()
    return render(request,"gestionarClientes.html",{"misclientes":losclientes})

def registrarCliente(request):
    id_cliente=request.POST["txtid_cliente"]
    nombre=request.POST["txtnombre"]
    fecha_nac=request.POST["txtid_empleado"]
    direccion=request.POST["txtdireccion"]
    correo=request.POST["txtcorreo"]
    telefono=request.POST["numtelefono"]


    guardarCliente=Cliente.objects.create(
        id_cliente=id_cliente,nombre=nombre,fecha_nac=fecha_nac,direccion=direccion,correo=correo,telefono=telefono
    ) # GUARDA EL REGISTRO

    return redirect("/")

def seleccionarCliente(request,id_cliente):
    cliente=Cliente.objects.get(id_cliente=id_cliente)
    return render(request,"editarcliente.html",{"misclientes":cliente})

def editarCliente(request):
    id_cliente=request.POST["txtid_cliente"]
    nombre=request.POST["txtnombre"]
    fecha_nac=request.POST["txtfecha_nac"]
    direccion=request.POST["txtdireccion"]
    correo=request.POST["txtcorreo"]
    telefono=request.POST["numtelefono"]
    empleado=Cliente.objects.get(id_cliente=id_cliente)
    empleado.nombre=nombre
    empleado.fecha_nac=fecha_nac
    empleado.direccion=direccion
    empleado.telefono=telefono
    empleado.correo=correo
    empleado.save() #guarda registro actualizado
    return redirect("/")

def borrarCliente(request,id_cliente):
    cliente=Cliente.objects.get(id_cliente=id_cliente)
    cliente.delete() #borrar el registro

    return redirect("/")
# Create your views here.
