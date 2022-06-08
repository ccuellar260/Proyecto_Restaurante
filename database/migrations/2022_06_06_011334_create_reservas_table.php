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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id('id_reserva');
            $table->date('fecha_reserva');
            $table->time('hora_reserva');
            $table->unsignedBigInteger('ci_cliente');
            $table->unsignedBigInteger('ci_empleado');

            $table->foreign('ci_cliente')
                ->references('ci')
                ->on('clientes')
                ->onDelete('Cascade')
                ->onCascade('Cascade');

            $table->foreign('ci_empleado')
                ->references('ci')
                ->on('empleados')
                ->onDelete('Cascade')
                ->onCascade('Cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservas');
    }
};
