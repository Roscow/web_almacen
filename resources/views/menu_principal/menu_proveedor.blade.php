@extends('menu_principal')


@section('seccion2')
    
<h1>MENU PROVEEDOR</h1>    
        <ul>
            <li>
                <a href="{{ route('proveedor_agregar') }}" >Agregar</a>         
            </li>  

            <li>
                <a href="{{ route('proveedor_editar') }}">Editar</a>
            </li>

            <li>
                <a href="{{ route('proveedor_eliminar') }}">Eliminar</a>
            </li>

            <li>
                <a href="{{ route('proveedor_pedidos') }}">Ver pedidos</a>
            </li>

            <li>
                <a href="{{ route('proveedor_agregar_rubro') }}">Nuevo rubro</a>
            </li>                                   
        </ul>       
@endsection