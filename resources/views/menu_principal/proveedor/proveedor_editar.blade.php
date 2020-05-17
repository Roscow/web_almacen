<!--al cambiar de direcctorio el raiz cambia-->
@extends('menu_principal/menu_proveedor')


@section('contenido')
<h1>Editar proveedor</h1>   
<form>
    <div class="form-row">        
        <div class="form-group col-md-4">
            <label for="inputState">Seleccione proveedor</label>
            <select id="inputState" class="form-control">
            <option selected>Elegir...</option>
                @foreach ($proveedores as $item)
                    <option><p> {{$item->razon_social}}</p></option>                   
                @endforeach
            </select>
        </div>    
    </div> 
    <a class="btn btn-primary" href="{{route('edicion_proveedor')}}">Seleccionar</a>
    @yield('edicion_proveedor')

@endsection


