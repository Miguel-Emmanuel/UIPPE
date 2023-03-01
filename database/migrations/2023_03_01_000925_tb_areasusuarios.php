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
            $table->bigincrements('id_areasusuarios');
            $table->integer('id_area');
            $table->integer('id_usuario');
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
        schema::dropIfExists('tb_areasusuarios');

    }
};
