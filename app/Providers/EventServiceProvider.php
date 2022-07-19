<?php

namespace App\Providers;

use App\Events\BClienteCreateEvent;
use App\Events\BClienteEditEvent;
use App\Events\BClienteDeleteEvent;
use App\Listeners\BClienteCreateListener;
use App\Listeners\BClienteEditListener;
use App\Listeners\BClienteDeleteListener;

use App\Events\BEmpleadoCreateEvent;
use App\Events\BEmpleadoEditEvent;
use App\Events\BEmpleadoDeleteEvent;
use App\Listeners\BEmpleadoCreateListener;
use App\Listeners\BEmpleadoEditListener;
use App\Listeners\BEmpleadoDeleteListener;

use App\Events\BProductoCreateEvent;
use App\Events\BProductoEditEvent;
use App\Events\BProductoDeleteEvent;
use App\Listeners\BProductoCreateListener;
use App\Listeners\BProductoEditListener;
use App\Listeners\BProductoDeleteListener;

use App\Events\BReservaCreateEvent;
use App\Events\BReservaEditEvent;
use App\Events\BReservaDeleteEvent;
use App\Listeners\BReservaCreateListener;
use App\Listeners\BReservaEditListener;
use App\Listeners\BReservaDeleteListener;

use App\Events\BPedidoCreateEvent;
use App\Events\BPedidoEditEvent;
use App\Events\BPedidoDeleteEvent;
use App\Listeners\BPedidoCreateListener;
use App\Listeners\BPedidoEditListener;
use App\Listeners\BPedidoDeleteListener;

//resetear producto
use App\Events\ResetProductosEvent;
use App\Listeners\ResetProductosListener;
use App\Events\ResetearProductosEvent;
use App\Listeners\ResetearProductosListener;

//libreria de crish
use App\Events\DisminuirCantidadEvent;
use App\Listeners\DisminuirCantidadListener;
use App\Events\PrecioTotalEvent;
use App\Listeners\PrecioTotalListener;
use App\Events\CambioContrasenaEvent;
use App\Listeners\CambioContrasenaListener;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        //notificar que debe cambiar su contrasena //hecho por cris
        CambioContrasenaEvent::class => [
            CambioContrasenaListener::class,
        ],

        //dismunir la cantidad de productos //hecho por cris
        DisminuirCantidadEvent::class => [
            DisminuirCantidadListener::class,
        ],
         //precio total //hecho por cris
         PrecioTotalEvent::class => [
            PrecioTotalListener::class,
        ],

        // volver a su estado del cual empezo la cantidad de los productos
        ResetProductosEvent::class =>[
            ResetProductosListener::class,
        ],

        ResetearProductosEvent::class =>[
            ResetearProductosListener::class,
        ],

        //conexion eventos y listener de bitacora cliente
        BClienteCreateEvent::class =>[
            BClienteCreateListener::class,
        ],

        BClienteEditEvent::class =>[
            BClienteEditListener::class,
        ],

        BClienteDeleteEvent::class =>[
            BClienteDeleteListener::class,
        ],

        // conexion eventos y listener de bitacora empleados
        BEmpleadoCreateEvent::class =>[
            BEmpleadoCreateListener::class,
        ],

        BEmpleadoEditEvent::class =>[
            BEmpleadoEditListener::class,
        ],

        BEmpleadoDeleteEvent::class =>[
            BEmpleadoDeleteListener::class,
        ],

        // conexion eventos y listener de bitacora producto
        BProductoCreateEvent::class =>[
            BProductoCreateListener::class,
        ],

        BProductoEditEvent::class =>[
            BProductoEditListener::class,
        ],

        BProductoDeleteEvent::class =>[
            BProductoDeleteListener::class,
        ],

       // conexion eventos y listener de bitacora reserva
        BReservaCreateEvent::class =>[
            BReservaCreateListener::class,
        ],

        BReservaEditEvent::class =>[
            BReservaEditListener::class,
        ],

        BReservaDeleteEvent::class =>[
            BReservaDeleteListener::class,
        ],


       // conexion eventos y listener de bitacora pedido
        BPedidoCreateEvent::class =>[
            BPedidoCreateListener::class,
        ],

        BPedidoEditEvent::class =>[
            BPedidoEditListener::class,
        ],

        BPedidoDeleteEvent::class =>[
            BPedidoDeleteListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
