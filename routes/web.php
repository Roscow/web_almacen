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
Route::view('nuevo_reportes','menu_principal/nuevo_reporte')->name('nuevo_reportes');

//views de menu cliente
Route::get('cliente_crear','PagesController@cliente_crear')->name('cliente_crear');
Route::get('cliente_editar','PagesController@cliente_editar')->name('cliente_editar');
Route::get('cliente_eliminar','PagesController@cliente_eliminar')->name('cliente_eliminar');
Route::get('cliente_fiados','PagesController@cliente_fiados')->name('cliente_fiados');
Route::get('edicion_cliente','PagesController@edicion_cliente')->name('edicion_cliente');
Route::get('detalle_cliente','PagesController@detalle_cliente')->name('detalle_cliente');
Route::post('edicion_cliente2','PagesController@edicion_cliente2')->name('edicion_cliente2');



//views de menu pedidos
Route::get('pedidos_agregar','PagesController@pedidos_agregar')->name('pedidos_agregar');
Route::get('pedidos_recepcionar','PagesController@pedidos_recepcionar')->name('pedidos_recepcionar');
Route::get('pedidos_ver','PagesController@pedidos_ver')->name('pedidos_ver');



//views de menu proveedor
Route::get('proveedor_agregar','PagesController@proveedor_agregar')->name('proveedor_agregar');
Route::get('proveedor_agregar_rubro','PagesController@proveedor_agregar_rubro')->name('proveedor_agregar_rubro');
Route::get('proveedor_editar','PagesController@proveedor_editar')->name('proveedor_editar');
Route::get('proveedor_eliminar','PagesController@proveedor_eliminar')->name('proveedor_eliminar');
Route::get('proveedor_pedidos','PagesController@proveedor_pedidos')->name('proveedor_pedidos');
Route::get('edicion_proveedor','PagesController@edicion_proveedor')->name('edicion_proveedor');
Route::get('detalle_proveedor_pedidos','PagesController@detalle_proveedor_pedidos')->name('detalle_proveedor_pedidos');



//views de menu stock

Route::get('menu_articulo','PagesController@menu_articulo')->name('menu_articulo');
Route::get('articulo_agregar','PagesController@articulo_agregar')->name('articulo_agregar');
Route::get('articulo_eliminar','PagesController@articulo_eliminar')->name('articulo_eliminar');

Route::get('menu_productos','PagesController@menu_productos')->name('menu_productos');
Route::get('producto_agregar','PagesController@producto_agregar')->name('producto_agregar');
Route::get('producto_eliminar','PagesController@producto_eliminar')->name('producto_eliminar');
Route::get('producto_modificar','PagesController@producto_modificar')->name('producto_modificar');
Route::get('producto_mostrar','PagesController@producto_mostrar')->name('producto_mostrar');
Route::get('edicion_producto','PagesController@edicion_producto')->name('edicion_producto');
Route::get('busqueda_producto','PagesController@busqueda_producto')->name('busqueda_producto');

Route::get('agregar_familia_producto','PagesController@agregar_familia_producto')->name('agregar_familia_producto');
Route::get('agregar_tipo_producto','PagesController@agregar_tipo_producto')->name('agregar_tipo_producto');




//views de menu usuario
Route::get('usuario_crear','PagesController@usuario_crear')->name('usuario_crear');
Route::get('usuario_ver_todos','PagesController@usuario_ver_todos')->name('usuario_ver_todos');
Route::get('usuario_eliminar','PagesController@usuario_eliminar')->name('usuario_eliminar');
Route::get('usuario_editar','PagesController@usuario_editar')->name('usuario_editar');
Route::get('edicion_usuario','PagesController@edicion_usuario')->name('edicion_usuario');


Route::get('ventas_agregar','PagesController@ventas_agregar')->name('ventas_agregar');
Route::get('ventas_anular','PagesController@ventas_anular')->name('ventas_anular');
Route::get('ventas_ver','PagesController@ventas_ver')->name('ventas_ver');
Route::get('ventas_ver_detalle','PagesController@ventas_ver_detalle')->name('ventas_ver_detalle');



//otras post
Route::post('recupera', 'LoginController@enviarRecupera')->name('recupera');
Route::post('/', 'PagesController@insert_tipo_producto')->name('insert_tipo_producto');
Route::post('/', 'PagesController@insert_usuario')->name('insert_usuario');
Route::post('/', 'PagesController@insert_cliente')->name('insert_cliente');

