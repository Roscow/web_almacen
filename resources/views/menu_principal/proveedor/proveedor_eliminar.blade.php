<!--al cambiar de direcctorio el raiz cambia-->
@extends('menu_principal/menu_proveedor')


@section('contenido')
<h1>Eliminar proveedor</h1>   
    <form action="{{route('proveedor_eliminar2')}}" method="POST"> 
    @csrf
    <div class="form-row">        
        <div class="form-group col-md-4">
            <label for="inputState">Seleccione proveedor</label>
            <select id="inputState" name="proveedor_list"  class="form-control" required>
                <option  value="" selected>Elegir...</option>
                @foreach ($proveedores as $item)
                    <option><p> {{$item->razon_social}}</p></option>                   
                @endforeach
            </select>
        </div>    
    </div>
    <button type="submit" class="btn btn-primary">Eliminar</button>
    </form>
@endsection