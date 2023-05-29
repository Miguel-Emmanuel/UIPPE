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
        'area_id',
        'meta_id',
        'id_programa',
        'objetivo',
        'id_registro'
    ];
    public function programas()
    {
        return $this->hasMany('App\Models\Programas');
    }
    public function areas()
    {
        return $this->hasMany('App\Models\Areas');
    }
    public function metas()
    {
        return $this->hasMany('App\Models\Metas');
    }

    public function Calendarizars() {
        return $this->hasMany(Calendarizars::class, 'areameta_id', 'id_areasmetas');

    }
}
