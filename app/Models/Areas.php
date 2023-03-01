<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Areas extends Model
{
    use HasFactory;
    protected $table = 'tb_areas';
    protected $primaryKey = 'id_area';
    protected $fillable = [
        'clave',
        'nombre',
        'descripcion',
        'foto',
        'activo',
         'id_registro'
    ];
}
