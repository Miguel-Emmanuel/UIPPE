<?php

namespace App\Http\Controllers;

use App\Models\AreasMetas;
use App\Models\Calendarizars;
use App\Models\Entregas;
use App\Models\Meses;
use App\Models\Programas;
use Illuminate\Http\Request;

class CalendarizarsController extends Controller
{
    public function index()
    {
        // Obtiene información sobre áreas de metas con ciertos criterios y las pasa a la vista 'calendario.index'
        // Utiliza consultas SQL directas con el facade DB
        $areasmetas = \DB::SELECT('SELECT tb_areasmetas.id_areasmetas, tb_areasmetas.area_id, tb_metas.nombre AS nombreM, tb_metas.clave, tb_programas.abreviatura AS nombrePA
        FROM tb_areasmetas
        JOIN tb_metas ON tb_areasmetas.meta_id = tb_metas.id_meta
        JOIN tb_programas ON tb_areasmetas.id_programa = tb_programas.id_programa
        WHERE tb_areasmetas.id_areasmetas NOT IN (SELECT areasM.id_areasmetas 
        FROM tb_areasmetas AS areasM
            JOIN tb_calendarizars AS calend ON calend.areameta_id = areasM.id_areasmetas 
            JOIN tb_meses AS meses ON meses.id_meses = calend.meses_id
        WHERE meses.m_cantidad >= calend.cantidad)
        ORDER BY tb_areasmetas.id_areasmetas');

        $areasconMeses = \DB::SELECT('SELECT areasM.id_areasmetas, areasM.area_id, areasM.objetivo, metas.nombre as nombreM, metas.clave, program.abreviatura as nombrePA, calend.meses_id, calend.cantidad as cantidad_c, meses.m_enero, meses.m_febrero, meses.m_marzo, meses.m_abril, meses.m_mayo, meses.m_junio, meses.m_julio, meses.m_agosto, meses.m_septiembre, meses.m_octubre, meses.m_noviembre, meses.m_diciembre, meses.m_cantidad as meses_c
        FROM tb_areasmetas as areasM 
            JOIN tb_metas as metas ON metas.id_meta = areasM.meta_id
            JOIN tb_programas as program ON program.id_programa = areasM.id_programa
            JOIN tb_calendarizars as calend on calend.areameta_id = areasM.id_areasmetas
            JOIN tb_meses as meses on meses.id_meses = calend.meses_id
        ORDER BY areasM.id_areasmetas');

        $areassinMeses = \DB::SELECT('SELECT areasM.id_areasmetas, areasM.area_id, areasM.objetivo, metas.nombre AS nombreM, program.abreviatura AS nombrePA
        FROM tb_areasmetas AS areasM
            JOIN tb_metas AS metas ON metas.id_meta = areasM.meta_id
            JOIN tb_programas AS program ON program.id_programa = areasM.id_programa
        WHERE NOT EXISTS (SELECT 1 FROM tb_calendarizars AS calend WHERE calend.areameta_id = areasM.id_areasmetas)
        ORDER BY areasM.id_areasmetas');

        return view('calendario.index', compact('areasmetas', 'areasconMeses', 'areassinMeses'));
    }

    public function entregasView()
    {
        // Info que se muestra en TABLAS y que contiene los registros de las metas que ya tiene una CANTIDAD PROPUESTA en cantidad Anual y mensualmente PERO NO HAN CUMPLIDO CON LA ENTREGA
        $metasTableS = \DB::SELECT('SELECT areasM.id_areasmetas, areasM.area_id, program.abreviatura AS nombrePA, metas.nombre AS nombreM, metas.clave, calend.cantidad AS cantidad_c, meses.m_cantidad as cantidad_m
        FROM tb_areasmetas AS areasM
            JOIN tb_metas AS metas ON metas.id_meta = areasM.meta_id
            JOIN tb_programas AS program ON program.id_programa = areasM.id_programa
            JOIN tb_calendarizars AS calend ON calend.areameta_id = areasM.id_areasmetas
            JOIN tb_meses AS meses ON meses.id_meses = calend.meses_id
        WHERE areasM.id_areasmetas NOT IN (SELECT areasM.id_areasmetas
        FROM tb_areasmetas AS areasM
            JOIN tb_metas AS metas ON metas.id_meta = areasM.meta_id
            JOIN tb_programas AS program ON program.id_programa = areasM.id_programa
            JOIN tb_calendarizars AS calend ON calend.areameta_id = areasM.id_areasmetas
            JOIN tb_entregas AS entrega ON entrega.areameta_id = areasM.id_areasmetas
            JOIN tb_meses AS meses ON meses.id_meses = calend.meses_id
        WHERE meses.m_cantidad >= calend.cantidad AND entrega.cantidad >= meses.m_cantidad)
        ORDER BY areasM.id_areasmetas');

        // Info que se muestra en MODALES y que contiene los registros de las metas que ya tiene una CANTIDAD PROPUESTA en cantidad Anual y mensualmente PERO NO HAN CUMPLIDO CON LA ENTREGA
        $metasModalS = \DB::SELECT('SELECT areasM.id_areasmetas, areasM.area_id, program.abreviatura AS nombrePA, metas.nombre AS nombreM, metas.unidadmedida AS medida, calend.cantidad AS cantidadProp_c, meses.m_enero, meses.m_febrero, meses.m_marzo, meses.m_abril, meses.m_mayo, meses.m_junio, meses.m_julio, meses.m_agosto, meses.m_septiembre, meses.m_octubre, meses.m_noviembre, meses.m_diciembre, meses.m_cantidad AS mesesProp_c
        FROM tb_areasmetas AS areasM
            JOIN tb_metas AS metas ON metas.id_meta = areasM.meta_id
            JOIN tb_programas AS program ON program.id_programa = areasM.id_programa
            JOIN tb_calendarizars AS calend ON calend.areameta_id = areasM.id_areasmetas
            JOIN tb_meses AS meses ON meses.id_meses = calend.meses_id
        WHERE areasM.id_areasmetas NOT IN (SELECT areasM.id_areasmetas
            FROM tb_areasmetas AS areasM
            JOIN tb_metas AS metas ON metas.id_meta = areasM.meta_id
            JOIN tb_programas AS program ON program.id_programa = areasM.id_programa
            JOIN tb_entregas AS entrega ON entrega.areameta_id = areasM.id_areasmetas
            JOIN tb_meses AS meses ON meses.id_meses = entrega.meses_id)
        ORDER BY areasM.id_areasmetas');

        // Info que se muesta en TABLA SUPERIOR y que contiene los registros de las metas que ya tienen REGISTRO DE ENTREGAS EN MESES Anual y mensualmente
        $metasCompT = \DB::SELECT('SELECT areasM.id_areasmetas, areasM.area_id, program.abreviatura AS nombrePA, metas.nombre AS nombreM, metas.clave, entrega.cantidad AS cantidad_e, calend.cantidad AS cantidad_c
        FROM tb_areasmetas AS areasM
            JOIN tb_metas AS metas ON metas.id_meta = areasM.meta_id
            JOIN tb_programas AS program ON program.id_programa = areasM.id_programa
            JOIN tb_calendarizars AS calend ON calend.areameta_id = areasM.id_areasmetas
            JOIN tb_entregas AS entrega ON entrega.areameta_id = areasM.id_areasmetas
            JOIN tb_meses AS meses ON meses.id_meses = calend.meses_id
        WHERE meses.m_cantidad >= calend.cantidad AND entrega.cantidad >= meses.m_cantidad
        ORDER BY areasM.id_areasmetas');

        //Info que se muestra EN MODALES DE LA TABLA SUPERIOR y que contiene la cantidad mensual de las entregas según la meta
        $metasCompM = \DB::SELECT('SELECT entrega.id_entregas, areasM.id_areasmetas, areasM.area_id, program.abreviatura AS nombrePA, metas.id_meta,metas.nombre AS nombreM, metas.unidadmedida AS medida, entrega.cantidad AS cantidad_e, calend.cantidad AS cantidad_c, meses.m_enero, meses.m_febrero, meses.m_marzo, meses.m_abril, meses.m_mayo, meses.m_junio, meses.m_julio, meses.m_agosto, meses.m_septiembre, meses.m_octubre, meses.m_noviembre, meses.m_diciembre, meses.m_cantidad AS cantidad_m
        FROM tb_areasmetas AS areasM
            JOIN tb_metas AS metas ON metas.id_meta = areasM.meta_id
            JOIN tb_programas AS program ON program.id_programa = areasM.id_programa
            JOIN tb_calendarizars AS calend ON calend.areameta_id = areasM.id_areasmetas
            JOIN tb_entregas AS entrega ON entrega.areameta_id = areasM.id_areasmetas
            JOIN tb_meses AS meses ON meses.id_meses = entrega.meses_id
        WHERE meses.m_cantidad >= entrega.cantidad 
        ORDER BY areasM.id_areasmetas');

        $cant_Propuestas = \DB::SELECT('SELECT areasM.id_areasmetas, areasM.area_id, program.abreviatura AS nombrePA, metas.nombre AS nombreM, metas.unidadmedida AS medida, calend.cantidad AS cantidad_c, meses.m_enero, meses.m_febrero, meses.m_marzo, meses.m_abril, meses.m_mayo, meses.m_junio, meses.m_julio, meses.m_agosto, meses.m_septiembre, meses.m_octubre, meses.m_noviembre, meses.m_diciembre, meses.m_cantidad AS cantidad_m
        FROM tb_areasmetas AS areasM
            JOIN tb_metas AS metas ON metas.id_meta = areasM.meta_id
            JOIN tb_programas AS program ON program.id_programa = areasM.id_programa
            JOIN tb_calendarizars AS calend ON calend.areameta_id = areasM.id_areasmetas
            JOIN tb_meses AS meses ON meses.id_meses = calend.meses_id
        WHERE meses.m_cantidad >= calend.cantidad 
        ORDER BY areasM.id_areasmetas');

        return view('calendario.entregas', compact('metasTableS', 'metasModalS', 'metasCompT', 'metasCompM', 'cant_Propuestas'));
    }

    public function entregaN(Request $request)
    {
        // Registra una nueva entrega en la base de datos
        // Utiliza Eloquent ORM para crear registros en las tablas 'Meses' y 'Entregas'
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

        Entregas::create(array(
            'areameta_id' => $request->input('area_meta'),
            'meses_id' => $meses[0]->ultimo,
            'id_registro' => $request->input('registro'),
            'cantidad' => $mCantidad,
            'activo' => 1
        ));

        return redirect('entregaMetas');
    }
    public function updateEntrega(Entregas $id, Request $request)
    {
        // Actualiza una entrega existente en la base de datos
        // Utiliza Eloquent ORM para actualizar registros en las tablas 'Meses' y 'Entregas'
        $meses = Entregas::where('id_entregas', '=', $id->id_entregas)->get();
        $mes = $meses[0]->meses_id;
        $query = Entregas::find($id->id_entregas);
        $query2 = Meses::find($mes);

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
        $query2->m_fecha = date("Y-m-d");
        $query2->save();

        $query->id_registro = trim($request->registro);
        $query->cantidad = $mCantidad;
        $query->save();

        return redirect('entregaMetas');
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

    public function update(AreasMetas $id, Request $request)
    {
        $meses = Calendarizars::where('areameta_id', "=", $id->id_areasmetas)->get();
        $mes = $meses[0]->meses_id;
        $calend = $meses[0]->id_calendario;
        $query = Calendarizars::find($calend);
        $query2 = Meses::find($mes);

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