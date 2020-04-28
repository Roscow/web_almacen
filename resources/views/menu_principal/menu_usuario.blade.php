@extends('menu_principal')


@section('seccion2')
    
<h1>MENU USUARIO</h1>    
        <ul>
            <li>
                <a href="{{ route('usuario_crear') }}" >Agregar</a>         
            </li>  

            <li>
                <a href="{{ route('usuario_editar') }}">Editar</a>
            </li>

            <li>
                <a href="{{ route('usuario_eliminar') }}">Eliminar</a>
            </li>

            <li>
                <a href="{{ route('usuario_ver_todos') }}">Ver Todos</a>
            </li>                                   
        </ul>       
@endsection 