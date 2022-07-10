<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use App\Models\Producto;
use App\Http\Controllers;

class ResetProductosListener
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
        if ($event->resertproducto->count() > 0){
            $producto = Producto::get();
            foreach ($producto as $p) {
                //dd($p->cantidadMomento);
                $p->where('updated_at','<>',now())
                    ->update(["cantidadMomento" => $p->cantidadActualizar]);
            }
        }
    }
}
