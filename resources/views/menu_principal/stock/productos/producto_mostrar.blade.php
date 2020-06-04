<!--al cambiar de direcctorio el raiz cambia-->
@extends('menu_principal/menu_stock')


@section('contenido')
   <h1>Buscar producto</h1>   
<form action="{{ route('busqueda_producto')}}" method="POST">      
@csrf 
    <div class="form-row">        
        <div class="form-group col-md-4">
            <label for="inputAddress">Nombre </label>
            <input type="text" name="nombre" class="form-control" id="inputAddress" placeholder="coca-cola">
        </div>  
    </div>

    <button type="submit" class="btn btn-primary">Buscar</button>
</form>
@yield('busqueda')



@endsection

