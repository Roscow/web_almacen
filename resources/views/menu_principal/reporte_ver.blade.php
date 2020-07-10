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
        $varPdf = $var1;
        //$var1= str_replace('<br>',utf8_encode(chr(10)),$var1) ;
        $var1= str_replace('<br>','                                                                   ',$var1) ;
        $var1= str_replace('h1','                                                                         ',$var1) ;
        $var1= str_replace('h6','                                                                ',$var1) ;
        $var1= str_replace('h4','                                                                 ',$var1) ;
        $var1= str_replace('h5','                                                                    ',$var1) ;
        $var1= str_replace('<',' ',$var1) ;
        $var1= str_replace('>',' ',$var1) ;
        $var1= str_replace('/',' ',$var1) ;



    ?>
 <div class="form-row">
        <div class="form-group col-lg-2">
            <form action="{{route('prueba2')}}" method="POST">
            @csrf
                <input type="hidden" name="inputHidden" type="hidden" value="{{$varPdf}}">

                <button type="submit"  class="btn btn-primary">Exportar a pdf</button>
            </form>
        </div>

        <div class="form-group col-lg-2">
            <form action="{{route('genera_word2')}}" method="POST">
            @csrf
                <input type="hidden" name="inputHidden" type="hidden" value="{{$var1}}">
                <input type="hidden" name="mes" type="hidden" value="{{$month}}">
                <input type="hidden" name="año" type="hidden" value="{{$year}}">

                <button type="submit"  class="btn btn-primary">Exportar a doc</button>
            </form>
        </div>


        <div class="form-group col-lg-2">
            <form action="{{route('genera_xls2')}}" method="POST">
            @csrf
                <input type="hidden" name="inputHidden" type="hidden" value="{{$var1}}">
                <input type="hidden" name="mes" type="hidden" value="{{$month}}">
                <input type="hidden" name="año" type="hidden" value="{{$year}}">

                <button type="submit"  class="btn btn-primary">Exportar a xls</button>
            </form>
        </div>
</div>
    @endsection
