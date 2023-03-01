<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreasMetas extends Model
{
    use HasFactory;
    protected $table = 'tb_areasmetas';
    protected $primaryKey = 'id_areasmetas';
    protected $fillable = [
        'id_area',
        'id_meta',
        'id_programa',
        'objetivo',
         'id_registro'
    ];
}
