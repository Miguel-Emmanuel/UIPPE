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
        $areas = Areas::all()->where('activo', '>', '0'); //Todas las areas activas

        $asig = AreasUsuarios::select('id_areasusuarios','tb_areas.id_area','tb_areas.clave','tb_areas.nombre','tb_areas.descripcion', ('tb_usuarios.nombre AS nombreU'),'tb_usuarios.app','tb_usuarios.apm', 'tb_usuarios.gen', 'tb_usuarios.fn','tb_usuarios.email','tb_usuarios.foto')
        ->join('tb_areas', 'tb_areasusuarios.area_id',  'tb_areas.id_area')
        ->join('tb_usuarios','tb_areasusuarios.usuario_id' , 'tb_usuarios.id_usuario')
        ->get();

        //INFORMACIÓN que solo veran los usuarios nivel 3
        $usuarios = \DB::SELECT('SELECT * FROM tb_usuarios AS users WHERE users.id_usuario NOT IN (SELECT usuario_id FROM tb_areasusuarios) AND users.activo > 0 AND users.id_tipo >= 3');

        //Consulta para traer la información al MODAL DETALLE función solo para usuarios nivel 1 y 2  
        $modalDetalle = \DB::SELECT('SELECT tb_areasusuarios.id_areasusuarios,tb_usuarios.foto, tb_usuarios.nombre,tb_usuarios.app, tb_usuarios.apm, tb_usuarios.email, tb_usuarios.fn, tb_areas.clave, tb_areas.nombre as nombreA, tb_areas.id_area, tb_areas.descripcion 
        FROM tb_areasusuarios INNER JOIN tb_usuarios ON tb_areasusuarios.usuario_id = tb_usuarios.id_usuario 
            INNER JOIN tb_areas ON tb_areas.id_area = tb_areasusuarios.area_id');

        //Consulta para traer la información al MODAL EDITAR función solo para usuarios nivel 1y 2  
        $modalEdit = \DB::SELECT('SELECT tb_areasusuarios.id_areasusuarios, tb_usuarios.nombre AS nombreU, tb_usuarios.app, tb_usuarios.apm
        FROM tb_areasusuarios
        JOIN tb_usuarios ON tb_areasusuarios.usuario_id = tb_usuarios.id_usuario');
        return view('areas-usuarios.index', compact('areas','usuarios','asig', 'modalDetalle', 'modalEdit'));
    }

    public function store(Request $request){

        // dd($request->all()); Mue
        if ($request->input('activo') == '') {
            $activo = 0;
        } else if ($request->input('activo') == 'on') {
            $activo = 1;
        }else{
            $activo = 1;
        }

        $area_id = $request -> area_id;
        $usuarios = $request -> usuario_id[0]; //Se guardan las usuarios que hay que asignar al área en un array
        $separador = ',';
        $id_usuarios = explode($separador,$usuarios);// El método explode los seprara
        $contador = count($id_usuarios);

        $id_registro = $request -> input('registro');
        // Se utiliza un for para asignar varios usuarios a una área
        for($i = 0; $i<$contador; $i++){
            AreasUsuarios::create(array(
                'area_id' => $area_id,
                'usuario_id' => $id_usuarios[$i],
                'activo' => $activo,
                'id_registro' => $activo
            ));
        }

        return redirect('areas-usuarios');

    }
    
    public function destroy(AreasUsuarios $id){
        $query = AreasUsuarios::findOrFail($id->id_areasusuarios);
        $query->delete();
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