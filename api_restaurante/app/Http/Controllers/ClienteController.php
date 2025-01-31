<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();

        return view('site.clientes.clientes-index', ['clientes' => $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $msg = $request->query('msg');

        if($msg == 1){
            $msg = 'Você precisa estar cadastrado para fazer pedidos.';
        }
        
        return view('site.clientes.create_edit_clientes', ['msg' => $msg]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Cliente::create($request->all());

        return redirect()->route('pedidos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente, Request $request)
    {
        return view('site.clientes.cliente', ['cliente' => $cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        return view('site.clientes.create_edit_clientes', ['cliente' => $cliente]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        $cliente->update($request->all());

        return redirect()->route('cliente.show', ['cliente' => $cliente]); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect()->route('cliente.index');
    }
}
