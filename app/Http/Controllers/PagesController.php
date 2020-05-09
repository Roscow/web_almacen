<?php

namespace App\Http\Controllers;
use App;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //

    
    //funciones de cliente

    public function cliente_crear(){
        $regiones = App\Region::all();
        $comunas = App\Comuna::all();
        return view('menu_principal.cliente.cliente_crear', compact('regiones','comunas')); 
    }

    public function cliente_editar(){
        $regiones = App\Region::all();
        $comunas = App\Comuna::all();
        $clientes = App\Cliente::all();
        return view('menu_principal.cliente.cliente_editar', compact('regiones','comunas','clientes')); 
    }

    public function cliente_eliminar(){        
        $clientes = App\Cliente::all();
        return view('menu_principal.cliente.cliente_eliminar', compact('clientes')); 
    }

    public function cliente_fiados(){        
        $clientes = App\Cliente::all();        
        return view('menu_principal.cliente.cliente_fiados', compact('clientes')); 
    }

    public function edicion_cliente(){        
        $clientes = App\Cliente::all();   
        $regiones = App\Region::all();
        $comunas = App\Comuna::all();     
        return view('menu_principal.cliente.edicion_cliente', compact('clientes','regiones','comunas')); 
    }

    public function detalle_cliente(){        
        $clientes = App\Cliente::all();   
        $regiones = App\Region::all();
        $comunas = App\Comuna::all();     
        return view('menu_principal.cliente.detalle_cliente', compact('clientes','regiones','comunas')); 
    }

    //funciones de usuarios
    public function usuario_eliminar(){        
        $usuarios = App\Usuario::all();        
        return view('menu_principal.usuario.usuario_eliminar', compact('usuarios')); 
    }

    public function usuario_editar(){        
        $usuarios = App\Usuario::all();        
        return view('menu_principal.usuario.usuario_editar', compact('usuarios')); 
    }

    public function usuario_crear(){        
        $usuarios = App\Usuario::all();        
        return view('menu_principal.usuario.usuario_crear', compact('usuarios')); 
    }

    public function usuario_ver_todos(){
        $usuarios = App\Usuario::all();
        return view('menu_principal.usuario.usuario_ver_todos', compact('usuarios')); 
    }

    public function edicion_usuario(){   
        $usuarios = App\Usuario::all(); //necesario enviar la variable para que el bloque anterior lo use     
        return view('menu_principal.usuario.edicion_usuario', compact('usuarios')); 
    }

    //FUNCIONES DE PROVEEDOR
    public function proveedor_agregar(){        
        $proveedores = App\Proveedor::all(); 
        $regiones = App\Region::all();
        $comunas = App\Comuna::all();       
        $rubros = App\Rubro::all(); 
        return view('menu_principal.proveedor.proveedor_agregar', compact('regiones','comunas','proveedores','rubros')); 
    }

    public function proveedor_agregar_rubro(){        
        $proveedores = App\Proveedor::all();        
        return view('menu_principal.proveedor.proveedor_agregar_rubro', compact('proveedores')); 
    }

    public function proveedor_editar(){        
        $proveedores = App\Proveedor::all(); 
        $regiones = App\Region::all();
        $comunas = App\Comuna::all();       
        return view('menu_principal.proveedor.proveedor_editar', compact('regiones','comunas','proveedores')); 
    }

    public function proveedor_eliminar(){
        $proveedores = App\Proveedor::all();
        return view('menu_principal.proveedor.proveedor_eliminar', compact('proveedores')); 
    }

    public function proveedor_pedidos(){
        $proveedores = App\Proveedor::all();
        return view('menu_principal.proveedor.proveedor_pedidos', compact('proveedores')); 
    }

    public function edicion_proveedor(){
        $proveedores = App\Proveedor::all();
        $regiones = App\Region::all();
        $comunas = App\Comuna::all();
        $rubros = App\Rubro::all(); 

        return view('menu_principal.proveedor.edicion_proveedor', compact('proveedores','regiones','comunas','rubros')); 
    }

    public function detalle_proveedor_pedidos(){
        $proveedores = App\Proveedor::all();
        $regiones = App\Region::all();
        $comunas = App\Comuna::all();
        $rubros = App\Rubro::all(); 

        return view('menu_principal.proveedor.detalle_proveedor_pedidos', compact('proveedores','regiones','comunas','rubros')); 
    }

    //FUNCIONES PEDIDOS
    public function pedidos_agregar(){        
        $proveedores = App\Proveedor::all(); 
        $regiones = App\Region::all();
        $comunas = App\Comuna::all();       
        return view('menu_principal.pedidos.pedidos_agregar', compact('regiones','comunas','proveedores')); 
    }

    public function pedidos_recepcionar(){
        $proveedores = App\Proveedor::all();
        return view('menu_principal.pedidos.pedidos_recepcionar', compact('proveedores')); 
    }

    public function pedidos_ver(){
        $proveedores = App\Proveedor::all();
        return view('menu_principal.pedidos.pedidos_ver', compact('proveedores')); 
    }

    //FUNCIONES STOCK
    public function menu_articulo(){
        $proveedores = App\Proveedor::all();
        return view('menu_principal.stock.articulos.menu_articulo', compact('proveedores')); 
    }

    public function menu_producto(){
        $proveedores = App\Proveedor::all();
        return view('menu_principal.stock.menu_producto', compact('proveedores')); 
    }

    public function agregar_familia_producto(){
        $proveedores = App\Proveedor::all();
        return view('menu_principal.stock.stock_agregar_familia_producto', compact('proveedores')); 
    }

    public function agregar_tipo_producto(){
        $proveedores = App\Proveedor::all();
        return view('menu_principal.stock.stock_agregar_tipo_producto', compact('proveedores')); 
    }

    public function articulo_agregar(){        
        $proveedores = App\Proveedor::all(); 
        $regiones = App\Region::all();
        $comunas = App\Comuna::all();       
        return view('menu_principal.stock.articulos.articulo_agregar', compact('regiones','comunas','proveedores')); 
    }

    public function articulo_eliminar(){
        $proveedores = App\Proveedor::all();
        return view('menu_principal.stock.articulos.articulo_eliminar', compact('proveedores')); 
    }

    public function producto_agregar(){
        $proveedores = App\Proveedor::all();
        $familia = App\Famila_producto::all();
        $tipo = App\Tipo_producto::all();
        return view('menu_principal.stock.productos.producto_agregar', compact('familia','tipo','proveedores')); 
    }
    public function producto_eliminar(){
        $productos = App\Producto::all();
        return view('menu_principal.stock.productos.producto_eliminar', compact('productos')); 
    }
    public function producto_modificar(){
        $proveedores = App\Proveedor::all();
        $productos = App\Producto::all();
        return view('menu_principal.stock.productos.producto_modificar', compact('proveedores','productos')); 
    }
    public function producto_mostrar(){
        $proveedores = App\Proveedor::all();
        return view('menu_principal.stock.productos.producto_mostrar', compact('proveedores')); 
    }

    public function edicion_producto(){ 
        $proveedores = App\Proveedor::all();
        $productos = App\Producto::all();  
        $familia = App\Famila_producto::all();
        $tipo = App\Tipo_producto::all();
        return view('menu_principal.stock.productos.edicion_producto', compact('proveedores','familia','tipo','productos')); 
    }

    //FUNCIONES DE VENTAS
    public function ventas_agregar(){
        $clientes = App\Cliente::all();
        return view('menu_principal.ventas.ventas_agregar', compact('clientes')); 
    }
    public function ventas_anular(){
        $proveedores = App\Proveedor::all();
        return view('menu_principal.ventas.ventas_anular', compact('proveedores')); 
    }
    public function ventas_ver_detalle(){
        $proveedores = App\Proveedor::all();
        return view('menu_principal.ventas.ventas_ver_detalle', compact('proveedores')); 
    }
    public function ventas_ver(){
        $proveedores = App\Proveedor::all();
        return view('menu_principal.ventas.ventas_ver', compact('proveedores')); 
    }

}
