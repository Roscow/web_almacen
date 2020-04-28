@extends('base')


@section('seccion')
    <h1>login</h1>
    <form method="post">

        <ul>
            <li>
                <label for="Usuario">Usuario</label>
                <input type="text" id="usuario" name="user_name">               
            </li>
            <li>            
                <label for="contraseña">Contraseña</label>
                <input type="password" id="contraseña" name="contraseña">
            </li>          
            <li class="button">
                <button ><a href="{{ route('menu_principal') }}"    >Ingresar</a></button>
            </li>
            <li>
                <a href="{{ route('recuperar_password') }}" >recuperar contraseña</a>
            </li>
        </ul>
        
        
    </form>
@endsection