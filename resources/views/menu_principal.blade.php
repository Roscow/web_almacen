@extends('base')


@section('seccion')
<div class="container">
<header>         
        <div class="card">
            <div class="card-header">
                <a class="navbar-brand" href="#">
                <img src="https://cdn.icon-icons.com/icons2/943/PNG/128/shoppaymentorderbuy-29_icon-icons.com_73875.png" width="30" height="30" class="d-inline-block align-top" alt="">
                AlMACEN LOS YUYITOS - SISTEMA DE CONTROL Y GESTION
               </a>          
            </div>
        </div>
     </header>
<div>

<!-- datos de usuario conectado-->

        <div class="card">
            <div class="card-header">
                <a class="navbar-brand" href="#">               
                _USUARIO_
               </a>      
               <a class="navbar-brand" href="#">               
                cerrar sesión
               </a> 
               <a class="navbar-brand" href="#">               
                preferencias
               </a>     
        </div>        




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
        <footer>              
            <div class="card">
                <div class="card-header">
                    2020 - Portafolio de titulo -Duoc UC - Desarrollado con Laravel
                </div>            
            </div>       
        </footer>

        
@endsection
    
