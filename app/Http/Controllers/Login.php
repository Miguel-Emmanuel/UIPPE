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

    public function registrate()
    {
        //aca va la vista de edugo!!
        return view('sesiones/register');
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
            $request->session()->put('session_apellido', $consulta[0]->apellido);



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
        $uwu = "holi";
        $email = $request->input('email');
        $consulta = Usuarios::where('email', '=', $email)
            ->get();

            $contacto = Usuarios::select('id_usuario')->where('email', '=', $email)
            ->get();

            if (count($consulta) == 0) {
                session()->flash('Error', 'El correo no ha sido asignado por UIPPE.');
                return redirect('recuperacion');
            } else {
                Mail::to($email)->send(new ReestablecerPassword($contacto));
                session()->flash('Exito', 'Revise su bandeja de entrada.');
                return redirect('recuperacion');
                //return new ReestablecerPassword($contacto);
        }
    }

    public function reset()
    {
        //recuperar contrase!!
        return view('sesiones/reset');
    }
    public function resetpass(Request $request)
    {
        $email = $request->input('email');
        $consulta = Usuarios::where('email', '=', $email)->get();
        $pass1 = $request->input('pass1');
        $pass2 = $request->input('pass2');

        if (count($consulta) == 0) {
            session()->flash('Error', 'El correo no ha sido asignado por UIPPE.');
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
            
        }
    }
}
