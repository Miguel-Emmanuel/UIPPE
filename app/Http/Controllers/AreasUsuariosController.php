<?php

namespace App\Http\Controllers;

use App\Models\Areas;
use App\Models\AreasUsuarios;
use App\Models\Usuarios;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Expr\FuncCall;

class AreasUsuariosController extends Controller
{
    public function index(){
        $areausuario = AreasUsuarios::select('tb_areausuarios.id_areasusuarios','tb_areas.nombre as area_id', 'tb_usuarios.nombre as usuario_id' )
        ->join('tb_areas','tb_areas.id_area','tb_areausuarios.area_id')
        ->join('tb_usuarios','tb_usuarios.id_usuario','tb_areausuarios.usuario_id')
        ->get(); 
        $areas =Areas::all();
        $usuarios = Usuarios::all();
        return view('areas-usuarios.index', compact('areausuario','areas','usuarios'));
    }

    public function store(Request $request){

        $activo = 1;

        if($request -> input('activo') == ''){
            $activo = 0;
        }else if($request -> input('activo') == 'ON'){
            $activo = 1;
        }

        $area_id = $request ->area_id;
        $usuarios = $request -> usuario_id[0];
        $separador = ',';
        $id_usuarios = explode($separador,$usuarios);
        $contador = count($id_usuarios);

       
        $id_registro = $request ->input('registro'); 

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

