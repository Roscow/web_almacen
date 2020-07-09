@extends('menu_principal/nuevo_reporte')

@section('contenido')
    <?php

        //articulos por vencer
        $var2='<br>';
        foreach($articulosPorVencer as $arts){
            foreach($productos as $prods){
                if($prods->codigo_producto == $arts->id_producto){
                    $var2= $var2."ID: ".$prods->codigo_producto .", Producto: ". $prods->nombre .", Vence: ".date_format(new DateTime($arts->fecha_vencimiento),'d-m-Y'). "<br>";
                }                
            }            
        }

        //productos con stock critico
        $var3='<br>';
        foreach($stockCritico as $prod){
            foreach($productos as $prods){
                if($prod->codigo_producto == $prods->codigo_producto){
                    $var3= $var3 ."Id: ". $prods->codigo_producto.", Producto: ". $prods->nombre .", Stock actual: ".$prod->stock." ".", Stock critico: ".$prod->stock_critico ."<br>";
                }                
            }            
        }

        $var4='<br>';
        $vendedoresOrdenado = $listadoVentaVendedor;
        arsort($vendedoresOrdenado);
        foreach($vendedoresOrdenado  as $vendedor => $numVentas){            
            $var4= $var4 ."Vendedor: ". $vendedor .", N° ventas: ".$numVentas."<br>";                    
        }

        $var5='<br>';
        $productosOrdenado =$listadoProdVendidos;
        arsort($productosOrdenado);
        foreach($productosOrdenado  as $nomProd => $cantidad){  
            foreach($productos as $prod){
                if($prod->codigo_producto == $nomProd){
                    $var5= $var5 ."id: ". $prod->codigo_producto. " Producto: ". $prod->nombre ." Cantidad: ".$cantidad."<br>";  
                }
            }
        }          
                              
        $var6='<br>';
        arsort($listadoPedidos);
        foreach($listadoPedidos  as $rutEmpr => $pedidos){  
            foreach($proveedores as $prov){
                if($prov->rut_empresa == $rutEmpr){
                    $var6= $var6 ."rut: ". $rutEmpr. ",  Proveedor: ". $prov->razon_social .",  N° Pedidos: ".$pedidos."<br>";  
                }
            }
        }  


        $var1 = "<h1>Almacen los yuyitos</h1>" . 
        "<h5>Reporte</h5>".
        "Periodo de analisis: $month de $year<br>".
        "<br><h4>Numero de  ventas en el periodo: </h4>". $cantidadVentas .
        "<br><h4>Productos mas vendidos:</h4>".$var5.
        "<br><h4>Usuario que mas ventas realizo:</h4>". $var4.
        "<br><h4>Proveedor con mas pedidos:</h4> ". $var6.
        "<br>--------------------------------------------".
        "<br><h4>Articulos que vencen en el mes actual:</h4>". $var2.
        "<br><h4>Productos con stock critico</h4>". $var3.
        "<br>";
        echo  $var1;

        $texto_word= str_replace("<br>"," ",$var1);
        $texto_word= str_replace("</br>"," ",$var1);
        $texto_word= str_replace("<br>"," ",$var1);
    ?>

    <form action="{{route('prueba2')}}" method="POST">
    @csrf
        <input type="hidden" name="inputHidden" type="hidden" value="{{$var1}}">

        <button type="submit"  class="btn btn-primary">Convertir a pdf</button> 
    </form>
    
    <form action="{{route('genera_word')}}" method="POST">
    @csrf
        <input type="hidden" name="inputHidden" type="hidden" value="{{$texto_word}}">

        <button type="submit"  class="btn btn-primary">Convertir a word</button> 
    </form>

    @endsection