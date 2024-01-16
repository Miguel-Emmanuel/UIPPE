<?php

namespace App\Http\Controllers;

use App\Models\Metas;
use App\Models\Programas;
use Illuminate\Http\Request;
use PDF;
use PhpOffice\PhpSpreadsheet\Writer\Ods\Meta;

class MetasController extends Controller
{
    public function index()
    {
        // Obtiene información sobre las metas y programas a través de una consulta SQL
        $metas = \DB::select('SELECT meta.id_meta, meta.clave, meta.nombre as nombreM, meta.descripcion, meta.unidadmedida, meta.programa_id, meta.activo, meta.id_registro, programa.nombre as nombreP, programa.abreviatura as nombrePA 
        FROM tb_metas as meta, tb_programas as programa
        WHERE meta.programa_id = programa.id_programa');
         // Recupera todos los programas activos
        $Programas = Programas::all()->where('activo', '>', '0');

        return view('metas.index', compact('metas'), compact('Programas'));
    }

    public function show()
    {
        // Obtiene todas las metas utilizando Eloquent y las pasa a la vista 'metas.index'
        $metas = Metas::all();
        return view('metas.index')
            ->with(['metas' => $metas]);
    }

    public function edit(Metas $id, Request $request)
    {
        // Determina el valor de 'activo' según la entrada del formulario
        $activo = 1;

        if($request -> input('activo') == ''){
            $activo = 0;
        }else if($request -> input('activo') == 'ON'){
            $activo = 1;
        }

        // Obtiene la meta existente y actualiza sus campos con los datos del formulario
        $query = Metas::find($id -> id_meta);
        $query -> clave = $request -> clave;
        $query -> nombre = trim($request -> nombre);
        $query -> descripcion = trim($request -> descripcion);
        $query -> unidadmedida = trim($request -> unidadmedida);
        $query-> programa_id = $request->programa_id;
        $query -> activo = $activo;
        $query -> id_registro = $request->registro;
        $query->save();

        return redirect('metas');
    }

    public function store(Request $request){

        //validación
        $rules = [
            'clave' => 'required',
            'nombre' => 'required',
            'unidadmedida' => 'required'
        ];

        //Mensaje perzonalizado para la validación
        $message = [
            'clave.required' => 'Las credenciales son invalidas',
            'nombre.required' => 'Las credenciales son invalidas',
            'unidadmedida.required' => 'Las credenciales son invalidas'
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
            'id_registro' => $request->input('registro'),
        ));

        return redirect('metas');
    }

    public function pdfm()
    {
        $metas= Metas::all();
        $pdf = PDF::loadView('Documentos.pdfm',['metas'=>$metas]);
        //----------Visualizar el PDF ------------------
        return $pdf->stream(); 
        // ------Descargar el PDF------
        //return $pdf->download('___libros.pdf');

    
    }

    public function destroy(Metas $id, Request $request)
    {
        $query = Metas::find($id->id_meta);
        $query -> activo = 0;
        $query -> id_registro = trim($request->registro);
        $query -> save();
        return redirect('metas');
    }
}