<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
        return $this->belongsTo(tb_tipos::class,'id_tipo');
    }

    protected $hidden = [
        'pass',
    ];

}
