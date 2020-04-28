@extends('menu_principal')


@section('seccion2')
    
<h1>MENU PEDIDOS</h1>    
        <ul>
            <li>
                <a href="{{ route('pedidos_agregar') }}" >Nuevo Pedido</a>         
            </li>  

            <li>
                <a href="{{ route('pedidos_recepcionar') }}">Recepcionar Pedido</a>
            </li>

            <li>
                <a href="{{ route('pedidos_ver') }}">Ver pedidos</a>
            </li>                                                    
        </ul>       
@endsection