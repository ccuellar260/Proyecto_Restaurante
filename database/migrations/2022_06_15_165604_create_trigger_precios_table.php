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
        DB::unprepared('
            CREATE TRIGGER TriggerPrecio BEFORE INSERT ON detalle_pedidos
            FOR EACH ROW update pedidos set precio_total = precio_total + new.precio where id_pedido = new.id_pedido
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER "TriggerPrecio"');
    }
};
