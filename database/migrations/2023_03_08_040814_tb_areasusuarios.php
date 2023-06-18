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
        schema::create('tb_areasusuarios', function (Blueprint $table){
            $table->increments('id_areasusuarios');
            $table->integer('area_id')->unsigned();
            $table->foreign('area_id')->references('id_area')->on('tb_areas');
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id_usuario')->on('tb_usuarios');
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
        schema::dropIfExists('tb_areasusuarios');

    }
};
