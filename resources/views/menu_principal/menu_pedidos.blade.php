@extends('menu_principal')


@section('seccion2')
    <!-- la seccion media de la pagina -->
  <div class="row">
            <!-- el siderbar de los botones  -->
          <div class="col-2">
                <p>MENU PEDIDOS</p>   
                <div class="btn-group-vertical" role="link" aria-label="Button group with nested dropdown">
                    <a class="btn btn-primary" href="{{ route('pedidos_agregar') }}" role="button">Nuevo Pedido</a>
                    <a class="btn btn-primary" href="{{ route('pedidos_recepcionar') }}" role="button">Recepcionar Pedido</a>
                    <a class="btn btn-primary" href="{{ route('pedidos_ver') }} role="button">Ver Pedido</a>                    
                </div>             
          </div>                          
            <!-- el espacio de contenido-->
          <div class="col-10 border border-primary">
            <p>contenido</p>   

          </div>
      <!--para crear botones laterales-->
</div>
@endsection