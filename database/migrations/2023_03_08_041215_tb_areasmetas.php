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
        schema::create('tb_areasmetas', function (Blueprint $table){
            $table->increments('id_areasmetas');
            $table->integer('area_id')->unsigned();
            $table->foreign('area_id')->references('id_area')->on('tb_areas');
            $table->integer('meta_id')->unsigned();
            $table->foreign('meta_id')->references('id_meta')->on('tb_metas');
            $table->integer('id_programa');
            $table->string('objetivo');
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
        schema::dropIfExists('tb_areasmetas');

    }
};
