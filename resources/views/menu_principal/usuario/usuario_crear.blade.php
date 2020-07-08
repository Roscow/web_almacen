<!--al cambiar de direcctorio el raiz cambia-->
@extends('menu_principal/menu_usuario')


@section('contenido')
   <h1>Crear usuario</h1>   
<form action="{{route('insert_usuario')}}" method="POST" onsubmit=" return validaterut(rut)">
@csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">Rut</label>
            <input type="text" name="rut" class="form-control" id="inputAddress" placeholder="17250874-k" onblur="validaterut(this)" required>
        </div>

        <div class="form-group col-md-6">
            <label for="inputEmail4">Correo</label>
            <input type="email" name="correo" class="form-control" id="inputEmail4" placeholder="ejemplo@correo.cl" required>
        </div>           
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">Primer Nombre</label>
            <input type="text" name="nombre1"  class="form-control" id="inputAddress" placeholder="Andres"  
            onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" required>
        </div> 

        <div class="form-group col-md-6">
            <label for="inputAddress">Segundo Nombre</label>
            <input type="text" name="nombre2" class="form-control" id="inputAddress" placeholder="Andres"  
            onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)"required>
        </div>    
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">Primer Apellido</label>
            <input type="text" name="apellido1" class="form-control" id="inputAddress" placeholder="Barria"  
            onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" required>
        </div> 

        <div class="form-group col-md-6">
            <label for="inputAddress">Segundo Apellido</label>
            <input type="text" name="apellido2" class="form-control" id="inputAddress" placeholder="Zuñiga"  
            onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)"required>
        </div>    
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">Número</label>
            <input type="text" name="telefono" class="form-control" id="inputAddress" placeholder="56994009300" maxlength="9" onkeypress="return soloNumeros(event)" onpaste="return false"  required>
        </div> 

        <div class="form-group col-md-6">
            <label for="inputAddress">Fecha de nacimiento</label>
            <input type="date" name="fecha_nacimiento" class="form-control" id="inputAddress" placeholder="02/12/1988" required>
        </div>         
    </div>

    <div class="form-row">    
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="id_tipo_user" name="id_tipo_user">
            <label class="form-check-label" for="gridCheck">
                Usuario Administrador
            </label>
        </div>  
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Crear</button>
</form>

@endsection


