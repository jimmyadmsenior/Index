<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CadastroController extends Controller
{
    public function showCadastro()
    {
        return view('Cadastro');
    }

    public function processaCadastro(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required|min:6',
            'senha_confirm' => 'required|same:senha',
            'nome' => 'required',
        ]);

        // Gera código aleatório de 6 caracteres (letras e números)
        $caracteres = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
        $codigo = '';
        for ($i = 0; $i < 6; $i++) {
            $codigo .= $caracteres[random_int(0, strlen($caracteres) - 1)];
        }
        Session::put('cadastro_email', $request->email);
        Session::put('cadastro_nome', $request->nome);
        Session::put('cadastro_senha', $request->senha);
        Session::put('cadastro_codigo', $codigo);

        // Envia o e-mail
        \Log::info('Enviando código de verificação para: ' . $request->email . ' | Código: ' . $codigo);
        Mail::raw("Seu código de verificação para cadastro na INDEX é: $codigo\n\nDigite este código na página de verificação para concluir seu cadastro.\n\nSe não foi você, ignore este e-mail.", function($message) use ($request) {
            $message->to($request->email)
                ->subject('Código de verificação - INDEX');
        });

        return redirect('/verificacao');
    }

    public function showVerificacao()
    {
        return view('Verificacao');
    }

    public function verificaCodigo(Request $request)
    {
        $codigo = Session::get('cadastro_codigo');
        if ($request->codigo === $codigo) {
            // Aqui você pode salvar o usuário no banco de dados
            // ...
            Session::forget(['cadastro_email', 'cadastro_nome', 'cadastro_senha', 'cadastro_codigo']);
            return redirect('/login')->with('success', 'Cadastro confirmado! Faça login.');
        } else {
            return redirect('/verificacao')->with('erro', 'Código incorreto. Tente novamente.');
        }
    }
}
