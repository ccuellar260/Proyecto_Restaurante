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
