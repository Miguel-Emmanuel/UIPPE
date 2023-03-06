<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metas extends Model
{
    use HasFactory;
    protected $table = 'tb_metas';
    protected $primaryKey = 'id_meta';
    protected $fillable = [
        'clave',
        'nombre',
        'descripcion',
        'activo',
        'id_registro'
    ];
}
