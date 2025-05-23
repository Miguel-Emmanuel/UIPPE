<?php

namespace App\Http\Controllers;

use App\Models\Areas;
use Illuminate\Http\Request;
use App\Models\AreasMetas;
use App\Models\Metas;
use Illuminate\Support\Facades\DB;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AreasMetasExport;

use App\Models\Programas;

class AreasMetasController extends Controller
{
    public function index()
{
        //Consulta para obtener todas las metas
        $areasmetas = DB::table('tb_areasmetas')
            ->join('tb_programas', 'tb_areasmetas.id_programa', 'tb_programas.id_programa')
            ->join('tb_metas', 'tb_areasmetas.meta_id', 'tb_metas.id_meta')
            ->join('tb_areas', 'tb_areasmetas.area_id',  'tb_areas.id_area')
            ->select('tb_metas.nombre as nmeta', 'tb_metas.id_meta as mid', 'tb_programas.nombre as pnombre', 'tb_areas.nombre as area', 'tb_areasmetas.id_areasmetas', 'tb_areasmetas.objetivo as objetivo')
            ->orderBy('tb_areasmetas.id_areasmetas', 'asc')
            ->get();


            $areasmetasd = DB::table('tb_areasmetas')
            ->join('tb_programas', 'tb_areasmetas.id_programa', 'tb_programas.id_programa')
            ->join('tb_metas', 'tb_areasmetas.meta_id', 'tb_metas.id_meta')
            ->join('tb_areas', 'tb_areasmetas.area_id',  'tb_areas.id_area')
            ->select('tb_metas.nombre as nmeta', 'tb_metas.id_meta as mid', 'tb_programas.nombre as pnombre', 'tb_areas.nombre as area', 'tb_areasmetas.id_areasmetas as areasmeta',  'tb_areasmetas.objetivo as objetivo')
            ->get();


        // $areasmetasd = AreasMetas::all();
        $metas = Metas::all()->where('activo', '>', '0');
        $programas = Programas::all()->where('activo', '>', '0');
        $areas = Areas::all()->where('activo', '>', '0');
        $area = \DB::Select('SELECT areas.* FROM tb_areas AS areas WHERE id_area NOT IN (SELECT area_id FROM tb_areasmetas WHERE area_id )');
        return view('areasmetas.index')
            ->with(['areasmetas' => $areasmetas])
            ->with(['areasmetasd' => $areasmetasd])
            ->with(['programas' => $programas])
            ->with(['areas' => $areas])
            ->with(['area' => $area])
            ->with(['metas' => $metas]);
    }
    public function store(Request $request)
    {
        $areas = $request->id_area[0]; //Se consultan todas la áreas y se guardan en un array
        $separador = ',';
        $id_area = explode($separador, $areas);// Las áreas fueron separadas por el método explode

        //Se realiza la inserción de datos
        $meta_id = intval($request->id_meta);
        $id_programa = intval($request->id_programa);
        $objetivo = $request->objetivo;
        $contador = count($id_area);
        $id_registro = intval($request->registro);
        
        //Se utiliza un for para poder asignar un meta a varias áreas
        for ($i = 0; $i < $contador; $i++) {
            AreasMetas::create(array(
                'area_id' => $id_area[$i],
                'meta_id' =>  $meta_id,
                'id_programa' => $id_programa,
                'objetivo' => $objetivo,
                'id_registro' =>  $id_registro,
            ));
        }

        return redirect()->route("areasmetas.index");
    }

    public function destroy($id)
    {
        $areasmeta = AreasMetas::find($id)->delete();
        return redirect()->route("areasmetas.index");
    }

    public function js_metas(Request $request)
    {
        //Esta función fue creada para buscar todas las metas relacionadas al programa que ha sido seleccionado antes
        $id_programa = $request->get('id_programa');
        $id_programa = intval($id_programa);
        $meta2 = \DB::select('SELECT * FROM tb_metas WHERE activo > 0 AND programa_id = ' . $id_programa);
        return view("areasmetas.js_metas")
            ->with(['meta' => $meta2]);
    }

    public function js_areas(Request $request)
    {
        //Esta función muestra todas la áreas a las que no se le ha asignado la meta seleccionada
        $id_meta = $request->get('id_metas');
        $id_meta = intval($id_meta);
        $areas = \DB::select('SELECT areas.* FROM tb_areas AS areas
        WHERE id_area NOT IN (SELECT area_id FROM tb_areasmetas WHERE area_id
        AND meta_id = '.$id_meta.') AND areas.activo > 0');
        return view("areasmetas.js_areas")
            ->with(['areas' => $areas]);
    }
    public function pdfam()
    {


        $areasmetas = DB::table('tb_areasmetas')
        ->join('tb_programas', 'tb_areasmetas.id_programa', 'tb_programas.id_programa')
        ->join('tb_metas', 'tb_areasmetas.meta_id', 'tb_metas.id_meta')
        ->join('tb_areas', 'tb_areasmetas.area_id',  'tb_areas.id_area')
        ->select('tb_metas.nombre as nmeta', 'tb_metas.id_meta as mid', 'tb_programas.nombre as pnombre', 'tb_areas.nombre as area', 'tb_areasmetas.id_areasmetas', 'tb_areasmetas.objetivo as objetivo')
        ->orderBy('tb_areasmetas.id_areasmetas', 'asc')
        ->get();


        $pdf = PDF::loadView('Documentos.pdfam',['areasmetas'=>$areasmetas]);
        //----------Visualizar el PDF ------------------
       return $pdf->stream();
       // ------Descargar el PDF------
       //return $pdf->download('___libros.pdf');


    }


    public function export()
    {
        return Excel::download(new AreasMetasExport, 'areasmetas.xlsx');
    }


}
