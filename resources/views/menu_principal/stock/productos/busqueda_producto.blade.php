
@extends('menu_principal/stock/productos/producto_mostrar')



@section('busqueda')
    <p> 
  
        <br>codigo_producto: {{$producto[0]->codigo_producto}}
        <br>nombre: {{$producto[0]->nombre}}
        <br>rut empresa: {{$producto[0]->rut_empresa}}
        <br>precio_compra: {{$producto[0]->precio_compra}}
        <br>precio_venta: {{$producto[0]->precio_venta}}
        <br>stock: {{$producto[0]->stock}}
        <br>stock_critico: {{$producto[0]->stock_critico}}
        <br>descripcion: {{$producto[0]->descripcion}}
        <br>id_tipo: {{$producto[0]->id_tipo}}
        <br>id_familia: {{$producto[0]->id_familia}}
    </p>    
@endsection