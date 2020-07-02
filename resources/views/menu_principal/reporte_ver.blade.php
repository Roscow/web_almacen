@extends('menu_principal/nuevo_reporte')

@section('contenido')
    <?php
    $var1 = "<h1>Almacen los yuyitos</h1>" . 
    "<h5>Reporte</h5>".
    "Periodo de analisis: $month de $year<br>".
    "<br>Productos mas vendidos:".
    "<br>N° ventas en el periodo:". 
    "<br>Usuario que mas ventas realizo:". 
    "<br>Proveedor al que mas se le pidio". 
    "<br> articulos por vencer en los prox 15 dias:". 
    "<br> productos con stock critico".
    "<br>";
    echo  $var1;
    ?>

    <form action="{{route('prueba2')}}" method="POST">
    @csrf
        <input type="hidden" name="inputHidden" type="hidden" value="{{$var1}}">

        <button type="submit"  class="btn btn-primary">Convertir a pdf</button> 
    </form>


    @endsection