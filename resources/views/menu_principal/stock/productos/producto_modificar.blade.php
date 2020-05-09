<!--al cambiar de direcctorio el raiz cambia-->
@extends('menu_principal/menu_stock')


@section('contenido')
   <h1>modificar producto</h1>   
<form>
    <div class="form-row">        
        <div class="form-group col-md-4">
            <label for="inputState">Seleccione producto a editar</label>
            <select id="inputState" class="form-control">
            <option selected>Elegir...</option>
                @foreach ($productos as $item)
                    <option>{{$item->nombre}}</option>
                @endforeach 
            </select>
        </div>    
    </div>
    <a class="btn btn-primary" href="{{route('edicion_producto')}}">Seleccionar</a>
</form>
@yield('edicion_producto')

@endsection

