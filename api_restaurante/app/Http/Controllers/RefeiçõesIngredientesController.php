<?php

namespace App\Http\Controllers;

use App\Models\ingredientes;
use App\Models\ingredientes_produtos;
use App\Models\refeições;
use Illuminate\Http\Request;

class RefeiçõesIngredientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //retornar view com dados da refeição e input para adicionar ingredientes
        $refeição = refeições::find($request->id);
        $ingredientes = ingredientes::all();

        return view('site.adm.refeição_ingredientes.index', ['refeição' => $refeição, 'ingredientes' => $ingredientes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validações
        $regras = [
            'ingredientes_id' => 'exists:ingredientes,id',
            'quantidade' => 'required'
        ];

        $feedback = [
            'exists' => 'O ingrediente informado não existe',
            'required' => 'O campo :attribute precisa ser preenchido'
        ];

        $request->validate($regras, $feedback);

        /*
        $refeição_ingredientes = new ingredientes_produtos();
        $refeição_ingredientes->refeições_id = $request->refeição_id;
        $refeição_ingredientes->ingredientes_id = $request->ingredientes_id;
        $refeição_ingredientes->quantidade = $request->quantidade;
        $refeição_ingredientes->save();
        */
        $refeição = refeições::find($request->refeição_id);
        $refeição->ingredientes()->attach($request->ingredientes_id, ['quantidade' => $request->quantidade]);
        
        return redirect()->route('refeiçãoIngredientes.create', ['id' => $request->refeição_id]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
       //
    }
}
