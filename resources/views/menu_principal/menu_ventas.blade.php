@extends('menu_principal')


@section('seccion2')
    
<h1>MENU VENTAS</h1>    
        <ul>
            <li>
                <a href="{{ route('ventas_agregar') }}" >Nueva venta</a>         
            </li>  

            <li>
                <a href="{{ route('ventas_anular') }}">Anular venta</a>
            </li>

            <li>
                <a href="{{ route('ventas_ver') }}">Ver ventas</a>
            </li>

            <li>
                <a href="{{ route('ventas_ver_detalle') }}">Ver detalle de venta</a>
            </li>                                           
        </ul>       
@endsection