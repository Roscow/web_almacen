<!--al cambiar de direcctorio el raiz cambia-->
@extends('menu_principal/menu_pedidos')


@section('contenido')
<h1>Pedidos </h1>
<form action="{{route('mostrarPedidos')}}" method="POST">  
@csrf
    <div class="form-row">        
      <div class="form-group col-md-4">
            <label for="inputState">Seleccione proveedor </label>
            <select id="razon_social" name="nombreProveedor"  class="form-control">
            <option selected>Elegir....</option>
                @foreach ($proveedores as $item)
                    <option><p> {{$item->razon_social}}</p></option>                   
                @endforeach
            </select>
      </div>        
    </div>
    <button type="submit" class="btn btn-primary">Seleccionar</button> 
</form>
@yield('listado')

@endsection
