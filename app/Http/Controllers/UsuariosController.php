<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use App\Models\Tipos;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Usuarios = Usuarios::all();
        $Tipos = Tipos::all('id','nombre');
        return view('Usuarios.index', compact('Usuarios'), compact('Tipos'));
    
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->file('foto')  !=  '') {
            $file = $request->file('foto');
            $foto1 = $file->getClientOriginalName();
            $dates = date('YmdHis');
            $foto2 = $dates . $foto1;
            \Storage::disk('local')->put($foto2, \File::get($file));
        } else {
            $foto2 = 'cuervo.png';
        }

      
        Usuarios::create(array(
            'clave' => $request->input('clave'),
            'nombre' => $request->input('nombre'),
            'app' => $request->input('app'),
            'apm' => $request->input('apm'),
            'gen' => $request->input('gen'),
            'fn' => $request->input('fn'),
            'academico' => $request->input('academico'),
            'foto' => $foto2,
            'email' => $request->input('email'),
            'pass' => "123123", //$request->input('pass'),
            'id_tipo' => $request->input('id_tipo'),
            'activo' => 1,
            'id_registro' => 1 //$request->input('id_registro'),
        ));

        return redirect('usuarios')->compact('tb_tipos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Usuarios = Usuarios::all();
        return view("lista_empleados")
            ->with(['usuarios' => $Usuarios]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Usuarios= Usuarios::findOrFail($id);
        // $input=$request->all();
        // $Usuarios->update($input);
        if ($request->file('foto')  !=  '') {
            $file = $request->file('foto');
            $foto1 = $file->getClientOriginalName();
            $dates = date('YmdHis');
            $foto2 = $dates . $foto1;
            \Storage::disk('local')->put($foto2, \File::get($file));
        } else {
            $foto2 = 'cuervo.png';
        }
        $Usuarios::update(array(
            'clave' => $request->input('clave'),
            'nombre' => $request->input('nombre'),
            'app' => $request->input('app'),
            'apm' => $request->input('apm'),
            'gen' => $request->input('gen'),
            'fn' => $request->input('fn'),
            'academico' => $request->input('academico'),
            'foto' => $foto2,
            'email' => $request->input('email'),
            'pass' => "123123", //$request->input('pass'),
            'id_tipo' => $request->input('id_tipo'),
            'activo' => 1,
            'id_registro' => 1 //$request->input('id_registro'),
        ));
        return redirect('usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}