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
  <a class="navbar-brand" href="{{ route('menu_principal') }}">MENU PRINCIPAL</a>
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



        <section id="hero-container" class="position-relative text-light">
            <div id="hero-background"></div>
              <div id="hero-content" class="container h-100">
                <div class="row no-gutters h-100 d-flex">
                  <div id="hero-text" class="col-md-6 align-self-center">
                    <h1 class="display-1 font-weight-bold mb-4">Controla tu inventario</h1>
                    <p class="lead mb-5">Comienza a gestionar y administrar tu almacén a través de tu propio sitio web.
                    </p>
                  </div>
                 <div class="col-md-6 img-container align-self-center h-100">
                    <img src="images/logo2.jpg" id="hero-img" class="position-absolute">
                    <img src="images/lines.svg" id="lines" class="spin position-absolute">
                  </div>
                </div>
              </div>
          </section>


        <script>
          window.onload = function () {
            setTimeout(function () {
            document.getElementById('hero-background').style.width = '100%';
            }, 1500);
            setTimeout(function () {
              document.getElementById('hero-text').style.opacity = '1';
            }, 2500);
            setTimeout(function () {
              document.getElementById('hero-img').style.opacity = '1';
            }, 3500);
            setTimeout(function () {
              document.getElementById('lines').style.opacity = '1';
            },4500);
          };
        </script>

        <style>
            #hero-container {
                height: 600px;
            }

            #hero-background {
                background-color: var(--dark);
                position: absolute;
                width: 0;
                height: 600px;
                transition: 1s ease-in-out;
            }

            #hero-img {
                width: 100%;
                opacity: 0;
                z-index: 1000;
                transition: 2s ease-in-out;
                -webkit-border-radius:100px;
                -moz-border-radius:100px;
                border-radius:100px;
                width:180px;
                height:180px;
                margin-left: 1px;
            }

            .img-container {
                display: flex;
                justify-content: center;
                min-height: 600px;
                align-items: center;
            }

            #hero-text {
                opacity: 0;
                transition: 2s ease-in-out;
            }

            #lines {
                opacity: 0;
                z-index: 999;
                transition: 1s ease-in-out;
            }

            .spin {
                width: 100%;
                max-width: 450px;
                animation-name: spin;
                animation-duration: 4000ms;
                animation-iteration-count: infinite;
                animation-timing-function: linear;
            }

            @keyframes spin {
                from {
                    transform:rotate(0deg);
                }
                to {
                    transform:rotate(360deg);
                }
            }

            @media (max-width: 1024px) {
            .display-1 {
                font-size: 3rem;
            }
            }

            @media (max-width: 768px) {
                #hero-content {
                    padding-top: 5rem;
                    padding-bottom: 5rem;
                    text-align: center;
                }
                #hero-container {
                    height: unset;
                }
                #hero-background {
                    height: 100%;
                }
            }

            @media (max-width: 575.98px) {
                .spin {
                    max-width: 260px;
                }
            }
        </style>






        <footer>
            <div class="card">
                <div class="card-header">
                    2020 - Portafolio de titulo -Duoc UC - Desarrollado con Laravel
                </div>
            </div>
        </footer>


@endsection

