@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Index</title>
  <link rel="icon" type="image/png" href="/media/Ícone_Guia_Navegador_Site.png">  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="/media/Css/Login.css">
</head>
<body>
  <main class="main-login">
    <section class="login-left">
      <form class="login-form" autocomplete="off" method="POST" action="/login">
        @csrf
        <h1><img src="/media/Icon Login.png" alt="Ícone Login" style="height: 38px;vertical-align:middle;margin-right:12px;"> Faça seu login</h1>
        <p>Entre com suas informações de login.</p>
        @if($errors->any())
          <div style="color:#ffd700; background:#232323; border-radius:6px; padding:10px 18px; margin-bottom:18px; font-size:1.08rem; text-align:center;">
            {{ $errors->first() }}
          </div>
        @endif
        <div class="form-group">
          <label class="form-label" for="email">E-mail</label>
          <div class="input-wrapper">
            <i class="fas fa-envelope"></i>
            <input class="form-input" type="email" id="email" name="email" placeholder="Digite seu e-mail" required>
          </div>
        </div>
        <div class="form-group">
          <label class="form-label" for="senha">Senha</label>
          <div class="input-wrapper">
            <i class="fas fa-lock"></i>
            <input class="form-input" type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
            <button type="button" class="toggle-password" onclick="togglePassword()"><i class="fas fa-eye"></i></button>
          </div>
        </div>
        <div class="form-options">
          <label class="lembrar-label"><input type="checkbox" name="lembrar"> Lembre-me</label>
          <a href="/Recuperacao_Senha_1" class="esqueci-senha-link">Esqueci minha senha</a>
        </div>
        <button class="login-btn" type="submit">ENTRAR</button>
        <div class="register-link">
          Não tem uma conta? <a href="/cadastro">Cadastre-se</a>
        </div>
      </form>
    </section>
    <section class="login-right">
      <img src="/media/Imagem homem deitado.png" alt="Login Ilustração" style="max-width:100%;height:auto;display:block;margin:0 auto;"/>
    </section>
  </main>
  <script>
    // Mudança de tema apenas na área do formulário (lado esquerdo)
    document.addEventListener('DOMContentLoaded', function() {
      const themeToggle = document.getElementById('theme-toggle');
      const loginLeft = document.querySelector('.login-left');
      // Salva o tema apenas para o formulário
      let savedTheme = localStorage.getItem('loginFormTheme') || 'light';
      if(loginLeft) loginLeft.setAttribute('data-theme', savedTheme);
      if(themeToggle) themeToggle.checked = savedTheme === 'dark';
      if(themeToggle) themeToggle.addEventListener('change', function(e) {
        if(e.target.checked) {
          if(loginLeft) loginLeft.setAttribute('data-theme', 'dark');
          localStorage.setItem('loginFormTheme', 'dark');
        } else {
          if(loginLeft) loginLeft.setAttribute('data-theme', 'light');
          localStorage.setItem('loginFormTheme', 'light');
        }
      });
    });
    function togglePassword() {
      const senhaInput = document.getElementById('senha');
      const btn = document.querySelector('.toggle-password i');
      if (senhaInput.type === 'password') {
        senhaInput.type = 'text';
        btn.classList.remove('fa-eye');
        btn.classList.add('fa-eye-slash');
      } else {
        senhaInput.type = 'password';
        btn.classList.remove('fa-eye-slash');
        btn.classList.add('fa-eye');
      }
    }
  </script>
  <style>
    /* Tema claro/escuro apenas na área do formulário */
    .login-left[data-theme="dark"] {
      background: #232323 !important;
      color: #fff !important;
    }
    .login-left[data-theme="dark"] .form-input,
    .login-left[data-theme="dark"] input,
    .login-left[data-theme="dark"] textarea {
      background: #181818 !important;
      color: #fff !important;
      border-color: #444 !important;
    }
    .login-left[data-theme="dark"] label,
    .login-left[data-theme="dark"] .form-label,
    .login-left[data-theme="dark"] a {
      color: #fff !important;
    }
    .login-left[data-theme="light"] {
      background: #fff !important;
      color: #232323 !important;
    }
    .login-left[data-theme="light"] .form-input,
    .login-left[data-theme="light"] input,
    .login-left[data-theme="light"] textarea {
      background: #181818 !important;
      color: #fff !important;
      border-color: #444 !important;
      box-shadow: none !important;
    }
    .login-left[data-theme="light"] label,
    .login-left[data-theme="light"] .form-label,
    .login-left[data-theme="light"] a,
    .login-left[data-theme="light"] h1,
    .login-left[data-theme="light"] h2,
    .login-left[data-theme="light"] p,
    .login-left[data-theme="light"] .register-link,
    .login-left[data-theme="light"] .form-options,
    .login-left[data-theme="light"] .lembrar-label,
    .login-left[data-theme="light"] .esqueci-senha-link {
      color: #232323 !important;
    }
    .login-left[data-theme="light"] .login-btn {
      background: #232323 !important;
      color: #fff !important;
      border: none;
    }
    .login-left[data-theme="light"] .login-btn:hover {
      background: #444 !important;
    }
    .login-left[data-theme="dark"] .login-btn {
      background: #fff !important;
      color: #232323 !important;
      border: none;
    }
    .login-left[data-theme="dark"] .login-btn:hover {
      background: #e0e0e0 !important;
    }
    /* Botão de alternância de tema */
    .theme-toggle input[type="checkbox"] {
      accent-color: #232323;
    }
    .login-left[data-theme="light"] h1 img {
      filter: invert(1) brightness(0.2) !important;
    }
    .login-left[data-theme="dark"] h1 img {
      filter: none !important;
    }
    .login-left[data-theme="light"] .toggle-password i {
      color: #fff !important;
    }
    .login-left[data-theme="dark"] .toggle-password i {
      color: #fff !important;
    }
    .toggle-password {
      background: transparent !important;
      border: none !important;
      box-shadow: none !important;
      padding: 0 !important;
    }
    .toggle-password i {
      background: transparent !important;
      border: none !important;
      box-shadow: none !important;
    }
  </style>
</body>
</html>
@endsection
