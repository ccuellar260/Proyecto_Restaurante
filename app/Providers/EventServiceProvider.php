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

        // conexion eventos y listener de bitacoraproducto
        BProductoCreateEvent::class =>[
            BProductoCreateListener::class,
        ],

        BProductoEditEvent::class =>[
            BProductoEditListener::class,
        ],

        BProductoDeleteEvent::class =>[
            BProductoDeleteListener::class,
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
