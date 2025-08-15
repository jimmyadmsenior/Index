@extends('layouts.app')
@section('head')
@endsection
@section('content')
<!DOCTYPE html>
<html lang="pt-BR" data-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro</title>
  <link rel="icon" type="image/png" href="/media/Ícone_Guia_Navegador_Site.png">
  <link rel="stylesheet" href="/media/Css/Homepage_Com_Cadastro.css" />
  <link rel="stylesheet" href="/media/Css/Homepage_Sem_Cadastro_Custom.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="/media/Cursor/cursor-global.css">
</head>
<body>
  <main class="cadastro-main" style="min-height:100vh; display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 0; margin-top: 60px;">
    <form method="POST" action="/cadastro" autocomplete="off" class="cadastro-form-container cadastro-form">
      @csrf
      @if($errors->any())
        <div class="alert alert-danger" style="color: #fff; background: #e74c3c; padding: 10px; border-radius: 6px; margin-bottom: 16px;">
          <ul style="margin:0; padding-left: 18px;">
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <h1><span class="arrow">→</span> Faça seu cadastro</h1>
      <p>Entre com suas informações de cadastro.</p>
      <label for="email">E-mail</label>
      <div class="input-group">
        <span class="icon"><i class="fa-regular fa-envelope"></i></span>
        <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required>
      </div>
      <label for="senha">Senha</label>
      <div class="input-group">
        <span class="icon"><i class="fa-solid fa-lock"></i></span>
        <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
        <button type="button" class="toggle-password" onclick="togglePassword('senha', this)"><i class="fa-regular fa-eye"></i></button>
      </div>
      <div class="input-group">
        <span class="icon"><i class="fa-solid fa-lock"></i></span>
        <input type="password" id="senha_confirm" name="senha_confirm" placeholder="Confirme sua senha" required>
        <button type="button" class="toggle-password" onclick="togglePassword('senha_confirm', this)"><i class="fa-regular fa-eye"></i></button>
      </div>
      <label for="nome">Nome</label>
      <div class="input-group">
        <span class="icon"><i class="fa-regular fa-user"></i></span>
        <input type="text" id="nome" name="nome" placeholder="Digite seu nome" required>
      </div>
      <button type="submit">CONCLUIR CADASTRO</button>
    </form>
    <style>
      /* Remove cor de autofill do navegador nos inputs */
      input:-webkit-autofill,
      input:-webkit-autofill:focus,
      input:-webkit-autofill:hover,
      input:-webkit-autofill:active {
        -webkit-box-shadow: 0 0 0 1000px transparent inset !important;
        box-shadow: 0 0 0 1000px transparent inset !important;
        background-color: transparent !important;
        -webkit-text-fill-color: var(--form-title, #222) !important;
        color: var(--form-title, #222) !important;
        transition: background-color 9999s ease-in-out 0s;
      }
      html[data-theme="dark"] input:-webkit-autofill {
        -webkit-text-fill-color: #fff !important;
        color: #fff !important;
      }
      /* Estilização isolada e moderna apenas para o formulário de cadastro */
      .cadastro-form-container.cadastro-form {
        background: var(--form-bg, rgba(255,255,255,0.06));
        box-shadow: 0 6px 32px 0 rgba(0,0,0,0.18), 0 1.5px 6px 0 rgba(0,0,0,0.10);
        border-radius: 18px;
        padding: 36px 32px 28px 32px;
        margin: 0 0 6px 0 !important; /* margin-bottom menor, sem margin-top */
        width: 100%;
        max-width: 420px;
        display: flex;
        flex-direction: column;
        gap: 12px;
        position: relative;
        z-index: 1;
        backdrop-filter: blur(2px);
        transition: background 0.3s;
      }
      .cadastro-form-container.cadastro-form h1 {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 6px;
        color: var(--form-title, #222);
        letter-spacing: 0.01em;
        text-align: left;
      }
      html[data-theme="dark"] .cadastro-form-container.cadastro-form {
        --form-bg: rgba(30,30,30,0.92);
        --form-title: #fff;
      }
      html[data-theme="light"] .cadastro-form-container.cadastro-form {
        --form-bg: rgba(255,255,255,0.92);
        --form-title: #222;
      }
      .cadastro-form-container.cadastro-form p {
        color: #888;
        font-size: 1rem;
        margin-bottom: 18px;
        text-align: left;
      }
      .cadastro-form-container.cadastro-form label {
        font-weight: 600;
        color: var(--form-title, #222);
        margin-bottom: 2px;
        font-size: 1rem;
        letter-spacing: 0.01em;
      }
      .cadastro-form-container.cadastro-form .input-group {
        display: flex;
        align-items: center;
        background: rgba(0,0,0,0.06);
        border-radius: 8px;
        border: 1.5px solid #d1d5db;
        padding: 0 10px;
        margin-bottom: 10px;
        transition: border 0.2s, box-shadow 0.2s;
        position: relative;
      }
      html[data-theme="dark"] .cadastro-form-container.cadastro-form .input-group {
        background: rgba(255,255,255,0.04);
        border-color: #444;
      }
      .cadastro-form-container.cadastro-form .input-group:focus-within {
        border-color: #0078ff;
        box-shadow: 0 0 0 2px #0078ff33;
      }
      .cadastro-form-container.cadastro-form .icon {
        color: #888;
        margin-right: 8px;
        font-size: 1.1rem;
      }
      .cadastro-form-container.cadastro-form input[type="email"],
      .cadastro-form-container.cadastro-form input[type="password"],
      .cadastro-form-container.cadastro-form input[type="text"] {
        border: none;
        outline: none;
        background: transparent;
        font-size: 1rem;
        color: var(--form-title, #222);
        padding: 10px 0;
        flex: 1;
        min-width: 0;
        width: 100%;
        box-sizing: border-box;
      }
      html[data-theme="dark"] .cadastro-form-container.cadastro-form input {
        color: #fff;
      }
      .cadastro-form-container.cadastro-form .toggle-password {
        background: none;
        border: none;
        color: #888;
        font-size: 1.1rem;
        cursor: pointer;
        margin-left: 6px;
        padding: 0 2px;
        transition: color 0.2s;
      }
      .cadastro-form-container.cadastro-form .toggle-password:hover {
        color: #0078ff;
      }
      .cadastro-form-container.cadastro-form button[type="submit"] {
        background: linear-gradient(90deg, #0078ff 60%, #00c6ff 100%);
        color: #fff;
        font-weight: 700;
        border: none;
        border-radius: 8px;
        padding: 12px 0;
        font-size: 1.1rem;
        margin-top: 10px;
        cursor: pointer;
        box-shadow: 0 2px 8px 0 #0078ff22;
        transition: background 0.2s, box-shadow 0.2s;
        letter-spacing: 0.04em;
      }
      .cadastro-form-container.cadastro-form button[type="submit"]:hover {
        background: linear-gradient(90deg, #005bb5 60%, #0099cc 100%);
        box-shadow: 0 4px 16px 0 #0078ff33;
      }
      .cadastro-form-container.cadastro-form .alert {
        font-size: 0.98rem;
        margin-bottom: 10px;
        border-radius: 6px;
        padding: 10px 14px;
      }
      @media (max-width: 600px) {
        .cadastro-form-container.cadastro-form {
          padding: 18px 6vw 18px 6vw;
          max-width: 98vw;
          margin: 0 0 8px 0 !important;
        }
        .cadastro-form-container.cadastro-form h1 {
          font-size: 1.3rem;
        }
      }
      @media (max-width: 900px) {
        .cadastro-form-container.cadastro-form {
          max-width: 98vw;
        }
      }
    </style>
  </main>
  <footer>
    <div class="footer-content">
      <div class="footer-logo">
        <p>Conheça nosso repositório</p>
        <a href="https://github.com/jimmyadmsenior/Index" target="_blank">
          <img src="/media/Github_Logo.png" alt="GitHub" class="github-icon">
        </a>
      </div>
      <div class="footer-section">
        <h4>Nossas regras</h4>
  <a href="/Politica_Privacidade">Política de Privacidade</a>
  <a href="/Termos_Condicoes">Termos e Condições</a>
  <a href="/Suporte">Suporte</a>
  <a href="/Sobre_Nós">Sobre nós</a>
      </div>
      <div class="footer-section">
        <h4>Recursos</h4>
  <a href="/Homepage_Smartphones">Smartphones</a>
  <a href="/Homepage_Tablets">Tablets</a>
  <a href="/Homepage_Fones">Fones</a>
  <a href="/Homepage_Relógios">Relógios</a>
  <a href="/Homepage_Notebooks">Notebooks</a>
      </div>
      <div class="footer-section">
        <h4>Conecte-se</h4>
  <a href="https://github.com/jimmyadmsenior/Index">Repositório</a>
  <a href="/Download_App">Nosso App</a>
      </div>
    </div>
    <div class="copy">
      <p>Copyright © 2025 Index Inc. Todos os direitos reservados.</p>
    </div>
  </footer>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.15.0/TweenMax.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/TweenLite.min.js"></script>
  <script src="/media/Cursor/cursor-global.js" defer></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const savedTheme = localStorage.getItem('theme') || 'light';
      document.documentElement.setAttribute('data-theme', savedTheme);
      const themeToggle = document.getElementById('theme-toggle');
      if(themeToggle) themeToggle.checked = savedTheme === 'dark';
      if(themeToggle) themeToggle.addEventListener('change', function(e) {
        if(e.target.checked) {
          document.documentElement.setAttribute('data-theme', 'dark');
          localStorage.setItem('theme', 'dark');
          document.body.classList.add('theme-transition');
          setTimeout(() => {
            document.body.classList.remove('theme-transition');
          }, 1000);
        } else {
          document.documentElement.setAttribute('data-theme', 'light');
          localStorage.setItem('theme', 'light');
          document.body.classList.add('theme-transition');
          setTimeout(() => {
            document.body.classList.remove('theme-transition');
          }, 1000);
        }
      });
      const prefersDarkScheme = window.matchMedia('(prefers-color-scheme: dark)');
      function syncWithSystemTheme(e) {
        if (!localStorage.getItem('theme')) {
          if (e.matches) {
            document.documentElement.setAttribute('data-theme', 'dark');
            if(themeToggle) themeToggle.checked = true;
          } else {
            document.documentElement.setAttribute('data-theme', 'light');
            if(themeToggle) themeToggle.checked = false;
          }
        }
      }
      syncWithSystemTheme(prefersDarkScheme);
      prefersDarkScheme.addEventListener('change', syncWithSystemTheme);
    });
    function togglePassword(id, btn) {
      const input = document.getElementById(id);
      if (input.type === 'password') {
        input.type = 'text';
        btn.innerHTML = '<i class="fa-regular fa-eye-slash"></i>';
      } else {
        input.type = 'password';
        btn.innerHTML = '<i class="fa-regular fa-eye"></i>';
      }
    }
  </script>
  <div id="cursor-blur-boxes">
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
  </div>
  <style>
    html, body, * {
      cursor: none !important;
    }
    #cursor-blur-boxes {
      position: fixed !important;
      pointer-events: none !important;
      z-index: 1000001 !important;
      top: 0; left: 0; width: 100vw; height: 100vh;
    }
    #cursor-blur-boxes .box {
      pointer-events: none !important;
      z-index: 1000001 !important;
    }
    #cursor-blur-boxes .box {
      position: absolute;
      width: 25px;
      height: 25px;
      top: 50%;
      left: 50%;
      margin: -50 0 0 -50px;
      background: rgba(255, 255, 255, 0.2);
      border-radius: 50px;
      -webkit-backface-visibility: hidden;
      opacity: 0;
      cursor: none;
      transition: box-shadow 0.2s, border 0.2s;
    }
    html[data-theme="light"] #cursor-blur-boxes .box {
      background: rgba(255, 255, 255, 0.9);
      border: 2px solid #000;
    }
    html[data-theme="dark"] #cursor-blur-boxes .box {
      background: rgba(0, 0, 0, 0.9);
      border: 2px solid #fff;
    }
  </style>
</body>
</html>
@endsection
