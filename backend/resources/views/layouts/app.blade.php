<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Index')</title>
    <link rel="icon" type="image/png" href="/media/Ícone_Guia_Navegador_Site.png">
    <link rel="stylesheet" href="/media/Css/Homepage_Com_Cadastro.css">
    <link rel="stylesheet" href="/media/Css/Homepage_Sem_Cadastro_Custom.css">
    <link rel="stylesheet" href="/media/Css/Perfil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="/media/Cursor/cursor-global.css">
    @vite('resources/css/app.css') <!-- Importação do CSS global app.css -->
    @yield('head')
</head>
<body>
    @include('layouts.navbar')
    <main style="padding-bottom: 48px;">
        @yield('content')
    @hasSection('footer')
        @yield('footer')
    @else
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
    @endif

    <!-- Cursor Motion Blur Effect: agora controlado apenas via JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/TweenLite.min.js"></script>
    <script src="/media/Cursor/cursor-global.js" defer></script>
    <script>
      // Script para alternar entre os temas claro e escuro
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
    </script>
</body>
</html>