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
        schema::create('tb_metas', function (Blueprint $table){
            $table->increments('id_meta');
            $table->string('clave', 30)->nullable();
            $table->text('nombre');
            $table->text('descripcion')->nullable();
            $table->text('unidadmedida')->nullable();
            $table->integer('programa_id')->unsigned();
            $table->foreign('programa_id')->references('id_programa')->on('tb_programas');
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
        schema::dropIfExists('tb_metas');

    }
};
