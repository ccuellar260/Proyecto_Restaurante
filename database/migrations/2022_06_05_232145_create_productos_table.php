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
        Schema::create('productos', function (Blueprint $table) {
            $table->id('id_producto');
            $table->string('nombre');
            $table->text('descripcion');
            $table->decimal('precio');
            $table->integer('cantidadMomento');
            $table->integer('cantidadActualizar');
            $table->text('url');
            $table->unsignedBigInteger('id_tipo_plato');

            $table->foreign('id_tipo_plato')
            ->references('id_tipo_plato')
            ->on('tipo_productos')
            ->onDelete('Cascade')
            ->onUpdate('Cascade');

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
};
