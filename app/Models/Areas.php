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
      /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

     public function areameta() {
        return $this->hasOne(AreasMetas::class, 'id', 'programa_id');
    }

    public function areasusuarios() {
        return $this->hasMany(AreasUsuarios::class, 'id_area', 'area_id');

    }

}
