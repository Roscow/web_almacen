@extends('menu_principal/menu_cliente')


@section('contenido')
   <h1>editar cliente</h1>   
  
<form >
  <div>
    <div class="form-row">        
        <div class="form-group col-md-4">
            <label for="inputState">Seleccione cliente a editar</label>
            <select id="inputState" class="form-control">
                <option selected>Elegir...</option>
                @foreach ($clientes as $item)
                    <option><p> {{$item->nombre1}} {{$item->nombre2}}   {{$item->apellido1}}  {{$item->apellido2}}</p></option>                   
                @endforeach
            </select>
        </div>            
    </div>
    <a class="btn btn-primary" href="{{route('edicion_cliente')}}">Seleccionar</a>
    <div class="container">
        @yield('edicion')
    </div>
</form>
@endsection