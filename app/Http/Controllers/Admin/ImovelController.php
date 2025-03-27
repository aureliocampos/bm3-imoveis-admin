<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ImovelController extends Controller
{
    /**
     * Exibe a lista de imóveis.
     */
    public function index()
    {
        return Inertia::render('Gerencia/Imoveis/Index');
    }

    /**
     * Exibe o formulário para criar um novo imóvel.
     */
    public function create()
    {
        return Inertia::render('Gerencia/Imoveis/Create');
    }

    /**
     * Armazena um novo imóvel no banco de dados.
     */
    public function store(Request $request)
    {
        // Lógica para validar e salvar o imóvel
        return redirect()->route('gerencia.imoveis.index')->with('success', 'Imóvel cadastrado com sucesso!');
    }

    /**
     * Exibe os detalhes de um imóvel específico.
     */
    public function show($id)
    {
        return Inertia::render('Gerencia/Imoveis/Show', [
            'imovel' => $id, // Substituir por lógica para buscar o imóvel
        ]);
    }

    /**
     * Exibe o formulário para editar um imóvel.
     */
    public function edit($id)
    {
        return Inertia::render('Gerencia/Imoveis/Edit', [
            'imovel' => $id, // Substituir por lógica para buscar o imóvel
        ]);
    }

    /**
     * Atualiza um imóvel no banco de dados.
     */
    public function update(Request $request, $id)
    {
        // Lógica para validar e atualizar o imóvel
        return redirect()->route('gerencia.imoveis.index')->with('success', 'Imóvel atualizado com sucesso!');
    }

    /**
     * Remove um imóvel do banco de dados.
     */
    public function destroy($id)
    {
        // Lógica para excluir o imóvel
        return redirect()->route('gerencia.imoveis.index')->with('success', 'Imóvel excluído com sucesso!');
    }
} 