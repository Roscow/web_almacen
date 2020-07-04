<!--al cambiar de direcctorio el raiz cambia-->
@extends('menu_principal/menu_stock')


@section('contenido')
<h1>Eliminar articulo</h1>   
<form action="{{ route('delete_articulo')}}" method="POST">    
@csrf
    <div class="form-row">                         
        <div class="form-group col-md-4">
            <label for="inputAddress">Codigo</label>
            <input name="id_articulo" type="number" class="form-control" id="inputAddress" placeholder="01231231" required >
        </div> 

    </div>
    <button type="submit" class="btn btn-primary">Eliminar</button>
    </form>
@endsection