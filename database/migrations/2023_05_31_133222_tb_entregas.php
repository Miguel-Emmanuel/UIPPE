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
        schema::create('tb_entregas', function (Blueprint $table){
            $table->increments('id_entregas');
            $table->integer('areameta_id')->unsigned();
            $table->foreign('areameta_id')->references('id_areasmetas')->on('tb_areasmetas');
            $table->integer('meses_id')->unsigned();
            $table->foreign('meses_id')->references('id_meses')->on('tb_meses');
            $table->integer('id_registro');
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
        schema::dropIfExists('tb_entregas');
    }
};
