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
        $producto = Producto::get();
       // $producto = Producto::whereDate('updated_at','<>','2022-07-20')->get();
       // dd($producto);
            foreach ($producto as $p) {

                $ff = $p->selectRaw('DATE(updated_at) as fecha' )
                      ->first();
                if($ff->fecha !=  date('Y-m-d')){
                    $p->cantidadMomento = $p->cantidadActualizar;
                    $p->save();
                }
            }

    }
}
