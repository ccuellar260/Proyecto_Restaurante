<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Models\BitacoraProducto;
use Illuminate\Support\Facades\Auth;

class BProductoCreateListener
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
        $producto->accion = 'insertar';
        $producto->fecha = now();
        $producto->hora = now();
        $producto->id_producto = $event->bproductocreate->id_producto;
        $producto->nombre = $event->bproductocreate->nombre;
        $producto->descripcion = $event->bproductocreate->descripcion;
        $producto->precio = $event->bproductocreate->precio;
        $producto->cantidadActualizar = $event->bproductocreate->cantidadActualizar;
        $producto->url = $event->bproductocreate->url;
        $producto->id_tipo_plato = $event->bproductocreate->id_tipo_plato;
        $producto->save();
    }
}
