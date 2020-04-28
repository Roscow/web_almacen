@extends('base')


@section('seccion')
    <h1>MENU PRINCIPAL</h1>    
        <ul>
            <li>
                <a href="{{ route('menu_usuario') }}" >Usuario</a>         
            </li>  

            <li>
                <a href="{{ route('menu_cliente') }}">Cliente</a>
            </li>

            <li>
                <a href="{{ route('menu_proveedor') }}">Proveedor</a>
            </li>

            <li>
                <a href="{{ route('menu_ventas') }}">Venta</a>
            </li>
            <li>
                <a href="{{ route('menu_stock') }}">Stock</a>
            </li>
            <li>
                <a href="{{ route('menu_pedidos') }}">Pedidos</a>
            </li>
            <li>
                <a href="{{ route('menu_reportes') }}">Reportes</a>                
            </li>
        </ul>    
        
        <div class="container">
            @yield('seccion2')    
        </div>

@endsection