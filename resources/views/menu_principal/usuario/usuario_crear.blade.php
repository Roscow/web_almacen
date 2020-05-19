<!--al cambiar de direcctorio el raiz cambia-->
@extends('menu_principal/menu_usuario')


@section('contenido')
   <h1>Crear usuario</h1>   
<form action="{{route('insert_usuario')}}" method="POST">
@csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">Rut</label>
            <input type="text" name="rut" class="form-control" id="inputAddress" placeholder="17250874-k">
        </div>

        <div class="form-group col-md-6">
            <label for="inputEmail4">Correo</label>
            <input type="email" name="correo" class="form-control" id="inputEmail4" placeholder="ejemplo@correo.cl">
        </div>           
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">Primer Nombre</label>
            <input type="text" name="nombre1"  class="form-control" id="inputAddress" placeholder="Andres">
        </div> 

        <div class="form-group col-md-6">
            <label for="inputAddress">Segundo Nombre</label>
            <input type="text" name="nombre2" class="form-control" id="inputAddress" placeholder="Andres">
        </div>    
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">Primer Apellido</label>
            <input type="text" name="apellido1" class="form-control" id="inputAddress" placeholder="Barria">
        </div> 

        <div class="form-group col-md-6">
            <label for="inputAddress">Segundo Apellido</label>
            <input type="text" name="apellido2" class="form-control" id="inputAddress" placeholder="Zuñiga">
        </div>    
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">Numero</label>
            <input type="text" name="telefono" class="form-control" id="inputAddress" placeholder="+56994009300">
        </div> 

        <div class="form-group col-md-6">
            <label for="inputAddress">Fecha de nacimiento</label>
            <input type="date" name="fecha_nacimiento" class="form-control" id="inputAddress" placeholder="02/12/1988">
        </div>         
    </div>

    <div class="form-row">    
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
                Usuario Administrador
            </label>
        </div>  
    </div>
    <button type="submit" class="btn btn-primary">Crear</button>
</form>

@endsection


