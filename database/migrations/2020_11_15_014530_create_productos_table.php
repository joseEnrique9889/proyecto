<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
             $table->string('nombre');
            $table->unsignedbigInteger('categoria_id');
            $table->string('descripcion');
            $table->string('imagen');
            $table->bigInteger('cantidad')->unisigned()->default(1);
            $table->decimal('precio',12,2)->default(0);
            $table->string('estado');
            //$table->string('categoria');
            //$table->char('activo',2);
            $table->enum('recibido', ['recibido','no recibido'])->default('no recibido');
            $table->tinyInteger('concesionado')->nullable();
            $table->string('motivo')->nullable();
            $table->tinyInteger('comprado')->nullable()->default(0);
           // $table->enum('concesionado', ['Si', 'No'])->default('No');
            $table->timestamps();

             $table->foreignId('user_id')->references('id')->on('users');
             $table->foreign('categoria_id')->references('id')->on('categorias');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
