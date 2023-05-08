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
        $areasconMeses = \DB::SELECT('SELECT areasM.id_areasmetas, areasM.area_id, areasM.objetivo, metas.nombre as nombreM, program.abreviatura as nombrePA, calend.meses_id, calend.cantidad as cantidad_c, meses.m_enero, meses.m_febrero, meses.m_marzo, meses.m_abril, meses.m_mayo, meses.m_junio, meses.m_julio, meses.m_agosto, meses.m_septiembre, meses.m_octubre, meses.m_noviembre, meses.m_diciembre
        FROM tb_areasmetas as areasM 
            JOIN tb_metas as metas ON metas.id_meta = areasM.meta_id
            JOIN tb_programas as program ON program.id_programa = areasM.id_programa
            JOIN tb_calendarizars as calend on calend.areameta_id = areasM.id_areasmetas
            JOIN tb_meses as meses on meses.id_meses = calend.meses_id');

        $areassinMeses = \DB::SELECT('SELECT areasM.id_areasmetas, areasM.area_id, areasM.objetivo, metas.nombre AS nombreM, program.abreviatura AS nombrePA
        FROM tb_areasmetas AS areasM
            JOIN tb_metas AS metas ON metas.id_meta = areasM.meta_id
            JOIN tb_programas AS program ON program.id_programa = areasM.id_programa
        WHERE NOT EXISTS (SELECT 1 FROM tb_calendarizars AS calend WHERE calend.areameta_id = areasM.id_areasmetas)');

        return view('calendario.index', compact('areasmetas', 'areasconMeses', 'areassinMeses'));
    }

    public function store(Request $request)
    {
        $Enero = intval($request->input('enero'));
        $Febrero = intval($request->input('febrero'));
        $Marzo = intval($request->input('marzo'));
        $Abril = intval($request->input('abril'));
        $Mayo = intval($request->input('mayo'));
        $Junio = intval($request->input('junio'));
        $Julio = intval($request->input('julio'));
        $Agosto = intval($request->input('agosto'));
        $Sep = intval($request->input('septiembre'));
        $Octubre = intval($request->input('octubre'));
        $Nov = intval($request->input('noviembre'));
        $Dic = intval($request->input('diciembre'));
        $mCantidad = $Enero + $Febrero + $Marzo + $Abril + $Mayo + $Julio + $Junio + $Agosto + $Sep + $Octubre + $Nov + $Dic;

        Meses::create(array(
            'm_enero' => $Enero,
            'm_febrero' => $Febrero,
            'm_marzo' => $Marzo,
            'm_abril' => $Abril,
            'm_mayo' => $Mayo,
            'm_junio' => $Junio,
            'm_julio' => $Julio,
            'm_agosto' => $Agosto,
            'm_septiembre' => $Sep,
            'm_octubre' => $Octubre,
            'm_noviembre' => $Nov,
            'm_diciembre' => $Dic,
            'm_year' => date("Y"),
            'm_cantidad' => $mCantidad,
            'm_fecha' => date("Y-m-d"),
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

    public function update(Calendarizars $id, Request $request)
    {
        $query = Calendarizars::find($id->id_calendario);
        
        

        //dd($query);
        $query2 = Meses::find($query->meses_id);
        //dd($query2);

        $Enero = intval(trim($request->enero));
        $Febrero = intval(trim($request->febrero));
        $Marzo = intval(trim($request->marzo));
        $Abril = intval(trim($request->abril));
        $Mayo = intval(trim($request->mayo));
        $Junio = intval(trim($request->junio));
        $Julio = intval(trim($request->julio));
        $Agosto = intval(trim($request->agosto));
        $Sep = intval(trim($request->septiembre));
        $Octubre = intval(trim($request->octubre));
        $Nov = intval(trim($request->noviembre));
        $Dic = intval(trim($request->diciembre));
        $mCantidad = $Enero + $Febrero + $Marzo + $Abril + $Mayo + $Julio + $Junio + $Agosto + $Sep + $Octubre + $Nov + $Dic;

        $query2->m_enero = $Enero;
        $query2->m_febrero = $Febrero;
        $query2->m_marzo = $Marzo;
        $query2->m_abril = $Abril;
        $query2->m_mayo = $Mayo;
        $query2->m_junio = $Junio;
        $query2->m_julio = $Julio;
        $query2->m_agosto = $Agosto;
        $query2->m_septiembre = $Sep;
        $query2->m_octubre = $Octubre;
        $query2->m_noviembre = $Nov;
        $query2->m_diciembre = $Dic;
        $query2->m_cantidad = $mCantidad;
        $query2->save();

        $query->id_registro = trim($request->registro);
        $query->cantidad = trim($request->cantidad);
        $query->save();

        return redirect('calendario');
    }
}
