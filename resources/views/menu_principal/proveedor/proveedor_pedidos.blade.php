<!--al cambiar de direcctorio el raiz cambia-->
@extends('menu_principal/menu_proveedor')

@section('contenido')
<h1>Pedidos </h1>
<form action="{{route('detalle_proveedor_pedidos')}}" method="POST">
@csrf
    <div class="form-row">        
        <div class="form-group col-md-4">
            <label for="inputState">Seleccione proveedor </label>
            <select id="razon_social" name="razon_social"  class="form-control" required >
            <option value="" selected>Elegir....</option>
                @foreach ($proveedores as $item)
                    <option><p> {{$item->razon_social}}</p></option>                   
                @endforeach
            </select>
        </div>    
    </div>
    <button type="submit" class="btn btn-primary">Seleccionar</button>    </form>
<div class="container">
    @yield('detalle_proveedor_pedidos')
</div>

@endsection
