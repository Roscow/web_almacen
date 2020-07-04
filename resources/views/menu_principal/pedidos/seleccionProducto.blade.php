<!--al cambiar de direcctorio el raiz cambia-->
@extends('menu_principal/pedidos/pedidos_agregar')


@section('SeleccionProducto')
<form action="{{route('seleccionProducto')}}" method="POST">  
@csrf
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputState">Seleccionar Producto </label>
            <input type="hidden"  name="razon_social"  value="{{$nombreEmpresa}}">
            
            <select id="productos" name="NombreProducto"  class="form-control" required >
            <option value="" selected>Elegir....</option>
                @foreach ($productos as $item)
                    <option><p> {{$item->nombre}}</p></option>                   
                @endforeach
            </select>
        </div>  
<?php ?>
         <div class="form-group col-md-4">
            <label for="inputAddress">Cantidad</label>
            <input type="number" name="cantidad" class="form-control" id="inputAddress" placeholder="0" required >
            <input type="hidden"  name="valorArray"  value='<?php echo serialize($listado) ?>'>

            
        </div>                    
    </div>
    <button type="submit" class="btn btn-primary">Agregar</button> 
</form>
<!--seccion donde se muestra el listado de productos agregados-->
<h5>Listado de productos en pedido actual</h5>
    <table class="table">
        <thead>
        </thead>
            <th scope="col">Producto</th>
            <th scope="col">Cantidad</th>
        <tbody>
        @foreach ($listado as $index=>$item)
            <tr>
                <td>{{$index}}</td>
                <td>{{$item}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

<form action="{{route('creacionPedido')}}" method="POST">  
@csrf
    <input type="hidden"  name="valorArray2"  value='<?php echo serialize($listado) ?>'>
    <input type="hidden"  name="nombreEmpresa"  value='{{$nombreEmpresa}}'>
    <button type="submit" class="btn btn-primary">Confirmar</button> 
</form>



       

@endsection


