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
Route::view('login','login');
Route::view('recuperar_password','recuperar_password')->name('recuperar_password');
Route::view('menu_principal','menu_principal');

//views de menu general
Route::view('menu_cliente','menu_principal/menu_cliente');
Route::view('menu_pedidos','menu_principal/menu_pedidos');
Route::view('menu_proveedor','menu_principal/menu_proveedor');
Route::view('menu_stock','menu_principal/menu_stock');
Route::view('menu_usuario','menu_principal/menu_usuario');
Route::view('menu_ventas','menu_principal/menu_ventas');
Route::view('menu_reportes','menu_principal/nuevo_reporte');


//views de menu cliente
Route::view('cliente_crear','menu_principal/cliente/cliente_crear');
Route::view('cliente_editar','menu_principal/cliente/cliente_editar');
Route::view('cliente_eliminar','menu_principal/cliente/cliente_eliminar');
Route::view('cliente_fiados','menu_principal/cliente/cliente_fiados');


//views de menu pedidos
Route::view('pedido_agregar','menu_principal/pedidos/pedidos_agregar');
Route::view('pedidos_recepcionar','menu_principal/pedidos/pedidos_recepcionar');
Route::view('pedidos_ver','menu_principal/pedidos/pedidos_ver');


//views de menu proveedor
Route::view('proveedor_agregar','menu_principal/proveedor/proveedor_agregar');
Route::view('proveedor_agregar_rubro','menu_principal/proveedor/proveedor_agregar_rubro');
Route::view('proveedor_editar','menu_principal/proveedor/proveedor_editar');
Route::view('proveedor_eliminar','menu_principal/proveedor/proveedor_eliminar');
Route::view('proveedor_pedidos','menu_principal/proveedor/proveedor_pedidos');



//views de menu stock
Route::view('menu_articulos','menu_principal/stock/menu_articulo');
Route::view('articulo_agregar','menu_principal/stock/articulos/articulo_agregar');
Route::view('articulo_eliminar','menu_principal/stock/articulos/articulo_eliminar');

Route::view('menu_productos','menu_principal/stock/menu_productos');
Route::view('producto_agregar','menu_principal/stock/productos/producto_Agregar');
Route::view('producto_eliminar','menu_principal/stock/productos/producto_eliminar');
Route::view('producto_modificar','menu_principal/stock/productos/producto_modificar');
Route::view('producto_mostrar','menu_principal/stock/productos/producto_mostrar');

Route::view('agregar_familia_producto','menu_principal/stock/stock_agregar_familia_producto');
Route::view('agregar_tipo_producto','menu_principal/stock/stock_agregar_tipo_producto');


//views de menu usuario
Route::view('usuario_crear','menu_principal/usuario/usuario_crear');
Route::view('usuario_editar','menu_principal/usuario/usuario_editar');
Route::view('usuario_eliminar','menu_principal/usuario/usuario_eliminar');
Route::view('usuario_ver_todos','menu_principal/usuario/usuario_ver_todos');


//views de menu ventas
Route::view('ventas_agregar','menu_principal/ventas/ventas_agregar');
Route::view('ventas_agregar','menu_principal/ventas/ventas_anular');
Route::view('ventas_ver','menu_principal/ventas/ventas_ver');
Route::view('ventas_ver_detalle','menu_principal/usuario/ventas/ventas_ver_detalle');




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