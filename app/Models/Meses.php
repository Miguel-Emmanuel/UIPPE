<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meses extends Model
{
    use HasFactory;
    protected $table = 'tb_meses';
    protected $primaryKey = 'id_meses';
    protected $fillable = [
        'm_enero',
        'm_febrero',
        'm_marzo',
        'm_abril',
        'm_mayo',
        'm_junio',
        'm_julio',
        'm_agosto',
        'm_septiembre',
        'm_octubre',
        'm_noviembre',
        'm_diciembre',
        'm_cantidad',
        'm_year',
        'm_fecha'
    ];

    public function Calendarizars() {
        return $this->hasMany(Calendarizars::class, 'meses_id', 'id_meses');

    }
}
