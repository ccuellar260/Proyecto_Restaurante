<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DisminuirCantidadEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */

     public $producto;
     public $cantidadA;
     public $cantidadB;
    public function __construct($pro, $cantA, $cantB)
    {
       // $pro = Producto::get();
        //$pe=Producto::find();

        $this->producto = $pro;
        $this->cantidadA = $cantA;
        $this->cantidadB = $cantB;
    }
}
