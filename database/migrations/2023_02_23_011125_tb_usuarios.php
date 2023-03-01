<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     //
     schema::create('tb_usuarios', function (Blueprint $table){
        $table->bigincrements('id_usuario');
        $table->string('clave', 30);
        $table->string('nombre', 50);
        $table->string('app', 50);
        $table->string('apm', 50);
        $table->string('gen', 15);
        $table->date('fn');
        $table->text('academico');
        $table->text('foto')->nullable();
        $table->string('email')->unique();
        $table->string('pass');
        $table->integer('id_tipo');
        $table->boolean('activo');
        $table->integer('id_registro');
        $table->timestamps();


    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        schema::dropIfExists('tb_usuarios');
    }
};
