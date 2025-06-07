<!DOCTYPE html>
<html lang="pt-br" data-theme="light">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Pagamento via Pix - Index</title>
  <link rel="icon" type="image/png" href="/media/Ícone_Guia_Navegador_Site.png">
  <link rel="stylesheet" href="/media/Css/Homepage_Com_Cadastro.css" />
  <link rel="stylesheet" href="/media/Css/Homepage_Sem_Cadastro_Custom.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
  @php
    $produto_id = session('produto_id') ?? request('produto_id') ?? '';
  @endphp
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
  <main class="main-homepage" style="min-height:60vh;">
    <div style="height:70px;"></div>
    <section id="pix-section" style="max-width:480px;margin:48px auto 64px auto;padding:36px 28px;background:rgba(24,24,28,0.98);border-radius:28px;box-shadow:0 8px 32px rgba(0,0,0,0.22);text-align:center;">
      <p class="pix-frete" style="color:#fff;font-size:1.1rem;margin-bottom:18px;">Frete grátis para todos os nossos produtos.</p>
      <h2 class="pix-title" style="color:#fff;font-size:1.15rem;font-weight:800;margin-bottom:18px;">Use o QR Code ou o código Pix para realizar seu pagamento</h2>
      <!-- Imagem do Pix removida -->
      <div style="margin-bottom:10px;"><img id="pix-qrcode" src="/media/Qr_Code_test.png" alt="QR Code" style="width:220px;"/></div>
      <p class="pix-codigo" style="color:#fff;font-size:1.05rem;margin-bottom:24px;">123e4567-e89b-12d3-a456-426614174000</p>
      <form id="form-pix" action="/finalizar-compra" method="POST" style="margin:0;">
        @csrf
        <input type="hidden" name="produto_id" id="produto_id_pix" value="{{ $produto_id }}">
        <button id="pix-btn" class="featured-link" type="submit" style="display:inline-block;margin-top:10px;padding:14px 40px;font-size:1.15rem;border-radius:10px;background:#000;color:#fff;font-weight:700;text-decoration:none;cursor:pointer;border:none;transition:none;">Continuar</button>
      </form>
    </section>
    <div style="height:60px;"></div>
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

      // Ajuste visual para modo dark: seção branca, letras pretas, QR code preto
      function applyPixSectionTheme() {
        const isDark = document.documentElement.getAttribute('data-theme') === 'dark';
        const section = document.getElementById('pix-section');
        const title = document.querySelector('.pix-title');
        const frete = document.querySelector('.pix-frete');
        const codigo = document.querySelector('.pix-codigo');
        const qrcode = document.getElementById('pix-qrcode');
        if (isDark) {
          section.style.background = '#fff';
          section.style.boxShadow = '0 8px 32px rgba(0,0,0,0.10)';
          if (title) title.style.color = '#111';
          if (frete) frete.style.color = '#111';
          if (codigo) codigo.style.color = '#111';
          if (qrcode) qrcode.style.filter = 'invert(0)'; // QR code preto
        } else {
          section.style.background = 'rgba(24,24,28,0.98)';
          section.style.boxShadow = '0 8px 32px rgba(0,0,0,0.22)';
          if (title) title.style.color = '#fff';
          if (frete) frete.style.color = '#fff';
          if (codigo) codigo.style.color = '#fff';
          if (qrcode) qrcode.style.filter = 'invert(1)'; // QR code branco
        }
      }
      applyPixSectionTheme();
      document.getElementById('theme-toggle').addEventListener('change', applyPixSectionTheme);
      prefersDarkScheme.addEventListener('change', applyPixSectionTheme);
    });
  </script>
  <style>
    /* Remove animação/hover do botão */
    #pix-btn {
      background: #000 !important;
      color: #fff !important;
      border: none !important;
      box-shadow: none !important;
      transition: none !important;
    }
    #pix-btn:hover, #pix-btn:active, #pix-btn:focus {
      background: #000 !important;
      color: #fff !important;
      box-shadow: none !important;
      outline: none !important;
      transform: none !important;
    }
  </style>
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
