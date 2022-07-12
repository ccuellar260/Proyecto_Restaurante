<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ResetearProductosListener
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
        dd($event);
        //si la hora es diferente refrescar
        $ff = config('app.fechaActualizarProd');
        
        if($fechaAntes != $fechaActual){
            dd('entre');
            //hacer el reseteo

            //modificar la variable
        }else return;
    }
}
