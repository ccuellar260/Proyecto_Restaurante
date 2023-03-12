<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //para saber con que usuario estamos logueados
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

//domPDF
use PDF;


//eventos depedido
use App\Events\BPedidoEditEvent;
use App\Events\BPedidoDeleteEvent;
use App\Events\BPedidoCreateEvent;
//evento para dismunir cantidad
use App\Events\DisminuirCantidadEvent;
use App\Events\PrecioTotalEvent;

use App\Models\Pedido;
use App\Models\Empleado;
use App\Models\Mesa;
use App\Models\DetallePedido;
use App\Models\Producto;
use App\Models\User;
use App\Models\Cliente;
use App\Models\Recibo;



class PedidosController extends Controller
{
    //$pp = producto
    //public $pp = new ProductoController;

    public function index(){
      //  event(new ResetProductosEvent());

        $user = Auth::user()->nombre_usuario;
        //mostrar solo pedidos por pagar
        $pedidos =DB::table('pedidos')
                    ->where('estado','En Cocina')
                    ->orWhere('estado','Pedido Listo')
                    ->orWhere('estado','Realizar Pago')
                     ->get();
        //mostrar mesas disponibles
        $empleado = DB::table('empleados')->join('users','empleados.nombre_usuario','=','users.nombre_usuario')
        ->where('empleados.nombre_usuario',$user)->first();

         $mesas = DB::table('mesas')->where('estado','Disponible')
                    ->orWhere('estado','reserva')
                    ->where('ci_empleado',$empleado->ci)->get();
        //dd($mesas);


       // $mesas = DB::table('mesas')->get();

        $mesasAdmin = DB::table('mesas')->where('estado','Disponible')->get();
       // $mesasAdmin = DB::table('mesas')->get();

        $clientes = DB::table('clientes')->get();
        $detalles = DetallePedido::join('productos','detalle_pedidos.id_producto','=','productos.id_producto')
                            ->select('detalle_pedidos.*','productos.nombre',)
                            ->get();
        return view('VistasPedido.pedido',compact('pedidos','mesas','empleado','mesasAdmin',
                                                'clientes','detalles'));
    }

    public function storexd(Request $r){
        return redirect()->Route('Pedido.CrearPedido',$r->mesa);
    }

    public function crear_pedido(Mesa $mesa){
        //dd( $mesa);
        //$producto = Producto::get();
        //metodo where (recibe el atributo,recibo la variable de comparacion)
        $platos = DB::table('productos')->where('id_tipo_plato',1)->get();
        $bebidas = DB::table('productos')->where('id_tipo_plato',2)->get();
        $postres = DB::table('productos')->where('id_tipo_plato',3)->get();
      //  $user = Auth::user()->nombre_usuario;
     //   $empleado = Empleado::where('nombre_usuario',$user)->first();
     $user = Auth::user()->nombre_usuario;
     $empleado = DB::table('empleados')->where('nombre_usuario',$user)->first();
        $emp = $empleado->ci;
        $me= $mesa->nro_mesa;

        return view('VistasPedido.crearPedido',[
            'ci'=>$emp,
            'nro_mesa'=>$me,
            'platos'=>$platos,
            'bebidas'=>$bebidas,
            'postres'=>$postres
        ]);
    }
    public function storePedido(Request $r){
        $pedido = new Pedido();
        $pedido->nro_mesa = $r->mesa;
        $pedido->ci_empleado = $r->empleado;
        $pedido->estado = 'En Cocina';
        $pedido->fecha = date('Y-m-d');
        $pedido->hora = date('H:i:s');
        $pedido->save();

        // agregamos la informacion a bitacora peidio
        event(new BPedidoCreateEvent($pedido));

        //poner mesa en ocupado
        $mesa = Mesa::where('nro_mesa',$r->mesa)->first();
        $mesa->estado = 'Ocupado';
        $mesa->save();

        $count = count($r->producto);
        for ($i=0; $i < $count; $i++)
            if($r->cantidad[$i]>0){
            $detalle = new DetallePedido();
            $detalle->id_pedido= $pedido->id_pedido;
            $detalle->id_producto = $r->producto[$i];
            $detalle->cantidad = $r->cantidad[$i];
            $detalle->precio = (float)$r->precio[$i]* (float)$r->cantidad[$i];
            $detalle->save();
             }

        return redirect()->Route('Pedido.index');
    }

    //cambair estados
    public function StoreRealizarPago(Pedido $pedido){

        $pedido->estado = 'Realizar Pago';
        $pedido->save();
        return redirect()->Route('Pedido.index');
    }

    public function destroy(Pedido $pedido){
        //bitacora pedido
        event (new BPedidoDeleteEvent($pedido));

        $detalle = DetallePedido::where('id_pedido',$pedido->id_pedido)->get();
        foreach ($detalle as $de) {
            event(new DisminuirCantidadEvent($de->id_producto,$de->cantidad,0));
        }
        $pedido->delete();
        return redirect()->Route('Pedido.index');
    }

    //VER DETALLES
    public function mostrarDetalle(Pedido $pe){

        $de = DetallePedido::join('productos','detalle_pedidos.id_producto','=','productos.id_producto')
                            ->select('detalle_pedidos.*','productos.nombre')
                             ->where('id_pedido',$pe->id_pedido)->get();

        return view('VistasPedido.verPedido',[
                    'detalles'=>$de,
                    'pedido'=>$pe
                ]);
    }

    public function editarPedido( Pedido $pe){
        $de = DetallePedido::join('productos','detalle_pedidos.id_producto','=','productos.id_producto')
                        ->where('id_pedido',$pe->id_pedido)->get();
        //dd($de);

        // bitacora es va en update
       // event (new BPedidoEditEvent($pe));

        $productos = DB::table('productos')
            ->join('tipo_productos','productos.id_tipo_plato','=','tipo_productos.id_tipo_plato')
            ->select('productos.*','tipo_productos.Categoria')
            ->get();

        return view('VistasPedido.editarPedidos',[
                'detalles'=>$de,
                'pedido'=>$pe,
                'productos'=>$productos
                 ]);
    }

    public function updatePedido( Request $r,Pedido $pe){
      dd($r);
      //reeplando las mesas en pedido, falta hacer un dave
        $pe->nro_mesa = $r->mro_mesa;

        //saco el array de procuito nuevos y produtos viejos!!
        $todo_prod = $r->producto;
        //dd($todo_prod);
        $detalle_prod = DB::table('detalle_pedidos')   //detalles de pedido anterior
                    ->where('id_pedido',$pe->id_pedido)
                    ->get();
        //dd($detalle_prod);
        //hacer un marcador para verifcar si ya se paso por ahi
        $macado= [];
        for ($i=0; $i < count($todo_prod); $i++) {
            $macado[$i] = 'no marcado';
        }

        foreach ( $detalle_prod as $de ) {
            $ban = false;
            //detalle prod esta dentro del nuevo procutpo todo prod ???
            for ($i=0; $i < count($todo_prod) ; $i++) {  //recorrer todo pro
                //es igual a detalle prod??
                //dd($de);
                if(($de->id_producto == $todo_prod[$i])and ($r->cantidad[$i]>0)){
                  // remplazar;
                 // dd($r->cantidad[$i]);

                    if($de->cantidad != $r->cantidad[$i]){
                        //en detalle se guarda, una
                        $detalle = DetallePedido::where('id_producto',$de->id_producto)
                                                ->where('id_pedido',$pe->id_pedido)
                                                ->first();
                        event(new DisminuirCantidadEvent($de->id_producto,$detalle->cantidad,$r->cantidad[$i]));
                        $detalle->cantidad = $r->cantidad[$i];
                        $prod = Producto::where('id_producto',$todo_prod[$i])
                                    ->first();
                        $detalle->precio =  (float)$prod->precio * (float)$r->cantidad[$i];
                        $detalle->save();
                        //dd($detalle);

                    }
                    $macado[$i] = 'marcado';
                    $ban = true;
                    break;
                }



            }//end for de todo pro

            // =false, $de no esta dentro de todo pro, eliminarlo
            if ($ban == false) { //no se encontro que este dentro de todo pro // se debe eliminar
                $detalle = DetallePedido::where('id_producto',$de->id_producto)
                                        ->where('id_pedido',$pe->id_pedido)
                                        ->first();
                $detalle->delete();
                event(new DisminuirCantidadEvent($de->id_producto,$detalle->cantidad,0));


            }

        }// end for principal

        //verificar si hay algun nuevo prar crear
        for ($i=0; $i < count($todo_prod); $i++) {
            if (($macado[$i] == 'no marcado')and($r->cantidad[$i]>0)  ) {
                $detalle = new DetallePedido();
                $detalle->cantidad = $r->cantidad[$i];
                $prod = Producto::where('id_producto',$todo_prod[$i])
                                    ->first();
                $detalle->precio =  (float)$prod->precio * (float)$r->cantidad[$i];
                $detalle->id_pedido = $pe->id_pedido;
                $detalle->id_producto = $todo_prod[$i];
                $detalle->save();
            }
        }
        event(new PrecioTotalEvent($pe->id_pedido));
        return  redirect()->Route('Pedido.editarPedido', $pe->id_pedido);

    }//end


//-- Consultar Pedidos -----------------------------------------------------------//
    public function consultarPedidos(){
    $pedidos = DB::table('pedidos as p')
                    ->join('empleados as e','e.ci','=','p.ci_empleado')
                    ->join('recibos as r','r.id_pedido','=','p.id_pedido')
                    ->join('clientes as c','c.ci','=','r.ci_cliente')
                    ->select('r.id_recibo','c.nombre_completo as cliente',
                            'c.ci as ci_cliente','e.ci as ci_empleado',
                            'e.nombre_completo as empleado','p.*')
                    ->when(Request('pedido'),function($q){
                        return $q->where('p.id_pedido',Request('pedido'));
                    })
                    ->when(Request('mesa'),function($q){
                        return $q->where('p.nro_mesa',Request('mesa'));
                    })
                    ->when(Request('mesero'),function($q){
                        if(is_numeric(Request('mesero'))){
                            return $q->where('e.ci',Request('mesero'));
                        }else{
                            return $q->where('e.nombre_completo','like','%'.Request('mesero').'%');
                        }
                    })
                    ->when(Request('cliente'),function($q){
                        if(is_numeric(Request('cliente'))){
                            return $q->where('c.ci',Request('cliente'));
                        }else{
                            return $q->where('c.nombre_completo','like','%'.Request('cliente').'%');
                        }
                    })
                    ->when(Request('fecha'),function($q){
                            return $q->where('fecha',Request('fecha'));
                    })
                    ->get();

// dd($pedidos);

    $ventas = DB::table('pedidos')->get();

    // dd($ventas[3]->fecha);
    // dd(now()->toDateString());
    $v = Pedido::where('fecha',now()->toDateString())->sum('precio_total'); //suma las ventas del día
    $total = Pedido::sum('precio_total'); //suma las ventas totales
    // dd($v);

    //cantidad de ventas vendiad deld dia
    $ventas_del_dia = Pedido::where('fecha',now()->toDateString())->get(); //suma las ventas del día
  // dd($ventas_del_dia);

    return view('VistasPedido.consultarPedidos',compact('pedidos','v'));

    }



///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function storeRecibo(Request $re,Pedido $p){       //poner mesa en disponible
         $mesa = Mesa::where('nro_mesa',$p->nro_mesa)->first();
         $mesa->estado = 'Disponible';
         $mesa->save();
         $p->estado = 'Pagado';
         $p->save();
        //guardar en la base de datos
        $recibo = new Recibo();
        $recibo->precio_total = $p->precio_total;
        $recibo->ci_cliente = $re->cliente;
        $recibo->id_pedido = $p->id_pedido;
        $recibo->save();
        return redirect()->Route('Pedido.generarRecibo',$recibo->id_recibo);

    }

    public function generarRecibo(Recibo $recibo){
        // join recibo con cliente
        $recibo = Recibo::join('clientes','clientes.ci','=', 'recibos.ci_cliente')
                        ->join('pedidos','pedidos.id_pedido','=', 'recibos.id_pedido')
                        ->where('pedidos.id_pedido',$recibo->id_pedido)
                        ->where('ci', $recibo->ci_cliente)->first();

        // join detallepedido con producto
        $detalles = DetallePedido::join('productos as p','detalle_pedidos.id_producto','=','p.id_producto')
              ->select('detalle_pedidos.*','p.nombre','p.precio as prod_precio')
              ->where('id_pedido',$recibo->id_pedido)->get();
          //  ->where('id_pedido',$recibo->id_pedido)

          return view('VistasPedido.generarRecibo',
          compact('recibo','detalles'));
    }

 public function pdf(Request $r){
        // join recibo con client
        $var = $r;
        dd($var);

        $recibo = Recibo::where('id_recibo',$r->id_recibo)->first();
         dd($recibo);
        $recibo = Recibo::join('clientes','clientes.ci','=', 'recibos.ci_cliente')
            ->join('pedidos','pedidos.id_pedido','=', 'recibos.id_pedido')
            ->where('pedidos.id_pedido',$recibo->id_pedido)
            ->where('ci', $recibo->ci_cliente)->first();

        $detalles = DetallePedido::join('productos as p','detalle_pedidos.id_producto','=','p.id_producto')
        ->select('detalle_pedidos.*','p.nombre','p.precio as prod_precio')
        ->where('id_pedido',$recibo->id_pedido)->get();

        $todos = [
            'detalles' => $detalles,
            'recibo' => $recibo
        ];;
        //  dd($todos);
        // $pdf = PDF::loadView('VistasPedido.generarRecibos');
        // return $pdf->stream(compact('recibo,detalles'));

     }
    //-- bitacora pedidos -----------------------------------------------------------//
    public function bitacoraPedidos(){

        $pedido = DB::table('bitacora_pedidos as bp')
                        // ->when(Request('id'),function($q){
                        //     return $q->where('bp.id',Request('id'));
                        // })
                        ->when(Request('user'),function($q){
                            return $q->where('bp.user',Request('user'));
                        })
                        ->when(Request('accion'),function($q){
                            return $q->where('bp.accion',Request('accion'));
                        })
                        ->when(Request('fecha_bpedido'),function($q){
                            return $q->where('bp.fecha_bpedido',Request('fecha_bpedido'));
                        })
                        ->when(Request('hora_bpedido'),function($q){
                            return $q->where('bp.hora_bpedido',Request('hora_bpedido'));
                        })
                        ->when(Request('id_pedido'),function($q){
                            return $q->where('bp.id_pedido',Request('id_pedido'));
                        })
                        ->when(Request('nro_mesa'),function($q){
                            return $q->where('bp.nro_mesa',Request('nro_mesa'));
                        })
                        ->when(Request('ci_empleado'),function($q){
                            return $q->where('bp.ci_empleado',Request('ci_empleado'));
                        })
                        ->when(Request('estado'),function($q){
                            return $q->where('bp.estado',Request('estado'));
                        })
                        ->when(Request('fecha'),function($q){
                            return $q->where('bp.fecha',Request('fecha'));
                        })
                        ->when(Request('hora'),function($q){
                            return $q->where('bp.hora',Request('hora'));
                        })
                        ->when(Request('precio_total'),function($q){
                            return $q->where('bp.precio_total',Request('precio_total'));
                        })
                        ->get();


        return view('VistasPedido.bitacoraPedidos',compact('pedido'));

    }

    public function pdfxd(){
    //     $pdf = PDF::loadView('formulario');
    //    // dd($pdf);
    //     return $pdf->stream();

    }
}
