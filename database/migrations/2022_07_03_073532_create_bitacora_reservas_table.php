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
        Schema::create('bitacora_reservas', function (Blueprint $table) {
            $table->id();
            $table->string('user');
            $table->string('accion');
            $table->date('fecha');
            $table->time('hora');
            $table->unsignedBigInteger('id_reserva');
            $table->date('fecha_reserva');
            $table->time('hora_reserva');
            $table->unsignedBigInteger('ci_cliente');
            $table->unsignedBigInteger('ci_empleado');
            $table->unsignedBigInteger('nro_mesa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bitacora_reservas');
    }
};
