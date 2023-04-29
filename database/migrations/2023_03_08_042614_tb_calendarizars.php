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
        schema::create('tb_calendarizars', function (Blueprint $table){
            $table->increments('id_calendario');
            $table->integer('areameta_id')->unsigned();
            $table->foreign('areameta_id')->references('id_areasmetas')->on('tb_areasmetas');
            $table->integer('meses_id')->unsigned();
            $table->foreign('meses_id')->references('id_meses')->on('tb_meses');
            $table->date('fecha');
            $table->integer('id_registro');
            // $table->integer('usuario_id')->unsigned();
            // $table->foreign('usuario_id')->references('id_usuario')->on('tb_usuarios');
            $table->integer('cantidad');
            $table->boolean('activo');
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
        schema::dropIfExists('tb_calendarizars');

    }
};
