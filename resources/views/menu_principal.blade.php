@extends('base')


@section('seccion')
<!--<div class="container-full-width">
    <header>
        <div class="card">
            <div class="card-header">
                <a class="navbar-brand" href="#">
                <img src="https://cdn.icon-icons.com/icons2/943/PNG/128/shoppaymentorderbuy-29_icon-icons.com_73875.png" width="30" height="30" class="d-inline-block align-top" alt="">
                AlMACEN LOS YUYITOS - SISTEMA DE CONTROL Y GESTION
               </a>
               <div style="float: right">
                @php
                    date_default_timezone_set ("America/Santiago");
                    setlocale(LC_TIME, "spanish");
                   
                        echo ucwords(strftime("%A, %d de %B %Y %H:%M"));
                   
                @endphp
           </div>
            </div>
        </div>
     </header>
</div>-->

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="{{ route('menu_principal') }}" style="font-size: 17px;">{{ ucwords(session('name')) }} ( {{ ucwords(session('type')) }})</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="{{ route('cliente_crear') }}">Cliente</a>
      @if(strcmp(session('type'), 'Administrador') == 0 )
        <a class="nav-item nav-link" href="{{ route('usuario_crear') }}" >Usuario</a>
      @endif
      <a class="nav-item nav-link" href="{{ route('proveedor_agregar') }}">Proveedor</a>
      <a class="nav-item nav-link" href="{{ route('ventas_agregar') }}">Venta</a>
      <a class="nav-item nav-link" href="{{ route('producto_agregar') }}">Stock</a>
      <a class="nav-item nav-link" href="{{ route('pedidos_agregar') }}">Pedidos</a>
      <a class="nav-item nav-link" href="{{ route('nuevo_reportes') }}">Reportes</a>
    </div>
  </div>
  <a class="navbar-brand" href="{{ route('salirUsuario') }}" style="float: right; font-size: 17px;">
    Cerrar sesión
  </a>
</nav>

        <br>
        <div class="container">
            @yield('seccion2')
        </div>


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


        <footer style="position: fixed;left: 0;bottom: 0;width: 100%;">
            <br>
            <div class="container-full-width">
            <nav class="bg-primary">
                <div class="card-header" style="color: white ;">
                    2020 - Portafolio de titulo -Duoc UC - Desarrollado con Laravel

                    <div style="float: right">
                        @php
                            date_default_timezone_set ("America/Santiago");
                            setlocale(LC_TIME, "spanish");
                        
                            echo mb_convert_case(utf8_encode(strftime("%A, %d de %B %Y %H:%M")), MB_CASE_TITLE, 'UTF-8');
                        
                        @endphp
                    </div>

                </div>
                </div>
            </div>
        </footer>


@endsection



<!--<div class="container-full-width" style="margin-top: 70px">       
        <footer>              
            <div class="card">
                <div class="card-header">
                    2020 - Portafolio de titulo -Duoc UC - Desarrollado con Laravel
                </div>            
            </div>       
        </footer>
</div>
