@extends('layouts.app')
@section('head')
<!DOCTYPE html>
<html lang="pt-br" data-theme="light">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Compra Finalizada - Index</title>
  <link rel="icon" type="image/png" href="/media/Ícone_Guia_Navegador_Site.png">
  <link rel="stylesheet" href="/media/Css/Homepage_Com_Cadastro.css" />
  <link rel="stylesheet" href="/media/Css/Homepage_Sem_Cadastro_Custom.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="/media/ChatBot/style.css">
</head>
<body>
  <header style="background:#111;box-shadow:none;border:none;">
    <div class="header-content">
      <div class="logo">
        @if(Auth::check())
            <a href="/Homepage_Com_Cadastro"><img src="/media/Logo_Branca.png" alt="Logo da empresa"></a>
        @else
            <a href="/"><img src="/media/Logo_Branca.png" alt="Logo da empresa"></a>
        @endif
      </div>
      <nav style="background:#111;">
        <ul class="menu">
          <li><a href="/Homepage_Smartphones" style="color:#fff;background:#111;">Smartphones</a></li>
          <li><a href="/Homepage_Tablets" style="color:#fff;background:#111;">Tablets</a></li>
          <li><a href="/Homepage_Fones" style="color:#fff;background:#111;">Fones</a></li>
          <li><a href="/Homepage_Relogios" style="color:#fff;background:#111;">Relógios</a></li>
          <li><a href="/Homepage_Notebooks" style="color:#fff;background:#111;">Notebooks</a></li>
        </ul>
      </nav>
      <div class="icons">
        <i class="fas fa-search" style="color:#fff;"></i>
        @if(Auth::check())
          <a href="/perfil" title="Perfil" style="color:#fff;background:#111;"><i class="fas fa-user"></i></a>
        @else
          <a href="/login" class="navbar-btn navbar-btn-login" style="color:#fff;background:#111;">Login</a>
          <a href="/cadastro" class="navbar-btn navbar-btn-cadastro" style="color:#fff;background:#111;">Cadastro</a>
        @endif
        <i class="fas fa-shopping-bag" style="color:#fff;"></i>
        <i class="fas fa-box" style="color:#fff;"></i>
      </div>
    </div>
  </header>
  <main class="main-homepage" style="min-height:60vh;">
    <div style="height:180px;"></div> <!-- Espaço ainda maior acima da seção -->
    <section style="display:flex;justify-content:center;align-items:center;min-height:50vh;width:100vw;">
      <div class="confirmation-container" style="background:rgba(30,30,30,0.97);border-radius:24px;padding:48px 48px;box-shadow:0 8px 32px rgba(0,0,0,0.22);text-align:center;max-width:650px;width:100%;margin:0 auto;">
        <h1 style="color:#00c86f;font-size:2.2rem;font-weight:800;margin-bottom:18px;">Compra Finalizada</h1>
        <img src="/media/Ícone_Check_Verde.png" alt="Check" style="width:70px;margin-bottom:18px;"/>
        <p style="color:#fff;font-size:1.18rem;margin-bottom:24px;">Seu pagamento foi aprovado e sua compra foi concluída com sucesso.<br>Em breve, você receberá um e-mail com todas as informações e o código de rastreamento assim que o pedido for enviado.<br> Caso tenha dúvidas ou precise de suporte, entre em contato.<br><b>Obrigado por comprar conosco.</b></p>
        <a href="/Homepage_Com_Cadastro" class="featured-link" style="display:inline-block;margin-top:10px;padding:14px 40px;font-size:1.15rem;border-radius:10px;background:#00c86f;color:#fff;font-weight:700;text-decoration:none;">Voltar para a Home</a>
      </div>
    </section>
    <div style="height:160px;"></div> <!-- Espaço ainda maior abaixo da seção -->
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
  <!-- Confetes -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const wrapper = document.body;
      const colors = ['#00c86f', '#2e8fff', '#fff', '#d13447', '#ffbf00', '#263672'];
      const confettiList = [];
      for (let i = 0; i < 150; i++) {
        const confetti = document.createElement('div');
        confetti.className = 'confetti-' + i;
        const size = Math.floor(Math.random() * 8) + 4;
        confetti.style.width = size + 'px';
        confetti.style.height = (size * 0.4) + 'px';
        confetti.style.left = Math.random() * 100 + 'vw';
        confetti.style.top = '-10px';
        confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
        confetti.style.opacity = Math.random();
        confetti.style.position = 'fixed';
        confetti.style.zIndex = 9999;
        confetti.style.borderRadius = '2px';
        confetti.style.animation = `confetti-fall ${4 + Math.random() * 2}s linear ${Math.random()}s forwards`;
        wrapper.appendChild(confetti);
        confettiList.push(confetti);
      }
      setTimeout(() => {
        confettiList.forEach(conf => conf.remove());
      }, 5000);
    });
  </script>
  <style>
    @keyframes confetti-fall {
      to {
        transform: translateY(110vh) rotateZ(360deg);
        opacity: 0.7;
      }
    }
  </style>
  <!-- Chatbot Widget -->
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
</body>
</html>
@endsection
@section('content')
<!DOCTYPE html>
<html lang="pt-br" data-theme="light">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Compra Finalizada - Index</title>
  <link rel="icon" type="image/png" href="/media/Ícone_Guia_Navegador_Site.png">
  <link rel="stylesheet" href="/media/Css/Homepage_Com_Cadastro.css" />
  <link rel="stylesheet" href="/media/Css/Homepage_Sem_Cadastro_Custom.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="/media/ChatBot/style.css">
</head>
<body>
  <header style="background:#111;box-shadow:none;border:none;">
    <div class="header-content">
      <div class="logo">
        @if(Auth::check())
            <a href="/Homepage_Com_Cadastro"><img src="/media/Logo_Branca.png" alt="Logo da empresa"></a>
        @else
            <a href="/"><img src="/media/Logo_Branca.png" alt="Logo da empresa"></a>
        @endif
      </div>
      <nav style="background:#111;">
        <ul class="menu">
          <li><a href="/Homepage_Smartphones" style="color:#fff;background:#111;">Smartphones</a></li>
          <li><a href="/Homepage_Tablets" style="color:#fff;background:#111;">Tablets</a></li>
          <li><a href="/Homepage_Fones" style="color:#fff;background:#111;">Fones</a></li>
          <li><a href="/Homepage_Relogios" style="color:#fff;background:#111;">Relógios</a></li>
          <li><a href="/Homepage_Notebooks" style="color:#fff;background:#111;">Notebooks</a></li>
        </ul>
      </nav>
      <div class="icons">
        <i class="fas fa-search" style="color:#fff;"></i>
        @if(Auth::check())
          <a href="/perfil" title="Perfil" style="color:#fff;background:#111;"><i class="fas fa-user"></i></a>
        @else
          <a href="/login" class="navbar-btn navbar-btn-login" style="color:#fff;background:#111;">Login</a>
          <a href="/cadastro" class="navbar-btn navbar-btn-cadastro" style="color:#fff;background:#111;">Cadastro</a>
        @endif
        <i class="fas fa-shopping-bag" style="color:#fff;"></i>
        <i class="fas fa-box" style="color:#fff;"></i>
      </div>
    </div>
  </header>
  <main class="main-homepage" style="min-height:60vh;">
    <div style="height:180px;"></div> <!-- Espaço ainda maior acima da seção -->
    <section style="display:flex;justify-content:center;align-items:center;min-height:50vh;width:100vw;">
      <div class="confirmation-container" style="background:rgba(30,30,30,0.97);border-radius:24px;padding:48px 48px;box-shadow:0 8px 32px rgba(0,0,0,0.22);text-align:center;max-width:650px;width:100%;margin:0 auto;">
        <h1 style="color:#00c86f;font-size:2.2rem;font-weight:800;margin-bottom:18px;">Compra Finalizada</h1>
        <img src="/media/Ícone_Check_Verde.png" alt="Check" style="width:70px;margin-bottom:18px;"/>
        <p style="color:#fff;font-size:1.18rem;margin-bottom:24px;">Seu pagamento foi aprovado e sua compra foi concluída com sucesso.<br>Em breve, você receberá um e-mail com todas as informações e o código de rastreamento assim que o pedido for enviado.<br> Caso tenha dúvidas ou precise de suporte, entre em contato.<br><b>Obrigado por comprar conosco.</b></p>
        <a href="/Homepage_Com_Cadastro" class="featured-link" style="display:inline-block;margin-top:10px;padding:14px 40px;font-size:1.15rem;border-radius:10px;background:#00c86f;color:#fff;font-weight:700;text-decoration:none;">Voltar para a Home</a>
      </div>
    </section>
    <div style="height:160px;"></div> <!-- Espaço ainda maior abaixo da seção -->
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
  <!-- Confetes -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const wrapper = document.body;
      const colors = ['#00c86f', '#2e8fff', '#fff', '#d13447', '#ffbf00', '#263672'];
      const confettiList = [];
      for (let i = 0; i < 150; i++) {
        const confetti = document.createElement('div');
        confetti.className = 'confetti-' + i;
        const size = Math.floor(Math.random() * 8) + 4;
        confetti.style.width = size + 'px';
        confetti.style.height = (size * 0.4) + 'px';
        confetti.style.left = Math.random() * 100 + 'vw';
        confetti.style.top = '-10px';
        confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
        confetti.style.opacity = Math.random();
        confetti.style.position = 'fixed';
        confetti.style.zIndex = 9999;
        confetti.style.borderRadius = '2px';
        confetti.style.animation = `confetti-fall ${4 + Math.random() * 2}s linear ${Math.random()}s forwards`;
        wrapper.appendChild(confetti);
        confettiList.push(confetti);
      }
      setTimeout(() => {
        confettiList.forEach(conf => conf.remove());
      }, 5000);
    });
  </script>
  <style>
    @keyframes confetti-fall {
      to {
        transform: translateY(110vh) rotateZ(360deg);
        opacity: 0.7;
      }
    }
  </style>
  <!-- Chatbot Widget -->
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
</body>
</html>
@endsection
