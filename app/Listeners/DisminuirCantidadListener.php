<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;


use App\Models\Producto;

class DisminuirCantidadListener
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
       // dd('hola mundo!! sd xd '. $event->producto);
        $pro =Producto::where('id_producto',$event->producto)->first();
        //quien es mayor
        //dd($pro);
        //dd($event->cantidadB);
        if($event->cantidadA > $event->cantidadB){
            $cant = $event->cantidadA - $event->cantidadB;
            $pro->cantidadMomento = $pro->cantidadMomento + $cant;
        }else{
            $cant = $event->cantidadB - $event->cantidadA;
            $pro->cantidadMomento = $pro->cantidadMomento - $cant;
        }
 
        $pro->save();
    }
}
