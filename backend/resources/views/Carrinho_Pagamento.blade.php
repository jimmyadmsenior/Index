<!DOCTYPE html>
<html lang="pt-br" data-theme="light">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Método de Pagamento</title>
  <link rel="icon" type="image/png" href="/media/Ícone_Guia_Navegador_Site.png">
  <link rel="stylesheet" href="/media/Css/Carrinho_Pagamento.css" />
  <link rel="stylesheet" href="/media/Css/Carrinho_Pagamento_Custom.css" />
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
        <a href="/perfil" title="Perfil" style="color:#fff;"><i class="fas fa-user"></i></a>
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
  <main class="background">
    <div class="payment-center-wrapper">
      <div class="payment-container">
        <p>Método de pagamento</p>
        <p class="description">selecione a forma de pagamento que utilizará</p>
        <label class="option-label">
          <input type="radio" name="payment" value="google" />
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
            <path fill="#4285F4" d="M44.5 20H24v8.5h11.8C34.6 33.4 30 36 24 36c-6.6 0-12-5.4-12-12s5.4-12 12-12c3 0 5.7 1.1 7.8 2.9l6.4-6.4C34.7 5.6 29.7 4 24 4 12.9 4 4 12.9 4 24s8.9 20 20 20 20-8.9 20-20c0-1.3-.1-2.7-.5-4z"/>
            <path fill="#34A853" d="M6.3 14.1l6.6 4.8C14.5 15 18.9 12 24 12c3 0 5.7 1.1 7.8 2.9l6.4-6.4C34.7 5.6 29.7 4 24 4 15.5 4 8.3 8.8 6.3 14.1z"/>
            <path fill="#FBBC05" d="M24 44c5.5 0 10.5-2.1 14.3-5.5l-6.6-5.4C29.6 34.9 27 36 24 36c-6 0-10.6-3.6-12.4-8.6l-6.5 5C8.5 40.3 15.6 44 24 44z"/>
            <path fill="#EA4335" d="M44.5 20H24v8.5h11.8C34.1 33.1 30 36 24 36c-6.6 0-12-5.4-12-12s5.4-12 12-12c3 0 5.7 1.1 7.8 2.9l6.4-6.4C34.7 5.6 29.7 4 24 4 12.9 4 4 12.9 4 24s8.9 20 20 20 20-8.9 20-20c0-1.3-.1-2.7-.5-4z"/>
          </svg>
          <span class="option-title">Google Pay</span>
        </label>
        <label class="option-label">
          <input type="radio" name="payment" value="pix"/>
          <img src="/media/Design_sem_nome__3_-removebg-preview.png" alt="Pix" style="width:50px;height:50px;">
          <span class="option-title">Pix</span>
        </label>
        <label class="option-label">
          <input type="radio" name="payment" value="paypal"/>
          <img src="/media/paypal_logo.png" alt="PayPal" style="width:48px;height:50px;">
          <span class="option-title">PayPal</span>
        </label>
        <label class="option-label">
          <input type="radio" name="payment" value="visa"/>
          <img src="/media/Visa_Inc.-Logo.wine.png" alt="Visa" style="width:48px;height:48px;">
          <span class="option-title">Credit Card </span>
        </label>
      </div>
    </div>
    <div class="verification-container">
      <form onsubmit="return validarCampo()">
        <div class="input-container" id="campo-codigo">
          <input class="input-field" type="text" id="input-field" placeholder=" " />
          <label for="input-field" class="input-label">CPF</label>
          <span class="input-highlight"></span>
          <div class="erro-mensagem">Este campo é obrigatório</div>
        </div>
        <button type="submit">ENVIAR</button>
        <hr class="divider">
      </form>
    </div>
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
  <script>
    // Script para alternar entre os temas claro e escuro
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
    function validarCampo() {
      const campo = document.getElementById("input-field");
      const container = document.getElementById("campo-codigo");
      if (campo.value.trim() === "") {
        container.classList.add("erro");
        return false;
      } else {
        container.classList.remove("erro");
        return true;
      }
    }
  </script>
  <!-- Cursor Motion Blur Effect -->
  <link rel="stylesheet" href="/media/Cursor/EfeitoCursor/dist/style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.15.0/TweenMax.min.js"></script>
  <script src="/media/Cursor/EfeitoCursor/dist/script.js" defer></script>
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
</body>
</html>
