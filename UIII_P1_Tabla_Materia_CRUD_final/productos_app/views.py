from django.shortcuts import render
from .models import Productos
# Create your views here.

def inicio_vista(request):
    losproductos=Productos.objects.all()
    return render(request,"gestionarProducto.html",{"misproductos":losproductos})

def registrarProducto(request):
    id_producto=request.POST["txtid_empleado"]
    nombre=request.POST["txtnombre"]
    tipo=request.POST["txttipo"]
    precio=request.POST["numprecio"]
    descripcion=request.POST["txtdescripcion"]
    cantidad=request.POST["numcantidad"]

    guardarProducto=Productos.objects.create(
        id_producto=id_producto,nombre=nombre,tipo=tipo,precio=precio,descripcion=descripcion,cantidad=cantidad
    ) # GUARDA EL REGISTRO

    return redirect("/")

def seleccionarProducto(request,id_producto):
    producto=Productos.objects.get(id_empleado=id_producto)
    return render(request,"editarproducto.html",{"misproductos":producto})

def editarProducto(request):
    id_producto=request.POST["txtid_empleado"]
    nombre=request.POST["txtnombre"]
    tipo=request.POST["txttipo"]
    precio=request.POST["numprecio"]
    descripcion=request.POST["txtdescripcion"]
    cantidad=request.POST["numcantidad"]
    producto=Productos.objects.get(id_empleado=id_producto)
    producto.nombre=nombre
    producto.tipo=tipo
    producto.precio=precio
    producto.descripcion=descripcion
    producto.cantidad=cantidad
    producto.save() #guarda registro actualizado
    return redirect("/")

def borrarProducto(request,id_empleado):
    producto=Productos.objects.get(id_empleado=id_empleado)
    producto.delete() #borrar el registro

    return redirect("/")

# Create your views here.
