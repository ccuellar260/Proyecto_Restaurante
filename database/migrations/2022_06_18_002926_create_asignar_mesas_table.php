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
        Schema::create('asignar_mesas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nro_mesa');
            $table->unsignedBigInteger('ci_empleado');

            $table->foreign('nro_mesa')
               ->references('nro_mesa')
               ->on('mesas')
               ->onDelete('Cascade')
               ->onUpdate('Cascade');

             $table->foreign('ci_empleado')
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
        Schema::dropIfExists('asignar_mesas');
    }
};
