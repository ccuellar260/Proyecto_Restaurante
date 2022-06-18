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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id('ci');
            $table->string('nombre_completo');
            $table->integer('telefono')->nullable();
            $table->text('foto')->nullable();
            $table->string('nombre_usuario')->unique();
            $table->foreign('nombre_usuario')
                ->references('nombre_usuario')
                ->on('users')
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
        Schema::dropIfExists('empleados');
    }
};
