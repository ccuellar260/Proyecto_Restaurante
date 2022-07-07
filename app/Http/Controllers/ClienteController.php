<?php

namespace App\Http\Controllers;

use App\Events\BClienteEditEvent;
use App\Events\BClienteDeleteEvent;
use App\Events\BClienteCreateEvent;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    public function index()
    {
        $cliente = Cliente::get();
        return view('VistasCliente.index',compact('cliente'));
    }

    public function create()
    {
        return view('VistasCliente.create');
    }

    public function store(Request $formulario)
    {
        $formulario->validate([
             'ci' =>'numeric',
             'nombre_completo'=>'required',
             'telefono' =>'nullable|numeric',
             'NIT'=>'nullable|numeric'
         ]);

        event(new BClienteCreateEvent($formulario));

        $cliente = new Cliente();
        $cliente->ci = $formulario->ci;
        $cliente->nombre_completo = $formulario->nombre_completo;
        $cliente->telefono = $formulario->telefono;
        $cliente->NIT = $formulario->NIT;
        $cliente->save();

        return redirect()->Route('Cliente.index');
    }

    /*public function show($id)
    {
        //
    }*/

    public function edit(CLiente $ci)
    {
        return view('VistasCliente.edit',['cliente'=> $ci]);
    }

    public function update(Request $formulario, Cliente $cliente)
    {

        $formulario->validate([
            'ci' =>'numeric',
            'nombre_completo'=>'required',
            'telefono' =>'nullable|numeric',
            'NIT'=>'nullable|numeric'
        ]);

        event(new BClienteEditEvent($cliente));

        $cliente->ci = $formulario->ci;
        $cliente->nombre_completo = $formulario->nombre_completo;
        $cliente->telefono = $formulario->telefono;
        $cliente->NIT = $formulario->NIT;
        $cliente->save();

        return redirect()->Route('Cliente.index');
    }

    public function destroy(Cliente $cliente)
    {
        event(new BClienteDeleteEvent($cliente));

        $cliente->delete();
        return redirect()->Route('Cliente.index');
    }

    //-- bitacora clientes -----------------------------------------------------------//
    public function bitacoraClientes(){

        $cliente = DB::table('bitacora_clientes as bc')
                        // ->when(Request('id'),function($q){
                        //     return $q->where('bc.id',Request('id'));
                        // })
                        ->when(Request('user'),function($q){
                            return $q->where('bc.user',Request('user'));
                        })
                        ->when(Request('accion'),function($q){
                            return $q->where('bc.accion',Request('accion'));
                        })
                        ->when(Request('fecha'),function($q){
                            return $q->where('bc.fecha',Request('fecha'));
                        })
                        ->when(Request('hora'),function($q){
                            return $q->where('bc.hora',Request('hora'));
                        })
                        ->when(Request('ci'),function($q){
                            return $q->where('bc.ci',Request('ci'));
                        })
                        ->when(Request('nombre_completo'),function($q){
                            return $q->where('bc.nombre_completo',Request('nombre_completo'));
                        })
                        ->when(Request('telefono'),function($q){
                            return $q->where('bc.telefono',Request('telefono'));
                        })
                        ->when(Request('NIT'),function($q){
                            return $q->where('bc.NIT',Request('NIT'));
                        })
                        ->get();

           return view('VistasCliente.bitacoraClientes',compact('cliente'));

        }

}
