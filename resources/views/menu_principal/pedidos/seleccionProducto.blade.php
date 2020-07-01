<!--al cambiar de direcctorio el raiz cambia-->
@extends('menu_principal/pedidos/pedidos_agregar')


@section('SeleccionProducto')
<form action="{{route('seleccionProducto')}}" method="POST">  
@csrf
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputState">Seleccionar Producto </label>
            <input type="hidden"  name="razon_social"  value="{{$nombreEmpresa}}">
            
            <select id="productos" name="NombreProducto"  class="form-control">
            <option selected>Elegir....</option>
                @foreach ($productos as $item)
                    <option><p> {{$item->nombre}}</p></option>                   
                @endforeach
            </select>
        </div>  
<?php ?>
         <div class="form-group col-md-4">
            <label for="inputAddress">Cantidad</label>
            <input type="number" name="cantidad" class="form-control" id="inputAddress" placeholder="0">
            <input type="hidden"  name="valorArray"  value='<?php echo serialize($listado) ?>'>

            
        </div>                    
    </div>
    <button type="submit" class="btn btn-primary">Agregar</button> 
</form>
<!--seccion donde se muestra el listado de productos agregados-->
<h5>Listado de productos en pedido actual</h5>
        @foreach ($listado as $item)
           <p> {{$item}}</p>                 
        @endforeach

@endsection


