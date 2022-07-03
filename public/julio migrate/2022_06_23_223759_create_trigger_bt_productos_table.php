<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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

        DB::unprepared('
        CREATE TRIGGER TriggerCantidad BEFORE INSERT ON detalle_pedidos
        FOR EACH ROW update productos set cantidadMomento = cantidadMomento - new.cantidad where id_producto = new.id_producto
       ');

        DB::unprepared("
        CREATE TRIGGER `TInsertProducto` AFTER INSERT ON `productos`
        FOR EACH ROW INSERT INTO bitacora_productos(user,accion,id_producto,nombre,precio,cantidad)
        VALUES ('chris','insertar',new.id_producto,new.nombre,new.precio,new.cantidadMomento)");

        DB::unprepared("
        CREATE TRIGGER `TEditProducto` AFTER UPDATE ON `productos`
        FOR EACH ROW INSERT INTO bitacora_productos(user,accion,id_producto,nombre,precio,cantidad)
        VALUES ('chris','edit',old.id_producto,old.nombre,old.precio,old.cantidadMomento)");

        DB::unprepared("
        CREATE TRIGGER `TDeleteProducto` AFTER DELETE ON `productos`
        FOR EACH ROW INSERT INTO bitacora_productos(user,accion,id_producto,nombre,precio,cantidad)
        VALUES ('chris','delete',old.id_producto,old.nombre,old.precio,old.cantidadMomento)");


        DB::unprepared("
        CREATE TRIGGER `TInsertPedido` AFTER UPDATE ON `pedidos`
        FOR EACH ROW INSERT INTO bitacora_pedidos(user,accion,id_pedido,nro_mesa,ci_empleado)
        VALUES ('chris','create',old.id_pedido,old.nro_mesa,old.ci_empleado)");


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER "TriggerCantidad"');
        DB::unprepared('DROP TRIGGER "TriggerPrecio"');
        DB::unprepared('DROP TRIGGER "TInsertProducto"');
        DB::unprepared('DROP TRIGGER "TEditProducto"');
        DB::unprepared('DROP TRIGGER "TDeleteProducto"');
        DB::unprepared('DROP TRIGGER "TEditPedido"');
    }
};
