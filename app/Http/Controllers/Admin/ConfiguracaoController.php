<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ConfiguracaoController extends Controller
{
    /**
     * Exibe a página de configurações do sistema.
     */
    public function index()
    {
        return Inertia::render('configuracoes');
    }

    /**
     * Atualiza as configurações do sistema.
     */
    public function update(Request $request)
    {
        // Lógica para atualizar as configurações
        return redirect()->route('gerencia.configuracoes.index')->with('success', 'Configurações atualizadas com sucesso!');
    }
} 