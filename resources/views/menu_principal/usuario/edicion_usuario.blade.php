@extends('menu_principal/usuario/usuario_editar')


@section('edicion_usuario')
<form>
    <p>Datos usuario</p>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Correo</label>
            <input type="email" class="form-control" id="inputEmail4" placeholder="ejemplo@correo.cl">
        </div>   

        <div class="form-group col-md-6">
            <label for="inputAddress">Fecha de nacimiento</label>
            <input type="date" class="form-control" id="inputAddress">
        </div>          
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">Primer Nombre</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="Juan">
        </div> 

        <div class="form-group col-md-6">
            <label for="inputAddress">Segundo Nombre</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="Juan">
        </div>    
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">Primer Apellido</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="Juan">
        </div> 

        <div class="form-group col-md-6">
            <label for="inputAddress">Segundo Apellido</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="Juan">
        </div>    
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">Numero</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="1231231">
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
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection
