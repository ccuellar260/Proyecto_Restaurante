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
       //dd($r);
        if($r->metodo == 'edit'){
            for ($i=0;$i<count($r->producto);$i++){
                if($r->cantidad[$i]!=0){
                //sacar en detalle para saber cuanto hacer la diferencia
                $detalle = DetallePedido::where('id_pedido',$r->pedido)
                                          ->where('id_producto',$r->producto[$i])
                                          ->first();
                 //si es nulo, significa que el producto es nuevo
                  if(is_null($detalle)){
                    $cantidadA = 0;
                  }else{
                        $cantidadA = $detalle->cantidad;
                        //dd($cantidadA);
                        }
                    $cantidadB = $r->cantidad[$i];
                   //dd($cantidadB);
                    //quien es mayor
                        if($cantidadA < $cantidadB){
                            //dd('entre');
                        $cant = $cantidadB - $cantidadA;
                        //hay cantidad disponible
                            if($producto[$i]->cantidadMomento < $cant ){
                                //dd('entre');
                                return redirect()->Route('Pedido.editarPedido', $r->pedido)
                                            ->with("status{$producto[$i]->id_producto}",
                                            "Solo queda {$producto[$i]->cantidadMomento} {$producto[$i]->nombre} ");
                            }
                             //dd('no entre');
                       }
                       // dd('no entre');
                    }//end if cantidad difrente de cero!!

            } //end for\
            return $next($r);
        } //end if edit


    } //end metodo prinpcial
}//end clase
