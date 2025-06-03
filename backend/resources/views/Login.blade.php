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
  <header>
    <div class="header-content">
      <div class="logo">
        <img src="/media/Logo_Branca.png" alt="Logo da empresa">
      </div>
      <nav>
        <ul class="menu">
          <li><a href="/Smartphone">Smartphones</a></li>
          <li><a href="/Tablets">Tablets</a></li>
          <li><a href="/Fones">Fones</a></li>
          <li><a href="/Relogios">Relógios</a></li>
          <li><a href="/Notebooks">Notebooks</a></li>
        </ul>
      </nav>
      <div class="icons">
        <i class="fas fa-search"></i>
        @if(auth()->check())
          <a href="/perfil" title="Perfil" style="color:#fff;"><i class="fas fa-user"></i></a>
        @else
          <a href="/login" class="navbar-btn navbar-btn-login">Login</a>
          <a href="/cadastro" class="navbar-btn navbar-btn-cadastro">Cadastro</a>
        @endif
        <i class="fas fa-shopping-bag"></i>
        <i class="fas fa-box"></i>
        <label class="theme-toggle">
          <input type="checkbox" id="theme-toggle">
          <span class="slider">
            <i class="fas fa-sun sun"></i>
            <i class="fas fa-moon moon"></i>
          </span>
        </label>
      </div>
    </div>
  </header>
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
          <a href="#" class="esqueci-senha-link">Esqueci minha senha</a>
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
    // Script para alternar entre os temas claro e escuro (igual homepage)
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
</body>
</html>
