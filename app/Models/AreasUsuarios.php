<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreasUsuarios extends Model
{
    use HasFactory;
    protected $table = 'tb_areasusuarios';
    protected $primaryKey = 'id_areasusuarios';
    protected $fillable = [
        'id_area',
        'id_usuario',
        'activo',
        'id_registro'
    ];
}
