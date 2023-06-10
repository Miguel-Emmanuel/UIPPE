<?php

namespace App\Http\Controllers;

use App\Models\Areas;
use App\Models\AreasUsuarios;
use App\Models\Usuarios;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\Expr\FuncCall;

class AreasUsuariosController extends Controller
{
    public function index(){
<<<<<<< HEAD
        $areausuario = AreasUsuarios::select('tb_areausuarios.id_areasusuarios','tb_areas.nombre as area_id', 'tb_usuarios.nombre as usuario_id' )
        ->join('tb_areas','tb_areas.id_area','tb_areausuarios.area_id')
        ->join('tb_usuarios','tb_usuarios.id_usuario','tb_areausuarios.usuario_id')
        ->get(); 
        $areas =Areas::all();
=======
        $areausuario = AreasUsuarios::select('tb_areasusuarios.id_areasusuarios','tb_areas.nombre as area_id', 'tb_usuarios.nombre as usuario_id', 'tb_areasusuarios.activo' )
        ->join('tb_areas','tb_areas.id_area','tb_areasusuarios.area_id')
        ->join('tb_usuarios','tb_usuarios.id_usuario','tb_areasusuarios.usuario_id')
        ->get();
        $areas = Areas::all();
        $asig = AreasUsuarios::select('tb_areas.id_area','tb_areas.clave','tb_areas.nombre','tb_areas.descripcion','tb_areas.activo', ('tb_usuarios.nombre AS nombreU'),'tb_usuarios.app','tb_usuarios.apm', 'tb_usuarios.gen', 'tb_usuarios.fn','tb_usuarios.email','tb_usuarios.foto' )
        ->join('tb_areas', 'tb_areasusuarios.area_id',  'tb_areas.id_area')
        ->join('tb_usuarios','tb_areasusuarios.usuario_id' , 'tb_usuarios.id_usuario')->get();
>>>>>>> dev_josh
        $usuarios = Usuarios::all();
        return view('areas-usuarios.index', compact('areausuario','areas','usuarios','asig'));
    }

    public function store(Request $request){

<<<<<<< HEAD
        $activo = 1;

        if($request -> input('activo') == ''){
            $activo = 0;
        }else if($request -> input('activo') == 'ON'){
            $activo = 1;
        }

        $area_id = $request ->area_id;
=======
        // dd($request->all());
        if ($request->input('activo') == '') {
            $activo = 0;
        } else if ($request->input('activo') == 'on') {
            $activo = 1;
        }else{
            $activo = 1;
        }

        $area_id = $request -> area_id;
>>>>>>> dev_josh
        $usuarios = $request -> usuario_id[0];
        $separador = ',';
        $id_usuarios = explode($separador,$usuarios);
        $contador = count($id_usuarios);

<<<<<<< HEAD
       
        $id_registro = $request ->input('registro'); 
=======
        $id_registro = $request -> input('registro');

        for($i = 0; $i<$contador; $i++){
            AreasUsuarios::create(array(
                'area_id' => $area_id,
                'usuario_id' => $id_usuarios[$i],
                'activo' => $activo,
                'id_registro' => $id_registro
            ));
        }

        return redirect('areas-usuarios');
>>>>>>> dev_josh

        for($i = 0; $i<$contador; $i++){
            AreasUsuarios::create(array(
                'area_id' => $area_id,
                'usuario_id' => $id_usuarios[$i],
                'activo' => $activo,
                'id_registro' => $id_registro
            ));
        }
        
        
        return redirect('areas-usuarios');
        
    }
}

