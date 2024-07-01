<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\DB;
use App\Models\Bitacora;

class LogAuthenticationEvents
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handleLogin(Login $event): void
    {
        $bitacora = new Bitacora();
        $bitacora->accion = 'Inicio de sesion';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id = $event->user->id;
        $bitacora->save();
    }

    public function handleLogout(Logout $event): void
    {
        $bitacora = new Bitacora();
        $bitacora->accion = 'Cierre de sesion';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id = $event->user->id;
        $bitacora->save();
    }
}
