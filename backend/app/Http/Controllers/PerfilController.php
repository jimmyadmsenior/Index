<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PerfilController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('Perfil', compact('user'));
    }

    public function updateFoto(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $user = Auth::user();
        $path = $request->file('foto')->store('public/fotos_perfil');
        $publicPath = str_replace('public/', 'storage/', $path); // Garante caminho correto
        $user->foto = '/' . $publicPath;
        $user->save();
        // Recarrega o usuário para garantir que o valor atualizado seja exibido
        $user->refresh();
        return back()->with('success', 'Foto atualizada com sucesso!');
    }

    public function updateSenha(Request $request)
    {
        $request->validate([
            'senha_atual' => 'required',
            'nova_senha' => 'required|min:6|confirmed',
        ]);
        $user = Auth::user();
        if (!Hash::check($request->senha_atual, $user->password)) {
            return back()->withErrors(['senha_atual' => 'Senha atual incorreta']);
        }
        $user->password = Hash::make($request->nova_senha);
        $user->save();
        return back()->with('success', 'Senha alterada com sucesso!');
    }
}
