@extends('menu_principal')


@section('seccion2')
    
<h1>MENU STOCK</h1>    
        <ul>
            <li>
                <a href="{{ route('menu_articulo') }}" >Menu Articulos</a>         
            </li>  

            <li>
                <a href="{{ route('menu_productos') }}">Menu Productos</a>
            </li>

            <li>
                <a href="{{ route('agregar_familia_producto') }}">Nueva Familia Producto</a>
            </li>

            <li>
                <a href="{{ route('agregar_tipo_producto') }}">Nuevo Tipo Producto</a>
            </li>                                   
        </ul> 
        <div class="container">
            @yield('seccion3')    
        </div>      
@endsection