<!--al cambiar de direcctorio el raiz cambia-->
@extends('menu_principal/pedidos/seleccionPedido')


@section('recepcionar')
<form action="{{route('recepcionar')}}" method="POST">
@csrf
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
        @foreach ($productos as $prod)
            @if ($item->codigo_producto == $prod->codigo_producto)
                <tr>
                    <td>{{$prod->nombre}}</td>
                    <td>{{$item->codigo_producto}}</td>
                    <td>{{$item->cantidad}} /unds.</td>
                    <td><input type="number" name="{{$prod->codigo_producto}}" class="form-control" id="inputEmail4" required></td>
                    <td>$ {{$prod->precio_compra}}</td>
                    @foreach ($estados as $est)
                        @if ($est->id_estado == $item->id_estado)
                            <td>{{$est->estado}}</td>
                        @endif
                    @endforeach
                </tr>
            @endif
        @endforeach
    @endforeach

    <input type="hidden" name="idPedido" class="form-control" value='{{$item->id_pedido}}'>
  </tbody>
</table>

    <div class="form-row">
    </div>
    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
</form>


@endsection

