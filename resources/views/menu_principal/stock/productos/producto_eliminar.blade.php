<!--al cambiar de direcctorio el raiz cambia-->
@extends('menu_principal/menu_stock')


@section('contenido')
<h1>Eliminar producto</h1>  
    <form action="{{ route('delete_producto')}}" method="POST">       
    @csrf
    <div class="form-row">        
        <div class="form-group col-md-4">
            <label for="inputState">Seleccione producto a eliminar</label>
            <select name="producto" id="inputState" class="form-control" required >
            <option value="" selected>Elegir...</option>
                @foreach ($productos as $item)
                    <option>{{$item->nombre}}</option>
                @endforeach 
            </select>
        </div>    
    </div>
    <button type="submit" class="btn btn-primary">Eliminar</button>
    </form>
@endsection