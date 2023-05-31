<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entregas extends Model
{
    use HasFactory;
    protected $table = 'tb_entregas';
    protected $primaryKey = 'id_entregas';
    protected $fillable = [
        'id_entregas',
        'areameta_id',
        'meses_id',
        'id_registro',
        'cantidad',
        'activo'
    ];

    public function AreasMetas() {
        return $this->belongsTo(AreasMetas::class,'areameta_id');
    }

    public function Meses() {
        return $this->belongsTo(Meses::class,'meses_id');
    }
}
