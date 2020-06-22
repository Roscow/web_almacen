@extends('menu_principal')


@section('seccion2')


    <!-- la seccion media de la pagina -->
  <div class="row">
            <!-- el siderbar de los botones  -->
          <div class="col-2">
                <p>MENU VENTAS</p>
                <div class="btn-group-vertical" role="link" aria-label="Button group with nested dropdown">
                    <a class="btn btn-primary" href="{{ route('ventas_agregar') }}" role="button">Nueva venta</a>
                    <a class="btn btn-primary" href="{{ route('ventas_anular') }}" role="button">Anular venta</a>
                    <a class="btn btn-primary" href="{{ route('ventas_ver') }}" role="button">Ver ventas</a>
                </div>
          </div>
            <!-- el espacio de contenido-->
          <div class="col-10 border border-primary">

            @yield('contenido')
          </div>
      <!--para crear botones laterales-->
</div>




@endsection
