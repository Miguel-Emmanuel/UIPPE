<?php

namespace App\Http\Controllers;

use App\Models\Metas;
use App\Models\Programas;
use Illuminate\Http\Request;

class MetasController extends Controller
{
    public function index()
    {
        $metas = \DB::select('SELECT meta.id_meta, meta.clave, meta.nombre as nombreM, meta.descripcion, meta.unidadmedida, meta.programa_id, meta.activo, meta.id_registro, programa.nombre as nombreP, programa.abreviatura as nombrePA FROM tb_metas as meta, tb_programas as programa WHERE meta.programa_id = programa.id_programa');
        $Programas = Programas::all('id_programa', 'nombre','abreviatura');
        return view('metas.index', compact('metas'), compact('Programas'));
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
        $query -> unidadmedida = trim($request -> unidadmedida);
        $query-> programa_id = $request->programa_id;
        $query -> activo = $activo;
        $query->save();

        return redirect('metas');
    }

    public function store(Request $request){

        $rules = [
            'clave' => 'required',
            'nombre' => 'required',
            'unidadmedida' => 'required'
        ];

        $message = [
            'clave.required' => 'Es necesario colocar una clave',
            'nombre.required' => 'Es necesario colocar el nombre de la Meta',
            'unidadmedida.required' => 'Es necesario la Unidad de Medida para la Meta'
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
            'unidadmedida' => $request ->input('unidadmedida'),
            'programa_id' => $request->input('programa_id'),
            'activo' => $activo,
            'id_registro' => 1,
        ));

        return redirect('metas');
    }

    public function destroy(Metas $id)
    {
        $query = Metas::find($id->id_meta);
        $query -> activo = 0;
        $query -> save();
        return redirect('metas');
    }
}
