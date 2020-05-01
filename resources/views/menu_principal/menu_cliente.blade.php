@extends('menu_principal')


@section('seccion2')
    <!-- la seccion media de la pagina -->
  <div class="row">
            <!-- el siderbar de los botones  -->
          <div class="col-2">
                <p>MENU CLIENTE</p>    
                <div class="btn-group-vertical" role="link" aria-label="Button group with nested dropdown">
                    <a class="btn btn-primary" href="{{ route('cliente_crear') }}" role="button">Agregar</a>
                    <a class="btn btn-primary" href="{{ route('cliente_editar') }}" role="button">Editar</a>
                    <a class="btn btn-primary" href="{{ route('cliente_eliminar') }}" role="button">Eliminar</a>
                    <a class="btn btn-primary" href="{{ route('cliente_fiados') }}" role="button">Ver Todos</a>
                </div>             
          </div>                          
            <!-- el espacio de contenido-->
          <div class="col-10 border border-primary">
            <p>contenido</p>   
              @yield('contenido')
          </div>
      <!--para crear botones laterales-->
</div>   
@endsection