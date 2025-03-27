<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = $request->user();
        
        // Verifica se o usuário está autenticado
        if (!$user) {
            return redirect()->route('gerencia')->with('error', 'Você precisa fazer login para acessar esta página.');
        }

        // Verifica se o usuário possui o papel necessário
        if (empty($roles) || !in_array($user->role, $roles)) {
            // Se o usuário está tentando acessar uma página para a qual não tem permissão,
            // redireciona para / (página inicial)
            return redirect('/')->with('error', 'Você não possui permissão para acessar esta página.');
        }

        return $next($request);
    }
} 