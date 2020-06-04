<?php

namespace App\Http\Controllers;
use App;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    

    
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
    

    public function insert_cliente(Request $request){        
        $regiones = App\Region::all();
        $comunas = App\Comuna::all();
        $new_direccion = new App\Direccion;
        $new_direccion->calle = $request->calle;
        $new_direccion->departamento = $request->departamento;
        //$new_direccion->id_comuna= $request->id_comuna;
        /*hacer un proceso para determinar el id con el nombre
        $var_comuna = App\Comuna::where("comuna","=",$request->comuna_nombre);
        $new_direccion->id_comuna= $var_comuna->id_comuna;
        */        
        error_log('selectComuna ' . $request->selectComuna);
        $new_direccion->id_comuna= $request->selectComuna;
        $new_direccion->numero = $request->numero;
        $new_direccion->id_direccion = $request->rut;
        $new_direccion->save();
        
        $new_cliente = new App\Cliente;        
        $new_cliente->rut = $request->rut;
        $new_cliente->telefono = $request->telefono;
        $new_cliente->nombre1 = str_replace(" ", "_", $request->nombre1);
        $new_cliente->nombre2 = str_replace(" ", "_", $request->nombre2);
        $new_cliente->apellido1 = str_replace(" ", "_", $request->nombre2);
        $new_cliente->apellido2 = str_replace(" ", "_", $request->apellido2);
        //al ingresar una letra da error
        $new_cliente->correo = $request->correo;
        $new_cliente->dv = substr($request->rut,-1,1);
        $new_cliente->fecha_nacimiento = $request->fecha_nacimiento;
        $new_cliente->monto_deuda = 0;
        $new_cliente->id_direccion = $request->rut;
        $new_cliente->save();
        $mensaje = "Cliente ingresado con exito!";
        return view('menu_principal.cliente.cliente_crear', compact('comunas','regiones','clientes','mensaje'));         

    }    

    public function actualizar_cliente(Request $request){        
        error_log('Rut Actualizar :' . $request->rut);
        $clientes = App\Cliente::where ('rut', $request->rut)->get();
        $clientes[0]->telefono = $request->telefono;
        $clientes[0]->nombre1 = str_replace(" ", "_", $request->nombre1);
        $clientes[0]->nombre2 = str_replace(" ", "_", $request->nombre2);
        $clientes[0]->apellido1 = str_replace(" ", "_", $request->apellido1);
        $clientes[0]->apellido2 = str_replace(" ", "_", $request->apellido2);        
        $clientes[0]->fecha_nacimiento = $request->fecha_nacimiento;    
        $clientes[0]->save();
        $direcciones = App\Direccion::where ('id_direccion', $request->rut)->get();
        $direcciones[0]->id_comuna = $request->selectComuna;
        $direcciones[0]->calle = $request->calle;
        $direcciones[0]->numero = $request->numeroCalle;
        $direcciones[0]->departamento = $request->depto;
        $direcciones[0]->save();
        $regiones = App\Region::all();
        $comunas = App\Comuna::all();
        $mensaje = "Sus cambios han sido realizado con exito!";
        return view('menu_principal.cliente.cliente_crear', compact('regiones','comunas', 'mensaje'));
        
    }

    
    public function detalle_cliente(Request $request){
        $var_nombre = explode(" ",$request->cliente);
        $clientes = App\Cliente::all();   
        $regiones = App\Region::all();
        $comunas = App\Comuna::all(); 
        $cliente = App\Cliente::where('nombre1','=', $var_nombre[0])
            ->where('nombre2','=',$var_nombre[1])
            ->where('apellido1','=',$var_nombre[2])
            ->where('apellido2','=',$var_nombre[3])->get(); 
        $rut = $cliente[0]->rut;
        $abonos = new app\Abono;
        $abonos = App\Abono::where('rut_cliente','=',$rut)->get();
        $fiados = new app\Fiado;
        $fiados = App\Fiado::where('rut_cliente','=',$rut)->get();
        $monto_actual = $cliente[0]->monto_deuda;
        return view('menu_principal.cliente.detalle_cliente', compact('clientes','regiones','comunas','abonos','fiados','monto_actual','rut')); 
        //return $abonos;

    }

    public function abonar(Request $request){        
        $rut= $request->rut;
        $clientes = App\Cliente::all();
        $new_abono = new app\Abono;
        //$new_abono->id_abono = 1;
        $new_abono->fecha_pago = $request->fecha ;
        $new_abono->rut_cliente = $request->rut;
        $new_abono->monto = $request->monto;
        $new_abono->save();
        //hacer descuento en el monto del cliente
        $cliente_aux = App\Cliente::where('rut','=',$rut)->get();
        $cliente_aux[0]->monto_deuda = ($cliente_aux[0]->monto_deuda - $new_abono->monto);
        $cliente_aux[0]->save();
        $mensaje = "abono ingresado con exito!";
        return view('menu_principal.cliente.cliente_fiados', compact('clientes','mensaje')); 
    }



    public function eliminar_cliente(Request $request){       
        $var_nombre = explode(" ",$request->cliente_list);        
        $cliente = App\Cliente::where('nombre1','=', $var_nombre[0])
                                ->where('nombre2','=',$var_nombre[1])
                                ->where('apellido1','=',$var_nombre[2])
                                ->where('apellido2','=',$var_nombre[3])->get(); 
                                $cliente[0]->delete(); 
        $mensaje = "Se ha eliminado cliente correctamente!";
        $regiones = App\Region::all();
        $comunas = App\Comuna::all();

        return view('menu_principal.cliente.cliente_crear', compact('regiones', 'comunas', 'mensaje')); 
        //return $var_nombre2;
    }
    
    public function edicion_cliente2(Request $request){
        //escript con problmas al generar espacios entre los campos necesario valida que no se ingresen espacios en los datos
        $var_nombre = explode(" ",$request->cliente);
        $cliente = new App\Cliente;
        $cliente = (App\Cliente::where('nombre1','=', $var_nombre[0])
                                ->where('nombre2','=',$var_nombre[1])
                                ->where('apellido1','=',$var_nombre[2])
                                ->where('apellido2','=',$var_nombre[3]))->get();
        //$regiones = App\Region::all();
        //$comunas = App\Comuna::all();     
        $direccion = App\Direccion::where ('id_direccion', $cliente[0]->id_direccion)->get();
        $comuna = App\Comuna::where ('id_comuna', $direccion[0]->id_comuna)->get();
        $region = App\Region::where ('id_region', $comuna[0]->id_region)->get(); 
        $regiones = App\Region::all();
        $comunas = App\Comuna::where ('id_region', $region[0]->id_region)->get();
        $clientes = App\Cliente::all(); 

        //setear la fecha
        $fecha= $cliente[0]->fecha_nacimiento;
        $fechaComoEntero = strtotime($fecha);
        $year = date("Y", $fechaComoEntero);
        $month = date("m", $fechaComoEntero);
        $day = date("d", $fechaComoEntero);
        //$var_rut  = App\Direccion::where('id_direccion','=','$cliente->rut')->get();  
        $var_rut= $cliente[0]->rut;
        $direccion = new App\Direccion;
        $direccion  = App\Direccion::where('id_direccion','=',$var_rut)->get() ;                       
        return view('menu_principal.cliente.edicion_cliente', compact('cliente','regiones','comunas','clientes','direccion','year','month','day','region','comuna'));         
        //return $fecha;
    }
    


    //funciones de usuarios
    public function usuario_eliminar(){      
        $usuarios = App\Usuario::all();        
        return view('menu_principal.usuario.usuario_eliminar', compact('usuarios')); 
    }


    public function eliminar_usuario(Request $request){       
        $var_nombre = explode(" ",$request->usuario_list);    
        $usuario = App\Usuario::where('nombre1','=', $var_nombre[0])
                                ->where('nombre2','=',$var_nombre[1])
                                ->where('apellido1','=',$var_nombre[2])
                                ->where('apellido2','=',$var_nombre[3])->get(); 
                                $usuario[0]->delete(); 
        $mensaje = "Se ha eliminado usuario correctamente!";
        $usuarios = App\Usuario::all();        
        return view('menu_principal.usuario.usuario_crear', compact( 'mensaje', 'usuarios')); 

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

    public function edicion_usuario(Request $request){   
        $usuarios = App\Usuario::all(); //necesario enviar la variable para que el bloque anterior lo use         
         //escript con problmas al generar espacios entre los campos necesario valida que no se ingresen espacios en los datos    
         error_log('usuario ' . $request->usuario);
         $var_nombre = explode(" ",$request->usuario);
         error_log('nombre1 ' . $var_nombre[0]);
         error_log('nombre2 ' . $var_nombre[1]);
         error_log('apellido1 ' . $var_nombre[2]);
         error_log('apellido2 ' . $var_nombre[3]);        
         $usuario = App\Usuario::where('nombre1','=', $var_nombre[0])
                                 ->where('nombre2','=',$var_nombre[1])
                                 ->where('apellido1','=',$var_nombre[2])
                                 ->where('apellido2','=',$var_nombre[3])->get();                
        error_log('usuario ' . $usuario);
         //setear la fecha
         $fecha= $usuario[0]->fecha_nacimiento;
         $fechaComoEntero = strtotime($fecha);
         $year = date("Y", $fechaComoEntero);
         $month = date("m", $fechaComoEntero);
         $day = date("d", $fechaComoEntero);
         return view('menu_principal.usuario.edicion_usuario', compact('usuario','usuarios','year','month','day'));         

    }

    public function actualizar_usuario(Request $request){   
        $usuarios = App\Usuario::all(); //necesario enviar la variable para que el bloque anterior lo use            
         error_log('id_tipo_user ' . $request->id_tipo_user);
         $usuario = App\Usuario::where ('id_user', $request->id_user)->get();
        //para no generar errores por variables con espacios    
         $usuario[0]->nombre1 = str_replace(" ", "_", $request->nombre1);
         $usuario[0]->nombre2 = str_replace(" ", "_", $request->nombre2);
         $usuario[0]->apellido1 = str_replace(" ", "_", $request->nombre2);
         $usuario[0]->apellido2 = str_replace(" ", "_", $request->apellido2);
         $usuario[0]->usser = $request->nombre1;
         $usuario[0]->correo = $request->correo;
         $usuario[0]->telefono = $request->numero;
         $usuario[0]->id_tipo_user = $request->id_tipo_user=='on' ? 1:0;
         $usuario[0]->fecha_nacimiento = $request->fecha_nacimiento;
         $usuario[0]->save();
         $usuarios = App\Usuario::all();  
         $mensaje = "Sus cambios han sido realizado con exito!";
         return view('menu_principal.usuario.usuario_crear', compact('usuarios','mensaje'));         

    }

    public function insert_usuario(Request $request){      
        error_log('selectrut' . $request->selectrut);
        $nuevo_usuario = new App\Usuario;
        //$nuevo_usuario->id_user = increments();
        //para no generar errores por variables con espacios
        $nuevo_usuario->nombre1  = str_replace(" ", "_", $request->nombre1);
        $nuevo_usuario->nombre2  = str_replace(" ", "_", $request->nombre2);
        $nuevo_usuario->apellido1  = str_replace(" ", "_", $request->apellido1);
        $nuevo_usuario->apellido2  = str_replace(" ", "_", $request->apellido2);
        
        $nuevo_usuario->contraseña= '1234';
        $nuevo_usuario->correo = $request->correo;
        $nuevo_usuario->dv = substr($request->rut,-1,1) ;
        //$nuevo_usuario->dv = 'k';
        $nuevo_usuario->fecha_nacimiento = $request->fecha_nacimiento;
        $nuevo_usuario->id_tipo_user = $request->id_tipo_user=='on' ? 1:0; //1 es admin 0 no lo es
        //$nuevo_usuario->nombre1 = $request->nombre1;
        //$nuevo_usuario->nombre2 = $request->nombre2;
        //$nuevo_usuario->apellido1 = $request->apellido1;
        //$nuevo_usuario->apellido2 = $request->apellido2;
        $nuevo_usuario->rut = $request->rut;
        $nuevo_usuario->telefono = $request->telefono;
        $nuevo_usuario->usser =  $request->nombre1;
        //$nuevo_tipo->id_tipo = 3;   eloquent autoincrementa solo
        $nuevo_usuario->save();
        $mensaje = "Usuario ingresado con exito!";
        return view('menu_principal.usuario.usuario_crear', compact('usuarios','mensaje'));         
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

    public function nuevo_rubro(Request $request){        
        $proveedores = App\Proveedor::all();  
        $new_rubro = new app\Rubro;
        $new_rubro->rubro = $request->rubro;
        $new_rubro->save();
        $mensaje = "nuevo rubro añadido correctamente!!";
        return view('menu_principal.proveedor.proveedor_agregar_rubro', compact('mensaje','proveedores')); 
    }
    

    public function proveedor_editar(){        
        $proveedores = App\Proveedor::all(); 
        $regiones = App\Region::all();
        $comunas = App\Comuna::all();       
        return view('menu_principal.proveedor.proveedor_editar', compact('regiones','comunas','proveedores')); 
    }

    
    public function insert_proveedor(Request $request){
        error_log('selectRubro ' .  $request->selectRubro);
        $new_direccion = new App\Direccion;
        $new_direccion->calle = $request->calle;
        $new_direccion->departamento = $request->depto;
        $new_direccion->id_comuna= $request->selectComuna;
        $new_direccion->numero = $request->numero;
        $new_direccion->id_direccion = $request->rut_empresa;
        $new_direccion->save();
 
         $nuevo_proveedor = new App\Proveedor;
         $nuevo_proveedor->rut_empresa = $request->rut_empresa;
         $nuevo_proveedor->razon_social = $request->razon_social;
         $nuevo_proveedor->telefono = $request->telefono;
         $nuevo_proveedor->correo = $request->correo;
         $nuevo_proveedor->codigo_postal = $request->codigo_postal;
         $nuevo_proveedor->id_rubro = $request->selectRubro;
         $nuevo_proveedor->nombre_contacto = $request->nombre_contacto;
         $nuevo_proveedor->id_direccion = $request->rut_empresa;
    
         $nuevo_proveedor->save();
         $mensaje = "proveedor ingresado correctamente";
         $proveedores = App\Proveedor::all(); 
        $regiones = App\Region::all();
        $comunas = App\Comuna::all();       
        $rubros = App\Rubro::all(); 
        return view('menu_principal.proveedor.proveedor_agregar', compact('mensaje','regiones','comunas','proveedores','rubros')); 
         //return view('menu_principal.proveedor.proveedor_agregar', compact('mensaje','proveedores')); 
         //return back();

    }

    public function proveedor_eliminar(Request $request){
        $proveedores = App\Proveedor::all(); 
        return view('menu_principal.proveedor.proveedor_eliminar', compact('proveedores')); 
    }

    public function proveedor_eliminar2(Request $request){
        error_log('Rut Actualizar :' . $request->proveedor_list);
        $proveedores = App\Proveedor::where('razon_social','=', $request->proveedor_list)->get();
        $proveedores[0]->delete();
         
        $proveedores = App\Proveedor::all(); 
        $regiones = App\Region::all();
        $comunas = App\Comuna::all();       
        $rubros = App\Rubro::all(); 
        $mensaje = "Se ha eliminado proveedor correctamente!!";
        return view('menu_principal.proveedor.proveedor_agregar', compact('regiones','comunas','proveedores','rubros', 'mensaje')); 
    }

    public function proveedor_pedidos(){
        $proveedores = App\Proveedor::all();
        return view('menu_principal.proveedor.proveedor_pedidos', compact('proveedores')); 
    }

    public function detalle_proveedor_pedidos(Request $request){
        $proveedores = App\Proveedor::all();
        $var_nombre =$request->proveedor;        
        $proveedor = App\Proveedor::where('razon_social','=', $var_nombre)->get();             
        $rut = $proveedor[0]->rut_empresa;
        $pedidos= new app\Pedido;
        $pedidos = App\Pedido::where('rut_empresa','=',$rut)->get();        
        $regiones = App\Region::all();
        $comunas = App\Comuna::all();
        $rubros = App\Rubro::all(); 
        //enviar detalle de pedidos que sean de ese proveedor
        $detalle = App\Detalle_pedido::all();
        $estados = App\Estado_orden::all();
        return view('menu_principal.proveedor.detalle_proveedor_pedidos', compact('proveedores','regiones','comunas','rubros','pedidos','detalle','estados')); 
    }

    public function edicion_proveedor(Request $request){            
        error_log('Rut Actualizar :' . $request->razon_social);
        $proveedores = new App\Proveedor();
        $proveedores = App\Proveedor::where('razon_social','=', $request->razon_social)->get();
        $direccion = App\Direccion::where ('id_direccion', $proveedores[0]->id_direccion)->get();
        $comuna = App\Comuna::where ('id_comuna', $direccion[0]->id_comuna)->get();
        $region = App\Region::where ('id_region', $comuna[0]->id_region)->get();
        $regiones = App\Region::all();
        $comunas = App\Comuna::where ('id_region', $region[0]->id_region)->get();
        $rubros = App\Rubro::all();
        return view('menu_principal.proveedor.edicion_proveedor', compact('proveedores','regiones','comunas','region','comuna', 'direccion', 'rubros')); 
    }

    public function actulizar_proveedor(Request $request){
   
        error_log('Rut Actualizar :' . $request->rut_empresa);
        $proveedores = App\Proveedor::where ('rut_empresa', $request->rut_empresa)->get();
        $proveedores[0]->rut_empresa = $request->rut_empresa;
        $proveedores[0]->razon_social = $request->razon_social;
        $proveedores[0]->telefono = $request->telefono;
        $proveedores[0]->correo = $request->correo;
        $proveedores[0]->codigo_postal = $request->codigo_postal; 
        $proveedores[0]->nombre_contacto = $request->nombre_contacto;   
        $proveedores[0]->save();
        $direcciones = App\Direccion::where ('id_direccion', $request->rut_empresa)->get();
        $direcciones[0]->id_comuna = $request->selectComuna;
        $direcciones[0]->calle = $request->calle;
        $direcciones[0]->numero = $request->numeroCalle;
        $direcciones[0]->departamento = $request->depto;
        $direcciones[0]->save();
        $proveedores = App\Proveedor::all(); 
        $regiones = App\Region::all();
        $comunas = App\Comuna::all();       
        $rubros = App\Rubro::all();
        $mensaje = "Sus cambios han sido realizado con exito!";       
        return view('menu_principal.proveedor.proveedor_editar', compact('proveedores','regiones','comunas','rubros', 'mensaje')); 
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
    

    public function agregar_tipo_producto(){
        $proveedores = App\Proveedor::all();
        return view('menu_principal.stock.stock_agregar_tipo_producto', compact('proveedores')); 
    }

    public function agregar_familia_producto(){
        $proveedores = App\Proveedor::all();
        return view('menu_principal.stock.stock_agregar_familia_producto', compact('proveedores')); 
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
        $familias = App\Famila_producto::all();
        $tipos = App\Tipo_producto::all();
        return view('menu_principal.stock.productos.producto_agregar', compact('familias','tipos','proveedores')); 
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

    public function insert_tipo_producto(Request $request){
        //return $request->all();
        $nuevo_tipo = new App\Tipo_producto;
        $nuevo_tipo->tipo = $request->tipo;
        //$nuevo_tipo->id_tipo = 3;   eloquent autoincrementa solo
        $nuevo_tipo->save();
        $proveedores = App\Proveedor::all();
        $familias = App\Famila_producto::all();
        $tipos = App\Tipo_producto::all();
        $mensaje = "se ha creado un nuevo tipo de producto";
        return view('menu_principal.stock.productos.producto_agregar',compact('mensaje','proveedores','familias','tipos','productos')); 

    }

    public function insert_familia_producto(Request $request){            
        $nueva_familia = new App\Famila_producto;
        $nueva_familia->familia = $request->familia;
        $nueva_familia->save();
        $proveedores = App\Proveedor::all();      
        $familias = App\Famila_producto::all();
        $tipos = App\Tipo_producto::all(); 
        $mensaje = "se ha creado una nueva familia de producto";
        return view('menu_principal.stock.productos.producto_agregar',compact('mensaje','proveedores','familias','tipos','productos')); 
    }

    public function insert_producto(Request $request){          
        $new_prod = new App\Producto;
        $new_prod->nombre = $request->nombre;
        $new_prod->precio_compra = $request->precio_compra;
        $new_prod->precio_venta = $request->precio_venta;
        $new_prod->stock = $request->stock;
        $new_prod->stock_critico = $request->stock_critico;
        $new_prod->descripcion = $request->descripcion;
        //ingresar los id no el nombre de los cbox

        $nombre_tipo = $request->tipo;
        $tipo =  App\Tipo_producto::where ('tipo',$nombre_tipo)->get();
        $new_prod->id_tipo = $tipo[0]->id_tipo;     

        $nombre_familia = $request->familia;
        $familia =  App\Famila_producto::where ('familia',$request->familia)->get();
        $new_prod->id_familia = $familia[0]->id_familia;

        $nombre_proveedor = $request->proveedor;
        $proveedor =  App\Proveedor::where ('razon_social', $request->proveedor)->get();
        $new_prod->rut_empresa= $proveedor[0]->rut_empresa;
         //creo el codigo por reglas de negocio modificar para q sean 3 caracteres
       /* $new_prod->codigo_producto =    substr($proveedor[0]->rut_empresa,1,1) . 
                                        substr($familia[0]->id_familia,1,1) . 
                                        '00000000' . 
                                        substr($tipo[0]->id_tipo,1,1) ;
       */
        $new_prod->codigo_producto =    $proveedor[0]->rut_empresa . 
                                        $familia[0]->id_familia .                                         
                                        $tipo[0]->id_tipo ;                                        

        $new_prod->save();        
        $mensaje = "producto  ingresado correctamente";
        $proveedores = App\Proveedor::all();
        $familias = App\Famila_producto::all();
        $tipos = App\Tipo_producto::all();
        return view('menu_principal.stock.productos.producto_agregar',compact('mensaje','proveedores','familias','tipos')); 

    }

    public function delete_producto(Request $request){
        $producto = App\Producto::where('nombre','=',$request->producto)->get();        
        $producto[0]->delete();
        $mensaje = "producto eliminado correctamente";

        $productos = App\Producto::all();
        return view('menu_principal.stock.productos.producto_eliminar', compact('productos','mensaje'));     
        
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


    //OTRAS

     //FUNCION OBTENER COMUNAS
     public function obtener_comunas(Request $request){  

        if ($request->ajax()) {
            $comunas = App\Comuna::where ('id_region', $request->id_region)->get();
            foreach ($comunas as $comuna) {
                $comunasArrays[$comuna->id_comuna] = $comuna->comuna;
            }

            return response()->json($comunasArrays);
        }

        return response()->json();
    }
    


   


   
}
