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
        $areasmetas = \DB::SELECT('SELECT areaMetas.id_areasmetas, areaMetas.area_id, metas.nombre AS nombreM, program.abreviatura AS nombrePA FROM tb_areasmetas AS areaMetas JOIN tb_metas AS metas ON areaMetas.meta_id = metas.id_meta JOIN tb_programas AS program ON areaMetas.id_programa = program.id_programa ORDER BY areaMetas.id_areasmetas');
        $calendario = \DB::SELECT('SELECT calend.areameta_id, calend.cantidad, meses.id_meses, meses.Enero, meses.Febrero, meses.Marzo, meses.Abril, meses.Mayo, meses.Junio, meses.Julio, meses.Agosto, meses.Septiembre, meses.Octubre, meses.Noviembre, meses.Diciembre, SUM(meses.Enero+ meses.Febrero+ meses.Marzo+ meses.Abril+ meses.Mayo+ meses.Junio+ meses.Julio+ meses.Agosto+ meses.Septiembre+ meses.Octubre+ meses.Noviembre+ meses.Diciembre) AS Suma
        FROM tb_calendarizars AS calend 
        JOIN tb_meses AS meses 
        ON calend.meses_id = meses.id_meses 
        GROUP BY calend.areameta_id, calend.cantidad, meses.id_meses, meses.Enero, meses.Febrero, meses.Marzo, meses.Abril, meses.Mayo, meses.Junio, meses.Julio, meses.Agosto, meses.Septiembre, meses.Octubre, meses.Noviembre, meses.Diciembre');
        
        return view('calendario.index', compact('areasmetas'));
    }

    public function store(Request $request)
    {
        Meses::create(array(
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
            'year' => date("Y"),
            'fecha' => date("Y-m-d"),
        ));

        $meses = \DB::select('SELECT LAST_INSERT_ID() as ultimo');

        Calendarizars::create(array(
            'areameta_id' => $request->input('area_meta'),
            'meses_id' => $meses[0]->ultimo,
            'id_registro' => $request->input('registro'),
            'cantidad' => $request->input('cantidad'),
            'activo' => 1
        ));

        return redirect('calendario');
    }
}
