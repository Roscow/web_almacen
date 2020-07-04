<!--al cambiar de direcctorio el raiz cambia-->
@extends('menu_principal/menu_cliente')


@section('contenido')
<h1>Ver fiados </h1>

<form action="{{route('detalle_cliente')}}" method="POST">
@csrf
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputState">Seleccione cliente </label>
            <select name="cliente" id="inputState"  class="form-control" required>
                <option value="" selected>Elegir...</option>
                @foreach ($clientes as $item)
                    <option><p>{{$item->nombre1}} {{$item->nombre2}} {{$item->apellido1}} {{$item->apellido2}}</p></option>
                @endforeach
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Seleccionar</button>
</form>

  <div class="container">
        @yield('detalle')
</div>

@endsection
