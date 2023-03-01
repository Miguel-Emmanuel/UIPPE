<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendarizars extends Model
{
    use HasFactory;
    protected $table = 'tb_calendarizars';
    protected $primaryKey = 'id_entrega';
    protected $fillable = [
        'id_areameta',
        'fechaentrega',
        'activo'
    ];
}
