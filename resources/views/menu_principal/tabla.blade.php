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
        <td style="background-color: yellow">productos mas vendidos</td>
    </tr>

    <tr>               
        <td >id</td>
        <td >nombre</td>
        <td >ventas</td>
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
        <td style="background-color: yellow">Usuario que mas ventas realizo</td>
    </tr>
    <tr>               
        <td >Vendedor</td>
        <td >N° ventas</td>
    </tr> 
    
    @foreach ($listadoVentaVendedor as $vendedor => $numVentas)
            <tr>                               
                <td>{{$vendedor}}</td>
                <td>{{$numVentas}}</td>
            </tr> 
    @endforeach

    <tr>
        <td style="background-color: yellow">Proveedor con mas pedidos</td>
    </tr>

    <tr>               
        <td >rut</td>
        <td >nombre</td>
        <td >N° pedidos</td>
    </tr> 

    @foreach($listadoPedidos  as $rutEmpr => $pedidos)  
            @foreach($proveedores as $prov)
                @if($prov->rut_empresa == $rutEmpr)
                <tr>
                    <td>{{$rutEmpr}}</td>
                    <td>{{$prov->razon_social}}</td>
                    <td>{{$pedidos}}</td> 
                </tr>
                @endif
            @endforeach
    @endforeach

    <tr>
        <td style="background-color: yellow">Articulos que vencen en el mes actual</td>
    </tr>

    <tr>               
        <td >ID</td>
        <td >nombre</td>
        <td >Fecha vencimiento</td>
    </tr> 

       
    @foreach($articulosPorVencer as $arts)
        @foreach($productos as $prods)
            @if($prods->codigo_producto == $arts->id_producto)
            <tr>
                <td>{{$prods->codigo_producto}}</td>
                <td>{{$prods->nombre}}</td>
                <td>{{date_format(new DateTime($arts->fecha_vencimiento),'d-m-Y')}}</td>
            </tr>
            @endif                
        @endforeach          
    @endforeach

    <tr>
        <td style="background-color: yellow">Productos con stock critico</td>
    </tr>

    <tr>               
        <td >ID</td>
        <td >nombre</td>
        <td >Stock actual</td>
        <td >Stock critico</td>
    </tr>

    @foreach($stockCritico as $prod)
            @foreach($productos as $prods)
                @if($prod->codigo_producto == $prods->codigo_producto)
                <tr>
                    <td>{{$prods->codigo_producto}}</td>
                    <td>{{$prods->nombre}}</td>
                    <td>{{$prod->stock}}</td>
                    <td>{{$prod->stock_critico}}</td>
                </tr>
                @endif                 
            @endforeach            
    @endforeach
</table>
