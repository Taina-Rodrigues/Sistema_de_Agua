<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfiguracaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // TODO: Buscar configuração do banco
        $configuracao = [
            'taxa_fixa' => 25.00,
            'limite_consumo' => 10000,
            'valor_excedente' => 2.00
        ];

        return view('configuracao.index', [
            'title' => 'Configuração de tarifas',
            'configuracao' => $configuracao
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->route('configuracao.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return redirect()->route('configuracao.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('configuracao.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return redirect()->route('configuracao.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id = null)
    {
        $validated = $request->validate([
            'taxa_fixa' => 'required|numeric|min:0',
            'limite_consumo' => 'required|integer|min:1',
            'valor_excedente' => 'required|numeric|min:0',
        ], [
            'taxa_fixa.required' => 'A taxa fixa é obrigatória.',
            'limite_consumo.required' => 'O limite de consumo é obrigatório.',
            'valor_excedente.required' => 'O valor do excedente é obrigatório.',
        ]);

        // TODO: Atualizar configuração no banco de dados
        // Configuracao::first()->update($validated);

        return redirect()->route('configuracao.index')
            ->with('success', 'Configuração atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return redirect()->route('configuracao.index');
    }
}
