@extends('base')


@section('seccion')

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="{{ route('menu_principal') }}" style="font-size: 17px;">{{ ucwords(session('name')) }} ( {{ ucwords(session('type')) }})</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
     <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             Cliente
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('cliente_crear') }}" >Agregar</a></li>
                <li><a class="dropdown-item" href="{{ route('cliente_editar') }}" >Editar</a></li>
                <li><a class="dropdown-item" href="{{ route('cliente_eliminar') }}" >Eliminar</a></li>
                <li><a class="dropdown-item" href="{{ route('cliente_fiados') }}" >Ver Fiados</a></li>
            </ul>
      </li>
      @if(strcmp(session('type'), 'Administrador') == 0 )
		<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             Usuario
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('usuario_crear') }}" >Agregar</a></li>
                <li><a class="dropdown-item" href="{{ route('usuario_editar') }}" >Editar</a></li>
                <li><a class="dropdown-item" href="{{ route('usuario_eliminar') }}" >Eliminar</a></li>
                <li><a class="dropdown-item" href="{{ route('usuario_ver_todos') }}" >Ver Todos</a></li>
            </ul>
      </li>
      @endif
     <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Proveedor
              </a>
              <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{ route('proveedor_agregar') }}" >Agregar</a></li>
                  <li><a class="dropdown-item" href="{{ route('proveedor_editar') }}" >Editar</a></li>
                  <li><a class="dropdown-item" href="{{ route('proveedor_eliminar') }}" >Eliminar</a></li>
                  <li><a class="dropdown-item" href="{{ route('proveedor_pedidos') }}" >Ver Pedidos</a></li>
                  <li><a class="dropdown-item" href="{{ route('proveedor_agregar_rubro') }}" >Nuevo Rubro</a></li>
              </ul>
        </li>
	 <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             Venta
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('ventas_agregar') }}" >Nueva</a></li>
                <li><a class="dropdown-item" href="{{ route('ventas_anular') }}" >Anular</a></li>
                <li><a class="dropdown-item" href="{{ route('ventas_ver') }}" >Ver</a></li>
            </ul>
      </li>

      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Stock
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Producto</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('producto_agregar') }}" >Agregar</a></li>
                <li><a class="dropdown-item" href="{{ route('producto_modificar') }}" >Modificar</a></li>
                <li><a class="dropdown-item" href="{{ route('producto_mostrar') }}" >Buscar</a></li>
                <li><a class="dropdown-item" href="{{ route('producto_eliminar') }}" >Eliminar</a></li>
                <li><a class="dropdown-item" href="{{ route('agregar_familia_producto') }}" >Familia Producto</a></li>
                <li><a class="dropdown-item" href="{{ route('agregar_tipo_producto') }}" >Tipo Producto</a></li>
              </ul>
            </li>
            <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Articulo</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('articulo_agregar') }}" >Agregar</a></li>
                <li><a class="dropdown-item" href="{{ route('articulo_eliminar') }}" >Eliminar</a></li>
              </ul>
            </li>
          </ul>
      </li>

	 <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             Pedidos
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('pedidos_agregar') }}" >Nuevo</a></li>
                <li><a class="dropdown-item" href="{{ route('pedidos_recepcionar') }}" >Recepcionar</a></li>
                <li><a class="dropdown-item" href="{{ route('pedidos_ver') }}" >Ver</a></li>
            </ul>
      </li>

      <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Reportes
              </a>
              <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{ route('nuevo_reportes') }}" >Nuevo</a></li>
              </ul>
        </li>

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
            .navbar-nav li:hover > ul.dropdown-menu {
                display: block;
            }
            .dropdown-submenu {
                position:relative;
            }
            .dropdown-submenu>.dropdown-menu {
                top:0;
                left:100%;
                margin-top:-6px;
            }

            /* rotate caret on hover */
            .dropdown-menu > li > a:hover:after {
                text-decoration: underline;
                transform: rotate(-90deg);
            }

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
