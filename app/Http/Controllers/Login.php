<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;

class Login extends Controller
{
    //

    public function login(){
        return view('login');
    }
    public function registrate(){
        return view('login');
        //aca va la vista de edugo!!
        //return view('register');

    }
    public function valida(Request $request){
        $email= $request->input('email');
        $pass= $request->input('pass');

        $consulta= Usuarios::where ('email', '=', $email)
        ->where('password', '=', $pass)
        ->get();

        if(count($consulta)==0 ){
            return view('login');

        }
        else{
            $request->session()->put('session_id',$consulta[0]->id_usuario);
            $request->session()->put('session_name',$consulta[0]->nombre);



$session_id = $request->session()->get('session_id');
$session_name = $request->session()->get('session_name');
            if($session_id == 1) {
                return view('dashboard.dashboard');
           }else{
            return view('login');

            }
                   }


        }
        }


