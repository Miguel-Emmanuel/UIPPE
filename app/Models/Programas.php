<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programas extends Model
{
    use HasFactory;
    protected $table = 'tb_programas';
    protected $primaryKey = 'id_programa';
    protected $fillable = [
        'abreviatura',
        'nombre',
        'descripcion',
        'activo',
        'id_registro'
    ];
}
