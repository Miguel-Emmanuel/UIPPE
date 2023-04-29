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
        Schema::create('tb_meses', function (Blueprint $table)
        {
           $table -> increments('id_meses');
           $table -> integer('Enero'); 
           $table -> integer('Febrero'); 
           $table -> integer('Marzo'); 
           $table -> integer('Abril'); 
           $table -> integer('Mayo'); 
           $table -> integer('Junio'); 
           $table -> integer('Julio'); 
           $table -> integer('Agosto'); 
           $table -> integer('Septiembre'); 
           $table -> integer('Octubre'); 
           $table -> integer('Noviembre'); 
           $table -> integer('Diciembre');
           $table -> year('year');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::dropIfExists('tb_meses');
    }
};
