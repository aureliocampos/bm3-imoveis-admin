<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ImovelController extends Controller
{
    /**
     * Exibe a página de imóveis para compra.
     */
    public function comprar()
    {
        return Inertia::render('Website/Comprar/Index');
    }

    /**
     * Exibe a página de busca de imóveis para compra.
     */
    public function comprarBusca(Request $request)
    {
        // Lógica para processar os filtros e buscar imóveis para compra
        $filtros = $request->all();
        
        return Inertia::render('Website/Comprar/Busca', [
            'filtros' => $filtros,
            // 'imoveis' => $imoveis (adicionar quando os modelos estiverem definidos)
        ]);
    }

    /**
     * Exibe os detalhes de um imóvel para compra.
     */
    public function comprarShow($id)
    {
        // Lógica para buscar o imóvel no banco de dados
        // $imovel = Imovel::findOrFail($id);
        
        return Inertia::render('Website/Comprar/Show', [
            'imovel' => $id, // Substituir pelo modelo quando estiver definido
        ]);
    }

    /**
     * Exibe imóveis para compra por bairro.
     */
    public function comprarBairro($bairro)
    {
        return Inertia::render('Website/Comprar/Bairro', [
            'bairro' => $bairro,
            // 'imoveis' => $imoveis (adicionar quando os modelos estiverem definidos)
        ]);
    }

    /**
     * Exibe imóveis para compra por tipo.
     */
    public function comprarTipo($tipo)
    {
        return Inertia::render('Website/Comprar/Tipo', [
            'tipo' => $tipo,
            // 'imoveis' => $imoveis (adicionar quando os modelos estiverem definidos)
        ]);
    }

    /**
     * Exibe a página de imóveis para alugar.
     */
    public function alugar()
    {
        return Inertia::render('Website/Alugar/Index');
    }

    /**
     * Exibe a página de busca de imóveis para alugar.
     */
    public function alugarBusca(Request $request)
    {
        // Lógica para processar os filtros e buscar imóveis para alugar
        $filtros = $request->all();
        
        return Inertia::render('Website/Alugar/Busca', [
            'filtros' => $filtros,
            // 'imoveis' => $imoveis (adicionar quando os modelos estiverem definidos)
        ]);
    }

    /**
     * Exibe os detalhes de um imóvel para alugar.
     */
    public function alugarShow($id)
    {
        // Lógica para buscar o imóvel no banco de dados
        // $imovel = Imovel::findOrFail($id);
        
        return Inertia::render('Website/Alugar/Show', [
            'imovel' => $id, // Substituir pelo modelo quando estiver definido
        ]);
    }

    /**
     * Exibe imóveis para alugar por bairro.
     */
    public function alugarBairro($bairro)
    {
        return Inertia::render('Website/Alugar/Bairro', [
            'bairro' => $bairro,
            // 'imoveis' => $imoveis (adicionar quando os modelos estiverem definidos)
        ]);
    }

    /**
     * Exibe imóveis para alugar por tipo.
     */
    public function alugarTipo($tipo)
    {
        return Inertia::render('Website/Alugar/Tipo', [
            'tipo' => $tipo,
            // 'imoveis' => $imoveis (adicionar quando os modelos estiverem definidos)
        ]);
    }
} 