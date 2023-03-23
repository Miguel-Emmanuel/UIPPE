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


    public function graficos()
    {
        $usuarios = \DB::select('SELECT gen FROM tb_usuarios GROUP BY gen');
        $usuarios_a = \DB::select('SELECT gen, COUNT(*) AS cantidad FROM tb_usuarios GROUP BY gen' );
        $areas = \DB::select('SELECT COUNT(*) AS cantidad FROM tb_areas GROUP BY activo');
        $areas_a=\DB::select('SELECT activo FROM tb_areas GROUP BY activo');
        return view ("graficos.graficos")
        ->with(['usuarios'=> $usuarios])
        ->with(['areas_a'=>$areas_a])
        ->with(['usuarios_a'=>$usuarios_a])
        ->with(['areas'=> $areas]);

    }


}
