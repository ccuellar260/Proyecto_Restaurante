<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoCantidad
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
       // dd($r);
        $producto = Producto::get();
        $count = count($r->producto);
        //dd($producto);
        for ($i=0;$i<$count;$i++){
           // dd( $producto[$i]->cantidadMomento);
            if($r->cantidad[$i] > $producto[$i]->cantidadMomento ){
                //dd('redirecciona');
                return redirect()->Route('Pedido.CrearPedido',$r->mesa)->with("status{$producto[$i]->id_producto}","Solo queda {$producto[$i]->cantidadMomento} {$producto[$i]->nombre} ");
            }
        }
       // dd('pasele nomas');
        return $next($r);  //si entra


        // $producto = Producto::where('id_producto',$r->producto)->first();
        // if($r->cantidad > $producto->cantidad ){
        //       //no entra, mostrar cantidad no disponible
        //        return redirect()->Route('Pedido.Create',$r->pedido)->with("status{$producto->id_producto}","Solo queda {$producto->cantidad} {$producto->nombre} ");
        // }

        // return $next($r);  //si entra

    }
}
