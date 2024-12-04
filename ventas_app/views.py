from django.shortcuts import render,redirect
from .models import Venta
# Create your views here.

def inicio_Venta(request):
    lasventas=Venta.objects.all()
    return render(request,"gestionarVenta.html",{"misventas":lasventas})

def registrarVenta(request):
    id_venta=request.POST["txtid_venta"]
    id_cliente=request.POST["txtid_cliente"]
    id_empleado=request.POST["txtid_empleado"]
    id_producto=request.POST["txtid_producto"]
    fecha_venta=request.POST["txtfecha_venta"]
    cant=request.POST["numcant"]
    importe_pagar=request.POST["numimporte"]

    guardarVenta=Venta.objects.create(
        id_venta=id_venta,id_cliente=id_cliente,id_empleado=id_empleado,id_producto=id_producto,fecha_venta=fecha_venta,cant=cant,importe_pagar=importe_pagar
    ) # GUARDA EL REGISTRO

    return redirect("/")

def seleccionarVenta(request,id_venta):
    venta=Venta.objects.get(id_venta=id_venta)
    return render(request,"editarventa.html",{"misventas":venta})

def editarVenta(request):
    id_venta=request.POST["txtid_venta"]
    id_cliente=request.POST["txtid_cliente"]
    id_empleado=request.POST["txtid_empleado"]
    id_producto=request.POST["txtid_producto"]
    fecha_venta=request.POST["txtfecha_venta"]
    cant=request.POST["numcant"]
    importe_pagar=request.POST["numimporte"]
    venta=Venta.objects.get(id_venta=id_venta)
    venta.id_cliente=id_cliente
    venta.id_empleado=id_empleado
    venta.id_producto=id_producto
    venta.fecha_venta=fecha_venta
    venta.cant=cant
    venta.importe_pagar=importe_pagar
    venta.save() #guarda registro actualizado
    return redirect("/")

def borrarVenta(request,id_venta):
    venta=Venta.objects.get(id_venta=id_venta)
    venta.delete() #borrar el registro

    return redirect("/")
