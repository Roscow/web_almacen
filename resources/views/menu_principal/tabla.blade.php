<?php
header('Content-type: application/vnd.ms-excel;charset=iso-8859-15');
header('Content-Disposition: attachment; filename=reporte_'.$mes.'_'.$año.'.xls');
?>




<table border="1" cellpadding="2" cellspacing="0" width="100%">
    <caption>Almacen los Yuyitos</caption>   
    <tr>
        <td>Reporte</td>       
    </tr>
    <tr>
        <td>Periodo de analisis</td> 
        <td>{{$mes}} de {{$año}}</td>      
    </tr>

    <tr>
        <td>Numero de ventas en periodo</td> 
        <td>{{$cantidadVentas}}</td>      
    </tr>

    <tr>
        <td>productos mas vendidos</td>
    </tr>

    <tr>               
        <td>id</td>
        <td>nombre</td>
        <td>ventas</td>
    </tr> 

    @foreach($listadoProdVendidos  as $nomProd => $cantidad)  
        @foreach($productos as $prod)
            @if($prod->codigo_producto == $nomProd)
                <tr>               
                    <td>{{$prod->codigo_producto}}</td>
                    <td>{{$prod->nombre}}</td>
                    <td>{{$cantidad}}</td>
                </tr> 
            @endif
        @endforeach
    @endforeach

    <tr>
        <td>Usuario que mas ventas realizo</td>
    </tr>
    <tr>               
        <td>Vendedor</td>
        <td>N° ventas</td>
    </tr> 
    
    @foreach ($listadoVentaVendedor as $vendedor => $numVentas)
            <tr>                               
                <td>{{$vendedor}}</td>
                <td>{{$numVentas}}</td>
            </tr> 
    @endforeach




    <tr>
        <td>Datos</td>
        <td>Datos</td>
        <td>Datos</td>
    </tr>
    <tr>
        <td>Datos</td>
        <td>Datos</td>
        <td>Datos</td>
    </tr>
</table>
