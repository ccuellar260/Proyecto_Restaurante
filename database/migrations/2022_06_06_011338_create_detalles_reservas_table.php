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
        Schema::create('detalles_reservas', function (Blueprint $table) {
            $table->id('id_detalle');
            $table->unsignedBigInteger('id_reserva');
            $table->unsignedBigInteger('nro_mesa');
            $table->integer('cantidad');

            $table->foreign('id_reserva')
               ->references('id_reserva')
               ->on('reservas')
               ->onDelete('Cascade')
               ->onUpdate('Cascade');

            $table->foreign('nro_mesa')
               ->references('nro_mesa')
               ->on('mesas')
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
        Schema::dropIfExists('detalles_reservas');
    }
};
