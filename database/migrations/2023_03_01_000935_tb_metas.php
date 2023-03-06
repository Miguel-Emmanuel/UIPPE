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
            $table->bigincrements('id_meta');
            $table->string('clave', 30)->nullable();
            $table->string('nombre', 50);
            $table->text('descripcion')->nullable();
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
