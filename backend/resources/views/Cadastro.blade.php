<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro</title>
  <link rel="icon" type="image/png" href="/media/Ícone_Guia_Navegador_Site.png">
  <link rel="stylesheet" href="/media/Css/Cadastro.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
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
        <li><a href="/Homepage_Fones">Fones</a></li>
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
<main class="cadastro-main">
  <form class="cadastro-form-container cadastro-form" method="POST" action="/cadastro" autocomplete="off">
    @csrf
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
</body>
</html>
