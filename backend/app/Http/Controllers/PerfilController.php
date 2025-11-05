<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class PerfilController extends Controller
{
    public function show()
    {
        try {
            $user = Auth::user();
            if (!$user) {
                return redirect('/login')->with('error', 'Usuário não autenticado.');
            }
            return view('Perfil', compact('user'));
        } catch (\Exception $e) {
            Log::error('Erro no perfil: ' . $e->getMessage());
            return redirect('/')->with('error', 'Erro ao carregar perfil: ' . $e->getMessage());
        }
    }

    public function updateFoto(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        // Busca o usuário pelo Eloquent para garantir métodos disponíveis
        $user = \App\Models\User::find(Auth::id());
        $dir = storage_path('app/public/fotos_perfil');
        if (!file_exists($dir)) {
            mkdir($dir, 0775, true);
        }
        if (!$request->hasFile('foto')) {
            return back()->withErrors(['foto' => 'Nenhum arquivo enviado.']);
        }
        $file = $request->file('foto');
        if (!$file->isValid()) {
            return back()->withErrors(['foto' => 'Arquivo inválido.']);
        }
        $ext = $file->getClientOriginalExtension();
        $filename = 'perfil_' . $user->id . '_' . time() . '.' . $ext;
        // Salva a foto no disco 'public' corretamente
        Storage::disk('public')->putFileAs('fotos_perfil', $file, $filename);
        $user->foto = '/storage/fotos_perfil/' . $filename;
        $user->save();
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

    public function pedidos()
    {
        $user = Auth::user();
        $pedidos = Pedido::where('user_id', $user->id)
                        ->orderBy('created_at', 'desc')
                        ->get();
        
        return view('Perfil_Pedidos', compact('user', 'pedidos'));
    }

    public function updateTelefone(Request $request)
    {
        $request->validate([
            'telefone' => 'nullable|string|max:15',
        ]);
        
        $user = Auth::user();
        $user->telefone = $request->telefone;
        $user->save();
        
        return back()->with('success', 'WhatsApp atualizado com sucesso!');
    }

    public function rastrearPedido($codigo)
    {
        $user = Auth::user();
        $pedido = Pedido::where('codigo_rastreamento', $codigo)
                       ->where('user_id', $user->id)
                       ->first();
        
        if (!$pedido) {
            return redirect()->route('perfil.pedidos')->with('error', 'Pedido não encontrado.');
        }

        return view('Rastrear_Pedido', compact('pedido'));
    }
}
