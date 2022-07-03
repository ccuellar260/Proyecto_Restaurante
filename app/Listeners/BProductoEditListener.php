<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Models\BitacoraProducto;
use Illuminate\Support\Facades\Auth;

class BProductoEditListener
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
        $producto->accion = 'editar';
        $producto->fecha = now();
        $producto->hora = now();
        $producto->id_producto = $event->bproductoedit->id_producto;
        $producto->nombre = $event->bproductoedit->nombre;
        $producto->descripcion = $event->bproductoedit->descripcion;
        $producto->precio = $event->bproductoedit->precio;
        $producto->cantidadActualizar = $event->bproductoedit->cantidadActualizar;
        $producto->url = $event->bproductoedit->url;
        $producto->id_tipo_plato = $event->bproductoedit->id_tipo_plato;
        $producto->save();

    }
}
