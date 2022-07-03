<?php

namespace App\Http\Controllers;

use App\Events\BClienteEditEvent;
use App\Events\BClienteDeleteEvent;
use App\Events\BClienteCreateEvent;

use Illuminate\Http\Request;
use App\Models\CLiente;

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
}
