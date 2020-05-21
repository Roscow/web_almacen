@extends('menu_principal/usuario/usuario_editar')


@section('edicion_usuario')
<p>Datos usuario</p>
    <form action="{{route('actualizar_usuario')}}" method="POST">
    {{csrf_field() }}

    <div class="form-row">
        <input type="hidden" id="id_user" name="id_user" value="{{$usuario[0]->id_user}}">

        <div class="form-group col-md-6">
            <label for="inputEmail4">Correo</label>
            <input type="email" class="form-control" id="correo" name="correo" value="{{$usuario[0]->correo}}" placeholder="ejemplo@correo.cl">
        </div>   

        <div class="form-group col-md-6">
            <label for="inputAddress">Fecha de nacimiento</label>
            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{$year}}-{{$month}}-{{$day}}">
        </div>          
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">Primer Nombre</label>
            <input type="text" class="form-control" id="nombre1" name="nombre1" value="{{$usuario[0]->nombre1}}" placeholder="Juan">
        </div> 

        <div class="form-group col-md-6">
            <label for="inputAddress">Segundo Nombre</label>
            <input type="text" class="form-control" id="nombre2" name="nombre2" value="{{$usuario[0]->nombre2}}" placeholder="Andres">
        </div>    
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">Primer Apellido</label>
            <input type="text" class="form-control" id="apellido1" name="apellido1" value="{{$usuario[0]->apellido1}}" placeholder="Valdes">
        </div> 

        <div class="form-group col-md-6">
            <label for="inputAddress">Segundo Apellido</label>
            <input type="text" class="form-control" id="apellido2" name="apellido2" value="{{$usuario[0]->apellido2}}" placeholder="Barria">
        </div>    
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">Numero</label>
            <input type="text" class="form-control" id="numero" name="numero" value="{{$usuario[0]->telefono}}" placeholder="1231231">
        </div>    

         
    </div>

    <div class="form-row">    
        <div class="form-check">
            @if($usuario[0]->id_tipo_user === 1 )
                <input class="form-check-input" type="checkbox" id="id_tipo_user" name="id_tipo_user" checked>
            @else
                <input class="form-check-input" type="checkbox" id="id_tipo_user" name="id_tipo_user">
            @endif   
            <label class="form-check-label" for="gridCheck">
                Usuario Administrador
            </label>
        </div>  
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection
