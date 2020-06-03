@extends('menu_principal/menu_cliente')


@section('contenido')
   <h1>Editar cliente</h1>   
<form action="{{route('edicion_cliente2')}}" method="POST">
@csrf

    <div class="form-row">        
        <div class="form-group col-md-4">
            <label for="inputState">Seleccione cliente a editar</label>
            <select id="inputState" name="cliente" class="form-control">
                <option selected>Elegir...</option>
                @foreach ($clientes as $item)
                    <option><p> {{$item->nombre1}} {{$item->nombre2}}   {{$item->apellido1}}  {{$item->apellido2}}</p></option>                   
                @endforeach
            </select>
        </div>            
    </div>
    <!--<a class="btn btn-primary" href="{{route('edicion_cliente2')}}">Seleccionar</a>-->
    <button type="submit" class="btn btn-primary">Seleccionar</button>
</form>

<div class="container">
        @yield('edicion')
</div>
@endsection