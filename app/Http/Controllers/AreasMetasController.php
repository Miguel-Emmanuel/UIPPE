<?php

namespace App\Http\Controllers;

use App\Models\Areas;
use Illuminate\Http\Request;
use App\Models\AreasMetas;
use App\Models\Metas;
use App\Models\Programas;

class AreasMetasController extends Controller
{
public function index(){
    $areasmetas = AreasMetas::all();
    $metas = Metas::all();
    $programas = Programas::all();
    $areas = Areas::all();

/*     $users = DB::table('AreasMetas')
            ->join('tb_empleados', 'tb_relacion_areas.id_empleado', '=', 'tb_empleados.id_empleado')
            ->join('tb_areas', 'tb_relacion_areas.id_area', '=', 'tb_areas.id_area')
            ->join('tb_sueldos', 'tb_areas.id_area', '=', 'tb_sueldos.id_area')
            ->join('tb_tipos_empleados', 'tb_sueldos.idt_empleado', '=', 'tb_tipos_empleados.idt_empleado')
            ->select('tb_empleados.*', 'tb_areasx`.nombre as area', 'tb_areas.id_area as id_area', 'tb_tipos_empleados.nombre as tipo','tb_tipos_empleados.idt_empleado as id_tipo', 'tb_sueldos.sueldo as sueldo', 'tb_relacion_areas.*' )
            ->get(); */
    return view('areasmetas.index')
        ->with(['areasmetas' => $areasmetas])
        ->with(['programas' => $programas])
        ->with(['areas' => $areas])
        ->with(['metas' => $metas]);
}
public function store(Request $request){


AreasMetas::create(array(
    'area_id' => $request->input('id_area'),
    'meta_id' => $request->input('id_meta'),
    'id_programa' => $request -> input('id_programa'),
    'objetivo' => $request ->input('objetivo'),
    'id_registro' => 1,
));

return redirect()->route("areasmetas.index");

}
public function update(Request $request, AreasMetas $areasMetas){
    $areasMetas->update(array(
        'objetivo' => $request->input('objetivo'),
        'id_programa' => $request->input('id_programa'),
        'id_registro' => $request->input('id_registro'),
    ));

    return redirect()->route("areasmetas.index");
}
public function edit(Metas $id, Request $request)
{
    $activo = 1;

    if($request -> input('activo') == ''){
        $activo = 0;
    }else if($request -> input('activo') == 'ON'){
        $activo = 1;
    }

    $query = AreasMetas::find($id -> id_areameta);
    $query -> clave = $request -> clave;
    $query -> nombre = trim($request -> nombre);
    $query -> descripcion = trim($request -> descripcion);
    $query -> unidadmedida = trim($request -> unidadmedida);
    $query-> programa_id = $request->programa_id;
    $query -> activo = $activo;
    $query->save();

    return redirect()->route("areasmetas.index");

}
public function destroy($id)
{
    $areasmeta = AreasMetas::find($id)->delete();


    return redirect()->route("areasmetas.index");

}
}

