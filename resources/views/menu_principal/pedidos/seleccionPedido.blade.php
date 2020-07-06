<!--al cambiar de direcctorio el raiz cambia-->
@extends('menu_principal/pedidos/pedidos_recepcionar')


@section('seleccionPedido')
@if (!isset($actualizar2))
<form action="{{route('recepcionPedido')}}" method="POST">

@csrf
    <div class="form-row">
        <div class="form-group col-md-8">
            <label for="inputState">Seleccione pedido por id</label>
            <select id="idpedido" name="idpedido"  class="form-control" required >
            <option value="" selected>Elegir....</option>
                @foreach ($pedidos as $item)
                    <option><p> {{$item->id_pedido}}</p></option>
                @endforeach
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Seleccionar</button>
</form>
@endif
@yield('recepcionar')

@endsection

