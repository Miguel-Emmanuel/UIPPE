<?php

namespace App\Http\Controllers;

use App\Models\Areas;
use Illuminate\Http\Request;
use illuminate\Support\Str;

class AreasController extends Controller
{
    public function show()
    {
        $areas = Areas::all();
        return view("areas.index")
        ->with(['areas' => $areas]);
    }
    public function index(){
        $areas = Areas::all();

        return view('areas.index')
        ->with(['areas' => $areas]);

    }
    public function store(Request $request){
        
        if($request -> file('foto')  !=  '')
        {
      $file = $request -> file ('foto');
      $foto1 = $file->getClientOriginalName();
      $dates = date('YmdHis');
      $foto2 = $dates . $foto1;
      \Storage::disk('local')->put($foto2, \File::get($file));
        }
        else{
          $foto2 = 'men.png';
        }
        Areas::create(array(
            'clave' => $request->input('clave'),
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'activo' => '1',
            'foto' => $foto2,
            //el registro queda nulo
            'registro' => $request->input('registro'),

         ));

        return redirect()->route("areas.index");
    }

}
