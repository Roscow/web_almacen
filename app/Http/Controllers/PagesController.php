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

    public function busqueda_producto(){ 
        //$prod_singular = App\Producto::findOrFail($id);        
        
        $proveedores = App\Proveedor::all();
        $productos = App\Producto::all();  
        $familia = App\Famila_producto::all();
        $tipo = App\Tipo_producto::all();     
        return view('menu_principal.stock.productos.busqueda_producto',compact('proveedores','familia','tipo','productos')); 
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


    //OTROS
    public function insert_tipo_producto(Request $request){
        //return $request->all();
        $nuevo_tipo = new App\Tipo_producto;
        $nuevo_tipo->tipo = $request->tipo;
        //$nuevo_tipo->id_tipo = 3;   eloquent autoincrementa solo
        $nuevo_tipo->save();
        return back();
    }

    
    public function insert_usuario(Request $request){
        //return $request->all();
        $nuevo_usuario = new App\Usuario;

        //$nuevo_usuario->id_user = increments();
        $nuevo_usuario->apellido1 = $request->apellido1;
        $nuevo_usuario->apellido2 = $request->apellido2;
        $nuevo_usuario->contraseña= '1234';
        $nuevo_usuario->correo = $request->correo;
        //$nuevo_usuario->dv = substr($request->rut,-1,1) ;
        $nuevo_usuario->dv = 'k';
        $nuevo_usuario->fecha_nacimiento = $request->fecha_nacimiento;
        $nuevo_usuario->id_tipo_user = 1;
        $nuevo_usuario->nombre1 = $request->nombre1;
        $nuevo_usuario->nombre2 = $request->nombre2;
        $nuevo_usuario->rut = $request->rut;
        $nuevo_usuario->telefono = $request->telefono;
        $nuevo_usuario->usser =  $request->nombre1;

        //$nuevo_tipo->id_tipo = 3;   eloquent autoincrementa solo
        $nuevo_usuario->save();
        return back();
    }



}
