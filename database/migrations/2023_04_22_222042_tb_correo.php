<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('tb_correo', function (Blueprint $table){
            $table->increments('id_correo');
            $table->text('destinatario');
            $table->text('asunto');
            $table->text('contenido');
            $table->text('remitente')->nullable();
            $table->dateTime('fecha_envio')->default(DB::raw('CURRENT_TIMESTAMP'));

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
        schema::dropIfExists('tb_correo');
    }
};
