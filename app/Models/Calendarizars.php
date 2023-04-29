<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendarizars extends Model
{
    use HasFactory;
    protected $table = 'tb_calendarizars';
    protected $primaryKey = 'id_calendario';
    protected $fillable = [
        'areameta_id',
        'meses_id',
        'fecha',
        'id_registro', // 'usuario_id',
        'cantidad',
        'activo'
    ];

    public function AreasMetas() {
        return $this->belongsTo(AreasMetas::class,'areameta_id');
    }

    // public function Usuarios() {
    //     return $this->belongsTo(Usuarios::class,'usuario_id');
    // }

}
