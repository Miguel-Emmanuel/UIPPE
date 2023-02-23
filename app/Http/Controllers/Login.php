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
    public function valida(Request $request){
        $email= $request->input('email');
        $pass= $request->input('pass');

        $consulta= Usuarios::where ('email', '=', $email)
        ->where('pass', '=', $pass)
        ->get();

        if(count($consulta)==0 or $consulta[0]->activo == '0'){
           return view('login');
        }
        else{


            return redirect()->route('register');}
        }
   }

}
