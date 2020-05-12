<!--al cambiar de direcctorio el raiz cambia-->
@extends('menu_principal/menu_stock')


@section('contenido')
   <h1>Buscar producto</h1>   
<form>
    <div class="form-row">        
        <div class="form-group col-md-4">
            <label for="inputAddress">Nombre </label>
            <input type="text" class="form-control" id="inputAddress" placeholder="coca-cola">
        </div>  
    </div>

    <a class="btn btn-primary" href="{{route('busqueda_producto')}}">Buscar</a>
</form>
@yield('busqueda')



@endsection

