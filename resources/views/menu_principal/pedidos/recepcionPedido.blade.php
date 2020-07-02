<!--al cambiar de direcctorio el raiz cambia-->
@extends('menu_principal/pedidos/seleccionPedido')


@section('recepcionar')
<table class="table">
  <thead>
    <tr>
      <th scope="col">Nombre Producto</th>
      <th scope="col">Codigo Producto</th>
      <th scope="col">Cantidad Solicitada</th>
      <th scope="col">Cantidad Recibida</th>
      <th scope="col">Precio Compra</th>
      <th scope="col">Estado linea</th>
   
    </tr>
  </thead>
  <tbody>
    @foreach ($detalle_pedido as $item)
        <tr>
            @foreach ($productos as $prod)
                @if ($item->codigo_producto == $prod->codigo_producto)
                    <td>{{$prod->nombre}}</td>
                    <td>{{$item->codigo_producto}}</td>
                    <td>{{$item->cantidad}} /unds.</td>
                    <td><input type="number" name="correo" class="form-control" id="inputEmail4"></td>
                    <td>${{$prod->precio_compra}}</td>
                    @foreach ($estados as $est)
                        @if ($est->id_estado == $item->id_estado)
                            <td>{{$est->estado}}</td> 
                        @endif                   
                    @endforeach
                        
                @endif
            @endforeach                
        </tr>
    @endforeach
  </tbody>
</table>
<form action="{{route('recepcionPedido')}}" method="POST">  
@csrf
    <div class="form-row">                           
    </div>
    <button type="submit" class="btn btn-primary">Guardar Cambios</button> 
</form>
  

@endsection

