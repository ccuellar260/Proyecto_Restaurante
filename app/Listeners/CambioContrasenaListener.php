<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Models\User;


class CambioContrasenaListener
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
        $user = User::where('nombre_usuario',$event->user)->first();
        $fecha1= $user->fecha_cambio_contra;
      //  $fecha2 = date('Y-m-d');
        $fecha2 = "2022-09-19";

        $diferencia = date_diff(date_create($fecha1), date_create($fecha2))->format('%R%a');
      //  dd($diferencia);
        if(intval($diferencia) > 15){
            dd('entre');
        }dd('no entre');


        $fecha2= date_create("2022-06-19");
        //$dif = date_diff($fecha1,$fecha2);
        $dif = date_diff($fecha1, $fecha2)->format('%R%a');
        dd($dif);
    }
}
