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
        Schema::create('bitacora_empleados', function (Blueprint $table) {
            $table->id();
            $table->string('user');
            $table->string('accion');
            $table->date('fecha');
            $table->time('hora');
            $table->unsignedBigInteger('ci');
            $table->string('nombre_completo');
            $table->integer('telefono')->nullable();
            $table->text('foto')->nullable();
            $table->string('nombre_usuario');
            $table->string('correo_electronico');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bitacora_empleados');
    }
};
