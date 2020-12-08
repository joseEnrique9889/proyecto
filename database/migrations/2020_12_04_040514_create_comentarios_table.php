<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->text('contenido');
            $table->string('respuesta')->nullable();
           // $table->tinyInteger('repuesta_id')->nullable()
            $table->unsignedbigInteger('user_id');
            $table->timestamp('hora_p');
            $table->foreignId('producto_id')->references('id')->on('productos')->nullable();
           
            
            $table->foreign('user_id')->references('id')->on('users');
            
            $table->timestamp('p_autorizada')->nullable();
            $table->timestamp('r_autorizada')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comentarios');
    }
}
