<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use App\Models\VerificationCode;

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

        // Cria código de verificação no banco de dados
        $verificationCode = VerificationCode::create_code(
            $request->email, 
            'registration', 
            [
                'nome' => $request->nome,
                'senha' => $request->senha
            ]
        );

        Log::info('=== PROCESSO CADASTRO ===');
        Log::info('Código gerado: "' . $verificationCode->code . '"');
        Log::info('Email: ' . $request->email);

        // Envia o e-mail
        Log::info('Enviando código de verificação para: ' . $request->email . ' | Código: ' . $verificationCode->code);
        
        $emailEnviado = false;
        try {
            Mail::raw("Seu código de verificação para cadastro na INDEX é: {$verificationCode->code}\n\nDigite este código na página de verificação para concluir seu cadastro.\n\nSe não foi você, ignore este e-mail.", function($message) use ($request) {
                $message->to($request->email)
                    ->subject('Código de verificação - INDEX');
            });
            Log::info('E-mail enviado com sucesso para: ' . $request->email);
            $emailEnviado = true;
        } catch (\Exception $e) {
            Log::error('Erro ao enviar e-mail: ' . $e->getMessage());
            Log::warning('AVISO: Email não enviado devido a problema SMTP. Código para teste: ' . $verificationCode->code);
            // Continua mesmo com erro de email para não travar o cadastro
        }
        
        // Se o email não foi enviado, salva uma mensagem para mostrar na tela
        if (!$emailEnviado) {
            Session::put('codigo_debug', $verificationCode->code);
            Session::put('email_falhou', true);
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

        \Log::info('=== VERIFICAÇÃO DE CÓDIGO ===');
        \Log::info('Código recebido: "' . $request->codigo . '"');

        // Verifica código no banco de dados (busca apenas pelo código)
        $verificationCode = VerificationCode::verify_code(
            $request->codigo, 
            'registration'
        );

        // CÓDIGO DE TESTE TEMPORÁRIO - Aceita "123456" quando não há email
        $codigoTeste = "123456";
        $codigoRecebido = trim(strtoupper($request->codigo));

        Log::info('Código recebido (limpo): "' . $codigoRecebido . '"');
        Log::info('Código de teste aceito: "' . $codigoTeste . '"');
        
        if ($verificationCode && !$verificationCode->isExpired()) {
            \Log::info('✅ Código correto! Verificando se email já existe...');
            
            // Verifica se o e-mail já existe antes de criar
            if (\App\Models\User::where('email', $verificationCode->email)->exists()) {
                \Log::info('❌ Email já existe: ' . $verificationCode->email);
                $verificationCode->delete(); // Remove o código usado
                return redirect('/login')->withErrors(['email' => 'Este e-mail já está cadastrado. Faça login.']);
            }
            
            \Log::info('Criando usuário: ' . $verificationCode->email);
            // Cria o usuário com os dados salvos no código de verificação
            \App\Models\User::create([
                'name' => $verificationCode->data['nome'],
                'email' => $verificationCode->email,
                'password' => $verificationCode->data['senha'], // O cast 'hashed' já faz o hash
            ]);
            
            \Log::info('✅ Usuário criado com sucesso!');
            
            // Remove o código usado e limpa a sessão
            $verificationCode->delete();
            Session::forget(['codigo_debug', 'email_falhou']);
            
            \Log::info('Redirecionando para confirmação...');
            return redirect('/confirmacao-cadastro');
        } elseif ($codigoRecebido === $codigoTeste) {
            // Mantém a funcionalidade de código de teste
            \Log::info('✅ Código de teste usado!');
            return redirect('/confirmacao-cadastro');
        } else {
            if ($verificationCode && $verificationCode->isExpired()) {
                \Log::info('❌ Código expirado!');
                $verificationCode->delete();
                return redirect('/verificacao')->with('erro', 'Código expirado. Solicite um novo código.');
            } else {
                \Log::info('❌ Código incorreto!');
                return redirect('/verificacao')->with('erro', 'Código incorreto. Tente novamente.');
            }
        }
    }
}
