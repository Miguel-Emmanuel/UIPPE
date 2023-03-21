<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReestablecerPassword;
use Illuminate\Support\Facades\DB;

class Login extends Controller
{
    //

    public function login()
    {
        return view('sesiones/login');
    }

    public function registrate(Request $request){
        return view('sesiones.register');
    }

    public function recuperar()
    {
        //recuperar contrase!!
        return view('sesiones/recuperacion');
    }

    public function valida(Request $request)
    {
        $email = $request->input('email');
        $pass = $request->input('pass');

        $consulta = Usuarios::where('email', '=', $email)
            ->where('pass', '=', $pass)
            ->get();

        if (count($consulta) == 0) {
            return view('login');
        } else {
            $request->session()->put('session_id', $consulta[0]->id_usuario);
            $request->session()->put('session_name', $consulta[0]->nombre);
            $request->session()->put('session_apellido', $consulta[0]->app);



            $session_id = $request->session()->get('session_id');
            $session_name = $request->session()->get('session_name');
            //     if($session_id == 1) {
            //         return view('dashboard.dashboard');
            //    }else{
            //     return view('login');

            //     }
            return redirect('dashboard');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('login');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        //Queda pendiente la encriptación $input['password']=bcrypt($request->password);
        Usuarios::create($input);

        return redirect('login');
    }

    public function EnviarCorreo(Request $request){
        $email = $request->input('email');
        $consulta = Usuarios::where('email', '=', $email)
            ->get();

            $contacto = Usuarios::select('nombre')->where('email', '=', $email)
            ->get();

            if (count($consulta) == 0) {
                session()->flash('Error', 'Credenciales Incorrectas.');
                return redirect('recuperacion');
            } else {
                Mail::to($email)->send(new ReestablecerPassword($contacto));
                session()->flash('Exito', 'Revise su bandeja de entrada.');
                return redirect('recuperacion');
        }
    }

    public function reset()
    {
        //recuperar contrase!!
        return view('sesiones/reset');
    }
    public function resetpass(Request $request)
    {
        /*FUERA DE SERVICIO*/
        /*$email = $request->input('email');
        $consulta = Usuarios::where('email', '=', $email)->get();
        $pass1 = $request->input('pass1');
        $pass2 = $request->input('pass2');

        if (count($consulta) == 0) {
            session()->flash('Error', 'Credenciales Incorrectas.');
                return redirect('reset');
        } else{
            if($pass1 == $pass2){
                Usuarios::where('email', $email)->update(array('pass'=>$pass1,));
                session()->flash('Exito', 'La contraseña se ha reestablecido correctamente.');
                return redirect('/');
            }else{
                session()->flash('Error', 'Las contraseñas no coinciden.');
                return redirect('reset');
            }
            }*/
    }

    public function cuser(){
        $user = Usuarios::all();
        return $user;   
    }

    public function pcorreo(Request $request){
        /*MULTIPLES DESTINATARIOS*/ 
        /*$emails = ['eduhuwu@gmail.com', 'eduholvera@gmail.com'];*/

        /*Mail::send('mails.prueba', compact('data'), function($message) use ($emails){
            $message->to($emails)
                ->subject('nose');
            $message->from('hello@example.com', 'Eduardoh');
        });*/


        /*FORMULARIO*/
        /*$data = array(
            'destinatario'=> $request->input('destinatario'),
            'asunto'=> $request->input('asunto'),
            'mensaje'=> $request->input('mensaje'),
        );*/

        /*Mail::send('mails.prueba', compact('data'), function($message) use ($data){
            $message->to('admiuippe@gmail.com','Admin Uippe')
                ->subject($data['asunto']);
            $message->from('hello@example.com', 'Eduardoh');
        });*/


        //return view('mails.prueba', compact('data'));

        

        

        /*Mail::send('mails.prueba', compact('data'), function($message){
            $message->to('eduholvera@gmail.com', 'Eduardoh')
                ->subject('nose');
            $message->from('hello@example.com', 'Eduardo2');
        });*/

        
    }
}
