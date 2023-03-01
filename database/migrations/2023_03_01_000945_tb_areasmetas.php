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
            $table->bigincrements('id_areasmetas');
            $table->integer('id_area');
            $table->integer('id_meta');
            $table->integer('id_programa');
            $table->integer('objetivo');
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
