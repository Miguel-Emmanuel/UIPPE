<?php

namespace App\Http\Controllers;

use App\Models\Areas;
use Illuminate\Http\Request;
use illuminate\Support\Str;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AreasExport;



class AreasController extends Controller
{
  public function show()
  {
    $areas = Areas::all();
    return view("areas.index")
      ->with(['areas' => $areas]);
  }
  public function index()
  {
    $areas = Areas::all();

    return view('areas.index')
      ->with(['areas' => $areas]);
  }
  public function store(Request $request)
  {
    //  Validación START
    $rules =[
            'clave'=>'required',
            'nombre'=>'required',
            'descripcion'=>'required',
    ];

    $message =[
      'clave.required' => 'Las credenciales son invalidas',
      'nombre.required' => 'Las credenciales son invalidas',
      'descripcion.required' => 'Las credenciales son invalidas'
    ];

    $this->validate($request, $rules, $message);
    //  Validación END

    //  Asignación de fotos START
    if ($request->file('foto')  !=  '') {
      $file = $request->file('foto');
      $foto1 = $file->getClientOriginalName();
      $dates = date('YmdHis');
      $foto2 = $dates . $foto1;
      \Storage::disk('local')->put($foto2, \File::get($file));
    } else {
      $foto2 = 'cuervo.png';
    }
    //  Asignación de fotos END

    // ARRAY -> Se crea un array para asignar la foto al área correspondiente
    Areas::create(array(
      'clave' => $request->input('clave'),
      'nombre' => $request->input('nombre'),
      'descripcion' => $request->input('descripcion'),
      'foto' => $foto2,
      'activo' => '1',
      'id_registro' => $request->input('registro'),

    ));
    //ARRAY END
    return redirect('areas');
  }

  public function edit(Areas $id, Request $request)
  {
    $query = Areas::find($id->id_area);
      if ($request->file('foto') != '') {
        $file = $request->file('foto');

        $foto1 = $file->getClientOriginalName();
        $ldate = date('YmdHis');
        $foto2 = $ldate . $foto1;

        \Storage::disk('local')->put($foto2, \File::get($file));
    } else {
        $foto2 = $query-> foto;
    }

    $activo = 1;

    if ($request->input('activo') == '') {
      $activo = 0;
    } else if ($request->input('activo') == 'ON') {
      $activo = 1;
    }


    $query->clave = trim($request->clave);
    $query->nombre = trim($request->nombre);
    $query->descripcion = trim($request->descripcion);
    $query->foto = $foto2;
    $query->activo = $activo;
    $query->id_registro = trim($request->registro);
    $query->save();

    return redirect('areas');
  }

  public function destroy(Areas $id, Request $request)
    {
        $query = Areas::find($id->id_area);
        $query -> activo = 0;
        $query -> id_registro = trim($request->registro);
        $query -> save();
        return redirect('areas');
    }

    public function pdf()
    {


        $areas= Areas::all();

        $pdf = PDF::loadView('Documentos.pdf',['areas'=>$areas]);
        //----------Visualizar el PDF ------------------
       return $pdf->stream();
       // ------Descargar el PDF------
       // return $pdf->download('___libros.pdf');


    }
    public function export()
    {
        return Excel::download(new AreasExport, 'areas.xlsx');
    }

}
