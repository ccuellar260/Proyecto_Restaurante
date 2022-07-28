<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConfirmarReserva
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
      // dd($request);

      if($request->fecha < date('Y-m-d')){
        dd('la fecha ingresada es mehor ');
      }

        $reservas = DB::table('reservas')->get();

        foreach ($reservas as $r) {
            $hr_ini = date('H:i:s', strtotime('- 29 minutes', strtotime ($r->hora_reserva) ));
            $hr_fin = date('H:i:s', strtotime('+ 29 minutes', strtotime ($r->hora_reserva) ));

            if(($r->fecha_reserva == $request->fecha) && ($request->hora >= $hr_ini ) &&($request->hora <= $hr_fin) ){
                return redirect()->Route('Reserva.create')
                ->with('hora_reserva','La hora marcada ya esta reservada');
            }

        }

        return $next($request);
    }
}
