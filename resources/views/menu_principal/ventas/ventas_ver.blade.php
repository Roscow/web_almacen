<!--al cambiar de direcctorio el raiz cambia-->
@extends('menu_principal/menu_ventas')


@section('contenido')
<h1>Ver Ventas </h1>
<form action="{{route('ventas_ver_detalle')}}" method="POST">
    {{ csrf_field() }}
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputAddress">Fecha de creación</label>
            <input type="date" class="form-control" id="fecha" name="fecha" placeholder="Juan" required >
        </div>
    </div>
    <button type="submit" class="btn btn-primary">ir</button>
</form>

<h6>Listado de Ventas</h6>
<div id="printJS-form">
    <div class="list-group-item pr-div">
        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="inputAddress">Id </label>
            </div>

            <div class="form-group col-md-3">
                <label for="inputAddress">Fecha </label>
            </div>

            <div class="form-group col-md-3">
                <label for="inputAddress">Total </label>
            </div>

            <div class="form-group col-md-4">
                <label for="inputAddress">Vendedor </label>
            </div>
        </div>
    </div>
    <div class="list-group-item pr-div">
        @isset($resultado)
          @if(count($resultado) > 0)
            @foreach ($resultado as $items)
            <div class="form-row">
              <div class="form-group col-md-2">
                      <label for="inputAddress">{{$items->id_venta}}</label>
                  </div>

                  <div class="form-group col-md-3">
                      <label for="inputAddress">{{$items->fecha}}</label>
                  </div>

                  <div class="form-group col-md-3">
                      <label for="inputAddress">{{$items->total}}</label>
                  </div>

                  <div class="form-group col-md-4">
                      <label for="inputAddress">{{$items->vendedor}}</label>
                  </div>
            </div>
            @endforeach
          @endif
        @endisset
    </div>
</div>

    <button type="button" class="btn btn-primary" onclick="printJS({ printable: 'printJS-form', type: 'html', header: 'Almacen Web - Boleta de Venta', style: '.pr-div { border: 0.2px solid #c3c3c3; padding-top:20px;  padding-left:50px;}' })" style="margin:20px 0px 20px 0px" >
        Imprimir Boleta
     </button>

    <br>
    <br>
@endsection
