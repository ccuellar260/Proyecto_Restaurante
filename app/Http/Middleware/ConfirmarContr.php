<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; //para encriptar contrasenas
use App\Models\User;
class ConfirmarContr
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
        //dd( $r);
        $user = User::where('nombre_usuario',$r->nombre_usuario)
                  ->first();

        if (Hash::check($r->contra_antigua,$user->password)) {
            //verificar que las nuevas contras no esten en vacias
            if((is_null($r->contra_new) and ! is_null($r->contra_new2))
               or (! is_null($r->contra_new) and is_null($r->contra_new2))){
              // dd('uno de los de es null y el otro no');
                if(is_null($r->contra_new)){
                return redirect()->Route('Empleado.edit',$r->ci)->with("contra_vacia_contra_new",
                       'contrasena vacia');
                }else{
                    return redirect()->Route('Empleado.edit',$r->ci)->with("contra_vacia_contra_new2",
                       'contrasena vacia');
                    }
            }else{
               //dd('los 2 son nulos o los 2 tien datos');
                if ($r->contra_new == $r->contra_new2) {
                    return $next($r);
                    //seguir con el procedimiento
                }else{ // dd('las contraasenas no coinciden');
                    return redirect()->Route('Empleado.edit',$r->ci)
                    ->with('Contra_Nocoincide','la contrasenas no coinciden');
                        }
            }


        }else{
            return redirect()->Route('Empleado.edit',$r->ci)->with("Contra_incorrecta",
                       'contrasena incorrecta');
        }


    }
}
