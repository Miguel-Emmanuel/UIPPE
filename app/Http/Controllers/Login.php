<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
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

    public function valida(Request $request)
    {
        $email = $request->input('email');
        $pass = $request->input('pass');

        $consulta = Usuarios::where('email', '=', $email)
            ->where('pass', '=', $pass)
            ->get();

        if (count($consulta)==0 or $consulta[0]->activo == '0') {
            return redirect('login');
        } else {
            $request->session()->put('session_id', $consulta[0]->id_usuario);
            $request->session()->put('session_name', $consulta[0]->nombre.' '.$consulta[0]->app.' '.$consulta[0]->apm);
            $request->session()->put('session_apellido', $consulta[0]->app);
            $request->session()->put('session_tipo', $consulta[0]->id_tipo);
            $request->session()->put('session_foto', $consulta[0]->foto);

            $session_id = $request->session()->get('session_id');
            $session_name = $request->session()->get('session_name');
            $session_idTipo = $request->session()->get('session_tipo');

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

    public function cuser(){
        $user = Usuarios::all();
        return $user;   
    }
}
