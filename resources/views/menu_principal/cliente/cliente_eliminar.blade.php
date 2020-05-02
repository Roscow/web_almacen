<!--al cambiar de direcctorio el raiz cambia-->
@extends('menu_principal/menu_cliente')


@section('contenido')
<h1>eliminar cliente</h1>   
    <form>    
    <div class="form-row">        
        <div class="form-group col-md-4">
            <label for="inputState">Seleccione cliente a eliminar</label>
            <select id="inputState" class="form-control">
                <option selected>Choose...</option>
                <option>...</option>
            </select>
        </div>    
    </div>
    <button type="submit" class="btn btn-primary">Eliminar</button>
    </form>
@endsection