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
     /*    $des = DB::table('tb_empleados')
        ->orderBy('id_empleado', 'desc')
        ->limit(1)
        ->get(); */
        return view("programas.index")
   /*      ->with(['id' => $des]) */
        ->with(['programas' => $programas]);
    }
    public function index(){
        $programas = Programas::all();

        return view('programas.index')
        ->with(['programas' => $programas]);

    }
    public function store(Request $request){
        Programas::create(array(
            'abreviatura' => $request->input('siglas'),
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'activo' => 1,
            //FALTA ===> id_registro
         ));
        return redirect()->route("programas.index");

    }
    public function destroy(Programas $programa){

        $programa->delete();
        return redirect()->route("programas.show");

     }
}
