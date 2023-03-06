<?php

namespace App\Http\Controllers;

use App\Models\Metas;
use App\Models\Usuarios;
use Illuminate\Http\Request;

class MetasController extends Controller
{
    public function index()
    {
        $metas = Metas::all();
        return view('metas.index')
            ->with(['metas' => $metas]);
    }

    public function show()
    {
        $metas = Metas::all();
        return view('metas.index')
            ->with(['metas' => $metas]);
    }

    public function edit(Metas $id, Request $request)
    {
        $activo = 1;

        if($request -> input('activo') == ''){
            $activo = 0;
        }else if($request -> input('activo') == 'ON'){
            $activo = 1;
        }

        $query = Metas::find($id -> id_meta);
        $query -> clave = $request -> clave;
        $query -> nombre = trim($request -> nombre);
        $query -> descripcion = trim($request -> descripcion);
        $query -> activo = $activo;
        $query->save();

        return redirect('metas');
    }

    public function store(Request $request){

        $rules = [
            'clave' => 'required',
            'nombre' => 'required',
            'descripcion' => 'required',
        ];

        $message = [
            'clave.required' => 'Es necesario colocar una clave',
            'nombre.required' => 'Es necesario colocar el nombre de la Meta',
            'descripcion.required' => 'Es necesario una descripción acerca de la Meta'
        ];

        $this->validate($request, $rules, $message);

        $activo = 1;

        if($request -> input('activo') == ''){
            $activo = 0;
        }else if($request -> input('activo') == 'ON'){
            $activo = 1;
        }

        Metas::create(array(
            'clave' => $request->input('clave'),
            'nombre' => $request->input('nombre'),
            'descripcion' => $request -> input('descripcion'),
            'activo' => $activo,
            'id_registro' => 1,
        ));

        return redirect('metas');
    }

    public function destroy(Metas $id)
    {
        $id -> delete();
        return redirect('metas');
    }
}
