@extends('menu_principal/nuevo_reporte')

@section('contenido')
    <?php

        //articulos por vencer
        $var2='<br>';
        foreach($articulosPorVencer as $arts){
            foreach($productos as $prods){
                if($prods->codigo_producto == $arts->id_producto){
                    $var2= $var2 ."Producto: ". $prods->nombre ." Vence: ".date_format(new DateTime($arts->fecha_vencimiento),'d-m-Y'). "<br>";
                }                
            }            
        }

        //productos con stock critico
        $var3='<br>';
        foreach($stockCritico as $prod){
            foreach($productos as $prods){
                if($prod->codigo_producto == $prods->codigo_producto){
                    $var3= $var3 ."Producto: ". $prods->nombre ." Stock actual: ".$prod->stock." "." Stock critico: ".$prod->stock_critico ."<br>";
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
        "<br><h4>Articulos que vencen en el mes actual:</h4>". $var2.
        "<br><h4>Productos con stock critico</h4>". $var3.
        "<br>";
        echo  $var1;
    ?>

    <form action="{{route('prueba2')}}" method="POST">
    @csrf
        <input type="hidden" name="inputHidden" type="hidden" value="{{$var1}}">

        <button type="submit"  class="btn btn-primary">Convertir a pdf</button> 
    </form>


    @endsection