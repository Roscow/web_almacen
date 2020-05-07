@extends('menu_principal')


@section('seccion2')
    <!-- la seccion media de la pagina -->
   <div class="row">
          <!-- el siderbar de los botones  -->
        <div class="col-2">
            <p>MENU PROVEEDOR</p> 
            <div class="btn-group-vertical" role="link" aria-label="Button group with nested dropdown">

                <!--productos desplegable-->
                <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Menu Productos
                </button>
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <a class="dropdown-item" href="{{ route('producto_agregar') }}" role="button">Agregar </a>
                    <a class="dropdown-item" href="{{ route('producto_modificar') }}" role="button">Modificar </a>      
                    <a class="dropdown-item" href="{{ route('producto_mostrar') }}" role="button">Buscar</a>
                    <a class="dropdown-item" href="{{ route('producto_eliminar') }}" role="button">Eliminar</a>      
                </div> 

                <!--articulos desplegable  (esta con problemas, me muestra el contenido del deplegable de arriba)
                <button id="btnGroupDrop2" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Menu Articulos
                </button>
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop2">
                    <a class="dropdown-item" href="{{ route('articulo_agregar') }}" role="button">Agregar Articulo</a>
                    <a class="dropdown-item" href="{{ route('articulo_eliminar') }}" role="button">Eliminar Articulo</a>                   
                </div>-->
                <!-- botones auxiliares porque no funciona el dropdown de articulos-->
                <a class="btn btn-primary" href="{{ route('articulo_agregar') }}" role="button">Agregar articulo</a>  
                <a class="btn btn-primary" href="{{ route('articulo_eliminar') }}" role="button">Eliminar articulo</a>  


                <a class="btn btn-primary" href="{{ route('agregar_familia_producto') }}" role="button">Nueva Familia Producto</a>                    
                <a class="btn btn-primary" href="{{ route('agregar_tipo_producto') }}"href="{{ route('proveedor_pedidos') }}" role="button">Nuevo Tipo Producto</a>                          
            </div>
        </div>

        <!-- el espacio de contenido-->
        <div class="col-10 border border-primary">            
            @yield('contenido')  
        </div> 
    </div>             
@endsection