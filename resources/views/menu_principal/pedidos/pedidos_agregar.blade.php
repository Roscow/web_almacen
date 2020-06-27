<!--al cambiar de direcctorio el raiz cambia-->
@extends('menu_principal/menu_pedidos')


@section('contenido')
   <h1>Nuevo pedido</h1>   
<form action="{{route('seleccionProducto')}}" method="POST">  
@csrf
    <div class="form-row">
        <div class="form-group col-md-8">
            <label for="inputState">Seleccione proveedor </label>
            <select id="razon_social" name="razon_social"  class="form-control">
            <option selected>Elegir....</option>
                @foreach ($proveedores as $item)
                    <option><p> {{$item->razon_social}}</p></option>                   
                @endforeach
            </select>
        </div>                      
    </div>
    <button type="submit" class="btn btn-primary">Seleccionar</button> 
</form>
@yield('SeleccionProducto')



@endsection


