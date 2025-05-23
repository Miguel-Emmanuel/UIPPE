<?php

namespace App\Http\Controllers;

use App\Models\Programas;
use Illuminate\Http\Request;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProgramasExport;

class ProgramasController extends Controller
{
    //
    public function show()
    {
        // Obtiene todas los programas utilizando Eloquent y las pasa a la vista 'programas.index'
        $programas = Programas::all();
        return view("programas.index")
            ->with(['programas' => $programas]);
    }
    public function index()
    {
        // Obtiene información sobre los programas a través de una consulta SQL y las manda a la vista programas.index
        $programas = Programas::all();

        return view('programas.index')
            ->with(['programas' => $programas]);
    }
    public function store(Request $request)
    {
        //Reglas de Validación
        $rules = [
            'abreviatura' => 'required',
            'nombre' => 'required',
            'descripcion' => 'required'
        ];

       //Mensaje perzonalizado para la validación
        $message = [
            'abreviatura.required' => 'Las credenciales son invalidas',
            'nombre.required' => 'Las credenciales son invalidas',
            'descripcion.required' => 'Las credenciales son invalidas'
        ];

        $this->validate($request, $rules, $message);

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
        // Obtiene el programa existente basado en el identificador
        $query = Programas::find($id->id_programa);
        if ($request->input('activo') == '') {
            $activo = 0;
        } else if ($request->input('activo') == 'ON') {
            $activo = 1;
        } else {
            $activo = 1;
        }

        // Actualiza los campos del programa con los datos del formulario
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
    public function pdfp()
    {
            

        $programas= Programas::all();

        $pdf = PDF::loadView('Documentos.pdfp',['programas'=>$programas]);
        //----------Visualizar el PDF ------------------
       return $pdf->stream(); 
       // ------Descargar el PDF------
       //return $pdf->download('___libros.pdf');

    
    }
    public function export() 
    {
        return Excel::download(new ProgramasExport, 'programas.xlsx');
    }
}
