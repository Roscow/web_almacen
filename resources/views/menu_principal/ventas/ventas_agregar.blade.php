<!--al cambiar de direcctorio el raiz cambia-->
@extends('menu_principal/menu_ventas')


@section('contenido')
@if(!isset($imprimir))
<h1>Nueva venta</h1>
<form action="{{route('ventas_agregar_producto')}}" method="POST">
{{ csrf_field() }}
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputAddress">Código Articulo </label>
            <input id="codigo" name="codigo" type="number" class="form-control" id="inputAddress" placeholder=" " required>
        </div>

        <div class="form-group col-md-4">
            <label for="inputAddress">Cantidad </label>
            <input id="cantidad" name="cantidad" type="number" class="form-control" id="inputAddress" placeholder="0" min="1" max="20"  required>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Agregar</button>
</form>
@else
<h1>Venta Confirmada</h1>
@endif
<h6>* Listado de productos</h6>
<div id="printJS-form">
    <div class="list-group-item pr-div">
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="inputAddress">Código Articulo </label>
            </div>

            <div class="form-group col-md-2">
                <label for="inputAddress">Nombre </label>
            </div>

            <div class="form-group col-md-2">
                <label for="inputAddress">Descripción </label>
            </div>

            <div class="form-group col-md-1">
                <label for="inputAddress">Cantidad </label>
            </div>
            <div class="form-group col-md-2">
                <label for="inputAddress">Precio </label>
            </div>
            @if(!isset($imprimir))
            <div class="form-group col-md-2">
                <label for="inputAddress">Acción </label>
            </div>
            @endif
        </div>
    </div>
    <div class="list-group-item pr-div">
        @if(count(session('ocarrito')->items) > 0)
            @foreach ( session('ocarrito')->items as $items)
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputAddress">{{$items->id_articulo}}</label>
                    </div>

                    <div class="form-group col-md-2">
                        <label for="inputAddress">{{$items->nombre}}</label>
                    </div>

                    <div class="form-group col-md-2">
                        <label for="inputAddress">{{$items->descripcion}}</label>
                    </div>

                    <div class="form-group col-md-1">
                        <label for="inputAddress">{{$items->cantidad}}</label>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputAddress">{{$items->precio_venta}}</label>
                    </div>
                    @if(!isset($imprimir))
                    <div class="form-group col-md-2">
                          <label for="inputAddress"><a href="{{ url('ventas_agregar_quitar/'.$items->id_articulo.'/') }}" class="btn btn-info btn-xs" role="button">Quitar</a></label>
                    </div>
                    @endif
                </div>
            @endforeach
        @endif

    </div>
    <div class="list-group-item pr-div">
        <div class="form-row">
        @if(!isset($imprimir))
            <div class="form-group col-md-2">
                <label for="inputAddress"></label>
            </div>
        @endif

            <div class="form-group col-md-3">
                <label for="inputAddress"></label>
            </div>

            <div class="form-group col-md-3">
                <label for="inputAddress"></label>
            </div>

            <div class="form-group col-md-2">
                <label for="inputAddress">Total :</label>
            </div>
            <div class="form-group col-md-2">
                <label for="inputAddress">{{session('ocarrito')->total}}</label>
            </div>
        </div>
    </div>
</div>
@if(!isset($imprimir))
    <form action="{{route('ventas_agregar_confirmar')}}" method="POST">
    {{ csrf_field() }}
    <div class="form-row">

        <div class="form-group col-md-6">
                <div class="form-check col-md-4">

                    @if(strcmp(session('type'), 'Administrador') == 0 )
                        <input class="form-check-input" type="checkbox" id="gridCheck" name="gridCheck" >
                    @else
                        <input class="form-check-input" type="checkbox" id="gridCheck" name="gridCheck" disabled >
                    @endif
                    <label class="form-check-label" for="gridCheck">
                        Fiado
                    </label>

                </div>
        </div>

        <div class="form-group col-md-6">
            <label for="inputState">Seleccione cliente</label>
            <select id="idcliente" name="idcliente" class="form-control">
            <option value="" selected>Elegir...</option>
                @foreach ($clientes as $item)
                    <option value="{{$item->rut}}"><p> {{$item->nombre1}} {{$item->nombre2}}   {{$item->apellido1}}  {{$item->apellido2}}</p></option>
                @endforeach
            </select>
        </div>
    </div>

    @if(session('ocarrito')->total > 0)
        <button type="submit" class="btn btn-primary">Confirmar venta</button>
     @endif

  </form>
@else

    <button type="button" class="btn btn-primary" onclick="printJS({ printable: 'printJS-form', type: 'html', header: 'Almacen Web - Boleta de Venta', style: '.pr-div { border: 0.2px solid #c3c3c3; padding-top:20px; padding-left:50px; }' })" style="margin:20px 0px 20px 0px" >
        Imprimir Boleta
     </button>

 @endif

@endsection


