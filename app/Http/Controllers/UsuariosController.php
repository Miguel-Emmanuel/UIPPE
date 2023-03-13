<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use App\Models\Tipos;
use App\Models\User;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    
    public function index()
    {
        // $Usuarios = Usuarios::all();
        $Usuarios = \DB::select('SELECT usuario.id_usuario, usuario.clave, usuario.nombre as nombreU, usuario.app, usuario.apm, usuario.gen, usuario.fn, usuario.academico, usuario.foto, usuario.email,usuario.activo,usuario.id_tipo, tipo.nombre as nombreT FROM tb_usuarios as usuario, tb_tipos as tipo WHERE usuario.id_tipo = tipo.id');
        $Tipos = Tipos::all('id', 'nombre');
        return view('Usuarios.index', compact('Usuarios'), compact('Tipos'));
    }
   
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
            'id_registro' => $request->input('registro'),
        ));

        return redirect('usuarios');
    }

    public function show($id)
    {
        $Usuarios = Usuarios::all();
        return view("lista_empleados")
            ->with(['usuarios' => $Usuarios]);
    }

 
    public function edit(Usuarios $id, Request $request)
    {
        $query = Usuarios::find($id->id_usuario);

        if ($request->file('foto') != '') {
            $file = $request->file('foto');

            $foto1 = $file->getClientOriginalName();
            $ldate = date('YmdHis');
            $foto2 = $ldate . $foto1;

            \Storage::disk('local')->put($foto2, \File::get($file));
        } else {
            $foto2 = $query-> foto;
        }

        //dd($foto2);
    
        $activo = 1;

        if ($request->input('activo') == '') {
            $activo = 0;
        } else if ($request->input('activo') == 'ON') {
            $activo = 1;
        }

        
        $query->clave = trim($request->clave);
        $query->nombre = trim($request->nombre);
        $query->app = trim($request->app);
        $query->apm = trim($request->apm);
        $query->gen = trim($request->gen);
        $query->fn = trim($request->fn);
        $query->academico = trim($request->academico);
        $query->foto = $foto2;
        $query->email = trim($request->email);
        $query->id_tipo = $request->id_tipo;
        $query->activo = $activo;
        $query->id_registro = trim($request->registro);
        $query->save();

        return redirect('usuarios');
    }

    public function destroy(Usuarios $id, Request $request)
    {
        $query = Usuarios::find($id->id_usuario);
        $query -> activo = 0;
        $query -> id_registro = trim($request->registro);
        $query -> save();
        return redirect('usuarios');
    }
}
