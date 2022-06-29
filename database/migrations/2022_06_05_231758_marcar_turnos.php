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
        Schema::create('marcar_turnos', function (Blueprint $table) {
            $table->id('id_turno');
            $table->date('fecha');
            $table->time('marcar_entrada')->nullable();
            $table->time('marcar_salida')->nullable();
            $table->unsignedBigInteger('id_empleado');
            $table->foreign('id_empleado')
                ->references('ci')
                ->on('empleados')
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
        //
    }
};
