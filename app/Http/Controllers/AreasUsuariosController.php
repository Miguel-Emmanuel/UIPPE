<?php

namespace App\Http\Controllers;

use App\Models\Areas;
use App\Models\AreasUsuarios;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Expr\FuncCall;

class AreasUsuariosController extends Controller
{
    public function index(){
        $areausuario = AreasUsuarios::all();
        $areas =Areas::all();
        $usuarios = Usuarios::all();
        return view('areas-usuarios.index', compact('areausuario','areas','usuarios'));
    }

    public function store(Request $request){

        
        dd($request ->all());
        $areausuario = new AreasUsuarios();
 
        $areausuario -> area_id = $request -> area_id;
        $areausuario -> usuario_id = $request -> usuario_id;
        $areausuario -> activo = $request -> activo;

        $areausuario -> save(); 

       
        //return redirect()->route('areas-usuarios.index');

    }
}

