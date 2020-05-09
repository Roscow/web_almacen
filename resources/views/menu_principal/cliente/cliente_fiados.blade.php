<!--al cambiar de direcctorio el raiz cambia-->
@extends('menu_principal/menu_cliente')


@section('contenido')
<h1>ver fiados </h1>
<form>
    <div class="form-row">        
        <div class="form-group col-md-4">
            <label for="inputState">Seleccione cliente </label>
            <select id="inputState" class="form-control">
                <option selected>Elegir...</option>
                @foreach ($clientes as $item)
                    <option><p>{{$item->nombre1}} {{$item->nombre2}} {{$item->apellido1}} {{$item->apellido2}}</p></option>                   
                @endforeach
            </select>
        </div>    
    </div>
    <a class="btn btn-primary" href="{{route('detalle_cliente')}}">Seleccionar</a>
</form>
  @yield('detalle')

@endsection
