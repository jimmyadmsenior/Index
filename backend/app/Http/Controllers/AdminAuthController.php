<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Administrador;

class AdminAuthController extends Controller
{
    /**
     * Mostra o formulário de login do administrador
     */
    public function showLoginForm()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        
        return view('admin.login');
    }

    /**
     * Processa o login do administrador
     */
    public function login(Request $request)
    {
        \Log::info('=== LOGIN ADMIN INICIADO ===');
        \Log::info('URL: ' . $request->fullUrl());
        \Log::info('Dados recebidos: ', $request->all());
        
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        \Log::info('Tentando autenticação para: ' . $credentials['email']);
        
        if (Auth::guard('admin')->attempt($credentials)) {
            \Log::info('✅ LOGIN BEM-SUCEDIDO!');
            
            $request->session()->regenerate();
            
            $user = Auth::guard('admin')->user();
            \Log::info('Usuário logado: ' . $user->email . ' (ID: ' . $user->id . ')');
            
            $dashboardRoute = route('admin.dashboard');
            \Log::info('Redirecionando para: ' . $dashboardRoute);
            
            return redirect($dashboardRoute);
        } else {
            \Log::warning('❌ Falha na autenticação');
            
            return back()->withErrors([
                'email' => 'As credenciais fornecidas não conferem com nossos registros.',
            ])->onlyInput('email');
        }
    }

    /**
     * Logout do administrador
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('admin.login');
    }

    /**
     * Mostra o formulário de primeiro acesso
     */
    public function showSetupForm()
    {
        // Verifica se já existem administradores
        if (Administrador::exists()) {
            return redirect()->route('admin.login');
        }
        
        return view('admin.setup');
    }

    /**
     * Cria os primeiros administradores
     */
    public function setup(Request $request)
    {
        // Verifica se já existem administradores
        if (Administrador::exists()) {
            return redirect()->route('admin.login');
        }

        $request->validate([
            'admin1_nome' => ['required', 'string', 'max:255'],
            'admin1_email' => ['required', 'string', 'email', 'max:255', 'unique:administradores,email'],
            'admin1_password' => ['required', 'string', 'min:8', 'confirmed'],
            'admin2_nome' => ['required', 'string', 'max:255'],
            'admin2_email' => ['required', 'string', 'email', 'max:255', 'unique:administradores,email'],
            'admin2_password' => ['required', 'string', 'min:8'],
        ]);

        // Cria o primeiro administrador (Master)
        Administrador::create([
            'nome' => $request->admin1_nome,
            'email' => $request->admin1_email,
            'password' => Hash::make($request->admin1_password),
            'nivel_acesso' => 'master',
            'ativo' => true,
            'email_verified_at' => now(),
        ]);

        // Cria o segundo administrador (Operador)
        Administrador::create([
            'nome' => $request->admin2_nome,
            'email' => $request->admin2_email,
            'password' => Hash::make($request->admin2_password),
            'nivel_acesso' => 'operador',
            'ativo' => true,
            'email_verified_at' => now(),
        ]);

        return redirect()->route('admin.login')->with('success', 'Administradores criados com sucesso! Faça login para continuar.');
    }
}