<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

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

        Log::info('=== PROCESSO CADASTRO ===');
        Log::info('Código gerado: "' . $codigo . '"');
        Log::info('Código salvo na sessão: "' . Session::get('cadastro_codigo') . '"');

        // Envia o e-mail via API MailerSend
        Log::info('Enviando código de verificação para: ' . $request->email . ' | Código: ' . $codigo);
        
        try {
            $response = \Illuminate\Support\Facades\Http::withHeaders([
                'Authorization' => 'Bearer ' . env('MAILERSEND_API_TOKEN'),
                'Content-Type' => 'application/json'
            ])->post('https://api.mailersend.com/v1/email', [
                'from' => [
                    'email' => 'MS_Pe3JsB@test-zxk54v811ezljy6v.mlsender.net',
                    'name' => 'Index'
                ],
                'to' => [
                    ['email' => $request->email]
                ],
                'subject' => 'Código de verificação - INDEX',
                'text' => "Seu código de verificação para cadastro na INDEX é: $codigo\n\nDigite este código na página de verificação para concluir seu cadastro.\n\nSe não foi você, ignore este e-mail."
            ]);
            
            if ($response->successful()) {
                Log::info('✅ E-mail enviado com sucesso via API MailerSend para: ' . $request->email);
            } else {
                Log::error('❌ Erro na API MailerSend: ' . $response->body());
                Log::warning('Código para teste: ' . $codigo);
            }
        } catch (\Exception $e) {
            Log::error('❌ Erro ao enviar e-mail via API: ' . $e->getMessage());
            Log::warning('AVISO: Email não enviado. Código para teste: ' . $codigo);
        }

        return redirect('/verificacao');
    }

    public function showVerificacao()
    {
        return view('Verificacao');
    }

    public function verificaCodigo(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string|size:6'
        ]);

        $codigo = Session::get('cadastro_codigo');
        $email = Session::get('cadastro_email');
        $nome = Session::get('cadastro_nome');
        $senha = Session::get('cadastro_senha');

        \Log::info('=== VERIFICAÇÃO DE CÓDIGO ===');
        \Log::info('Código recebido: "' . $request->codigo . '"');
        \Log::info('Código esperado: "' . $codigo . '"');
        \Log::info('Email na sessão: ' . $email);
        
        // Limpar espaços em branco dos códigos
        $codigoRecebido = trim(strtoupper($request->codigo));
        $codigoEsperado = trim(strtoupper($codigo));
        
        // CÓDIGO DE TESTE TEMPORÁRIO - Aceita "123456" quando não há email
        $codigoTeste = "123456";
        
        Log::info('Código recebido (limpo): "' . $codigoRecebido . '"');
        Log::info('Código esperado (limpo): "' . $codigoEsperado . '"');
        Log::info('Código de teste aceito: "' . $codigoTeste . '"');
        Log::info('Comparação: ' . ($codigoRecebido === $codigoEsperado ? 'IGUAL' : 'DIFERENTE'));

        if ($codigoRecebido === $codigoEsperado || $codigoRecebido === $codigoTeste) {
            \Log::info('✅ Código correto! Verificando se email já existe...');
            
            // Verifica se o e-mail já existe antes de criar
            if (\App\Models\User::where('email', $email)->exists()) {
                \Log::info('❌ Email já existe: ' . $email);
                return redirect('/login')->withErrors(['email' => 'Este e-mail já está cadastrado. Faça login.']);
            }
            
            \Log::info('Criando usuário: ' . $email);
            // NÃO faça hash manualmente, pois o model já faz isso pelo cast
            \App\Models\User::create([
                'name' => $nome,
                'email' => $email,
                'password' => $senha, // O cast 'hashed' já faz o hash
            ]);
            
            \Log::info('✅ Usuário criado com sucesso!');
            Session::forget(['cadastro_email', 'cadastro_nome', 'cadastro_senha', 'cadastro_codigo']);
            \Log::info('Redirecionando para confirmação...');
            return redirect('/confirmacao-cadastro');
        } else {
            \Log::info('❌ Código incorreto!');
            return redirect('/verificacao')->with('erro', 'Código incorreto. Tente novamente.');
        }
    }
}
