@extends('menu_principal')


@section('seccion2')
      <!-- la seccion media de la pagina -->
  <div class="row">
            <!-- el siderbar de los botones  -->
          <div class="col-2">
                <p>MENU PROVEEDOR</p>   
                <div class="btn-group-vertical" role="link" aria-label="Button group with nested dropdown">
                    <a class="btn btn-primary" href="{{ route('proveedor_agregar') }}" role="button">Agregar</a>
                    <a class="btn btn-primary" href="{{ route('proveedor_editar') }}" role="button">Editar</a>
                    <a class="btn btn-primary" href="{{ route('proveedor_eliminar') }}" role="button">Eliminar</a>                    
                    <a class="btn btn-primary" href="{{ route('proveedor_pedidos') }}" role="button">Ver pedidos</a>   
                    <a class="btn btn-primary" href="{{ route('proveedor_agregar_rubro') }}" role="button">Nuevo rubro</a>   
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