<!DOCTYPE html>
<html lang="pt-br" data-theme="light">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Chatbot - Index</title>
  <link rel="icon" type="image/png" href="/media/Ícone_Guia_Navegador_Site.png">
  <link rel="stylesheet" href="/media/Css/Homepage_Com_Cadastro.css" />
  <link rel="stylesheet" href="/media/Css/Homepage_Sem_Cadastro_Custom.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="/media/ChatBot/style.css">
</head>
<body>
  <!-- Navbar igual à Homepage_Com_Cadastro -->
  <header>
    <div class="header-content">
      <div class="logo">
        @if(Auth::check())
            <a href="/Homepage_Com_Cadastro"><img src="/media/Logo_Branca.png" alt="Logo da empresa"></a>
        @else
            <a href="/"><img src="/media/Logo_Branca.png" alt="Logo da empresa"></a>
        @endif
      </div>
      <nav>
        <ul class="menu">
          <li><a href="/categoria/smartphones">Smartphones</a></li>
          <li><a href="/categoria/tablets">Tablets</a></li>
          <li><a href="/Homepage_Fones">Fones</a></li>
          <li><a href="/categoria/relogios">Relógios</a></li>
          <li><a href="/categoria/notebooks">Notebooks</a></li>
        </ul>
      </nav>
      <div class="icons">
        <i class="fas fa-search"></i>
        @if(Auth::check())
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
  <!-- Spline Animation no topo, ocupando 100% da largura -->
  <script type="module" src="https://unpkg.com/@splinetool/viewer@1.10.2/build/spline-viewer.js"></script>
  <spline-viewer url="https://prod.spline.design/tGzpUkIZMbzawcff/scene.splinecode"></spline-viewer>
  <!-- Seção explicativa do Chatbot -->
  <section class="chatbot-explicacao">
    <div class="chatbot-explicacao-container">
      <h2>Como funciona o Chatbot Índigo?</h2>
      <p>
        O <strong>Chatbot Índigo</strong> é o assistente virtual inteligente do Index! Ele foi desenvolvido para:
      </p>
      <ul>
        <li><i class="fas fa-comment-dots"></i> Responder dúvidas sobre produtos, compras e entregas.</li>
        <li><i class="fas fa-search"></i> Ajudar na navegação do site e encontrar ofertas.</li>
        <li><i class="fas fa-bolt"></i> Oferecer suporte rápido e personalizado 24h.</li>
        <li><i class="fas fa-robot"></i> Simular conversas naturais, tornando sua experiência mais fluida.</li>
      </ul>
      <p class="chatbot-explicacao-final">Você pode acessar o Índigo em qualquer página pelo ícone no canto inferior direito.<br>Experimente conversar com ele agora mesmo!</p>
    </div>
  </section>
  <!-- Chatbot Widget no canto inferior direito -->
  <link rel="stylesheet" href="/media/ChatBot/ModernChatBot.css">
  <div id="modern-chatbot-widget">
    <div class="modern-chatbot-fab" id="modernChatbotFab" title="Falar com Índigo">
      <svg width="32" height="32" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="12" fill="currentColor"/></svg>
    </div>
    <div class="modern-chatbot-window" id="modernChatbotWindow">
      <div class="modern-chatbot-header">
        <div class="modern-chatbot-avatar">
          <svg width="32" height="32" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="12" fill="currentColor"/></svg>
        </div>
        <div>
          <div class="modern-chatbot-title">Índigo</div>
          <div class="modern-chatbot-desc">Assistente Virtual</div>
        </div>
        <button class="modern-chatbot-close" id="modernChatbotClose" title="Fechar">×</button>
      </div>
      <div class="modern-chatbot-messages" id="modernChatbotMessages"></div>
      <div class="modern-chatbot-footer" id="modernChatbotFooter"></div>
    </div>
  </div>
  <script src="/media/ChatBot/ModernChatBot.js" defer></script>
  <!-- Footer igual à Homepage_Com_Cadastro -->
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
            <a href="/Sobre">Sobre</a>
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
  <!-- Cursor Motion Blur Effect -->
  <link rel="stylesheet" href="/media/Cursor/EfeitoCursor/dist/style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.15.0/TweenMax.min.js"></script>
  <script src="/media/Cursor/EfeitoCursor/src/script.js" defer></script>
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
  <!-- Script de tema igual à homepage -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const savedTheme = localStorage.getItem('theme') || 'light';
      document.documentElement.setAttribute('data-theme', savedTheme);
      document.getElementById('theme-toggle').checked = savedTheme === 'dark';
      document.getElementById('theme-toggle').addEventListener('change', function(e) {
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
            document.getElementById('theme-toggle').checked = true;
          } else {
            document.documentElement.setAttribute('data-theme', 'light');
            document.getElementById('theme-toggle').checked = false;
          }
        }
      }
      syncWithSystemTheme(prefersDarkScheme);
      prefersDarkScheme.addEventListener('change', syncWithSystemTheme);
    });
  </script>
  <!-- Estilo dedicado para a seção explicativa do Chatbot -->
  <style>
    /* Estilo dedicado para a seção explicativa do Chatbot - agora neutro (preto/branco) e com suporte a tema, conforme solicitado */
    body {
      background: #fff !important;
      transition: background 0.3s;
    }
    .chatbot-explicacao {
      width: 100%;
      display: flex;
      justify-content: center;
      margin: 0;
      padding: 0;
      background: none;
    }
    .chatbot-explicacao-container {
      max-width: 700px;
      margin: 40px auto 0 auto;
      padding: 32px 24px;
      background: #111;
      border-radius: 20px;
      box-shadow: 0 4px 24px 0 rgba(30,30,30,0.08);
      text-align: center;
      color: #fff;
      border: 1.5px solid #222;
      transition: background 0.3s, color 0.3s, border 0.3s;
    }
    .chatbot-explicacao-container h2 {
      font-size: 2rem;
      font-weight: 800;
      color: #fff;
      margin-bottom: 18px;
      transition: color 0.3s;
    }
    .chatbot-explicacao-container p {
      font-size: 1.15rem;
      color: #e0e0e0;
      margin-bottom: 24px;
      font-weight: 500;
      transition: color 0.3s;
    }
    .chatbot-explicacao-container ul {
      text-align: left;
      max-width: 420px;
      margin: 0 auto 24px auto;
      padding-left: 0;
      list-style: none;
    }
    .chatbot-explicacao-container ul li {
      margin-bottom: 10px;
      padding-left: 28px;
      position: relative;
      font-size: 1.05rem;
      font-weight: 600;
      color: #fff;
      transition: color 0.3s;
    }
    .chatbot-explicacao-container ul li i {
      position: absolute;
      left: 0;
      top: 2px;
      color: #fff;
      transition: color 0.3s;
    }
    .chatbot-explicacao-final {
      color: #e0e0e0;
      font-size: 1.05rem;
      margin-bottom: 0;
      transition: color 0.3s;
    }
    /* Dark mode */
    html[data-theme="dark"] body {
      background: #181818 !important;
    }
    html[data-theme="dark"] .chatbot-explicacao-container {
      background: #f7f7f7;
      color: #222;
      border: 1.5px solid #333;
    }
    html[data-theme="dark"] .chatbot-explicacao-container h2 {
      color: #111;
    }
    html[data-theme="dark"] .chatbot-explicacao-container p,
    html[data-theme="dark"] .chatbot-explicacao-final {
      color: #333;
    }
    html[data-theme="dark"] .chatbot-explicacao-container ul li {
      color: #222;
    }
    html[data-theme="dark"] .chatbot-explicacao-container ul li i {
      color: #111;
    }
    @media (max-width: 800px) {
      .chatbot-explicacao-container {
        max-width: 98vw;
        padding: 18px 6vw;
      }
      .chatbot-explicacao-container ul {
        max-width: 98vw;
      }
    }
  </style>
</body>
</html>
