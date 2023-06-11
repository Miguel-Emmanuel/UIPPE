<?php

namespace App\Http\Controllers;

use App\Models\Areas;
use App\Models\AreasUsuarios;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\Expr\FuncCall;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AreasUsExport;


class AreasUsuariosController extends Controller
{
    public function index(){
        $areausuario = AreasUsuarios::select('tb_areasusuarios.id_areasusuarios','tb_areas.nombre as area_id', 'tb_usuarios.nombre as usuario_id', 'tb_areasusuarios.activo' )
        ->join('tb_areas','tb_areas.id_area','tb_areasusuarios.area_id')
        ->join('tb_usuarios','tb_usuarios.id_usuario','tb_areasusuarios.usuario_id')
        ->get();
        $areas = Areas::all();
        $asig = AreasUsuarios::select('tb_areas.id_area','tb_areas.clave','tb_areas.nombre','tb_areas.descripcion','tb_areas.activo', ('tb_usuarios.nombre AS nombreU'),'tb_usuarios.app','tb_usuarios.apm', 'tb_usuarios.gen', 'tb_usuarios.fn','tb_usuarios.email','tb_usuarios.foto' )
        ->join('tb_areas', 'tb_areasusuarios.area_id',  'tb_areas.id_area')
        ->join('tb_usuarios','tb_areasusuarios.usuario_id' , 'tb_usuarios.id_usuario')->get();
        $usuarios = Usuarios::all();
        return view('areas-usuarios.index', compact('areausuario','areas','usuarios','asig'));
    }

    public function store(Request $request){

        // dd($request->all());
        if ($request->input('activo') == '') {
            $activo = 0;
        } else if ($request->input('activo') == 'on') {
            $activo = 1;
        }else{
            $activo = 1;
        }

        $area_id = $request -> area_id;
        $usuarios = $request -> usuario_id[0];
        $separador = ',';
        $id_usuarios = explode($separador,$usuarios);
        $contador = count($id_usuarios);

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

    }


    public function pdfau()
    {
            

        $areausuario = AreasUsuarios::select('tb_areasusuarios.id_areasusuarios','tb_areas.nombre as area_id', 'tb_usuarios.nombre as usuario_id', 'tb_areasusuarios.activo' )
        ->join('tb_areas','tb_areas.id_area','tb_areasusuarios.area_id')
        ->join('tb_usuarios','tb_usuarios.id_usuario','tb_areasusuarios.usuario_id')
        ->get();

        $pdf = PDF::loadView('Documentos.pdfau',['areausuario'=>$areausuario]);
        //----------Visualizar el PDF ------------------
       return $pdf->stream(); 
       // ------Descargar el PDF------
       //return $pdf->download('___libros.pdf');

    
    }
    public function export() 
    {
        return Excel::download(new AreasUsExport, 'AreasUsuarios.xlsx');
    }
}

