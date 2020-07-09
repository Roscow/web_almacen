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
Route::view('menu_principal','menu_principal')->name('menu_principal')->middleware('session');

//views de menu general
Route::view('menu_cliente','menu_principal/menu_cliente')->name('menu_cliente')->middleware('session');
Route::view('menu_pedidos','menu_principal/menu_pedidos')->name('menu_pedidos')->middleware('session');
Route::view('menu_proveedor','menu_principal/menu_proveedor')->name('menu_proveedor')->middleware('session');
Route::view('menu_stock','menu_principal/menu_stock')->name('menu_stock')->middleware('session');
Route::view('menu_usuario','menu_principal/menu_usuario')->name('menu_usuario')->middleware('session');
Route::view('menu_ventas','menu_principal/menu_ventas')->name('menu_ventas')->middleware('session');
Route::get('nuevo_reportes','PagesController@nuevo_reporte')->name('nuevo_reportes')->middleware('session');
Route::post('reporte_ver','PagesController@reporte_ver')->name('reporte_ver')->middleware('session');


//views de menu cliente
Route::get('cliente_crear','PagesController@cliente_crear')->name('cliente_crear')->middleware('session');
Route::get('cliente_editar','PagesController@cliente_editar')->name('cliente_editar')->middleware('session');
Route::get('cliente_eliminar','PagesController@cliente_eliminar')->name('cliente_eliminar')->middleware('session');
Route::get('cliente_fiados','PagesController@cliente_fiados')->name('cliente_fiados')->middleware('session');
Route::get('edicion_cliente','PagesController@edicion_cliente')->name('edicion_cliente')->middleware('session');
Route::post('detalle_cliente','PagesController@detalle_cliente')->name('detalle_cliente')->middleware('session');
Route::post('edicion_cliente2','PagesController@edicion_cliente2')->name('edicion_cliente2')->middleware('session');
Route::post('abonar','PagesController@abonar')->name('abonar')->middleware('session');



//views de menu pedidos
Route::get('pedidos_agregar','PagesController@pedidos_agregar')->name('pedidos_agregar')->middleware('session');
Route::get('pedidos_recepcionar','PagesController@pedidos_recepcionar')->name('pedidos_recepcionar')->middleware('session');
Route::get('pedidos_ver','PagesController@pedidos_ver')->name('pedidos_ver')->middleware('session');
Route::post('seleccionProducto','PagesController@seleccionProducto')->name('seleccionProducto')->middleware('session');
Route::post('creacionPedido','PagesController@creacionPedido')->name('creacionPedido')->middleware('session');
Route::post('mostrarPedidos','PagesController@mostrarPedidos')->name('mostrarPedidos')->middleware('session');
Route::post('seleccionPedido','PagesController@seleccionPedido')->name('seleccionPedido')->middleware('session');
Route::post('recepcionPedido','PagesController@recepcionPedido')->name('recepcionPedido')->middleware('session');
Route::post('recepcionar','PagesController@recepcionar')->name('recepcionar')->middleware('session');



//views de menu proveedor
Route::get('proveedor_agregar','PagesController@proveedor_agregar')->name('proveedor_agregar')->middleware('session');
Route::get('proveedor_agregar_rubro','PagesController@proveedor_agregar_rubro')->name('proveedor_agregar_rubro')->middleware('session');
Route::get('proveedor_editar','PagesController@proveedor_editar')->name('proveedor_editar')->middleware('session');
Route::get('proveedor_eliminar','PagesController@proveedor_eliminar')->name('proveedor_eliminar')->middleware('session');
Route::post('proveedor_eliminar2','PagesController@proveedor_eliminar2')->name('proveedor_eliminar2')->middleware('session');
Route::get('proveedor_pedidos','PagesController@proveedor_pedidos')->name('proveedor_pedidos')->middleware('session');
Route::post('detalle_proveedor_pedidos','PagesController@detalle_proveedor_pedidos')->name('detalle_proveedor_pedidos')->middleware('session');
Route::get('obtener_comunas','PagesController@obtener_comunas')->name('obtener_comunas')->middleware('session');
Route::post('actualizar_cliente','PagesController@actualizar_cliente')->name('actualizar_cliente')->middleware('session');
Route::post('insert_proveedor','PagesController@insert_proveedor')->name('insert_proveedor')->middleware('session');
Route::post('edicion_proveedor','PagesController@edicion_proveedor')->name('edicion_proveedor')->middleware('session');
Route::post('actulizar_proveedor','PagesController@actulizar_proveedor')->name('actulizar_proveedor')->middleware('session');
Route::post('nuevo_rubro','PagesController@nuevo_rubro')->name('nuevo_rubro')->middleware('session');


//views de menu stock

Route::get('menu_articulo','PagesController@menu_articulo')->name('menu_articulo')->middleware('session');
Route::get('articulo_agregar','PagesController@articulo_agregar')->name('articulo_agregar')->middleware('session');
Route::get('articulo_eliminar','PagesController@articulo_eliminar')->name('articulo_eliminar')->middleware('session');

Route::get('menu_productos','PagesController@menu_productos')->name('menu_productos')->middleware('session');
Route::get('producto_agregar','PagesController@producto_agregar')->name('producto_agregar')->middleware('session');
Route::get('producto_eliminar','PagesController@producto_eliminar')->name('producto_eliminar')->middleware('session');
Route::get('producto_modificar','PagesController@producto_modificar')->name('producto_modificar')->middleware('session');
Route::get('producto_mostrar','PagesController@producto_mostrar')->name('producto_mostrar')->middleware('session');
Route::post('edicion_producto','PagesController@edicion_producto')->name('edicion_producto')->middleware('session');
Route::post('busqueda_producto','PagesController@busqueda_producto')->name('busqueda_producto')->middleware('session');
Route::post('actualizar_producto','PagesController@actualizar_producto')->name('actualizar_producto')->middleware('session');

Route::get('agregar_familia_producto','PagesController@agregar_familia_producto')->name('agregar_familia_producto')->middleware('session');
Route::get('agregar_tipo_producto','PagesController@agregar_tipo_producto')->name('agregar_tipo_producto')->middleware('session');



//views de menu usuario
Route::get('usuario_crear','PagesController@usuario_crear')->name('usuario_crear')->middleware('session');
Route::get('usuario_ver_todos','PagesController@usuario_ver_todos')->name('usuario_ver_todos')->middleware('session');
Route::get('usuario_eliminar','PagesController@usuario_eliminar')->name('usuario_eliminar')->middleware('session');
Route::get('usuario_editar','PagesController@usuario_editar')->name('usuario_editar')->middleware('session');
Route::post('edicion_usuario','PagesController@edicion_usuario')->name('edicion_usuario')->middleware('session');
Route::post('actualizar_usuario','PagesController@actualizar_usuario')->name('actualizar_usuario')->middleware('session');
Route::post('eliminar_usuario','PagesController@eliminar_usuario')->name('eliminar_usuario')->middleware('session');


Route::get('ventas_agregar_quitar/{id}','PagesController@ventas_agregar_quitar')->name('ventas_agregar_quitar')->middleware('session');
Route::get('ventas_agregar','PagesController@ventas_agregar')->name('ventas_agregar')->middleware('session');
Route::get('ventas_anular','PagesController@ventas_anular')->name('ventas_anular')->middleware('session');
Route::post('ventas_anular_detalle','PagesController@ventas_anular_detalle')->name('ventas_anular_detalle')->middleware('session');
Route::get('ventas_anular_accion/{id}/{date}','PagesController@ventas_anular_accion')->name('ventas_anular_accion')->middleware('session');
Route::get('ventas_ver','PagesController@ventas_ver')->name('ventas_ver')->middleware('session');
Route::post('ventas_ver_detalle','PagesController@ventas_ver_detalle')->name('ventas_ver_detalle')->middleware('session');
Route::post('ventas_agregar_producto','PagesController@ventas_agregar_producto')->name('ventas_agregar_producto')->middleware('session');
Route::post('ventas_agregar_confirmar','PagesController@ventas_agregar_confirmar')->name('ventas_agregar_confirmar')->middleware('session');

//otras post
Route::post('recupera', 'LoginController@enviarRecupera')->name('recupera');
Route::post('validaUsuario', 'LoginController@validaUsuario')->name('validaUsuario');
Route::get('salirUsuario', 'LoginController@salirUsuario')->name('salirUsuario');

Route::post('/insert_tipo_producto', 'PagesController@insert_tipo_producto')->name('insert_tipo_producto')->middleware('session');
Route::post('/insert_familia_producto', 'PagesController@insert_familia_producto')->name('insert_familia_producto')->middleware('session');
Route::post('/insert_usuario', 'PagesController@insert_usuario')->name('insert_usuario')->middleware('session');
Route::post('/insert_cliente', 'PagesController@insert_cliente')->name('insert_cliente')->middleware('session');
Route::post('/eliminar_cliente', 'PagesController@eliminar_cliente')->name('eliminar_cliente')->middleware('session');
Route::post('/insert_producto', 'PagesController@insert_producto')->name('insert_producto')->middleware('session');
Route::post('/delete_producto', 'PagesController@delete_producto')->name('delete_producto')->middleware('session');
Route::post('/insert_articulo', 'PagesController@insert_articulo')->name('insert_articulo')->middleware('session');
Route::post('/delete_articulo', 'PagesController@delete_articulo')->name('delete_articulo')->middleware('session');


Route::get('prueba', function(){
    $pdf = App::make('dompdf.wrapper');
    $pdf->loadHTML('<h1>probando</h1>');
    return $pdf->stream();

});


Route::post('prueba2','PagesController@prueba2')->name('prueba2');
Route::post('genera_word','PagesController@genera_word')->name('genera_word');
