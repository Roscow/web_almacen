<?php

namespace App;
use DateTime;
use DateTimeZone;

class UtilFormatExcel {

    public function formatSpreadsheet($reader, $productos, $proveedores, $listadoProdVendidos, $listadoVentaVendedor, $listadoPedidos, $articulosPorVencer, $stockCritico, $cantidadVentas, $mes, $año ){

        $listadoProdVendidosHtml = '';
        $listadoProdVendidosCount = 0;

        foreach($listadoProdVendidos  as $nomProd => $cantidad){
            foreach($productos as $prod){
                if($prod->codigo_producto == $nomProd){
                    $listadoProdVendidosCount++;
                    $listadoProdVendidosHtml .= '<tr>
                        <td>'.$prod->codigo_producto.'</td>
                        <td>'.$prod->nombre.'</td>
                        <td>'.$cantidad.'</td>
                    </tr>
                    ';
                }
            }
        }
      if($listadoProdVendidosCount === 0){
             $listadoProdVendidosHtml .= '<tr>
                             <td colspan="3" >No se encontraron datos</td>
                         </tr>';
       }

      $listadoVentaVendedorHtml = '';
      $listadoVentaVendedorCount = 0;
      foreach ($listadoVentaVendedor as $vendedor => $numVentas){
                $listadoVentaVendedorCount++;
                $listadoVentaVendedorHtml .= '<tr>
                    <td>'.$vendedor.'</td>
                    <td>'.$numVentas.'</td>
                </tr>
                ';
       }
        if($listadoVentaVendedorCount === 0){
             $listadoVentaVendedorHtml .= '<tr>
                             <td colspan="2" >No se encontraron datos</td>
                         </tr>';
         }

         $listadoPedidosHtml = '';
         $listadoPedidosCount = 0;
         foreach($listadoPedidos  as $rutEmpr => $pedidos){
                 foreach($proveedores as $prov){
                     if($prov->rut_empresa == $rutEmpr){
                     $listadoPedidosCount++;
                     $listadoPedidosHtml .= '<tr>
                         <td>'.$rutEmpr.'</td>
                         <td>'.$prov->razon_social.'</td>
                         <td>'.$pedidos.'</td>
                     </tr>
                     ';
                     }
                 }
           }
         if($listadoPedidosCount === 0){
              $listadoPedidosHtml .= '<tr>
                              <td colspan="3" >No se encontraron datos</td>
                          </tr>';
          }

           $stockCriticoHtml = '';
           $stockCriticoCount = 0;
           foreach($articulosPorVencer as $arts){
               foreach($productos as $prods){
                   if($prods->codigo_producto == $arts->id_producto){
                       $stockCriticoCount++;
                       $stockCriticoHtml .= '<tr>
                           <td>'.$prods->codigo_producto.'</td>
                           <td>'.$prods->nombre.'</td>
                           <td>'.date_format(new DateTime($arts->fecha_vencimiento),'d-m-Y').'</td>
                       </tr>
                       ';
                   }
               }
           }
         if($stockCriticoCount === 0){
              $stockCriticoHtml .= '<tr>
                              <td colspan="3" >No se encontraron datos</td>
                          </tr>';
          }

           $articulosPorVencerhtml = '';
           $articulosPorVencerCount = 0;
               foreach($stockCritico as $prod){
                    foreach($productos as $prods){
                        if($prod->codigo_producto == $prods->codigo_producto){
                            $articulosPorVencerCount++;
                            $articulosPorVencerhtml .= '<tr>
                                <td>'.$prods->codigo_producto.'</td>
                                <td>'.$prods->nombre.'</td>
                                <td>'.$prod->stock.'</td>
                                <td>'.$prod->stock_critico.'</td>
                            </tr>
                            ';
                        }
                    }
               }
           if($articulosPorVencerCount === 0){
                $articulosPorVencerhtml .= '<tr>
                                <td colspan="4" >No se encontraron datos</td>
                            </tr>';
            }

        $htmlString = '<table>
            <tr>
                <td>Almacen los Yuyitos</td>
            </tr>
            <tr>
                <td>Reporte</td>
            </tr>
            <tr>
                <td>Periodo de analisis</td>
                <td>'.$mes.' de '.$año.'</td>
            </tr>
            <tr>
                <td>Numero de ventas en periodo</td>
                <td>'.$cantidadVentas.'</td>
            </tr>
            <tr>
                <td>Productos mas vendidos</td>
            </tr>
            <tr>
                <td>Id</td>
                <td>Nombre</td>
                <td>Ventas</td>
            </tr>
                '.$listadoProdVendidosHtml.'
            <tr>
                <td>Usuario que mas ventas realizo</td>
            </tr>
            <tr>
                <td>Vendedor</td>
                <td>N° ventas</td>
            </tr>
            '.$listadoVentaVendedorHtml.'
            <tr>
                <td>Proveedor con mas pedidos</td>
            </tr>
            <tr>
                <td>Rut</td>
                <td>Nombre</td>
                <td>N° pedidos</td>
            </tr>
            '.$listadoPedidosHtml.'
            <tr>
                <td>Articulos que vencen en el mes actual</td>
            </tr>
            <tr>
                <td>ID</td>
                <td>Nombre</td>
                <td>Fecha vencimiento</td>
            </tr>
            '.$stockCriticoHtml.'
            <tr>
                <td>Productos con stock critico</td>
            </tr>
            <tr>
                <td>ID</td>
                <td>Nombre</td>
                <td>Stock actual</td>
                <td>Stock critico</td>
            </tr>
            '.$articulosPorVencerhtml.'
        </table>';

        $spreadsheet = $reader->loadFromString(htmlspecialchars($htmlString));

         $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(79.86);
         $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(31.86);
         $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(40.43);
         $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(26.29);
         $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(10.86);

         $spreadsheet->getActiveSheet()->mergeCells('A1:D1');
         self::cellColor($spreadsheet,'A2', 'FFFF00');
         self::cellFontBold($spreadsheet,'A2');
         self::cellAlignmentCenter($spreadsheet,'A1:D1');
         self::cellFontBold($spreadsheet,'A1:D1');
         self::cellBorders($spreadsheet,'A1:D1');
         self::cellBorders($spreadsheet,'A2:A5');
         self::cellBorders($spreadsheet,'B3:B4');
         self::cellAlignmentRight($spreadsheet,'B4');
         self::cellColor($spreadsheet,'A5', 'FFFF00');
         self::cellFontBold($spreadsheet,'A5');
         self::cellBorders($spreadsheet,'A6:C6');

         $indice = 7;
         if($listadoProdVendidosCount > 0){
             for ($i = 1; $i <= $listadoProdVendidosCount; $i++) {
                 self::cellAlignmentRight($spreadsheet,'A'.$indice );
                 self::cellAlignmentLeft($spreadsheet,'B'.$indice );
                 self::cellAlignmentRight($spreadsheet,'C'.$indice );
                 self::cellBorders($spreadsheet,'A'.$indice);
                 self::cellBorders($spreadsheet,'B'.$indice);
                 self::cellBorders($spreadsheet,'C'.$indice);
                 $indice++;
             }
         }else{
            self::cellAlignmentCenter($spreadsheet,'A'.$indice);
            self::cellBorders($spreadsheet,'A'.$indice.':C'.$indice);
            $indice++;
         }

         self::cellColor($spreadsheet,'A'.$indice, 'FFFF00');
         self::cellFontBold($spreadsheet,'A'.$indice);
         self::cellBorders($spreadsheet,'A'.$indice);
         $indice++;
         self::cellBorders($spreadsheet,'A'.$indice.':B'.$indice);
         $indice++;
         if($listadoVentaVendedorCount > 0){
              for ($i = 1; $i <= $listadoVentaVendedorCount; $i++) {
                  self::cellAlignmentLeft($spreadsheet,'A'.$indice );
                  self::cellAlignmentRight($spreadsheet,'B'.$indice );
                  self::cellBorders($spreadsheet,'A'.$indice);
                  self::cellBorders($spreadsheet,'B'.$indice);
                  $indice++;
              }
          }else{
            self::cellAlignmentCenter($spreadsheet,'A'.$indice);
            self::cellBorders($spreadsheet,'A'.$indice.':B'.$indice);
            $indice++;
          }

           self::cellColor($spreadsheet,'A'.$indice, 'FFFF00');
           self::cellFontBold($spreadsheet,'A'.$indice);
           self::cellBorders($spreadsheet,'A'.$indice);
           $indice++;
           self::cellBorders($spreadsheet,'A'.$indice.':C'.$indice);
           $indice++;
            if($listadoPedidosCount > 0){
                    for ($i = 1; $i <= $listadoPedidosCount; $i++) {
                        self::cellAlignmentRight($spreadsheet,'A'.$indice );
                        self::cellAlignmentLeft($spreadsheet,'B'.$indice );
                        self::cellAlignmentRight($spreadsheet,'C'.$indice );
                        self::cellBorders($spreadsheet,'A'.$indice);
                        self::cellBorders($spreadsheet,'B'.$indice);
                        self::cellBorders($spreadsheet,'C'.$indice);
                        $indice++;
                    }
             }else{
                self::cellAlignmentCenter($spreadsheet,'A'.$indice);
                self::cellBorders($spreadsheet,'A'.$indice.':C'.$indice);
                $indice++;
             }

        self::cellColor($spreadsheet,'A'.$indice, 'FFFF00');
        self::cellFontBold($spreadsheet,'A'.$indice);
        self::cellBorders($spreadsheet,'A'.$indice);
        $indice++;
        self::cellBorders($spreadsheet,'A'.$indice.':C'.$indice);
        $indice++;
        if($stockCriticoCount > 0){
            for ($i = 1; $i <= $stockCriticoCount; $i++) {
                self::cellAlignmentRight($spreadsheet,'A'.$indice );
                self::cellAlignmentLeft($spreadsheet,'B'.$indice );
                self::cellAlignmentRight($spreadsheet,'C'.$indice );
                self::cellBorders($spreadsheet,'A'.$indice);
                self::cellBorders($spreadsheet,'B'.$indice);
                self::cellBorders($spreadsheet,'C'.$indice);
                $indice++;
            }
         }else{
            self::cellAlignmentCenter($spreadsheet,'A'.$indice);
            self::cellBorders($spreadsheet,'A'.$indice.':C'.$indice);
            $indice++;
         }

         self::cellColor($spreadsheet,'A'.$indice, 'FFFF00');
         self::cellBorders($spreadsheet,'A'.$indice);
         $indice++;
         self::cellBorders($spreadsheet,'A'.$indice.':D'.$indice);
         $indice++;
         if($articulosPorVencerCount > 0){
             for ($i = 1; $i <= $articulosPorVencerCount; $i++) {
                 self::cellAlignmentRight($spreadsheet,'A'.$indice );
                 self::cellAlignmentLeft($spreadsheet,'B'.$indice );
                 self::cellAlignmentRight($spreadsheet,'C'.$indice );
                 self::cellAlignmentRight($spreadsheet,'D'.$indice );
                 self::cellBorders($spreadsheet,'A'.$indice);
                 self::cellBorders($spreadsheet,'B'.$indice);
                 self::cellBorders($spreadsheet,'C'.$indice);
                 self::cellBorders($spreadsheet,'D'.$indice);
                 $indice++;
             }
          }else{
            self::cellAlignmentCenter($spreadsheet,'A'.$indice);
            self::cellBorders($spreadsheet,'A'.$indice.':D'.$indice);
            $indice++;
          }

         self::cellBordersRight($spreadsheet,'D1:D'.($indice-1));

         return $spreadsheet;

    }
    function cellAlignmentRight($spreadsheet, $cells){
       $spreadsheet->getActiveSheet()->getStyle($cells)->applyFromArray([
               'alignment' => [
                       'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
               ],
           ]);
    }

    function cellFontBold($spreadsheet, $cells){
       $spreadsheet->getActiveSheet()->getStyle($cells)->applyFromArray([
               'font'  => array(
                       'bold'  => true,
                   )
           ]);
    }

    function cellAlignmentCenter($spreadsheet, $cells){
       $spreadsheet->getActiveSheet()->getStyle($cells)->applyFromArray([
               'alignment' => [
                       'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
               ],
           ]);
    }

    function cellAlignmentLeft($spreadsheet, $cells){
           $spreadsheet->getActiveSheet()->getStyle($cells)->applyFromArray([
                   'alignment' => [
                           'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                   ],
               ]);
        }

    function cellBorders($spreadsheet, $cells){
       $spreadsheet->getActiveSheet()->getStyle($cells)->applyFromArray(['borders' => array(
                     'allBorders' => array(
                           'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, //BORDER_THIN BORDER_MEDIUM BORDER_HAIR
                           'color' => array('rgb' => '000000')
                     )
                   )
           ]);
    }

    function cellBordersRight($spreadsheet, $cells){
           $spreadsheet->getActiveSheet()->getStyle($cells)->applyFromArray(['borders' => array(
                         'right' => array(
                               'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, //BORDER_THIN BORDER_MEDIUM BORDER_HAIR
                               'color' => array('rgb' => '000000')
                         )
                       )
               ]);
        }

    function cellColor($spreadsheet, $cells, $color){
       $spreadsheet->getActiveSheet()->getStyle($cells)->applyFromArray([
               'fill' => [
                       'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                       'startColor' => [
                           'argb' => $color,
                       ]
               ],
           ]);
    }

}
