<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Rotas públicas
// Página inicial (welcome) - para garantir que existe uma rota raiz válida
Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

// Página de login - acessível para visitantes
Route::get('/gerencia', function () {
    // Se o usuário já estiver autenticado, redirecionar para o dashboard
    if (auth()->check()) {
        return redirect()->route('gerencia.dashboard');
    }
    return Inertia::render('auth/login');
})->middleware('guest')->name('gerencia');

// Rota pública para página Sobre
Route::get('/sobre-a-bm3-imoveis', function () {
    return Inertia::render('Website/Sobre');
})->name('website.sobre');

// Rota pública para solicitar avaliação
Route::get('/solicitar-avaliacao-de-imoveis', function () {
    return Inertia::render('Website/SolicitarAvaliacao');
})->name('website.avaliacao');

// Rotas públicas para aluguel
Route::get('/aluguel', function () {
    return Inertia::render('Website/Aluguel');
})->name('website.aluguel');

// Rotas públicas para venda
Route::get('/venda', function () {
    return Inertia::render('Website/Venda');
})->name('website.venda');

// Incluir rotas de autenticação
require __DIR__.'/auth.php';

// Incluir rotas de configurações
require __DIR__.'/settings.php';

// Incluir rotas do sistema de gerência
require __DIR__.'/gerencia.php';

// Incluir as demais rotas do website público
require __DIR__.'/website.php';
