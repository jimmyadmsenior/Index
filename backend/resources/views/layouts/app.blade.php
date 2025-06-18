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
    @if (View::hasSection('head'))
        @yield('head')
    @endif
</head>
<body>
    <header>
        <div class="header-content">
            <div class="logo">
                <a href="/Homepage_Com_Cadastro"><img src="/media/Logo_Branca.png" alt="Logo da empresa"></a>
            </div>
            <nav>
                <ul class="menu">
                    <li><a href="/Homepage_Smartphones">Smartphones</a></li>
                    <li><a href="/Homepage_Tablets">Tablets</a></li>
                    <li><a href="/Homepage_Fones">Fones</a></li>
                    <li><a href="/Homepage_Relogios">Relógios</a></li>
                    <li><a href="/Homepage_Notebooks">Notebooks</a></li>
                </ul>
            </nav>
            <div class="icons">
                <i class="fas fa-search"></i>
                @auth
                    <a href="/perfil" class="navbar-btn navbar-btn-perfil" title="Meu perfil" style="display: flex; align-items: center; gap: 8px;">
                        @if(Auth::user() && Auth::user()->foto)
                            <img src="{{ Auth::user()->foto }}" alt="Foto de perfil" style="width: 32px; height: 32px; border-radius: 50%; object-fit: cover; border: 2px solid #fff; background: #222;">
                        @else
                            <i class="fas fa-user" style="font-size: 24px; color: #fff;"></i>
                        @endif
                    </a>
                @else
                    <a href="/login" class="navbar-btn navbar-btn-login">Login</a>
                    <a href="/cadastro" class="navbar-btn navbar-btn-cadastro">Cadastro</a>
                @endauth
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
    <main style="padding-bottom: 48px;">
        @yield('content')
    </main>
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
                  <a href="/sobre-nos">Sobre</a>
              </div>
              <div class="footer-section">
                  <h4>Recursos</h4>
                  <a href="/Smartphone">Smartphones</a>
                  <a href="/Tablets">Tablets</a>
                  <a href="/Fones">Fones</a>
                  <a href="/Relogios">Relógios</a>
                  <a href="/Notebooks">Notebooks</a>
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