<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\DetallePedido;

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

        $producto = Producto::get();

        if($r->metodo == 'create'){
            for ($i=0;$i<count($r->producto);$i++){
               // dd( $producto[$i]->cantidadMomento);
                if($r->cantidad[$i] > $producto[$i]->cantidadMomento ){
                    //dd('redirecciona');
                    if($r->metodo == 'create'){
                        return redirect()->Route('Pedido.CrearPedido',$r->mesa)->with("status{$producto[$i]->id_producto}","Solo queda {$producto[$i]->cantidadMomento} {$producto[$i]->nombre} ");
                    }
                }
            }
             // dd('pasele nomas');
             return $next($r);  //si entra
        }


        //cuando es edit
        if($r->metodo == 'edit'){
            for ($i=0;$i<count($r->producto);$i++){
                $detalle = DetallePedido::where('id_pedido',$r->pedido)
                                          ->where('id_producto',$r->producto[$i])
                                          ->first();
               // dd($detalle);
                $cantidadA = $detalle->cantidad;
                $cantidadB = $r->cantidad[$i];
                //dd($cantidadB);
                 //quien es mayor
                if($cantidadA > $cantidadB){
                    return $next($r);
                }else{
                    $cant = $cantidadB - $cantidadA;
                    //hay cantidad disponible
                        if($producto[$i]->cantidadMomento < $cant ){
                             return redirect()->Route('Pedido.editarPedido', $r->pedido)
                                        ->with("status{$producto[$i]->id_producto}",
                                        "Solo queda {$producto[$i]->cantidadMomento} {$producto[$i]->nombre} ");

                        }else{
                                return $next($r);
                            }
                    //$pro->cantidadMomento = $pro->cantidadMomento - $cant;
                     }


                } //end for
        } //end if


    } //end metodo prinpcial
}//end clase
