<?php

namespace App\Http\Controllers;

use App\Models\Programas;
use Illuminate\Http\Request;

class ProgramasController extends Controller
{
    //
    public function show()
    {
        $programas = Programas::all();
        return view("programas.index")
            ->with(['programas' => $programas]);
    }
    public function index()
    {
        $programas = Programas::all();

        return view('programas.index')
            ->with(['programas' => $programas]);
    }
    public function store(Request $request)
    {
        Programas::create(array(
            'abreviatura' => $request->input('abreviatura'),
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'activo' => 1,
            'id_registro' => $request->input('registro')
        ));
        return redirect()->route("programas.index");
    }

    public function edit(Programas $id, Request $request)
    {
        $query = Programas::find($id->id_programa);
        if ($request->input('activo') == '') {
            $activo = 0;
        } else if ($request->input('activo') == 'ON') {
            $activo = 1;
        } else {
            $activo = 1;
        }

        $query -> abreviatura = trim($request->abreviatura);
        $query -> nombre = trim($request->nombre);
        $query -> descripcion = trim($request->descripcion);
        $query -> activo = $activo;
        $query -> id_registro = trim($request->registro);

        $query->save();

        return redirect('programas');

    }

    public function destroy(Programas $id, Request $request)
    {
        $query = Programas::find($id->id_programa);
        $query -> activo = 0;
        $query -> id_registro = trim($request->registro);
        $query->save();
        return redirect('programas');
    }
}
