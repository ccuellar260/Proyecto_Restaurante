<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class ExisteCorreo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $r, Closure $next)
    {
        $user = User::get();
        foreach ($user as $u) {
            if($u->correo_electronico == $r->correo){
                //dd($u->correo_electronico);
                return redirect()->Route('Empleado.create')
                    ->with('correo','El correo electronico se encuentra registrado');
            }
        }
        return$next($r);

    }
}
