<!--al cambiar de direcctorio el raiz cambia-->
@extends('menu_principal/menu_proveedor')


@section('contenido')
<h1>Editar proveedor</h1>   

<form action="{{route('edicion_proveedor')}}" method="POST">
@csrf    
    <div class="form-row">        
        <div class="form-group col-md-4">
            <label for="inputState">Seleccione proveedor a editar</label>
            <select id="razon_social" name="razon_social" class="form-control">
            <option selected>Elegir...</option>
                @foreach ($proveedores as $item)
                    <option><p> {{$item->razon_social}} </p></option>                  
                @endforeach
            </select>
        </div>    
    </div> 
    <button type="submit" class="btn btn-primary">Seleccionar</button>
</form>

<div class="container">
        @yield('edicion_proveedor')
</div>
@endsection


