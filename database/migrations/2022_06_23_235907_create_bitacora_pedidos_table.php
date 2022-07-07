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
        Schema::create('bitacora_pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('user');
            $table->string('accion');
            $table->date('fecha_bpedido');
            $table->time('hora_bpedido');
            $table->unsignedBigInteger('id_pedido');
            $table->unsignedBigInteger('nro_mesa');
            $table->unsignedBigInteger('ci_empleado');
            $table->string('estado');
            $table->date('fecha');
            $table->time('hora');
            $table->decimal('precio_total')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bitacora_pedidos');
    }
};
