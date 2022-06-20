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
        Schema::create('mesas', function (Blueprint $table) {
            $table->id('nro_mesa');
            $table->string('estado');
            $table->unsignedBigInteger('id_tipo_mesa');
            $table->unsignedBigInteger('id_ambiente');
            $table->unsignedBigInteger('ci_empleado')->nullable();

            $table->foreign('id_tipo_mesa')
              ->references('id_tipo_mesa')
              ->on('tipo_mesas')
              ->onDelete('Cascade')
              ->onUpdate('Cascade');

              $table->foreign('id_ambiente')
              ->references('id_ambiente')
              ->on('ambientes')
              ->onDelete('Cascade')
              ->onUpdate('Cascade');

              $table->foreign('ci_empleado')->nullable()
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
        Schema::dropIfExists('mesas');
    }
};
