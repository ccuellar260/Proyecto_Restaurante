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
        Schema::create('detalle_pedidos', function (Blueprint $table) {
            $table->id('id_detalle');
            $table->integer('cantidad');
            $table->decimal('precio');
            $table->date('fecha');
            $table->time('hora');
            $table->unsignedBigInteger('id_pedido');
            $table->unsignedBigInteger('id_producto');

             $table->foreign('id_pedido')
                    ->references('id_pedido')
                    ->on('pedidos')
                    ->onDelete('Cascade')
                    ->onUpdate('Cascade');

            $table->foreign('id_producto')
                    ->references('id_producto')
                    ->on('productos')
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
        Schema::dropIfExists('detalle_pedidos');
    }
};
