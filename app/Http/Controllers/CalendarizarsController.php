<?php

namespace App\Http\Controllers;

use App\Models\Programas;
use Illuminate\Http\Request;

class CalendarizarsController extends Controller
{
    public function index()
    {
        $metas = \DB::select('SELECT meta.id_meta, meta.clave, meta.nombre as nombreM, meta.descripcion, meta.unidadmedida, meta.programa_id, meta.activo, meta.id_registro, programa.nombre as nombreP, programa.abreviatura as nombrePA FROM tb_metas as meta, tb_programas as programa WHERE meta.programa_id = programa.id_programa');
        $Programas = Programas::all('id_programa', 'nombre','abreviatura');
        return view('calendario.index', compact('metas'), compact('Programas'));
    }

    
}
