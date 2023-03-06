<?php

namespace App\Http\Controllers;
use App\Models\Tipos;

use Illuminate\Http\Request;

class TiposController extends Controller
{
    public function index()
    {
        $Tipos = Tipos::all();
        return view('Tipos.index', compact('Tipos'));
    
    }

    public function store(Request $request)
    {
       
        Tipos::create(array(
            'clave' => $request->input('clave'),
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'activo' => 1,
            'id_registro' => 1 //$request->input('id_registro'),
        ));

        return redirect('tipos');
    }

    public function show($id)
    {
        $Tipos = Tipos::all();
        return view("lista_empleados")
            ->with(['tipos' => $Tipos]);
    }
}
