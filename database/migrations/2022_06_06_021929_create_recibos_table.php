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
        Schema::create('recibos', function (Blueprint $table) {
            $table->id('id_recibo');
            $table->decimal('precio_total');

            $table->unsignedBigInteger('ci_cliente');
            $table->unsignedBigInteger('id_pedido')->unique();
            $table->foreign('ci_cliente')
                    ->references('ci')
                    ->on('clientes')
                    ->onDelete('Cascade')
                    ->onUpdate('Cascade');

             $table->foreign('id_pedido')
                    ->references('id_pedido')
                    ->on('pedidos')
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
        Schema::dropIfExists('recibos');
    }
};
