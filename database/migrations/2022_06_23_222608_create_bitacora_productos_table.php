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
        Schema::create('bitacora_productos', function (Blueprint $table) {
            $table->id();
            $table->string('user');
            $table->string('accion');
            $table->date('fecha');
            $table->time('hora');
            $table->unsignedBigInteger('id_producto');
            $table->string('nombre');
            $table->text('descripcion');
            $table->decimal('precio');
            $table->integer('cantidadActualizar');
            $table->text('url');
            $table->unsignedBigInteger('id_tipo_plato');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bitacora_productos');
    }
};
