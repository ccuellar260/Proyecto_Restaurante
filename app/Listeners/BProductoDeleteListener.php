<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Models\BitacoraProducto;
use Illuminate\Support\Facades\Auth;

class BProductoDeleteListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $producto = new BitacoraProducto();
        $producto->user = Auth::user()->nombre_usuario;
        $producto->accion = 'eliminar';
        $producto->fecha = now();
        $producto->hora = now();
        $producto->id_producto = $event->bproductodelete->id_producto;
        $producto->nombre = $event->bproductodelete->nombre;
        $producto->descripcion = $event->bproductodelete->descripcion;
        $producto->precio = $event->bproductodelete->precio;
        $producto->cantidadActualizar = $event->bproductodelete->cantidadActualizar;
        $producto->url = $event->bproductodelete->url;
        $producto->id_tipo_plato = $event->bproductodelete->id_tipo_plato;
        $producto->save();
    }
}
