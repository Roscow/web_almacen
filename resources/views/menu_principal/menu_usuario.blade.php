@extends('menu_principal')


@section('seccion2')
  <!-- la seccion media de la pagina -->
  <div class="row">
            <!-- el espacio de contenido-->
          <div class="col-12 border border-primary">
              @Yield('contenido')
          </div>
      <!--para crear botones laterales-->
</div>
@endsection
