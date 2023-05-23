<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;
use App\Models\Areas;
use App\Models\AreasMetas;
use PDF;

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
       $programas=\DB::select('SELECT  abreviatura FROM tb_programas');
        $metas=\DB::select('SELECT  COUNT(*) AS conteo FROM tb_metas GROUP BY programa_id');
        $usuarios_b=\DB::select('SELECT nombre AS usuarios FROM tb_usuarios GROUP BY nombre ;');
        $tipos=\DB::select('SELECT id_tipo AS id FROM tb_usuarios ');
        $trimestral=\DB::select('SELECT SUM(activo) AS total
        FROM tb_metas WHERE created_at >= "2023-01-01" AND created_at < "2023-04-01" 
        GROUP BY MONTH(created_at) ');
        $meses=\DB::select(' SELECT MONTH(created_at) AS mes
        FROM tb_metas
        WHERE created_at >= "2023-01-01" AND created_at < "2023-04-01"
        GROUP BY MONTH(created_at)
        ');
        $eneroactivos=\DB::select('SELECT SUM(activo) AS total
        FROM tb_metas WHERE created_at >= "2023-01-01" AND created_at < "2023-01-31" 
        GROUP BY Day(created_at) ');
        $eneroDias=\DB::select('SELECT DAY(created_at) AS dia
        FROM tb_metas
        WHERE created_at >= "2023-01-01" AND created_at < "2023-01-31" GROUP BY DAY(created_at)');
        $febreroactivos=\DB::select('SELECT SUM(activo) AS total
        FROM tb_metas WHERE created_at >= "2023-02-01" AND created_at < "2023-02-31" 
        GROUP BY Day(created_at) ');
        $febreroDias=\DB::select('SELECT DAY(created_at) AS dia
        FROM tb_metas
        WHERE created_at >= "2023-02-01" AND created_at < "2023-02-31" GROUP BY DAY(created_at)');
        $marzoactivos=\DB::select('SELECT SUM(activo) AS total
        FROM tb_metas WHERE created_at >= "2023-03-01" AND created_at < "2023-03-31" 
        GROUP BY Day(created_at) ');
        $marzoDias=\DB::select('SELECT DAY(created_at) AS dia
        FROM tb_metas
        WHERE created_at >= "2023-03-01" AND created_at < "2023-03-31" GROUP BY DAY(created_at)');
         $puesto=\DB::select('SELECT tb_usuarios.nombre AS nombre_usuario, tb_usuarios.id_tipo, tb_tipos.nombre AS nombre_tipo
         FROM tb_usuarios, tb_tipos
         WHERE tb_usuarios.id_tipo = tb_tipos.id ');
         $areasmetas=\DB::select('SELECT tb_areas.nombre, COUNT(tb_areasmetas.meta_id) AS meta
FROM tb_areasmetas
JOIN tb_areas ON tb_areasmetas.area_id = tb_areas.id_area
GROUP BY tb_areas.id_area, tb_areas.nombre;');
        return view ("graficos.graficos")
        ->with(['areasmetas'=>$areasmetas])
        ->with(['meses'=>$meses])
        ->with(['puesto'=>$puesto])
        ->with(['eneroactivos'=>$eneroactivos])
        ->with(['eneroDias'=>$eneroDias])
        ->with(['febreroactivos'=>$febreroactivos])
        ->with(['febreroDias'=>$febreroDias])
        ->with(['marzoactivos'=>$marzoactivos])
        ->with(['marzoDias'=>$marzoDias])
        ->with(['tipos'=>$tipos])
        ->with(['trimestral'=>$trimestral])
        ->with(['metas'=>$metas])
        ->with(['usuarios_b'=>$usuarios_b])
        ->with(['programas'=>$programas])
        ->with(['usuarios'=> $usuarios])
        ->with(['usuarios_a'=>$usuarios_a]);
        
    }
    public function rpdf()
    {
            
        $areas=\DB::select('SELECT  abreviatura FROM tb_programas');
        $areas=\DB::select('SELECT  COUNT(*) AS conteo FROM tb_metas GROUP BY programa_id');
        $areas= Areas::all();

        $pdf = PDF::loadView('Documentos.rpdf',['areas'=>$areas]);
        //----------Visualizar el PDF ------------------
       //return $pdf->stream(); 
       // ------Descargar el PDF------
       return $pdf->download('graficos.pdf');

    
    }

}
