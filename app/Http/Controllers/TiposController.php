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
        $Tipos = Tipos::all();
        return view('Tipos.index', compact('Tipos'));
    
    }

    public function store(Request $request)
    {
        $rules = [
            'clave' => 'required',
            'nombre' => 'required',
            'descripcion' => 'required'
        ];

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
