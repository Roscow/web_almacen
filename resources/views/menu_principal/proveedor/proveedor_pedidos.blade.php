<!--al cambiar de direcctorio el raiz cambia-->
@extends('menu_principal/menu_proveedor')


@section('contenido')
<h1>Pedidos </h1>
<form>
    <div class="form-row">        
        <div class="form-group col-md-4">
            <label for="inputState">Seleccione proveedor </label>
            <select id="inputState" class="form-control">
            <option selected>Elegir...</option>
                @foreach ($proveedores as $item)
                    <option><p> {{$item->razon_social}}</p></option>                   
                @endforeach
            </select>
        </div>    
    </div>
    <a class="btn btn-primary" href="{{route('detalle_proveedor_pedidos')}}">Seleccionar</a>
</form>
@yield('detalle_proveedor_pedidos')

@endsection
