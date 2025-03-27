<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class VitrineController extends Controller
{
    /**
     * Exibe a lista de imóveis na vitrine.
     */
    public function index()
    {
        return Inertia::render('Gerencia/Vitrine/Index');
    }

    /**
     * Exibe a interface para configurar a vitrine.
     */
    public function configure()
    {
        return Inertia::render('Gerencia/Vitrine/Configure');
    }

    /**
     * Atualiza as configurações da vitrine.
     */
    public function update(Request $request)
    {
        // Lógica para atualizar as configurações da vitrine
        return redirect()->route('gerencia.vitrine.index')->with('success', 'Vitrine atualizada com sucesso!');
    }

    /**
     * Adiciona um imóvel à vitrine.
     */
    public function addImovel(Request $request)
    {
        // Lógica para adicionar imóvel à vitrine
        return redirect()->route('gerencia.vitrine.index')->with('success', 'Imóvel adicionado à vitrine com sucesso!');
    }

    /**
     * Remove um imóvel da vitrine.
     */
    public function removeImovel(Request $request, $id)
    {
        // Lógica para remover imóvel da vitrine
        return redirect()->route('gerencia.vitrine.index')->with('success', 'Imóvel removido da vitrine com sucesso!');
    }
} 