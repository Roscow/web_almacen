@extends('base')


@section('seccion')
    <h1>RECUPERAR CONTRASEÑA</h1>
    <form method="post">

        <ul>
            <li>
                <label for="Usuario">Ingrese su nombre de usuario</label>
                <input type="text" id="usuario" name="user_name">               
            </li>                
            <li class="button">
                <button >Enviar contraseña al correo</button>
            </li>
            <li>
                <a href="{{ route('login') }}" >login</a>
            </li>
        </ul>                
    </form>
@endsection