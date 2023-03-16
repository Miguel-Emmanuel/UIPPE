<?php

namespace App\Http\Controllers;

use App\Models\Areas;
use Illuminate\Http\Request;
use App\Models\AreasMetas;
use App\Models\Metas;
use Illuminate\Support\Facades\DB;

use App\Models\Programas;

class AreasMetasController extends Controller
{
    public function index()
    {

        $areasmetas = DB::table('tb_areasmetas')
            ->join('tb_programas', 'tb_areasmetas.id_programa', 'tb_programas.id_programa')
            ->join('tb_metas', 'tb_areasmetas.meta_id', 'tb_metas.id_meta')
            ->join('tb_areas', 'tb_areas.id_area', 'tb_areasmetas.meta_id')
            ->select('tb_metas.nombre as nmeta', 'tb_metas.id_meta as mid', 'tb_programas.nombre as pnombre', 'tb_areas.nombre as area', 'tb_areasmetas.id_areasmetas', 'tb_areasmetas.objetivo as objetivo')
            ->orderBy('tb_areasmetas.id_areasmetas', 'asc')
            ->get();


        $areasmetasd = AreasMetas::all();
        $metas = Metas::all();
        $programas = Programas::all();
        $areas = Areas::all();

        return view('areasmetas.index')
            ->with(['areasmetas' => $areasmetas])
            ->with(['areasmetasd' => $areasmetasd])
            ->with(['programas' => $programas])
            ->with(['areas' => $areas])
            ->with(['metas' => $metas]);
    }
    public function store(Request $request)
    {
        dd($request->all());

        AreasMetas::create(array(
            'area_id' => $request->input('id_area'),
            'meta_id' => $request->input('id_meta'),
            'id_programa' => $request->input('id_programa'),
            'objetivo' => $request->input('objetivo'),
            'id_registro' => 1,
        ));

        return redirect()->route("areasmetas.index");
    }
    public function update(Request $request, AreasMetas $areasMetas)
    {
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

        if ($request->input('activo') == '') {
            $activo = 0;
        } else if ($request->input('activo') == 'ON') {
            $activo = 1;
        }

        $query = AreasMetas::find($id->id_areameta);
        $query->clave = $request->clave;
        $query->nombre = trim($request->nombre);
        $query->descripcion = trim($request->descripcion);
        $query->unidadmedida = trim($request->unidadmedida);
        $query->programa_id = $request->programa_id;
        $query->activo = $activo;
        $query->save();

        return redirect()->route("areasmetas.index");
    }
    public function destroy($id)
    {
        $areasmeta = AreasMetas::find($id)->delete();


        return redirect()->route("areasmetas.index");
    }

    //SELECTS
    public function js_metas(Request $request)
    {
        $id_programa = $request->get('id_programa');

        $meta = DB::table('tb_areasmetas')
            ->join('tb_programas', 'tb_areasmetas.id_programa', 'tb_programas.id_programa')
            ->join('tb_metas', 'tb_areasmetas.meta_id', 'tb_metas.id_meta')
            ->select('tb_metas.nombre as nmeta', 'tb_metas.id_meta as mid')
            ->whereNot('tb_programas.id_programa', $id_programa)
            ->get();


        return view("areasmetas.js_metas")
            ->with(['meta' => $meta]);
    }
    public function js_areas(Request $request)
    {
        $id_programa = $request->get('id_programa');
        $id_meta = $request->get('id_meta');
        // $area = DB::table('tb_areasmetas')
        //     ->join('tb_programas', 'tb_areasmetas.id_programa', 'tb_programas.id_programa')
        //     ->join('tb_metas', 'tb_areasmetas.meta_id', 'tb_metas.id_meta')
        //     ->join('tb_areas', 'tb_areas.id_area', 'tb_areasmetas.area_id')
        //     ->select('tb_areas.nombre as anombre', 'tb_areas.id_area as ida')
        //     ->where('tb_metas.id_meta', $id_meta)
        //     ->where('tb_programas.id_programa', $id_programa)
        //     ->get();
        $area = DB::table('tb_areasmetas')
            ->join('tb_programas', 'tb_areasmetas.id_programa', 'tb_programas.id_programa')
            ->join('tb_metas', 'tb_areasmetas.meta_id', 'tb_metas.id_meta')
            ->join('tb_areas', 'tb_areas.id_area', 'tb_areasmetas.area_id')
            ->select('tb_metas.nombre as nmeta', 'tb_metas.id_meta as mid',
            'tb_programas.nombre as pnombre', 'tb_areas.nombre as arean',
            'tb_areasmetas.objetivo as objetivo',
            'tb_areas.id_area as idare')
            ->where('tb_metas.id_meta', $id_meta)
            ->get();



        //  $area = AreasMetas::where('meta_id',$id_meta)->get();
        //  $area = AreasMetas::where('id_programa',$id_programa)->get();



        return view("areasmetas.js_areas")
            ->with(['area' => $area]);
    }
}
