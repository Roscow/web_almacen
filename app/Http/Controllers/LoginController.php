<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }


    public function salirUsuario(Request $request)
    {
        error_log('Sesion Terminada Exitosamente. ');
     
        $mensaje = "Sesion Terminada Exitosamente....";

        $request->session()->forget('user');
        $request->session()->forget('type');
        $request->session()->flush();

        $request->session()->regenerate();
        
        return view('login', compact('mensaje')); 

    }

    public function validaUsuario(Request $request)
    {
        error_log('User Name ' . $request->input('email'));
        error_log('Password ' . $request->input('password'));

        error_log('Valida Usuario');

        $usuario = App\Usuario::where('correo','=', $request->input('email'))->get();                
        error_log('usuario ' . $usuario);

        if(count($usuario) > 0 && strcmp($usuario[0]->contraseña, $request->input('password')) == 0){

            $tipo_usuario = App\Tipo_usuario::where('id_tipo_user','=', $usuario[0]->id_tipo_user)->get();                
            error_log('tipo_usuario ' . $tipo_usuario);

            $clientes = App\Cliente::all();
           
            error_log('name: ' . $usuario[0]->nombre1);
            error_log('user: ' . $usuario[0]->correo);
            error_log('type: ' . $tipo_usuario[0]->tipo);

            $request->session()->put('name', $usuario[0]->nombre1);
            $request->session()->put('user', $usuario[0]->correo);
            $request->session()->put('type', $tipo_usuario[0]->tipo);

            $carrito = collect();
            $request->session()->put('carrito', $carrito);
            $carrito = array($request->session()->get('carrito'));
            error_log( print_r($carrito, true));
            $request->session()->put('total', 0);

            return view('menu_principal.ventas.ventas_agregar',  compact('clientes')); 

        }else{

            $error = "Acceso Denegado, Usuario o Contraseña Invalidas";

            return view('login', compact('error'));
        }    

    }

    public function enviarRecupera(Request $request)
    {
        error_log('User Name ' . $request->input('username'));
        error_log('Password ' . $request->input('password'));

        error_log('Envio Correo');
        $to_name = 'Usuario';
        $to_email = $request->input('username');
        $data = array('name'=>"Usuario", "url" => "http://localhost:8000/recuperar_password");

        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                    ->subject('Proceso Cambio de Password');
            $message->from('makarena.212@gmail.com','Los Yuyitos');
        });
        error_log('Termino Envio Correo');

        return view('login');

    }
}
