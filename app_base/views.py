from django.shortcuts import render

# create your views here
def inicio(request):
    return render(request, 'index.html')
