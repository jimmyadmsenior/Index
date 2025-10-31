@extends('layouts.app')
@section('head')
@endsection
@section('content')

  <main class="cadastro-main" style="min-height:100vh; display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 0; margin-top: 60px;">
    <form method="POST" action="/cadastro" autocomplete="off" class="cadastro-form-container cadastro-form">
      @csrf
      <h1>Criar nova conta</h1>
      <p>É rápido e fácil.</p>
      
      <div class="input-group">
        <label for="nome">Nome completo</label>
        <input type="text" name="nome" id="nome" required placeholder="Digite seu nome completo" value="{{ old('nome') }}">
        @error('nome')
          <span class="error-message">{{ $message }}</span>
        @enderror
      </div>
      
      <div class="input-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required placeholder="Digite seu email" value="{{ old('email') }}">
        @error('email')
          <span class="error-message">{{ $message }}</span>
        @enderror
      </div>
      
      <div class="input-group">
        <label for="senha">Senha</label>
        <input type="password" name="senha" id="senha" required placeholder="Crie uma senha forte">
        @error('senha')
          <span class="error-message">{{ $message }}</span>
        @enderror
      </div>
      
      <button type="submit" class="btn-primary">
        Cadastrar
      </button>
      
      <div class="login-link">
        <p>Já tem uma conta? <a href="/Login">Faça login</a></p>
      </div>
    </form>
  </main>

  <style>
    /* Estilização limpa para o formulário de cadastro */
    .cadastro-form-container.cadastro-form {
      background: rgba(255,255,255,0.92);
      box-shadow: 0 6px 32px 0 rgba(0,0,0,0.18), 0 1.5px 6px 0 rgba(0,0,0,0.10);
      border-radius: 18px;
      padding: 36px 32px 28px 32px;
      margin: 0 0 6px 0 !important;
      width: 100%;
      max-width: 420px;
      display: flex;
      flex-direction: column;
      gap: 12px;
      position: relative;
      z-index: 1;
      backdrop-filter: blur(2px);
    }
    
    .cadastro-form-container.cadastro-form h1 {
      font-size: 2rem;
      font-weight: 700;
      margin-bottom: 6px;
      color: #222;
      letter-spacing: 0.01em;
      text-align: left;
    }
    
    .cadastro-form-container.cadastro-form p {
      color: #888;
      font-size: 1rem;
      margin-bottom: 18px;
      text-align: left;
    }
    
    .cadastro-form-container.cadastro-form label {
      font-weight: 600;
      color: #333;
      font-size: 0.95rem;
      margin-bottom: 6px;
      display: block;
    }
    
    .cadastro-form-container.cadastro-form .input-group {
      display: flex;
      flex-direction: column;
      gap: 6px;
      margin-bottom: 12px;
    }
    
    .cadastro-form-container.cadastro-form input {
      padding: 12px 16px;
      border: 2px solid #e1e5e9;
      border-radius: 12px;
      font-size: 1rem;
      background: #fff;
      transition: all 0.2s ease;
      outline: none;
    }
    
    .cadastro-form-container.cadastro-form input:focus {
      border-color: #007AFF;
      box-shadow: 0 0 0 3px rgba(0, 122, 255, 0.1);
    }
    
    .cadastro-form-container.cadastro-form .btn-primary {
      background: linear-gradient(135deg, #007AFF 0%, #005ED5 100%);
      color: white;
      border: none;
      padding: 14px 24px;
      border-radius: 12px;
      font-size: 1.05rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      margin-top: 12px;
    }
    
    .cadastro-form-container.cadastro-form .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(0, 122, 255, 0.3);
    }
    
    .cadastro-form-container.cadastro-form .login-link {
      text-align: center;
      margin-top: 16px;
    }
    
    .cadastro-form-container.cadastro-form .login-link p {
      color: #666;
      margin: 0;
    }
    
    .cadastro-form-container.cadastro-form .login-link a {
      color: #007AFF;
      text-decoration: none;
      font-weight: 600;
    }
    
    .cadastro-form-container.cadastro-form .login-link a:hover {
      text-decoration: underline;
    }
    
    .error-message {
      color: #ff4757;
      font-size: 0.875rem;
      margin-top: 4px;
    }
  </style>
@endsection