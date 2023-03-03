<?php

namespace App\Http\Controllers;

use App\Models\Metas;
use Illuminate\Http\Request;

class MetasController extends Controller
{
    public function index()
    {
        $metas = Metas::all();
        return view('metas.index')
            ->with(['metas' => $metas]);
    }
}
