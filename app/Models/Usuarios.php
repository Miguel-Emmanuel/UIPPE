<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Usuarios extends Model
{
    use HasApiTokens, HasFactory;
    protected $table = 'tb_usuarios';
    protected $primaryKey = 'id_usuario';
    protected $fillable = [
        'clave',
        'nombre',
        'app',
        'apm',
        'gen',
        'fn',
        'academico',
        'foto',
        'email',
        'pass',
        'id_tipo',
        'activo',
        'id_registro'
    ];

    public function tb_tipos() {
        return $this->belongsTo(Tipos::class,'id_tipo');
    }

    public function areasusuarios() {
        return $this->hasMany(AreasUsuarios::class, 'id_usuario', 'usuario_id');

    }

    // public function Calendarizars() {
    //     return $this->hasMany(Calendarizars::class, 'usuario_id', 'id_usuario');

    // }
    
}
