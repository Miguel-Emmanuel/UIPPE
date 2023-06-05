<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;
use App\Models\Areas;


class GraficosController extends Controller
{
    public function dashboard()
    {
        return view('dashboard.index');
    }

    public function registros()
    {
        $area = \DB::select('SELECT COUNT(*) as areas FROM tb_areas');
        $tUsuarios = \DB::select('SELECT COUNT(*) as tUsuarios FROM tb_tipos');
        $usuarios = \DB::select('SELECT COUNT(*) as usuarios FROM tb_usuarios');
        $AreasUsuarios = \DB::select('SELECT COUNT(*) as AreasUsuarios FROM tb_areasusuarios');
        $programas = \DB::select('SELECT COUNT(*) as programas FROM tb_programas');
        $metas = \DB::select('SELECT COUNT(*) as metas FROM tb_metas');
        $areametas = \DB::select('SELECT COUNT(*) as areametas FROM tb_areasmetas');
        return view('dashboard.registros')
            ->with(['areas' => $area])
            ->with(['usuarios' => $usuarios])
            ->with(['tUsuarios' => $tUsuarios])
            ->with(['areasusuarios' => $AreasUsuarios])
            ->with(['programas' => $programas])
            ->with(['metas' => $metas])
            ->with(['areametas' => $areametas]);
    }

    public function registrosArea($id)
    {
        $area_2 = \DB::SELECT('SELECT * FROM tb_areas WHERE id_area = '.$id);
        if(count($area_2) <= 0){
            return redirect('registros');
        }else{
            $area2 = Areas::find($id);
        }
        $area = Areas::find($id);
        $AreasUsuarios = \DB::select('SELECT COUNT(*) as AreasUsuarios FROM tb_areasusuarios WHERE area_id = '.$id);
        $areametas = \DB::select('SELECT COUNT(*) as areametas FROM tb_areasmetas WHERE area_id = '.$id);
        return view('dashboard.registrosA')
            ->with(['areas' => $area])
            ->with(['areasusuarios' => $AreasUsuarios])
            ->with(['areametas' => $areametas]);
    }


    public function graficos()
    {
        $usuarios = \DB::select('SELECT gen FROM tb_usuarios GROUP BY gen');
        $usuarios_a = \DB::select('SELECT gen, COUNT(*) AS cantidad FROM tb_usuarios GROUP BY gen' );
        $areas = \DB::select('SELECT COUNT(*) AS cantidad FROM tb_areas GROUP BY activo');
        $areas_a=\DB::select('SELECT activo FROM tb_areas GROUP BY activo');
        $programas=\DB::select('SELECT  abreviatura FROM tb_programas');
        $metas=\DB::select('SELECT  COUNT(*) AS conteo FROM tb_metas GROUP BY programa_id');
        $usuarios_b=\DB::select('SELECT nombre AS usuarios FROM tb_usuarios GROUP BY nombre ;');
        $tipos=\DB::select('SELECT id_tipo AS id FROM tb_usuarios ');
        return view ("graficos.graficos")
        ->with(['tipos'=>$tipos])
        ->with(['metas'=>$metas])
        ->with(['usuarios_b'=>$usuarios_b])
        ->with(['programas'=>$programas])
        ->with(['usuarios'=> $usuarios])
        ->with(['areas_a'=>$areas_a])
        ->with(['usuarios_a'=>$usuarios_a])
        ->with(['areas'=> $areas]);

    }


}
