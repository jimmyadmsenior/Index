<!DOCTYPE html>
<html lang="pt-br" data-theme="light">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Homepage - Index</title>
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
  <main class="main-homepage">
    <section class="hero-section">
      <h1 class="hero-title">Chegou o Index, o toque de classe que faltava!</h1>
      <p class="hero-subtitle">Possua os melhores modelos, com tecnologia de ponta, da Apple e Samsung</p>
    </section>
    <section class="featured-products">
<<<<<<< Updated upstream
      @php $produtos = \App\Models\Produto::all(); @endphp
=======
      @php
        $produtos = \App\Models\Produto::all();
        // Mapeamento para exibir os produtos em destaque na ordem desejada
        $produtosDestaque = [
          'iPhone 14',
          'iPhone 14 Pro',
          'Galaxy Book4',
          'Samsung Galaxy Tab S6',
          'Apple Watch Series 8',
        ];
      @endphp
>>>>>>> Stashed changes
      <div class="featured-iphone14">
        @php $p = $produtos->firstWhere('nome', 'iPhone 14'); @endphp
        <h2>iPhone 14</h2>
        <p class="featured-desc">A tecnologia encontra o conforto</p>
        @if($p)
          <a href="/produto/{{ $p->id }}" class="featured-link">Comprar</a>
        @else
          <a href="#" class="featured-link" style="pointer-events:none;opacity:0.5;">Indisponível</a>
        @endif
        <div class="featured-imgs">
          <img src="/media/Iphone_14_Capa_Homepage.png" alt="iPhone 14" class="iphone14-img"/>
        </div>
        <video class="video-fullwidth iphone-video-scroll" id="iphoneVideoScroll" autoplay muted loop>
          <source src="/media/Vídeo_iPhone_Capa_Homepage.mp4" type="video/mp4">
          Seu navegador não suporta a tag de vídeo.
        </video>
      </div>
      <div class="product-grid">
<<<<<<< Updated upstream
        @foreach([
          ['nome' => 'iPhone 14 Pro', 'img' => '/media/Iphone_14_Pro_Capa_Homepage.png'],
          ['nome' => 'Galaxy Book4', 'img' => '/media/GalaxyBook4_Homepage.png'],
          ['nome' => 'Samsung Galaxy Tab S6', 'img' => '/media/Samsung Galaxy Tab S6.png'],
          ['nome' => 'Apple Watch Series 8', 'img' => '/media/Watch_Series8.png'],
        ] as $item)
          @php $p = $produtos->firstWhere('nome', $item['nome']); @endphp
          <div class="product-card dark">
            <h3>{{ $item['nome'] }}</h3>
            <p>
              @if($item['nome'] == 'iPhone 14 Pro') Faz jus ao nome
              @elseif($item['nome'] == 'Galaxy Book4') Desempenho nunca antes visto
              @elseif($item['nome'] == 'Samsung Galaxy Tab S6') Profissionalismo e elegância
              @elseif($item['nome'] == 'Apple Watch Series 8') Um salto de tecnologia
=======
        @foreach(['iPhone 14 Pro','Galaxy Book4','Samsung Galaxy Tab S6','Apple Watch Series 8'] as $nome)
          @php $p = $produtos->firstWhere('nome', $nome); @endphp
          <div class="product-card dark">
            <h3>{{ $nome }}</h3>
            <p>
              @if($nome == 'iPhone 14 Pro') Faz jus ao nome
              @elseif($nome == 'Galaxy Book4') Desempenho nunca antes visto
              @elseif($nome == 'Samsung Galaxy Tab S6') Profissionalismo e elegância
              @elseif($nome == 'Apple Watch Series 8') Um salto de tecnologia
>>>>>>> Stashed changes
              @endif
            </p>
            @if($p)
              <a href="/produto/{{ $p->id }}" class="featured-link">Comprar</a>
            @else
              <a href="#" class="featured-link" style="pointer-events:none;opacity:0.5;">Indisponível</a>
            @endif
<<<<<<< Updated upstream
            <img src="{{ $item['img'] }}" alt="{{ $item['nome'] }}"/>
=======
            <img src="/media/{{ str_replace(' ', '_', $nome) }}.png" alt="{{ $nome }}"/>
>>>>>>> Stashed changes
          </div>
        @endforeach
      </div>
    </section>
    <section class="explore-section">
      <div class="explore-banner">
        <div class="explore-text">
          <h2>Explore nosso site e descubra o luxo</h2>
        </div>
        <div class="explore-img">
          <img src="/media/Explore_Nosso_Site_E_Descubra.png" alt="Mascote Index"/>
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
  <script>
    // Efeito de scroll no vídeo do iPhone
    window.addEventListener('scroll', function() {
      const video = document.getElementById('iphoneVideoScroll');
      if (!video) return;
      const rect = video.getBoundingClientRect();
      const windowHeight = window.innerHeight || document.documentElement.clientHeight;
      // Quanto do vídeo está visível na tela (0 = topo da tela, 1 = totalmente visível)
      let visible = 1 - Math.max(0, rect.top) / windowHeight;
      visible = Math.max(0, Math.min(1, visible));
      // Encurtamento máximo das laterais (em %)
      const maxInset = 20; // até 20% de cada lado
      const inset = maxInset * (1 - visible);
      video.style.clipPath = `inset(0% ${inset}% 0% ${inset}%)`;
      video.style.transition = 'clip-path 0.2s';
    });
  </script>
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
</body>
</html>