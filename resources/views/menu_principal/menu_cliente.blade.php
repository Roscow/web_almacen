@extends('menu_principal')


@section('seccion2')
    
<h1>MENU CLIENTE</h1>    
        <ul>
            <li>
                <a href="{{ route('cliente_crear') }}" >Agregar</a>         
            </li>  

            <li>
                <a href="{{ route('cliente_editar') }}">Editar</a>
            </li>

            <li>
                <a href="{{ route('cliente_eliminar') }}">Eliminar</a>
            </li>

            <li>
                <a href="{{ route('cliente_fiados') }}">Ver Todos</a>
            </li>                                   
        </ul>       
@endsection