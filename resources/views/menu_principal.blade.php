@extends('base')


@section('seccion')

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">MENU PRINCIPAL</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">                    
      <a class="nav-item nav-link" href="{{ route('menu_cliente') }}">Cliente</a>
      <a class="nav-item nav-link" href="{{ route('menu_usuario') }}" >Usuario</a>               
      <a class="nav-item nav-link" href="{{ route('menu_proveedor') }}">Proveedor</a>
      <a class="nav-item nav-link" href="{{ route('menu_ventas') }}">Venta</a>
      <a class="nav-item nav-link" href="{{ route('menu_stock') }}">Stock</a>
      <a class="nav-item nav-link" href="{{ route('menu_pedidos') }}">Pedidos</a>
      <a class="nav-item nav-link" href="{{ route('nuevo_reportes') }}">Reportes</a>                
    </div>
  </div>
</nav>

   
        <div class="container">
            @yield('seccion2')    
        </div>

@endsection



@section('cabecera')


@endsection