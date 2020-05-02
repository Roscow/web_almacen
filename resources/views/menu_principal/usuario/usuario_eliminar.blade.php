<!--al cambiar de direcctorio el raiz cambia-->
@extends('menu_principal/menu_usuario')


@section('contenido')
<h1>eliminar usuario</h1>   
    <form>    
    <div class="form-row">        
        <div class="form-group col-md-4">
            <label for="inputState">Seleccione usuario a eliminar</label>
            <select id="inputState" class="form-control">
                <option selected>Choose...</option>
                <option>...</option>
            </select>
        </div>    
    </div>
    <button type="submit" class="btn btn-primary">Eliminar</button>
    </form>
@endsection
