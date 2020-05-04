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
Route::view('cliente_crear','menu_principal/cliente/cliente_crear')->name('cliente_crear');
Route::view('cliente_editar','menu_principal/cliente/cliente_editar')->name('cliente_editar');
Route::view('cliente_eliminar','menu_principal/cliente/cliente_eliminar')->name('cliente_eliminar');
Route::view('cliente_fiados','menu_principal/cliente/cliente_fiados')->name('cliente_fiados');


//views de menu pedidos
Route::view('pedidos_agregar','menu_principal/pedidos/pedidos_agregar')->name('pedidos_agregar');
Route::view('pedidos_recepcionar','menu_principal/pedidos/pedidos_recepcionar')->name('pedidos_recepcionar');
Route::view('pedidos_ver','menu_principal/pedidos/pedidos_ver')->name('pedidos_ver');


//views de menu proveedor
Route::view('proveedor_agregar','menu_principal/proveedor/proveedor_agregar')->name('proveedor_agregar');
Route::view('proveedor_agregar_rubro','menu_principal/proveedor/proveedor_agregar_rubro')->name('proveedor_agregar_rubro');
Route::view('proveedor_editar','menu_principal/proveedor/proveedor_editar')->name('proveedor_editar');
Route::view('proveedor_eliminar','menu_principal/proveedor/proveedor_eliminar')->name('proveedor_eliminar');
Route::view('proveedor_pedidos','menu_principal/proveedor/proveedor_pedidos')->name('proveedor_pedidos');



//views de menu stock
Route::view('menu_articulo','menu_principal/stock/menu_articulo')->name('menu_articulo');
Route::view('articulo_agregar','menu_principal/stock/articulos/articulo_agregar')->name('articulo_agregar');
Route::view('articulo_eliminar','menu_principal/stock/articulos/articulo_eliminar')->name('articulo_eliminar');

Route::view('menu_productos','menu_principal/stock/menu_productos')->name('menu_productos');
Route::view('producto_agregar','menu_principal/stock/productos/producto_Agregar')->name('producto_agregar');
Route::view('producto_eliminar','menu_principal/stock/productos/producto_eliminar')->name('producto_eliminar');
Route::view('producto_modificar','menu_principal/stock/productos/producto_modificar')->name('producto_modificar');
Route::view('producto_mostrar','menu_principal/stock/productos/producto_mostrar')->name('producto_mostrar');

Route::view('agregar_familia_producto','menu_principal/stock/stock_agregar_familia_producto')->name('agregar_familia_producto');
Route::view('agregar_tipo_producto','menu_principal/stock/stock_agregar_tipo_producto')->name('agregar_tipo_producto');


//views de menu usuario
Route::view('usuario_crear','menu_principal/usuario/usuario_crear')->name('usuario_crear');
Route::view('usuario_editar','menu_principal/usuario/usuario_editar')->name('usuario_editar');
Route::view('usuario_eliminar','menu_principal/usuario/usuario_eliminar')->name('usuario_eliminar');
Route::view('usuario_ver_todos','menu_principal/usuario/usuario_ver_todos')->name('usuario_ver_todos');


//views de menu ventas
Route::view('ventas_agregar','menu_principal/ventas/ventas_agregar')->name('ventas_agregar');
Route::view('ventas_anular','menu_principal/ventas/ventas_anular')->name('ventas_anular');
Route::view('ventas_ver','menu_principal/ventas/ventas_ver')->name('ventas_ver');
Route::view('ventas_ver_detalle','menu_principal/usuario/ventas/ventas_ver_detalle')->name('ventas_ver_detalle');

Route::post('recupera', 'LoginController@enviarRecupera')->name('recupera');


/* //otros views
Route::get('/', function () {
    return view('/base');
});
*/

/*
Route::get('/', function () {
    return view('templates/');
});
*/