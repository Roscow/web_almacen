<?php


namespace App\Http\Controllers;
use App;
use DateTime;
use DateTimeZone;

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
        //validar el rut
        $request->validate([
            'rut' =>'required',
        ]);


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
        $new_cliente->rut =  str_replace(".", "", str_replace("-", "", $request->rut));
        $new_cliente->telefono = $request->telefono;
        $new_cliente->nombre1 = str_replace(" ", "_", $request->nombre1);
        $new_cliente->nombre2 = str_replace(" ", "_", $request->nombre2);
        $new_cliente->apellido1 = str_replace(" ", "_", $request->apellido1);
        $new_cliente->apellido2 = str_replace(" ", "_", $request->apellido2);
        //al ingresar una letra da error
        $new_cliente->correo = $request->correo;
        $new_cliente->dv = substr($request->rut,-1,1);
        $new_cliente->fecha_nacimiento = $request->fecha_nacimiento;
        $new_cliente->monto_deuda = 0;
        $new_cliente->id_direccion = $request->rut;
        $new_cliente->save();
        $mensaje = "Cliente ingresado con exito!";
        return view('menu_principal.cliente.cliente_crear', compact('comunas','regiones','mensaje'));

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
        $actualizar = true;
        return view('menu_principal.cliente.detalle_cliente', compact('clientes','regiones','comunas','abonos','fiados','monto_actual','rut','actualizar'));
        //return $abonos;

    }

    public function abonar(Request $request){
        $rut= $request->rut;
        $cliente_aux = App\Cliente::where('rut','=',$rut)->get();
        $clientes = App\Cliente::all();
        $deuda = $cliente_aux[0]->monto_deuda;

        //verificar que no se pueda ingresar abono si es mayor que la deuda
        if( $request->monto > $deuda){
            $mensaje = "Error, abono es mayor que la deuda";
            return view('menu_principal.cliente.cliente_fiados', compact('clientes','mensaje'));
        }
        else{
            $new_abono = new app\Abono;
            $now = new DateTime();
            $now->setTimezone(new DateTimeZone('America/Santiago'));
            $new_abono->fecha_pago = $now ;
            $new_abono->rut_cliente = $request->rut;
            $new_abono->monto = $request->monto;
            $new_abono->save();
            //hacer descuento en el monto del cliente
            $cliente_aux[0]->monto_deuda = ($cliente_aux[0]->monto_deuda - $new_abono->monto);
            $cliente_aux[0]->save();
            $mensaje = "Abono ingresado con exito!";
            return view('menu_principal.cliente.cliente_fiados', compact('clientes','mensaje'));
        }
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
        $actualizar = true;
        return view('menu_principal.cliente.edicion_cliente', compact('cliente','regiones','comunas','clientes','direccion','year','month','day','region','comuna','actualizar'));
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
         $actualizar = true;
         return view('menu_principal.usuario.edicion_usuario', compact('usuario','usuarios','year','month','day','actualizar'));

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
         $usuario[0]->id_tipo_user = $request->id_tipo_user=='on' ? 0:1;
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
        $nuevo_usuario->id_tipo_user = $request->id_tipo_user=='on' ? 0:1;
        //$nuevo_usuario->nombre1 = $request->nombre1;
        //$nuevo_usuario->nombre2 = $request->nombre2;
        //$nuevo_usuario->apellido1 = $request->apellido1;
        //$nuevo_usuario->apellido2 = $request->apellido2;
        $nuevo_usuario->rut = str_replace(".","", str_replace("-","", $request->rut));
        $nuevo_usuario->telefono = $request->telefono;
        $nuevo_usuario->usser =  $request->nombre1;
        //$nuevo_tipo->id_tipo = 3;   eloquent autoincrementa solo
        $nuevo_usuario->save();
        $mensaje = "Usuario ingresado con exito!";
        return view('menu_principal.usuario.usuario_crear', compact('mensaje'));
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
        $mensaje = "Nuevo rubro añadido correctamente!!";
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
         $mensaje = "Proveedor ingresado correctamente";
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
        $actualizar = true;
        return view('menu_principal.proveedor.edicion_proveedor', compact('proveedores','regiones','comunas','region','comuna', 'direccion', 'rubros', 'actualizar'));
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
        //$regiones = App\Region::all();
        //$comunas = App\Comuna::all();
        return view('menu_principal.pedidos.pedidos_agregar', compact('proveedores'));
    }

    public function seleccionProducto(Request $request){
        $proveedor = App\Proveedor::where('razon_social','=',$request->razon_social)->get();
        $nombreEmpresa= $request->razon_social;
        $codigo_proveedor =  $proveedor[0]->rut_empresa;
        $productos = App\Producto::where('rut_empresa','=',$codigo_proveedor)->get();
        $proveedores = App\Proveedor::all();

        $listado= array();
        if( $request->valorArray == null){
            //array_push($listado, $listado['valor1']=>$request->cantidad);
        }
        else{
            $listado= unserialize($request->valorArray);
            //array_push($listado, $request->NombreProducto);
             if (isset($listado[$request->NombreProducto])) {
                 $listado[$request->NombreProducto]= $request->cantidad + $listado[$request->NombreProducto];
              }else{
                $listado[$request->NombreProducto]= $request->cantidad;
              }
        }
        $actualizar = true;
        return view('menu_principal.pedidos.seleccionProducto',compact('proveedores','productos','nombreEmpresa','listado','actualizar') );
    }


    public function creacionPedido(Request $request){
        //obtengo listado de productos y cantidades
         $now = new DateTime();
         $now->setTimezone(new DateTimeZone('America/Santiago'));

        $listado = unserialize($request->valorArray2);
        error_log( print_r($listado, true));

        //creacion de pedido
        $new_pedido = new App\Pedido;
        $empresa = App\Proveedor::where('razon_social','=',$request->nombreEmpresa)->get();
        $new_pedido->rut_empresa = $empresa[0]->rut_empresa;
        $new_pedido->fecha_creacion = $now;
        //$new_pedido->fecha_creacion = date_create('2020-2-15') ;

        $pedidos = App\Pedido::where('rut_empresa','=',$empresa[0]->rut_empresa)->get();
        $new_pedido->id_estado = 1;
        $new_pedido->id_pedido = $new_pedido->rut_empresa . count($pedidos). date('dmY')  ;
        //$new_pedido->id_pedido = $new_pedido->rut_empresa . date_format(date_create('2020-2-15'),'dmY') ;
        $suma= 0;
        //creacion de lineas de detalle de  pedido
        foreach($listado as $index =>$item ){
            $detalle_pedido = new App\Detalle_pedido;
            $detalle_pedido->id_pedido = $new_pedido->id_pedido;
            $producto = App\Producto::where('nombre','=',$index)->get();
            $detalle_pedido->codigo_producto = $producto[0]->codigo_producto;
            $detalle_pedido->cantidad = $item;
            $detalle_pedido->costo_linea =  $item * $producto[0]->precio_compra;
            $suma = $suma + $detalle_pedido->costo_linea;
            //ES NECESARIO AGREGAR LOS ESTADOS EN LA TABLA PARA VER CUAL DEFINIR AQUI  Y QUE HACER CON FECHA RECEPCION
            $detalle_pedido->id_estado = 1;
            $detalle_pedido->fecha_recepcion = $now;
            //return $detalle_pedido;
            $detalle_pedido->save();
        }
        //return $new_pedido;
        $new_pedido->costo_total = $suma;
        $new_pedido->save();
        //return $suma;
        $mensaje = "Pedido Realizado Correctamente";
        $proveedores = App\Proveedor::all();

        return view('menu_principal.pedidos.pedidos_agregar', compact('proveedores','mensaje'));
    }

    public function pedidos_recepcionar(){
        $proveedores = App\Proveedor::all();
        return view('menu_principal.pedidos.pedidos_recepcionar', compact('proveedores'));
    }

    public function seleccionPedido(Request $request){
        $proveedor = App\Proveedor::where('razon_social','=',$request->razon_social)->get();
        $pedidos = App\Pedido::where('rut_empresa','=',$proveedor[0]->rut_empresa)->get();
        $proveedores = App\Proveedor::all();
        $actualizar1 = true;
        return view('menu_principal.pedidos.seleccionPedido', compact('proveedores','pedidos','actualizar1' ));
    }

    public function recepcionPedido(Request $request){
        $id = $request->idpedido;
        $pedido = App\Pedido::where('id_pedido','=',$id)->get();
        $pedidoSelect = $pedido[0];
        //$proveedor = App\Proveedor::where('razon_social','=',$request->razon_social)->get();
        $pedidos = App\Pedido::all();
        $detalle_pedido = App\Detalle_pedido::where('id_pedido','=',$id)->get();
        $proveedores = App\Proveedor::all();
        $productos = App\Producto::all();
        $estados = App\Estado_orden::all();
        $actualizar1 = true;
        $actualizar2 = true;
        return view('menu_principal.pedidos.recepcionPedido', compact('proveedores','pedidos','pedidoSelect','detalle_pedido','productos','estados', 'actualizar1', 'actualizar2'));
        //return $pedidoSelect;
    }


    public function recepcionar(Request $request){
        $pedidoSelect = App\Pedido::where('id_pedido','=',$request->idPedido)->get();
        $detallesPedidos = App\Detalle_pedido::where('id_pedido','=',$pedidoSelect[0]->id_pedido)->get();
        $arrayCompleto = $request;

        $incompleto = false;
        foreach($detallesPedidos as $item){
            $lineaDetalle = App\Detalle_pedido::where('id_pedido','=',$pedidoSelect[0]->id_pedido)
                                                ->where ('codigo_producto','=',$item->codigo_producto)
                                                ->get();

            //comparo lo que recepcione con lo que deberia haber rececionado
            if($arrayCompleto[$lineaDetalle[0]->codigo_producto]  >= $lineaDetalle[0]->cantidad ){
                //se cambia el estado a recibido
                $estado = App\Estado_orden::where('estado','=','Recibido')->get();
                $idAux = $estado[0]->id_estado;
                $lineaDetalle[0]->id_estado = $idAux;
                $lineaDetalle[0]->save();
                //return   $arrayCompleto[$lineaDetalle[0]->codigo_producto]. ' es mayo o igual q '.$lineaDetalle[0]->cantidad .' id es '.$lineaDetalle[0]->id_estado ;
            }else{
                 //se cambia el estado a incompleto
                 $estado = App\Estado_orden::where('estado','=','Incompleto')->get();
                 $idAux = $estado[0]->id_estado;
                 $lineaDetalle[0]->id_estado = $idAux;
                 $lineaDetalle[0]->save();
                 $incompleto = true;
                //return   $arrayCompleto[$lineaDetalle[0]->codigo_producto]. ' es menor q '.$lineaDetalle[0]->cantidad.' id es '. $lineaDetalle[0]->id_estado ;
            }

            //agregar el stock
        }

        if($incompleto){
            $estado = App\Estado_orden::where('estado','=','Incompleto')->get();
            $pedidoSelect[0]->id_estado = $estado[0]->id_estado;
            $pedidoSelect[0]->save();
        }else{
            $estado = App\Estado_orden::where('estado','=','Recibido')->get();
            $pedidoSelect[0]->id_estado = $estado[0]->id_estado;
            $pedidoSelect[0]->save();
        }

        $proveedores = App\Proveedor::all();
        $mensaje = "Proceso de Recepcion Realizada";
        return view('menu_principal.pedidos.pedidos_recepcionar', compact('proveedores', 'mensaje'));
    }




    public function mostrarPedidos(Request $request){
        $proveedores = App\Proveedor::all();
        $empresa = App\Proveedor::where('razon_social','=',$request->razon_social)->get();
        $pedidos = App\Pedido::where('rut_empresa','=',$empresa[0]->rut_empresa )->get();
        $detalle_pedidos = App\Detalle_pedido::all();
        $productos = App\Producto::all();
        //return view('menu_principal.pedidos.pedidos_recepcionar', compact('proveedores'));
        //return $pedidos;
        $estados = App\Estado_orden::all();
        return view('menu_principal.pedidos.listadoPedidos', compact('proveedores','pedidos','detalle_pedidos','productos','estados'));
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
        $productos = App\Producto::all();
        return view('menu_principal.stock.articulos.articulo_agregar', compact('regiones','comunas','proveedores','productos'));
    }


    public function insert_articulo(Request $request){
        $contador= $request->cantidad;
        $producto= App\Producto::where('nombre','=',$request->producto)->get();

        $date=date_create($request->vencimiento);

        error_log('id_articulo : '. $producto[0]->codigo_producto.''.date_format($date,"Ymd"));

        $articulo_query = App\Articulo::where('id_articulo','=',$producto[0]->codigo_producto.''.date_format($date,"Ymd"))->get();

        if(count($articulo_query) == 0){
            $articulo = new App\Articulo;
            $articulo->id_articulo = $producto[0]->codigo_producto.''.date_format($date,"Ymd");
            $articulo->fecha_vencimiento = $request->vencimiento;
            $articulo->id_producto = $producto[0]->codigo_producto;
            $articulo->save();
        }

        $producto[0]->stock = ($producto[0]->stock + $request->cantidad);
        $producto[0]->save();

        $mensaje = "Articulos agregados";
        $proveedores = App\Proveedor::all();
        $regiones = App\Region::all();
        $comunas = App\Comuna::all();
        $productos = App\Producto::all();
        return view('menu_principal.stock.articulos.articulo_agregar', compact('mensaje','regiones','comunas','proveedores','productos'));
    }

    public function articulo_eliminar(){
        $proveedores = App\Proveedor::all();
        return view('menu_principal.stock.articulos.articulo_eliminar', compact('proveedores'));
    }

    public function delete_articulo(Request $request){
        $articulo = App\Articulo::where('id_articulo','=',$request->id_articulo)->get();
        $mensaje='Articulo eliminado';
        $proveedores = App\Proveedor::all();
        $articulo[0]->delete();
        return view('menu_principal.stock.articulos.articulo_eliminar', compact('mensaje','proveedores'));

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

    public function edicion_producto(Request $request){
        $proveedores = App\Proveedor::all();
        $productos = App\Producto::all();
        $producto = App\Producto::where ('nombre', $request->producto)->get();
        $familias = App\Famila_producto::all();
        $tipos = App\Tipo_producto::all();
        $actualizar = true;
        return view('menu_principal.stock.productos.edicion_producto', compact('proveedores','familias','tipos','productos','producto', 'actualizar'));
    }

    public function actualizar_producto(Request $request){
        $producto = App\Producto::where ('nombre','=', $request->prod)->get();
        $producto[0]->nombre = $request->nombre;
        $producto[0]->descripcion = $request->descripcion;
        $producto[0]->precio_compra = $request->precio_compra;
        $producto[0]->precio_venta = $request->precio_venta;
        $producto[0]->stock = $request->stock;
        $producto[0]->stock_critico = $request->stock_critico;

        error_log('$request->tipo : ' .  $request->tipo);
        $nombre_tipo = $request->tipo;
        $tipo =  App\Tipo_producto::where ('tipo',$nombre_tipo)->get();
        $producto[0]->id_tipo = $tipo[0]->id_tipo;

        error_log('$request->familia : ' .  $request->familia);
        $nombre_familia = $request->familia;
        $familia =  App\Famila_producto::where ('familia',$request->familia)->get();
        $producto[0]->id_familia = $familia[0]->id_familia;

        error_log(' $request->proveedor : ' .   $request->proveedor);
        $nombre_proveedor = $request->proveedor;
        $proveedor =  App\Proveedor::where ('razon_social', $request->proveedor)->get();
        $producto[0]->rut_empresa= $proveedor[0]->rut_empresa;
        $producto[0]->save();

        $proveedores = App\Proveedor::all();
        $productos = App\Producto::all();

        $mensaje = "Sus cambios han sido realizado con exito!";
        //return view('menu_principal.proveedor.proveedor_editar', compact('proveedores','regiones','comunas','rubros', 'mensaje'));
        //return view('menu_principal.stock.productos.edicion_producto', compact('proveedores','familia','tipo','productos'));

        return view('menu_principal.stock.productos.producto_modificar', compact('mensaje','proveedores','productos'));

    }


    public function busqueda_producto(Request $request){
        $prod_nombre = $request->nombre;
        $producto = App\Producto::where('nombre',$prod_nombre)->get();
        $contador = count($producto);
        if( $contador== 0){
            $mensaje="No hay coincidencias";
            return view('menu_principal.stock.productos.producto_mostrar',compact('mensaje'));
        }
        if( $contador != 0){
            return view('menu_principal.stock.productos.busqueda_producto',compact('producto'));
        }
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
        $productos = App\Producto::all();
        $mensaje = "Se ha creado un nuevo tipo de producto";
        return view('menu_principal.stock.productos.producto_agregar',compact('mensaje','proveedores','familias','tipos','productos'));

    }

    public function insert_familia_producto(Request $request){
        $nueva_familia = new App\Famila_producto;
        $nueva_familia->familia = $request->familia;
        $nueva_familia->save();
        $proveedores = App\Proveedor::all();
        $familias = App\Famila_producto::all();
        $tipos = App\Tipo_producto::all();
        $productos = App\Producto::all();
        $mensaje = "Se ha creado una nueva familia de producto";
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

       //Saca los 3 primeros digitos del rut empresa/*
        $new_prod->codigo_producto =   substr($proveedor[0]->rut_empresa, 0, 3)  .
                                        $familia[0]->id_familia .
                                        $tipo[0]->id_tipo ;

        $new_prod->save();
        $mensaje = "Producto  ingresado correctamente";
        $proveedores = App\Proveedor::all();
        $familias = App\Famila_producto::all();
        $tipos = App\Tipo_producto::all();
        return view('menu_principal.stock.productos.producto_agregar',compact('mensaje','proveedores','familias','tipos'));

    }

    public function delete_producto(Request $request){
        $producto = App\Producto::where('nombre','=',$request->producto)->get();
        $producto[0]->delete();
        $mensaje = "Producto eliminado correctamente";

        $productos = App\Producto::all();
        return view('menu_principal.stock.productos.producto_eliminar', compact('productos','mensaje'));

    }



    //FUNCIONES DE VENTAS
    public function ventas_agregar(Request $request){
        $clientes = App\Cliente::all();


        $ocarrito = new App\Carrito();
        $ocarrito->total = 0;
        $request->session()->put('ocarrito', $ocarrito);

        return view('menu_principal.ventas.ventas_agregar', compact('clientes'));
    }

    public function ventas_agregar_quitar($id, Request $request){
        $clientes = App\Cliente::all();

        $request->session()->get('ocarrito')->total = $request->session()->get('ocarrito')->total - ($request->session()->get('ocarrito')->items[$id]->precio_venta * $request->session()->get('ocarrito')->items[$id]->cantidad);
        unset($request->session()->get('ocarrito')->items[$id]);

        return view('menu_principal.ventas.ventas_agregar', compact('clientes'));
    }


    public function ventas_agregar_producto(Request $request){

        $clientes = App\Cliente::all();

        $articulo= App\Articulo::where('id_articulo','=',$request->codigo)->get();

        if(count($articulo) > 0){
            $producto =  App\Producto::where ('codigo_producto', $articulo[0]->id_producto)->get();
            if(count($producto) > 0){
                if($producto[0]->stock < $request->cantidad){
                    $error = "No existe stock disponible para realizar la venta. Stock actual del producto corresponde a ". $producto[0]->stock;
                    return view('menu_principal.ventas.ventas_agregar', compact('clientes', 'error'));
                }

                $ocarrito = $request->session()->get('ocarrito');

                if (isset($ocarrito->items[$articulo[0]->id_articulo])) {
                  $ocarrito->items[$articulo[0]->id_articulo]->cantidad = $ocarrito->items[$articulo[0]->id_articulo]->cantidad + $request->cantidad;
                }else{
                  $oitem = new App\CarritoItem();
                  $oitem->id = count($ocarrito->items);
                  $oitem->id_articulo =$articulo[0]->id_articulo;
                  $oitem->nombre =$producto[0]->nombre;
                  $oitem->descripcion =$producto[0]->descripcion;
                  $oitem->cantidad =$request->cantidad;
                  $oitem->precio_venta =$producto[0]->precio_venta;
                  $oitem->codigo_producto =$producto[0]->codigo_producto;
                  $ocarrito->items[$articulo[0]->id_articulo] = $oitem;
                }
                $ocarrito->total = $ocarrito->total + (intval($producto[0]->precio_venta) * intval($request->cantidad));

                $request->session()->put('ocarrito', $ocarrito);
                error_log( print_r($request->session()->get('ocarrito'), true));

                if($producto[0]->stock_critico >= $producto[0]->stock){
                    $mensaje = "Alerta de stock critco. Stock actual del producto corresponde a ". $producto[0]->stock;

                    return view('menu_principal.ventas.ventas_agregar', compact('clientes', 'mensaje'));
                }

                return view('menu_principal.ventas.ventas_agregar', compact('clientes'));

            }else{
                $error = "Producto Relacionado Articulo No Existe";

                return view('menu_principal.ventas.ventas_agregar', compact('clientes', 'error'));
            }
        }else{
            $error = "Articulo Ingresado No Existe";

            return view('menu_principal.ventas.ventas_agregar', compact('clientes', 'error'));
        }

    }

    public function ventas_agregar_confirmar(Request $request){
        $clientes = App\Cliente::all();

        // Validar Cliente de Venta Fiado
        if(strcmp($request->gridCheck, 'on') == 0){
            if(strcmp($request->idcliente, '') == 0){
                $error = "Es necesario seleccionar cliente, si la venta corresponde a Fiado";
                return view('menu_principal.ventas.ventas_agregar', compact('clientes', 'error'));
            }
        }

        // Obtener Datos de Ventas de Session
        $ocarrito =  $request->session()->get('ocarrito');
        $user = $request->session()->get('user');

        $usuario = App\Usuario::where('correo', $user)->get();

        $now = new DateTime();
        $now->setTimezone(new DateTimeZone('America/Santiago'));

        $new_venta = new App\Venta();
        $new_venta->fecha = $now;
        $new_venta->total = $ocarrito->total;
        $new_venta->vendedor = $usuario[0]->id_user;

        if($new_venta->save()){
            error_log('Fiado : ' . $request->gridCheck);
            if(strcmp($request->gridCheck, 'on') == 0){
                $new_fiado = new App\Fiado();
                $new_fiado->fecha_fiado = $now;
                $new_fiado->rut_cliente = $request->idcliente;
                $new_fiado->id_venta = $new_venta->id_venta;
                $new_fiado->total_fiado = $ocarrito->total;
                $new_fiado->save();

                $clFiado = App\Cliente::where('rut', $request->idcliente)->get();
                $clFiado[0]->monto_deuda = $clFiado[0]->monto_deuda + $ocarrito->total;
                $clFiado[0]->save();
            }

            foreach ($ocarrito->items as $items) {

                error_log('Producto Actualizacion Stock :');
                error_log( print_r($items, true));

                $producto =  App\Producto::where ('codigo_producto', $items->codigo_producto)->get();
                $producto[0]->stock= ($producto[0]->stock - $items->cantidad);
                $producto[0]->save();

                $new_detalle = new App\Detalle_venta();
                $new_detalle->id_venta = $new_venta->id_venta;
                $new_detalle->cantidad = $items->cantidad;
                $new_detalle->id_articulo = $items->id_articulo;
                $new_detalle->total_linea = ($items->precio_venta * $items->cantidad);
                $new_detalle->save();
            }

        }

        $mensaje = "Venta Realizada Correctamente...";
        $imprimir = true;

        return view('menu_principal.ventas.ventas_agregar', compact('clientes', 'mensaje', 'imprimir'));

    }

    public function ventas_anular_accion($id, $date){
        $proveedores = App\Proveedor::all();
        error_log('Id Anulacion : '. $id);
        $fecha = $date;
        error_log('Fecha : '. $fecha);

        $detalle_venta = App\Detalle_venta::where('id_venta', $id)->get();
        if(count($detalle_venta) > 0){
            foreach ($detalle_venta as $item) {

                error_log('id_articulo : '. $item->id_articulo);

                $articulo = App\Articulo::where('id_articulo', $item->id_articulo)->get();

                if(count($articulo) > 0){
                    error_log('id_producto : '. $articulo[0]->id_producto);
                    $producto = App\Producto::where('codigo_producto', $articulo[0]->id_producto)->get();
                    $producto[0]->stock = $producto[0]->stock + $item->cantidad;
                    $producto[0]->save();
                }

                $item->delete();

            }


        }

        $fiados = App\Fiado::where('id_venta', $id)->get();
        if(count($fiados) > 0){
            $fiados[0]->delete();
        }

        $ventas = App\Venta::where('id_venta', $id)->get();
        if(count($ventas) > 0){
            $ventas[0]->delete();
        }

        $ventas = App\Venta::whereDate('fecha','=', $fecha)->get();

        $resultado = array();

        if(count($ventas) > 0){

            foreach ($ventas as $item) {

                $usuario = App\Usuario::where('id_user', '=',$item->vendedor)->get();

                $new_reporte = new App\Reporte();
                $new_reporte->id_venta = $item->id_venta;
                $new_reporte->fecha = $item->fecha;
                $new_reporte->total = $item->total;
                $new_reporte->vendedor = $usuario[0]->nombre1. ' '. $usuario[0]->apellido1. ' '. $usuario[0]->apellido2;

                array_push($resultado, $new_reporte);

            }
        }

        $mensaje = "Anulacion realizada correctamente.";

        return view('menu_principal.ventas.ventas_anular', compact('proveedores', 'mensaje','resultado', 'fecha'));
    }

    public function ventas_anular_detalle(Request $request){
        $proveedores = App\Proveedor::all();
        error_log('Fecha Busqueda : '. $request->fecha);

        $fecha = $request->fecha;

        $ventas = App\Venta::whereDate('fecha','=', $request->fecha)->get();

        if(count($ventas) > 0){

            $resultado = array();
            foreach ($ventas as $item) {

                $usuario = App\Usuario::where('id_user', '=',$item->vendedor)->get();

                $new_reporte = new App\Reporte();
                $new_reporte->id_venta = $item->id_venta;
                $new_reporte->fecha = $item->fecha;
                $new_reporte->total = $item->total;
                $new_reporte->vendedor = $usuario[0]->nombre1. ' '. $usuario[0]->apellido1. ' '. $usuario[0]->apellido2;

                array_push($resultado, $new_reporte);

            }

            return view('menu_principal.ventas.ventas_anular', compact('proveedores', 'resultado', 'fecha'));
        }else{
            $mensaje = "No Existen Resultado para la busqueda...";
            return view('menu_principal.ventas.ventas_anular', compact('proveedores', 'mensaje', 'fecha'));

        }
    }

    public function ventas_anular(){
        $proveedores = App\Proveedor::all();
        return view('menu_principal.ventas.ventas_anular', compact('proveedores'));
    }

    public function ventas_ver_detalle(Request $request){
        $proveedores = App\Proveedor::all();
        error_log('Fecha Busqueda : '. $request->fecha);

        $ventas = App\Venta::whereDate('fecha','=', $request->fecha)->get();

        if(count($ventas) > 0){

            $resultado = array();
            foreach ($ventas as $item) {

                $usuario = App\Usuario::where('id_user', '=',$item->vendedor)->get();

                $new_reporte = new App\Reporte();
                $new_reporte->id_venta = $item->id_venta;
                $new_reporte->fecha = $item->fecha;
                $new_reporte->total = $item->total;
                $new_reporte->vendedor = $usuario[0]->nombre1. ' '. $usuario[0]->apellido1. ' '. $usuario[0]->apellido2;

                array_push($resultado, $new_reporte);

            }

            return view('menu_principal.ventas.ventas_ver', compact('proveedores', 'resultado'));
        }else{
            $mensaje = "No Existen Resultado para la busqueda...";
            return view('menu_principal.ventas.ventas_ver', compact('proveedores', 'mensaje'));

        }
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

	public function nuevo_reporte(){
        $yearActual = date('Y');
        $contador = 5;
        $resta=0;
        $listadoAños = array();
        while($contador > 0 ){
            array_push($listadoAños,($yearActual-$resta));
            $resta = $resta +1;
            $contador = $contador-1;
        }

        return view('menu_principal.nuevo_reporte' , compact('listadoAños'));
        //return $listadoAños;
    }

    public function reporte_ver(Request $request){
        $month= $request->month;
        $year= $request->year;
        $productos = App\Producto::all();
        //aqui generar las consultas
        // la de productos mas vendidos
        //$producMasVendido = App\Producto::where('id_user', '=',$item->vendedor)->get();
        $yearActual = date('Y');
        $contador = 5;
        $resta=0;
        $listadoAños = array();
        while($contador > 0 ){
            array_push($listadoAños,($yearActual-$resta));
            $resta = $resta +1;
            $contador = $contador-1;
        }

        //producto mas vendido
        $ventasPeriodo = App\Venta::whereYear('fecha',$year)
                                    ->whereMonth('fecha','=',$month)->get();
        $cantidadVentas = count($ventasPeriodo);
        
        //return 'cantidad ventas: ' .$cantidadVentas;

        $mesActual=date('m');
        $añoActual=date('Y');
        
        //articulos por vencer 
        $articulosPorVencer = App\Articulo::whereYear('fecha_vencimiento',$añoActual)
                                            ->whereMonth('fecha_vencimiento','=',$mesActual)->get();
        //productos con stock critico
        $stockCritico = App\Producto::whereRaw('stock <= stock_critico')->get();

        $listadoProdVendidos = array();
        //producto mas vendido
        /*
        foreach($ventasPeriodo as $vent){
            $detalle = App\Detalle_venta::where('id_venta','=',$vent->id_venta);
            foreach($detalle as $detVenta){               
                if (isset($listadoProdVendidos[$detVenta->id_articulo])==false){
                    $listadoProdVendidos[$detVenta->id_articulo]= $detVenta->cantidad;
                }
                else{
                    $listadoProdVendidos[$detVenta->id_articulo]= $listadoProdVendidos[$detVenta->id_articulo] + $detVenta->cantidad;
                }
            }
        }
        */

        //mejor vendedor
        $vendedores = App\Usuario::all();
        $listadoVentaVendedor = array();
        foreach($ventasPeriodo as $vent){
            foreach($vendedores as $vendrs){
                if($vent->vendedor == $vendrs->id_user ){
                    if( isset($listadoVentaVendedor[$vendrs->rut])==false ) {
                        $listadoVentaVendedor[$vendrs->rut]=1;
                    }
                    else{
                        $listadoVentaVendedor[$vendrs->rut]=$listadoVentaVendedor[$vendrs->rut] + 1 ;
                    }
                }
            }
        }

        return $listadoProdVendidos;
        //return view('menu_principal.reporte_ver', compact('year','month','listadoAños','cantidadVentas','articulosPorVencer','productos','stockCritico'));
    }


    public function prueba2(Request $request){
        $var = $request->inputHidden;
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($var);
        return $pdf->stream();
    }






}
