<!--al cambiar de direcctorio el raiz cambia-->
@extends('menu_principal/pedidos/pedidos_agregar')


@section('SeleccionProducto')
<form action="{{route('seleccionProducto')}}" method="POST">  
@csrf
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputState">Seleccionar Producto </label>
            <select id="razon_social" name="razon_social"  class="form-control">
            <option selected>Elegir....</option>
                @foreach ($productos as $item)
                    <option><p> {{$item->nombre}}</p></option>                   
                @endforeach
            </select>
        </div>  

         <div class="form-group col-md-4">
            <label for="inputAddress">Cantidad</label>
            <input type="number" class="form-control" id="inputAddress" placeholder="0">
        </div>                    
    </div>
    <button type="submit" class="btn btn-primary">Agregar</button> 
</form>
@endsection


