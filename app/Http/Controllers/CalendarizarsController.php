<?php

namespace App\Http\Controllers;

use App\Models\AreasMetas;
use App\Models\Calendarizars;
use App\Models\Meses;
use App\Models\Programas;
use Illuminate\Http\Request;

class CalendarizarsController extends Controller
{
    public function index()
    {
        $metas = \DB::select('SELECT meta.id_meta, meta.clave, meta.nombre as nombreM, meta.descripcion, meta.unidadmedida, meta.programa_id, meta.activo, meta.id_registro, programa.nombre as nombreP, programa.abreviatura as nombrePA FROM tb_metas as meta, tb_programas as programa WHERE meta.programa_id = programa.id_programa');
        $areasmetas = \DB::SELECT('SELECT areaMetas.id_areasmetas, areaMetas.area_id, metas.nombre AS nombreM, program.abreviatura AS nombrePA FROM tb_areasmetas AS areaMetas JOIN tb_metas AS metas ON areaMetas.meta_id = metas.id_meta JOIN tb_programas AS program ON areaMetas.id_programa = program.id_programa ORDER BY areaMetas.id_areasmetas');
        $Programas = Programas::all('id_programa', 'nombre', 'abreviatura');
        return view('calendario.index', compact('areasmetas'), compact('Programas'));
    }

    public function store(Request $request)
    {
            dd($request -> all());
        
            Meses::created(array(
                'Enero' => $request->input('enero'),
                'Febrero' => $request->input('febrero'),
                'Marzo' => $request->input('marzo'),
                'Abril' => $request->input('abril'),
                'Mayo' => $request->input('mayo'),
                'Junio' => $request->input('junio'),
                'Julio' => $request->input('julio'),
                'Agosto' => $request->input('agosto'),
                'Septiembre' => $request->input('septiembre'),
                'Octubre' => $request->input('octubre'),
                'Noviembre' => $request->input('noviembre'),
                'Diciembre' => $request->input('diciembre'),
            ));

            $meses = \DB::select('SELECT id_meses FROM tb_meses WHERE id_meses = (SELECT LAST_INSERT_ID())');

            dd($meses);

            Calendarizars::created(array(
                'areameta_id' => $request->input('area_meta'),
                'meses' => $meses,
                'fecha' => 1
            ));

            return redirect('calendario');
    }
}
