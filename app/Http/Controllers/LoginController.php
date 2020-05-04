<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

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
