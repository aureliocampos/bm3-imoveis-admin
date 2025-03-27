<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class UsuarioController extends Controller
{
    /**
     * Exibe a lista de usuários.
     */
    public function index()
    {
        $usuarios = User::all();
        
        return Inertia::render('Gerencia/Usuarios/Index', [
            'usuarios' => $usuarios
        ]);
    }

    /**
     * Exibe o formulário para criar um novo usuário.
     */
    public function create()
    {
        return Inertia::render('Gerencia/Usuarios/Create');
    }

    /**
     * Armazena um novo usuário no banco de dados.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|in:admin,gerente,corretor',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role' => $validated['role'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('gerencia.usuarios.index')->with('success', 'Usuário cadastrado com sucesso!');
    }

    /**
     * Exibe o formulário para editar um usuário.
     */
    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        
        return Inertia::render('Gerencia/Usuarios/Edit', [
            'usuario' => $usuario
        ]);
    }

    /**
     * Atualiza um usuário no banco de dados.
     */
    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $usuario->id,
            'role' => 'required|in:admin,gerente,corretor',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $usuario->name = $validated['name'];
        $usuario->email = $validated['email'];
        $usuario->role = $validated['role'];
        
        if (!empty($validated['password'])) {
            $usuario->password = Hash::make($validated['password']);
        }
        
        $usuario->save();

        return redirect()->route('gerencia.usuarios.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    /**
     * Remove um usuário do banco de dados.
     */
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();
        
        return redirect()->route('gerencia.usuarios.index')->with('success', 'Usuário excluído com sucesso!');
    }
} 