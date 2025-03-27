<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class WebsiteController extends Controller
{
    /**
     * Exibe a página inicial (vitrine).
     */
    public function home()
    {
        return Inertia::render('Website/Home');
    }

    /**
     * Exibe a página "Sobre a Empresa".
     */
    public function sobre()
    {
        return Inertia::render('Website/Sobre');
    }

    /**
     * Exibe a página de contato.
     */
    public function contato()
    {
        return Inertia::render('Website/Contato');
    }

    /**
     * Processa o formulário de contato.
     */
    public function enviarContato(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefone' => 'required|string|max:20',
            'mensagem' => 'required|string',
        ]);

        // Lógica para processar o contato (enviar email, salvar no banco, etc.)

        return redirect()->back()->with('success', 'Mensagem enviada com sucesso! Em breve entraremos em contato.');
    }

    /**
     * Exibe a página de solicitação de avaliação de imóvel.
     */
    public function avaliacao()
    {
        return Inertia::render('Website/Avaliacao');
    }

    /**
     * Processa o formulário de solicitação de avaliação.
     */
    public function enviarAvaliacao(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefone' => 'required|string|max:20',
            'endereco' => 'required|string|max:255',
            'tipo' => 'required|string|max:100',
            'observacoes' => 'nullable|string',
        ]);

        // Lógica para processar a solicitação de avaliação

        return redirect()->back()->with('success', 'Solicitação de avaliação enviada com sucesso! Em breve entraremos em contato.');
    }

    /**
     * Gera o sitemap dinâmico.
     */
    public function sitemap()
    {
        // Lógica para gerar o sitemap.xml dinamicamente
        $content = '<?xml version="1.0" encoding="UTF-8"?>';
        $content .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        
        // Adicionar URLs estáticas
        $content .= '<url><loc>' . url('/') . '</loc><priority>1.0</priority></url>';
        $content .= '<url><loc>' . url('/sobre') . '</loc><priority>0.8</priority></url>';
        $content .= '<url><loc>' . url('/comprar') . '</loc><priority>0.9</priority></url>';
        $content .= '<url><loc>' . url('/alugar') . '</loc><priority>0.9</priority></url>';
        $content .= '<url><loc>' . url('/avaliacao') . '</loc><priority>0.7</priority></url>';
        $content .= '<url><loc>' . url('/contato') . '</loc><priority>0.8</priority></url>';
        
        // Adicionar URLs dinâmicas (imóveis, bairros, etc)
        // Implementar quando os modelos estiverem definidos
        
        $content .= '</urlset>';
        
        return response($content)->header('Content-Type', 'application/xml');
    }
} 