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
        schema::create('tb_usuarios', function (Blueprint $table){
            $table->bigincrements('id_usuario');
            $table->string('nombre', 50);
            $table->string('apellido', 50);
            $table->string('email');
            $table->string('password');
            // $table->boolean('activo');
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
        schema::dropIfExists('tb_usuarios');
    }
};
