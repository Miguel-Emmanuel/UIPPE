<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;
use App\Models\Tipos;
use App\Models\Areas;
use App\Models\AreasMetas;
use App\Models\AreasUsuarios;
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

        public function registrosArea($id)
        {
                $area_2 = \DB::SELECT('SELECT * FROM tb_areas WHERE id_area = ' . $id);
                if (count($area_2) <= 0) {
                        return redirect('registros');
                } else {
                        $area2 = Areas::find($id);
                }
                $area = Areas::find($id);
                $metas = \DB::select('SELECT meta.id_meta, meta.clave, meta.nombre AS nombreM, meta.descripcion, meta.unidadmedida, meta.activo, programa.nombre AS nombreP, programa.abreviatura AS nombrePA, areas.id_area
                FROM tb_metas AS meta
                        JOIN tb_areasmetas AS areasM ON areasM.meta_id = meta.id_meta
                        JOIN tb_programas AS programa ON areasM.id_programa = programa.id_programa
                        JOIN tb_areas AS areas ON areas.id_area = areasM.area_id
                WHERE areasM.area_id = '.$id);
                $AreasUsuarios = \DB::select('SELECT * FROM tb_areasusuarios WHERE area_id = ' . $id);
                $areametas = \DB::select('SELECT COUNT(*) as areametas FROM tb_areasmetas WHERE area_id = ' . $id);
                $asig = AreasUsuarios::select('tb_areas.id_area', 'tb_areas.clave', 'tb_areas.nombre', 'tb_areas.descripcion', 'tb_areas.activo', 'tb_usuarios.id_usuario', ('tb_usuarios.nombre AS nombreU'), 'tb_usuarios.app', 'tb_usuarios.apm', 'tb_usuarios.gen', 'tb_usuarios.fn', 'tb_usuarios.email', 'tb_usuarios.foto', ('tb_usuarios.activo AS activoUs'))
                        ->join('tb_areas', 'tb_areasusuarios.area_id',  'tb_areas.id_area')
                        ->join('tb_usuarios', 'tb_areasusuarios.usuario_id', 'tb_usuarios.id_usuario')
                        ->where('tb_areasusuarios.area_id', '=', $id)
                        ->get();
                $Usuarios = AreasUsuarios::select('usuario.id_usuario', 'usuario.clave', ('usuario.nombre as nombreU'), 'usuario.app', 'usuario.apm', 'usuario.gen', 'usuario.fn', 'usuario.academico', 'usuario.foto', 'usuario.email', 'usuario.activo', 'usuario.id_tipo', ('tipo.nombre as nombreT'))
                        ->join(('tb_usuarios AS usuario'), 'tb_areasusuarios.usuario_id', 'usuario.id_usuario')
                        ->join(('tb_tipos as tipo'), 'usuario.id_tipo', 'tipo.id')
                        ->join('tb_areas', 'tb_areasusuarios.area_id',  'tb_areas.id_area')
                        ->where('tb_areasusuarios.area_id', '=', $id)
                        ->get();
                $Tipos = Tipos::all()->where('activo', '>', '0');
                $usuarios = \DB::SELECT('SELECT *
                FROM tb_usuarios AS users
                WHERE users.id_usuario NOT IN (SELECT usuario_id FROM tb_areasusuarios) AND users.activo > 0 AND users.id_tipo >= 3');
                $areasMulti = Areas::all('id_area', 'nombre');
                return view('dashboard.registrosA')
                        ->with(['areas' => $area])
                        ->with(['metas' => $metas])
                        ->with(['asig' => $asig])
                        ->with(['areasusuarios' => $AreasUsuarios])
                        ->with(['areametas' => $areametas])
                        ->with(['Usuarios' => $Usuarios])
                        ->with(['Tipos' => $Tipos])
                        ->with(['usuarios' => $usuarios])
                        ->with(['areasMulti' => $areasMulti]);
        }

        public function editArea(Request $request, Areas $id)
        {
                $query = Areas::find($id->id_area);

                if ($request->file('foto') != '') {
                        $file = $request->file('foto');

                        $foto1 = $file->getClientOriginalName();
                        $ldate = date('YmdHis');
                        $foto2 = $ldate . $foto1;

                        \Storage::disk('local')->put($foto2, \File::get($file));
                } else {
                        $foto2 = $query->foto;
                }

                $activo = 1;

                if ($request->input('activo') == '') {
                        $activo = 0;
                } else if ($request->input('activo') == 'ON') {
                        $activo = 1;
                }


                $query->clave = trim($request->clave);
                $query->nombre = trim($request->nombre);
                $query->descripcion = trim($request->descripcion);
                $query->foto = $foto2;
                $query->activo = $activo;
                $query->id_registro = trim($request->registro);
                $query->save();


                return redirect('dashboard');
        }


        public function graficos()
        {
                $usuarios = \DB::select('SELECT gen FROM tb_usuarios GROUP BY gen');
                $usuarios_a = \DB::select('SELECT gen, COUNT(*) AS cantidad FROM tb_usuarios GROUP BY gen');
                $programas = \DB::select('SELECT  abreviatura FROM tb_programas');
                $metas = \DB::select('SELECT  COUNT(*) AS conteo FROM tb_metas GROUP BY programa_id');
                $usuarios_b = \DB::select('SELECT nombre AS usuarios FROM tb_usuarios GROUP BY nombre ;');
                $tipos = \DB::select('SELECT id_tipo AS id FROM tb_usuarios ');
                $trimestral = \DB::select('SELECT SUM(activo) AS total
        FROM tb_metas WHERE created_at >= "2023-01-01" AND created_at < "2023-04-01" 
        GROUP BY MONTH(created_at) ');
                $meses = \DB::select(' SELECT MONTH(created_at) AS mes
        FROM tb_metas
        WHERE created_at >= "2023-01-01" AND created_at < "2023-04-01"
        GROUP BY MONTH(created_at)
        ');
                $eneroactivos = \DB::select('SELECT SUM(activo) AS total
        FROM tb_metas WHERE created_at >= "2023-01-01" AND created_at < "2023-01-31" 
        GROUP BY Day(created_at) ');
                $eneroDias = \DB::select('SELECT DAY(created_at) AS dia
        FROM tb_metas
        WHERE created_at >= "2023-01-01" AND created_at < "2023-01-31" GROUP BY DAY(created_at)');
                $febreroactivos = \DB::select('SELECT SUM(activo) AS total
        FROM tb_metas WHERE created_at >= "2023-02-01" AND created_at < "2023-02-31" 
        GROUP BY Day(created_at) ');
                $febreroDias = \DB::select('SELECT DAY(created_at) AS dia
        FROM tb_metas
        WHERE created_at >= "2023-02-01" AND created_at < "2023-02-31" GROUP BY DAY(created_at)');
                $marzoactivos = \DB::select('SELECT SUM(activo) AS total
        FROM tb_metas WHERE created_at >= "2023-03-01" AND created_at < "2023-03-31" 
        GROUP BY Day(created_at) ');
                $marzoDias = \DB::select('SELECT DAY(created_at) AS dia
        FROM tb_metas
        WHERE created_at >= "2023-03-01" AND created_at < "2023-03-31" GROUP BY DAY(created_at)');
                $puesto = \DB::select(' SELECT COUNT(tb_usuarios.id_tipo) as id_tipo, tb_tipos.nombre
         FROM tb_usuarios
         JOIN tb_tipos ON tb_usuarios.id_tipo = tb_tipos.id
         GROUP BY tb_usuarios.id_tipo, tb_tipos.nombre');
                $areasmetas = \DB::select('SELECT tb_areas.nombre, COUNT(tb_areasmetas.meta_id) AS meta
FROM tb_areasmetas
JOIN tb_areas ON tb_areasmetas.area_id = tb_areas.id_area
GROUP BY tb_areas.id_area, tb_areas.nombre;');
                return view("graficos.graficos")
                        ->with(['areasmetas' => $areasmetas])
                        ->with(['meses' => $meses])
                        ->with(['puesto' => $puesto])
                        ->with(['eneroactivos' => $eneroactivos])
                        ->with(['eneroDias' => $eneroDias])
                        ->with(['febreroactivos' => $febreroactivos])
                        ->with(['febreroDias' => $febreroDias])
                        ->with(['marzoactivos' => $marzoactivos])
                        ->with(['marzoDias' => $marzoDias])
                        ->with(['tipos' => $tipos])
                        ->with(['trimestral' => $trimestral])
                        ->with(['metas' => $metas])
                        ->with(['usuarios_b' => $usuarios_b])
                        ->with(['programas' => $programas])
                        ->with(['usuarios' => $usuarios])
                        ->with(['usuarios_a' => $usuarios_a]);
        }
        public function rpdf()
        {

                $areas = \DB::select('SELECT  abreviatura FROM tb_programas');
                $areas = \DB::select('SELECT  COUNT(*) AS conteo FROM tb_metas GROUP BY programa_id');
                $areas = Areas::all();

                $pdf = PDF::loadView('Documentos.rpdf', ['areas' => $areas]);
                //----------Visualizar el PDF ------------------
                //return $pdf->stream(); 
                // ------Descargar el PDF------
                return $pdf->download('graficos.pdf');
        }
}
