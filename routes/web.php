<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



//view base --existe una base pero la direccion abre directamente en el login
Route::view('/','login');

// views de inicio 
Route::view('login','login')->name('login');
Route::view('recuperar_password','recuperar_password')->name('recuperar_password');
Route::view('menu_principal','menu_principal')->name('menu_principal');

//views de menu general
Route::view('menu_cliente','menu_principal/menu_cliente')->name('menu_cliente');
Route::view('menu_pedidos','menu_principal/menu_pedidos')->name('menu_pedidos');
Route::view('menu_proveedor','menu_principal/menu_proveedor')->name('menu_proveedor');
Route::view('menu_stock','menu_principal/menu_stock')->name('menu_stock');
Route::view('menu_usuario','menu_principal/menu_usuario')->name('menu_usuario');
Route::view('menu_ventas','menu_principal/menu_ventas')->name('menu_ventas');
Route::get('nuevo_reportes','PagesController@nuevo_reporte')->name('nuevo_reportes');
Route::post('reporte_ver','PagesController@reporte_ver')->name('reporte_ver');


//views de menu cliente
Route::get('cliente_crear','PagesController@cliente_crear')->name('cliente_crear');
Route::get('cliente_editar','PagesController@cliente_editar')->name('cliente_editar');
Route::get('cliente_eliminar','PagesController@cliente_eliminar')->name('cliente_eliminar');
Route::get('cliente_fiados','PagesController@cliente_fiados')->name('cliente_fiados');
Route::get('edicion_cliente','PagesController@edicion_cliente')->name('edicion_cliente');
Route::post('detalle_cliente','PagesController@detalle_cliente')->name('detalle_cliente');
Route::post('edicion_cliente2','PagesController@edicion_cliente2')->name('edicion_cliente2');
Route::post('abonar','PagesController@abonar')->name('abonar');



//views de menu pedidos
Route::get('pedidos_agregar','PagesController@pedidos_agregar')->name('pedidos_agregar');
Route::get('pedidos_recepcionar','PagesController@pedidos_recepcionar')->name('pedidos_recepcionar');
Route::get('pedidos_ver','PagesController@pedidos_ver')->name('pedidos_ver');
Route::post('seleccionProducto','PagesController@seleccionProducto')->name('seleccionProducto');
Route::post('creacionPedido','PagesController@creacionPedido')->name('creacionPedido');
Route::post('creacionPedido2','PagesController@creacionPedido2')->name('creacionPedido2');



//views de menu proveedor
Route::get('proveedor_agregar','PagesController@proveedor_agregar')->name('proveedor_agregar');
Route::get('proveedor_agregar_rubro','PagesController@proveedor_agregar_rubro')->name('proveedor_agregar_rubro');
Route::get('proveedor_editar','PagesController@proveedor_editar')->name('proveedor_editar');
Route::get('proveedor_eliminar','PagesController@proveedor_eliminar')->name('proveedor_eliminar');
Route::post('proveedor_eliminar2','PagesController@proveedor_eliminar2')->name('proveedor_eliminar2');
Route::get('proveedor_pedidos','PagesController@proveedor_pedidos')->name('proveedor_pedidos');
Route::post('detalle_proveedor_pedidos','PagesController@detalle_proveedor_pedidos')->name('detalle_proveedor_pedidos');
Route::get('obtener_comunas','PagesController@obtener_comunas')->name('obtener_comunas');
Route::post('actualizar_cliente','PagesController@actualizar_cliente')->name('actualizar_cliente');
Route::post('insert_proveedor','PagesController@insert_proveedor')->name('insert_proveedor');
Route::post('edicion_proveedor','PagesController@edicion_proveedor')->name('edicion_proveedor');
Route::post('actulizar_proveedor','PagesController@actulizar_proveedor')->name('actulizar_proveedor');
Route::post('nuevo_rubro','PagesController@nuevo_rubro')->name('nuevo_rubro');


//views de menu stock

Route::get('menu_articulo','PagesController@menu_articulo')->name('menu_articulo');
Route::get('articulo_agregar','PagesController@articulo_agregar')->name('articulo_agregar');
Route::get('articulo_eliminar','PagesController@articulo_eliminar')->name('articulo_eliminar');

Route::get('menu_productos','PagesController@menu_productos')->name('menu_productos');
Route::get('producto_agregar','PagesController@producto_agregar')->name('producto_agregar');
Route::get('producto_eliminar','PagesController@producto_eliminar')->name('producto_eliminar');
Route::get('producto_modificar','PagesController@producto_modificar')->name('producto_modificar');
Route::get('producto_mostrar','PagesController@producto_mostrar')->name('producto_mostrar');
Route::post('edicion_producto','PagesController@edicion_producto')->name('edicion_producto');
Route::post('busqueda_producto','PagesController@busqueda_producto')->name('busqueda_producto');
Route::post('actualizar_producto','PagesController@actualizar_producto')->name('actualizar_producto');

Route::get('agregar_familia_producto','PagesController@agregar_familia_producto')->name('agregar_familia_producto');
Route::get('agregar_tipo_producto','PagesController@agregar_tipo_producto')->name('agregar_tipo_producto');



//views de menu usuario
Route::get('usuario_crear','PagesController@usuario_crear')->name('usuario_crear');
Route::get('usuario_ver_todos','PagesController@usuario_ver_todos')->name('usuario_ver_todos');
Route::get('usuario_eliminar','PagesController@usuario_eliminar')->name('usuario_eliminar');
Route::get('usuario_editar','PagesController@usuario_editar')->name('usuario_editar');
Route::post('edicion_usuario','PagesController@edicion_usuario')->name('edicion_usuario');
Route::post('actualizar_usuario','PagesController@actualizar_usuario')->name('actualizar_usuario');
Route::post('eliminar_usuario','PagesController@eliminar_usuario')->name('eliminar_usuario');


Route::get('ventas_agregar_quitar/{id}','PagesController@ventas_agregar_quitar')->name('ventas_agregar_quitar');
Route::get('ventas_agregar','PagesController@ventas_agregar')->name('ventas_agregar');
Route::get('ventas_anular','PagesController@ventas_anular')->name('ventas_anular');
Route::post('ventas_anular_detalle','PagesController@ventas_anular_detalle')->name('ventas_anular_detalle');
Route::get('ventas_anular_accion/{id}/{date}','PagesController@ventas_anular_accion')->name('ventas_anular_accion');
Route::get('ventas_ver','PagesController@ventas_ver')->name('ventas_ver');
Route::post('ventas_ver_detalle','PagesController@ventas_ver_detalle')->name('ventas_ver_detalle');
Route::post('ventas_agregar_producto','PagesController@ventas_agregar_producto')->name('ventas_agregar_producto');
Route::post('ventas_agregar_confirmar','PagesController@ventas_agregar_confirmar')->name('ventas_agregar_confirmar');

//otras post
Route::post('recupera', 'LoginController@enviarRecupera')->name('recupera');
Route::post('validaUsuario', 'LoginController@validaUsuario')->name('validaUsuario');
Route::get('salirUsuario', 'LoginController@salirUsuario')->name('salirUsuario');

Route::post('/insert_tipo_producto', 'PagesController@insert_tipo_producto')->name('insert_tipo_producto');
Route::post('/insert_familia_producto', 'PagesController@insert_familia_producto')->name('insert_familia_producto');
Route::post('/insert_usuario', 'PagesController@insert_usuario')->name('insert_usuario');
Route::post('/insert_cliente', 'PagesController@insert_cliente')->name('insert_cliente');
Route::post('/eliminar_cliente', 'PagesController@eliminar_cliente')->name('eliminar_cliente');
Route::post('/insert_producto', 'PagesController@insert_producto')->name('insert_producto');
Route::post('/delete_producto', 'PagesController@delete_producto')->name('delete_producto');
Route::post('/insert_articulo', 'PagesController@insert_articulo')->name('insert_articulo');
Route::post('/delete_articulo', 'PagesController@delete_articulo')->name('delete_articulo');


Route::get('prueba', function(){
    $pdf = App::make('dompdf.wrapper');
    $pdf->loadHTML('<h1>probando</h1>');
    return $pdf->stream();

});


Route::post('prueba2','PagesController@prueba2')->name('prueba2');

