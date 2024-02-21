<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('setting.setting', compact('users'));
    }

    public function update(Request $request)
    {
        // Validar os dados do formulário
        $request->validate([
            'access' => 'required|in:admin,regular',
            'user_access' => 'nullable|in:admin,regular',
            'selected_user_id' => 'nullable|exists:users,id',
        ]);

        // Atualizar o nível de acesso do usuário atual
        $user = auth()->user();
        $user->access = $request->access;
        $user->save();

        // Verificar se foi selecionado um usuário para alterar o acesso
        if ($request->filled('selected_user_id') && $user->isAdmin()) {
            // Obter o ID do usuário selecionado
            $userId = $request->input('selected_user_id');

            // Buscar o usuário selecionado
            $selectedUser = User::find($userId);

            // Atualizar o nível de acesso do usuário selecionado
            if ($selectedUser) {
                $selectedUser->access = $request->user_access;
                $selectedUser->save();
            }
        }

        return redirect()->route('main');
    }
}
