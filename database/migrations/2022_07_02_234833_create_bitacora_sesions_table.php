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
        Schema::create('bitacora_sesions', function (Blueprint $table) {
            $table->id();
            $table->string('estado');
            $table->string('nombre_usuario');
            $table->date('fecha');
            $table->time('hora');
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
        Schema::dropIfExists('bitacora_sesions');
    }
};
