<?php

namespace App\Http\Controllers;

use App\Models\Metas;
use Illuminate\Http\Request;

class MetasController extends Controller
{
    public function metas()
    {
        $metas = Metas::all();
        return view('dashboard.metas.index')
            ->with(['metas' => $metas]);
    }
}
