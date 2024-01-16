<?php

namespace App\Http\Controllers;
use App\Models\Tipos;

use Illuminate\Http\Request;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TiposExport;
class TiposController extends Controller
{
    public function index()
    {
        // Obtiene información sobre la tabla tipos a través de una consulta SQL y las manda a la vista Tipos.index
        $Tipos = Tipos::all();
        return view('Tipos.index', compact('Tipos'));
    
    }

    public function store(Request $request)
    {
        //Reglas de validación
        $rules = [
            'clave' => 'required',
            'nombre' => 'required',
            'descripcion' => 'required'
        ];

        //Mensaje perzonalizado para la validación
        $message = [
            'clave.required' => 'Las credenciales son invalidas',
            'nombre.required' => 'Las credenciales son invalidas',
            'descripcion.required' => 'Las credenciales son invalidas'
        ];

        $this->validate($request, $rules, $message);
       
        Tipos::create(array(
            'clave' => $request->input('clave'),
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'activo' => 1,
            'id_registro' => $request->input('registro'),
        ));

        return redirect('tipos');
    }

    public function show($id)
    {
        // Obtiene todos los tipos de Usuarios utilizando Eloquent y las pasa a la vista lista_empleados
        $Tipos = Tipos::all();
        return view("lista_empleados")
            ->with(['tipos' => $Tipos]);
    }

    public function edit(Tipos $id, Request $request)
    {
        $query = Tipos::find($id->id);

    
        $activo = 1;

        if ($request->input('activo') == '') {
            $activo = 0;
        } else if ($request->input('activo') == 'ON') {
            $activo = 1;
        }

        // Obtiene el tipo de usuario existente y actualiza sus campos con los datos del formulario
        $query->clave = trim($request->clave);
        $query->nombre = trim($request->nombre);
        $query->descripcion = trim($request->descripcion);
        $query->activo = $activo;
        $query->id_registro = trim($request->registro);
        $query->save();

        return redirect('tipos');
    }

    public function destroy(Tipos $id, Request $request)
    {
        $query = Tipos::find($id->id);
        $query -> activo = 0;
        $query -> id_registro = trim($request->registro);
        $query -> save();
        return redirect('tipos');
    }

    public function pdft()
    {
            

        $tipos= Tipos::all();


        $pdf = PDF::loadView('Documentos.pdft',['tipos'=>$tipos]);
        //----------Visualizar el PDF ------------------
       return $pdf->stream(); 
       // ------Descargar el PDF------
       //return $pdf->download('___libros.pdf');

    
    }

    public function export() 
    {
        return Excel::download(new TiposExport, 'Tipos.xlsx');
    }

}
