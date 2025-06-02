<!DOCTYPE html>
<html lang="pt-br" data-theme="light">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Carrinho vazio</title>
  <link rel="icon" type="image/png" href="/media/Ícone_Guia_Navegador_Site.png">
  <link rel="stylesheet" href="/media/Css/Carrinho_Vazio.css" />
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
          <li><a href="../VIew/Smartphone.html">Smartphones</a></li>
          <li><a href="../VIew/Tablets.html">Tablets</a></li>
          <li><a href="../VIew/Fones.html">Fones</a></li>
          <li><a href="../VIew/Relógios.html">Relógios</a></li>
          <li><a href="../VIew/Notebooks.html">Notebooks</a></li>
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

  <main class="cart-empty">
    <img src="../VIew/Media/cart-icon.png" alt="Carrinho vazio" class="cart-icon">
    <h1>Seu carrinho está vazio</h1>
    <p>Se quiser continuar sua compra, navegue por nosso site ou busque por um produto específico.</p>
    <div class="button-container">
      <button class="verification-button">ADICIONAR</button>
    </div>
  </main>

  <footer>
    <div class="footer-content">
      <div class="footer-logo">
        <p>Conheça nosso repositório</p>
        <a href="https://github.com/jimmyadmsenior/Index" target="_blank">
          <img src="../VIew/Media/Github_Logo.png" alt="GitHub" class="github-icon">
        </a>
      </div>
      <div class="footer-section">
        <h4>Nossas regras</h4>
        <a href="../VIew/Politica_Privacidade.html">Política de Privacidade</a>
        <a href="../VIew/Termos_Condicoes.html">Termos e Condições</a>
        <a href="../VIew/Suporte.html">Suporte</a>
        <a href="../VIew/Sobre.html">Sobre</a>
      </div>
      <div class="footer-section">
        <h4>Recursos</h4>
        <a href="../VIew/Smartphone.html">Smartphones</a>
        <a href="../VIew/Tablets.html">Tablets</a>
        <a href="../VIew/Fones.html">Fones</a>
        <a href="../VIew/Relógios.html">Relógios</a>
        <a href="../VIew/Notebooks.html">Notebooks</a>
      </div>
      <div class="footer-section">
        <h4>Conecte-se</h4>
        <a href="https://github.com/jimmyadmsenior/Index">Repositório</a>
        <a href="../VIew/Download_App.html">Nosso App</a>
      </div>
    </div>
    <div class="copy">
      <p>Copyright © 2025 Index Inc. Todos os direitos reservados.</p>
    </div>
  </footer>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const savedTheme = localStorage.getItem('theme') || 'light';
      document.documentElement.setAttribute('data-theme', savedTheme);
      document.getElementById('theme-toggle').checked = savedTheme === 'dark';

      document.getElementById('theme-toggle').addEventListener('change', function(e) {
        const newTheme = e.target.checked ? 'dark' : 'light';
        document.documentElement.setAttribute('data-theme', newTheme);
        localStorage.setItem('theme', newTheme);
        document.body.classList.add('theme-transition');
        setTimeout(() => document.body.classList.remove('theme-transition'), 1000);
      });

      const prefersDarkScheme = window.matchMedia('(prefers-color-scheme: dark)');
      function syncWithSystemTheme(e) {
        if (!localStorage.getItem('theme')) {
          const theme = e.matches ? 'dark' : 'light';
          document.documentElement.setAttribute('data-theme', theme);
          document.getElementById('theme-toggle').checked = theme === 'dark';
        }
      }
      syncWithSystemTheme(prefersDarkScheme);
      prefersDarkScheme.addEventListener('change', syncWithSystemTheme);
    });
  </script>
</body>
</html>
