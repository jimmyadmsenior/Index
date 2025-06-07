<!DOCTYPE html>
<html lang="pt-br" data-theme="light">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Carrinho e Pagamento - Index</title>
  <link rel="icon" type="image/png" href="/media/Ícone_Guia_Navegador_Site.png">
  <link rel="stylesheet" href="/media/Css/Homepage_Com_Cadastro.css" />
  <link rel="stylesheet" href="/media/Css/Homepage_Sem_Cadastro_Custom.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <!-- Chatbot Widget -->
  <link rel="stylesheet" href="/media/ChatBot/style.css">
</head>
<body>
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
          <li><a href="/Homepage_Smartphones">Smartphones</a></li>
          <li><a href="/Homepage_Tablets">Tablets</a></li>
          <li><a href="/Homepage_Fones">Fones</a></li>
          <li><a href="/Homepage_Relogios">Relógios</a></li>
          <li><a href="/Homepage_Notebooks">Notebooks</a></li>
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
  <!-- Conteúdo do carrinho e pagamento será adicionado depois -->
  <main class="main-homepage" style="min-height:60vh;">
    <div style="height:70px;"></div> <!-- Espaço extra antes da seção de pagamento -->
    <section class="payment-section" style="max-width:480px;margin:48px auto 64px auto;padding:36px 28px;background:rgba(24,24,28,0.98);border-radius:28px;box-shadow:0 8px 32px rgba(0,0,0,0.22);">
      <h2 style="text-align:center;font-size:2.1rem;font-weight:800;margin-bottom:32px;color:#fff;letter-spacing:1px;">Pagamento</h2>
      <div style="display:flex;flex-direction:column;gap:28px;">
        <!-- Cartão -->
        <div class="payment-card" style="background:linear-gradient(120deg,#23243a 60%,#2e8fff 100%);border-radius:18px;padding:24px 20px;box-shadow:0 2px 12px #2e8fff22;">
          <div style="display:flex;align-items:center;gap:12px;margin-bottom:18px;">
            <i class="fas fa-credit-card" style="font-size:1.5rem;color:#fff;"></i>
            <span style="font-size:1.15rem;color:#fff;font-weight:600;">Cartão de Crédito</span>
          </div>
          <form id="form-cartao" style="display:flex;flex-direction:column;gap:14px;">
            <input type="text" placeholder="Nome no cartão" name="nome_cartao" required pattern="[A-Za-zÀ-ÿ ']+" title="Apenas letras" style="padding:11px;border-radius:7px;border:1px solid #3a3a4a;background:#23243a;color:#fff;"/>
            <input type="text" placeholder="Número do cartão" name="numero_cartao" required maxlength="19" pattern="[0-9 ]+" title="Apenas números" inputmode="numeric" style="padding:11px;border-radius:7px;border:1px solid #3a3a4a;background:#23243a;color:#fff;"/>
            <div style="display:flex;gap:10px;">
              <input type="text" placeholder="Validade (MM/AA)" name="validade" required maxlength="5" pattern="(0[1-9]|1[0-2])\/[0-9]{2}" title="Formato MM/AA" inputmode="numeric" style="flex:1;padding:11px;border-radius:7px;border:1px solid #3a3a4a;background:#23243a;color:#fff;"/>
              <input type="text" placeholder="CVV" name="cvv" required maxlength="4" pattern="[0-9]{3,4}" title="Apenas números" inputmode="numeric" style="flex:1;padding:11px;border-radius:7px;border:1px solid #3a3a4a;background:#23243a;color:#fff;"/>
            </div>
            <button type="submit" style="margin-top:10px;padding:13px 0;font-size:1.08rem;border-radius:8px;border:none;background:#00c86f;color:#fff;font-weight:700;box-shadow:0 2px 8px #00c86f33;transition:background 0.2s;">Pagar com Cartão</button>
          </form>
        </div>
        <!-- Pix -->
        <div class="payment-card" style="background:linear-gradient(120deg,#23243a 60%,#00c86f 100%);border-radius:18px;padding:24px 20px;box-shadow:0 2px 12px #00c86f22;display:flex;align-items:center;justify-content:space-between;gap:18px;">
          <div style="display:flex;align-items:center;gap:12px;">
            <img src="/media/pix2.png" alt="Pix" style="width:38px;filter:drop-shadow(0 2px 8px #00c86f88);"/>
            <span style="font-size:1.15rem;color:#fff;font-weight:600;">Pix</span>
          </div>
          <a href="/Carrinho_Pix" style="padding:12px 28px;border-radius:8px;background:#fff;color:#00c86f;font-weight:700;font-size:1.08rem;text-decoration:none;box-shadow:0 2px 8px #00c86f33;transition:background 0.2s;">Pagar com Pix</a>
        </div>
      </div>
    </section>
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
  <!-- Novo Chatbot Widget -->
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
  <!-- Fim do novo Chatbot Widget -->
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
    });  </script>
    <!-- Cursor Motion Blur Effect -->
    <link rel="stylesheet" href="/media/Cursor/EfeitoCursor/dist/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.15.0/TweenMax.min.js"></script>
    <script src="/media/Cursor/EfeitoCursor/src/script.js" defer></script>
    <!-- Elementos do efeito cursor -->
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
    <!-- Fim Cursor Motion Blur Effect -->
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
    <script>
      document.addEventListener('DOMContentLoaded', function() {
  const numeroCartao = document.querySelector('input[name="numero_cartao"]');
  const validade = document.querySelector('input[name="validade"]');
  const cvv = document.querySelector('input[name="cvv"]');
  const nomeCartao = document.querySelector('input[name="nome_cartao"]');

  if (numeroCartao) {
    numeroCartao.addEventListener('input', function(e) {
      // Permite apenas números e espaço
      this.value = this.value.replace(/[^0-9 ]/g, '');
    });
  }
  if (validade) {
    validade.addEventListener('input', function(e) {
      // Permite apenas números e barra
      this.value = this.value.replace(/[^0-9/]/g, '');
      // Adiciona a barra automaticamente após dois dígitos
      if (this.value.length === 2 && !this.value.includes('/')) {
        this.value = this.value + '/';
      }
      // Limita a 5 caracteres
      if (this.value.length > 5) {
        this.value = this.value.slice(0, 5);
      }
    });
  }
  if (cvv) {
    cvv.addEventListener('input', function(e) {
      // Permite apenas números
      this.value = this.value.replace(/[^0-9]/g, '');
      // Limita a 4 caracteres
      if (this.value.length > 4) {
        this.value = this.value.slice(0, 4);
      }
    });
  }
  if (nomeCartao) {
    nomeCartao.addEventListener('input', function(e) {
      // Permite apenas letras, acentos e espaço
      this.value = this.value.replace(/[^A-Za-zÀ-ÿ ']/g, '');
    });
  }
});
    </script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
  // Redireciona para compra_finalizada ao submeter o formulário do cartão
  const formCartao = document.getElementById('form-cartao');
  if (formCartao) {
    formCartao.addEventListener('submit', function(e) {
      e.preventDefault();
      window.location.href = '/compra-finalizada';
    });
  }
});
    </script>
  </body>
</html>
