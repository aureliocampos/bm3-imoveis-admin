<?php

use App\Http\Controllers\ImovelController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

// Rotas públicas do website - complementares às definidas em web.php
Route::prefix('/')->group(function () {
    // Detalhes de Imóveis para compra (rotas já definidas em web.php)
    Route::prefix('venda')->group(function () {
        // Busca e filtros
        Route::get('/busca', [ImovelController::class, 'vendaBusca'])->name('website.venda.busca');

        // Detalhes do imóvel
        Route::get('/{imovel}', [ImovelController::class, 'vendaShow'])->name('website.venda.show');
        
        // Rotas para bairros e outros filtros
        Route::get('/bairro/{bairro}', [ImovelController::class, 'vendaBairro'])->name('website.venda.bairro');
        Route::get('/tipo/{tipo}', [ImovelController::class, 'vendaTipo'])->name('website.venda.tipo');
    });

    // Imóveis para alugar (rota principal já definida em web.php)
    Route::prefix('aluguel')->group(function () {
        // Busca e filtros
        Route::get('/busca', [ImovelController::class, 'aluguelBusca'])->name('website.aluguel.busca');

        // Detalhes do imóvel
        Route::get('/{imovel}', [ImovelController::class, 'aluguelShow'])->name('website.aluguel.show');
        
        // Rotas para bairros e outros filtros
        Route::get('/bairro/{bairro}', [ImovelController::class, 'aluguelBairro'])->name('website.aluguel.bairro');
        Route::get('/tipo/{tipo}', [ImovelController::class, 'aluguelTipo'])->name('website.aluguel.tipo');
    });

    // Processamento de solicitação de avaliação (rota principal já definida em web.php)
    Route::post('/solicitar-avaliacao-de-imoveis', [WebsiteController::class, 'enviarAvaliacao'])->name('website.avaliacao.store');

    // Contato
    Route::get('/contato', [WebsiteController::class, 'contato'])->name('website.contato');
    Route::post('/contato', [WebsiteController::class, 'enviarContato'])->name('website.contato.store');
    
    // Sitemap
    Route::get('/sitemap.xml', [WebsiteController::class, 'sitemap'])->name('website.sitemap');
});