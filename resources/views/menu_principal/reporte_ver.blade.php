@extends('menu_principal/nuevo_reporte')

@section('contenido')
    <?php


        $var2='<br>';
        foreach($articulosPorVencer as $arts){
            foreach($productos as $prods){
                if($prods->codigo_producto == $arts->id_producto){
                    $var2= $var2 . $prods->nombre ." ".$arts->fecha_vencimiento. "<br>";
                }                
            }            
        }



        $var1 = "<h1>Almacen los yuyitos</h1>" . 
        "<h5>Reporte</h5>".
        "Periodo de analisis: $month de $year<br>".
        "<br>N° ventas en el periodo: ". $cantidadVentas .
        "<br>Productos mas vendidos:".
        "<br>Usuario que mas ventas realizo:". 
        "<br>Proveedor con mas pedidos: ". 
        "<br>--------------------------------------------".
        "<br>Articulos que vencen en el mes actual:". $var2.
        "<br>Productos con stock critico".
        "<br>";
        echo  $var1;
    ?>

    <form action="{{route('prueba2')}}" method="POST">
    @csrf
        <input type="hidden" name="inputHidden" type="hidden" value="{{$var1}}">

        <button type="submit"  class="btn btn-primary">Convertir a pdf</button> 
    </form>


    @endsection