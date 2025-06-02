<!DOCTYPE html>
<html lang="pt-BR" data-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Verificação</title>
  <link rel="icon" type="image/png" href="/media/Ícone_Guia_Navegador_Site.png">
  <link rel="stylesheet" href="/media/Css/Verificacao_Custom.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <style>
    /* Centralização do main e ajuste do botão de tema igual homepage */
    body, html {
      height: 100%;
      margin: 0;
      padding: 0;
      min-height: 100vh;
      width: 100vw;
      box-sizing: border-box;
    }
    main.centered-main {
      flex: 1 1 auto;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: calc(100vh - 60px);
      width: 100vw;
    }
    .theme-toggle {
      display: flex;
      align-items: center;
      cursor: pointer;
      margin-left: 10px;
      user-select: none;
    }
    .theme-toggle input[type="checkbox"] {
      display: none;
    }
    .theme-toggle .slider {
      display: flex;
      align-items: center;
      background: #222;
      border-radius: 20px;
      width: 38px;
      height: 22px;
      position: relative;
      transition: background 0.3s;
      justify-content: space-between;
      padding: 0 6px;
    }
    .theme-toggle .sun {
      color: #FFD600;
      font-size: 15px;
      transition: opacity 0.3s;
    }
    .theme-toggle .moon {
      color: #fff;
      font-size: 15px;
      transition: opacity 0.3s;
    }
  </style>
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
      <i class="fas fa-user"></i>
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
<main class="centered-main">
  <div class="verificacao-container">
    <h1>Verificação</h1>
    <p>Um código foi enviado para o seu e-mail para verificação.<br>Por favor, insira-o abaixo:</p>
    <form method="POST" action="/verificacao">
      @csrf
      <input type="text" name="codigo" maxlength="6" placeholder="XXX-XXX" required class="codigo-input">
      <button type="submit">ENVIAR</button>
    </form>
    @if(session('erro'))
      <div class="erro">{{ session('erro') }}</div>
    @endif
  </div>
</main>
<script>
// Light/Dark mode igual homepage
const html = document.documentElement;
const themeToggle = document.getElementById('theme-toggle');
const sun = document.querySelector('.theme-toggle .sun');
const moon = document.querySelector('.theme-toggle .moon');
function setTheme(theme) {
  html.setAttribute('data-theme', theme);
  localStorage.setItem('theme', theme);
  if(theme === 'dark') {
    sun.style.opacity = 0.3;
    moon.style.opacity = 1;
  } else {
    sun.style.opacity = 1;
    moon.style.opacity = 0.3;
  }
}
themeToggle.addEventListener('change', function() {
  setTheme(this.checked ? 'light' : 'dark');
});
(function() {
  const saved = localStorage.getItem('theme') || 'dark';
  setTheme(saved);
  themeToggle.checked = saved === 'light';
})();
</script>
</body>
</html>
