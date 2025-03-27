<?php

use App\Http\Controllers\Admin\ConfiguracaoController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ImovelController;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\Admin\VitrineController;
use App\Http\Controllers\Admin\XmlController;
use Illuminate\Support\Facades\Route;

// Todas as rotas de gerencia exigem autenticação
Route::middleware(['auth', 'verified'])->prefix('gerencia')->group(function () {
    // Dashboard - redireciona para dashboard quando acessar /gerencia após login
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('gerencia.dashboard');
    // Alias da rota dashboard para /gerencia/
    Route::get('/', function() {
        return redirect()->route('gerencia.dashboard');
    });

    // Gerenciamento de Imóveis
    Route::prefix('imoveis')->group(function () {
        Route::get('/', [ImovelController::class, 'index'])->name('gerencia.imoveis.index');
        Route::get('/criar', [ImovelController::class, 'create'])->name('gerencia.imoveis.create');
        Route::post('/', [ImovelController::class, 'store'])->name('gerencia.imoveis.store');
        Route::get('/{imovel}', [ImovelController::class, 'show'])->name('gerencia.imoveis.show');
        Route::get('/{imovel}/editar', [ImovelController::class, 'edit'])->name('gerencia.imoveis.edit');
        Route::put('/{imovel}', [ImovelController::class, 'update'])->name('gerencia.imoveis.update');
        Route::delete('/{imovel}', [ImovelController::class, 'destroy'])->name('gerencia.imoveis.destroy');
    });

    // Vitrine
    Route::prefix('vitrine')->group(function () {
        Route::get('/', [VitrineController::class, 'index'])->name('gerencia.vitrine.index');
        Route::get('/configurar', [VitrineController::class, 'configure'])->name('gerencia.vitrine.configure');
        Route::put('/configurar', [VitrineController::class, 'update'])->name('gerencia.vitrine.update');
        Route::post('/adicionar-imovel', [VitrineController::class, 'addImovel'])->name('gerencia.vitrine.add-imovel');
        Route::delete('/remover-imovel/{id}', [VitrineController::class, 'removeImovel'])->name('gerencia.vitrine.remove-imovel');
    });

    // Integração XML
    Route::prefix('xml')->group(function () {
        Route::get('/', [XmlController::class, 'index'])->name('gerencia.xml.index');
        Route::get('/gerar', [XmlController::class, 'generate'])->name('gerencia.xml.generate');
        Route::post('/gerar', [XmlController::class, 'processGeneration'])->name('gerencia.xml.process');
        Route::get('/download/{filename}', [XmlController::class, 'download'])->name('gerencia.xml.download');
    });

    // Gestão de Usuários (apenas para admin e gerente)
    Route::middleware(['role:admin,gerente'])->prefix('usuarios')->group(function () {
        Route::get('/', [UsuarioController::class, 'index'])->name('gerencia.usuarios.index');
        Route::get('/criar', [UsuarioController::class, 'create'])->name('gerencia.usuarios.create');
        Route::post('/', [UsuarioController::class, 'store'])->name('gerencia.usuarios.store');
        Route::get('/{usuario}/editar', [UsuarioController::class, 'edit'])->name('gerencia.usuarios.edit');
        Route::put('/{usuario}', [UsuarioController::class, 'update'])->name('gerencia.usuarios.update');
        Route::delete('/{usuario}', [UsuarioController::class, 'destroy'])->name('gerencia.usuarios.destroy');
    });
    
    // Configurações (apenas para admin)
    Route::middleware(['role:admin'])->prefix('configuracoes')->group(function () {
        Route::get('/', [ConfiguracaoController::class, 'index'])->name('gerencia.configuracoes.index');
        Route::put('/', [ConfiguracaoController::class, 'update'])->name('gerencia.configuracoes.update');
    });
}); 