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
        Schema::create('empleado_turnos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_empleado');
            $table->unsignedBigInteger('id_turno');

            $table->foreign('id_empleado')
               ->references('ci')
               ->on('empleados')
               ->onDelete('Cascade')
               ->onUpdate('Cascade');

            $table->foreign('id_turno')
               ->references('id_turno')
               ->on('turnos')
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
        Schema::dropIfExists('empleado_turnos');
    }
};
