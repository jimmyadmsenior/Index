@extends('layouts.app')

@section('head')
<link rel="stylesheet" href="{{ asset('media/Css/Homepage_Notbooks.css') }}">
@endsection

@section('content')

{{-- Barra de Pesquisa de Notebooks --}}
@include('partials.product-search', ['categoria' => 'Notebooks'])

<div class="notebook-container">
    <img src="{{ asset('media/mac pro.jpg') }}" alt="MacBook Pro" class="no-margin-left">
    <!-- Título principal: aumente o tamanho alterando font-size ou usando classes maiores -->
    <h1 style="color: #000; font-size: 3rem; font-weight: bold; text-align: center; margin-top: 30px;">
        Notebooks Premium
    </h1>
    <!-- Subtítulo: aumente o tamanho alterando font-size -->
    <p style="color: #bdbdbd; font-size: 1.5rem; text-align: center; margin-bottom: 30px;">
        Tecnologia de ponta para profissionais exigentes
    </p>
    <div class="botao-comprar-container">
        @auth
            <form action="{{ route('carrinho.adicionar') }}" method="POST" style="display: inline-block;">
                @csrf
                <input type="hidden" name="produto_id" value="1">
                <input type="hidden" name="quantidade" value="1">
                <button type="submit" class="comprar-btn-preto" style="background: #000; color: #fff; border: none;">
                    <i class="fas fa-shopping-cart"></i> Adicionar ao Carrinho
                </button>
            </form>
        @else
            <a href="/Login" class="comprar-btn-preto">Faça Login para Comprar</a>
        @endauth
    </div>
</div>

<!-- Carrossel de Notebooks (adicione suas imagens e textos nos cards abaixo) -->
<section class="carousel-notebooks-novo">
  <style>
    .carousel-notebooks-novo {
      max-width: 1200px;
      margin: 48px auto 0 auto;
      background: #181818;
      border-radius: 24px;
      box-shadow: 0 4px 32px 0 rgba(0,0,0,0.18);
      padding: 32px 0;
      position: relative;
    }
    .carousel-notebooks-novo .carousel-viewport {
      overflow: hidden;
      width: 100%;
      height: 320px;
      border-radius: 18px;
      background: transparent;
    }
    .carousel-notebooks-novo .carousel-track {
      display: flex;
      transition: transform 0.7s cubic-bezier(.77,0,.18,1);
      will-change: transform;
    }
    .carousel-notebooks-novo .carousel-slide {
      min-width: 100%;
      display: flex;
      justify-content: center;
      align-items: stretch;
      gap: 48px;
    }
    .notebook-card {
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 2px 16px 0 rgba(0,0,0,0.08);
      display: flex;
      flex-direction: column;
      align-items: center;
      width: 320px;
      min-height: 280px;
      padding: 32px 16px 28px 16px;
      transition: box-shadow 0.2s, transform 0.2s;
    }
    .notebook-card img {
      width: 180px;
      height: 180px;
      object-fit: contain;
      margin-bottom: 32px;
    }
    .notebook-model {
      color: #222;
      font-size: 1.08rem;
      font-weight: 600;
      margin-bottom: 12px;
      text-align: center;
      letter-spacing: 0.2px;
    }
    .notebook-price {
      color: #222;
      font-size: 1.05rem;
      font-weight: 400;
      text-align: center;
    }
    .carousel-notebooks-novo .carousel-indicators {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 12px;
      margin-top: 18px;
    }
    .carousel-notebooks-novo .carousel-dot {
      width: 16px;
      height: 16px;
      border-radius: 50%;
      border: 2px solid #fff;
      background: transparent;
      cursor: pointer;
      transition: background 0.2s;
    }
    .carousel-notebooks-novo .carousel-dot.active {
      background: #fff;
    }
    @media (max-width: 900px) {
      .notebook-card { width: 90vw; min-height: 180px; padding: 12px 4px 12px 4px; }
      .notebook-card img { width: 60px; height: 60px; margin-bottom: 10px; }
      .carousel-notebooks-novo .carousel-viewport { height: 110px; }
      .notebook-model { font-size: 0.82rem; }
      .notebook-price { font-size: 0.8rem; }
    }
  </style>
  <div class="carousel-viewport">
    <div class="carousel-track">
      <!-- Slide 1 -->
      <div class="carousel-slide">
        <div class="notebook-card">
          <img src="/media/MacBook Pro13.png" alt="MacBook Pro 13">
          <div class="notebook-model">MacBook Pro 13" M2</div>
          <div class="notebook-price">R$ 11.999,00</div>
        </div>
        <div class="notebook-card">
          <img src="/media/macBook Pro14.png" alt="MacBook Pro 14">
          <div class="notebook-model">MacBook Pro 14" M3</div>
          <div class="notebook-price">R$ 18.499,00</div>
        </div>
        <div class="notebook-card">
          <img src="/media/macBook Air.png" alt="MacBook Air">
          <div class="notebook-model">MacBook Air M2</div>
          <div class="notebook-price">R$ 8.999,00</div>
        </div>
      </div>
      <!-- Slide 2 (adicione mais slides se quiser) -->
      <div class="carousel-slide">
        <div class="notebook-card">
          <img src="/media/MacBook Pro16.png" alt="MacBook Pro 16">
          <div class="notebook-model">MacBook Pro 16" M3</div>
          <div class="notebook-price">R$ 28.999,00</div>
        </div>
        <div class="notebook-card">
          <img src="/media/Galaxy Book4.png" alt="Galaxy Book4">
          <div class="notebook-model">Samsung Galaxy Book4</div>
          <div class="notebook-price">R$ 7.499,00</div>
        </div>
        <div class="notebook-card">
          <img src="/media/Galaxy Book pro.png" alt="Galaxy Book Pro">
          <div class="notebook-model">Samsung Galaxy Book Pro</div>
          <div class="notebook-price">R$ 9.999,00</div>
        </div>
      </div>
      <!-- Slide 3 -->
      <div class="carousel-slide">
        <div class="notebook-card">
          <img src="/media/Galaxy Book Pro360.png" alt="Galaxy Book Pro 360">
          <div class="notebook-model">Samsung Galaxy Book Pro 360</div>
          <div class="notebook-price">R$ 12.999,00</div>
        </div>
        <div class="notebook-card">
          <img src="/media/Galaxy Book 360.png" alt="Galaxy Book 360">
          <div class="notebook-model">Samsung Galaxy Book 360</div>
          <div class="notebook-price">R$ 10.499,00</div>
        </div>
        <div class="notebook-card">
          <img src="/media/Galaxy Book ultra.png" alt="Galaxy Book Ultra">
          <div class="notebook-model">Samsung Galaxy Book Ultra</div>
          <div class="notebook-price">R$ 16.999,00</div>
        </div>
      </div>
    </div>
  </div>
  <div class="carousel-indicators">
    <button class="carousel-dot" data-slide="0"></button>
    <button class="carousel-dot" data-slide="1"></button>
    <button class="carousel-dot" data-slide="2"></button>
  </div>
  <script>
    (function() {
      const track = document.querySelector('.carousel-notebooks-novo .carousel-track');
      const slides = document.querySelectorAll('.carousel-notebooks-novo .carousel-slide');
      const dots = document.querySelectorAll('.carousel-notebooks-novo .carousel-dot');
      let current = 0;
      let interval = null;
      function showSlide(idx) {
        track.style.transform = `translateX(-${idx * 100}%)`;
        dots.forEach((dot, i) => dot.classList.toggle('active', i === idx));
        current = idx;
      }
      function nextSlide() {
        let next = (current + 1) % slides.length;
        showSlide(next);
      }
      function goToSlide(idx) {
        showSlide(idx);
        resetInterval();
      }
      function startInterval() {
        interval = setInterval(nextSlide, 4000);
      }
      function resetInterval() {
        clearInterval(interval);
        startInterval();
      }
      dots.forEach((dot, i) => {
        dot.addEventListener('click', () => goToSlide(i));
      });
      showSlide(0);
      startInterval();
    })();
  </script>
</section>
<!-- Fim do carrossel de notebooks -->
<style>
.carousel-notebooks-novo {
  background: #cccccc !important;
}
</style>

<!-- Seção destaque MacBook Pro 14 -->
<div style="position: relative; width: 100%; max-width: 900px; margin: 60px auto 0 auto;">
    <img src="/media/MacBook.png" alt="MacBook Pro 14" style="width: 100%; max-width: 900px; display: block; margin: 0 auto; border-radius: 18px;">
    <!-- Frase sobre a imagem -->
  <div style="position: absolute; top: 5%; left: 50%; transform: translate(-50%, -50%); width: 100%; text-align: center;">
    <!-- Para mudar a cor da frase, altere o valor de color abaixo -->
    <span style="color: #000; font-size: 2.5rem; font-weight: bold; letter-spacing: 1px;">MacBook Pro 14</span>
  </div>
    <!-- Botão comprar -->
  <div style="position: absolute; top: 12.5%; left: 50%; transform: translate(-50%, 0); width: 100%; text-align: center;">
    <!-- Para subir ou descer o botão, altere o valor de top acima (ex: top: 30%; top: 60%) -->
    <!-- Para mover para o lado, altere o valor de left acima (ex: left: 40%; left: 60%) -->
        @auth
            <form action="{{ route('carrinho.adicionar') }}" method="POST" style="display: inline-block;">
                @csrf
                <input type="hidden" name="produto_id" value="2">
                <input type="hidden" name="quantidade" value="1">
                <button type="submit" class="comprar-btn-macbook14">
                    <i class="fas fa-shopping-cart"></i> Comprar
                </button>
            </form>
        @else
            <a href="/Login" class="comprar-btn-macbook14">Faça Login para Comprar</a>
        @endauth
    </div>
</div>


<!-- Containers de produtos lado a lado (agora abaixo do vídeo) -->
@section('after-video')
<div style="display: flex; justify-content: center; align-items: flex-start; gap: 48px; margin: 60px 0 80px 0; flex-wrap: wrap;">
  <!-- Container grande -->
  <div style="background: #e5e5e5; border-radius: 22px; padding: 32px 32px 24px 32px; min-width: 320px; max-width: 400px; width: 100%; display: flex; flex-direction: column; align-items: center; box-shadow: 0 2px 16px 0 rgba(0,0,0,0.06);">
  <img src="{{ asset('media/Galaxy Book pro.png') }}" alt="Notebook 1" style="width: 260px; height: 440px; object-fit: contain; max-width: 100%; margin-bottom: 18px;">
    <div style="font-size: 1.5rem; font-weight: 600; color: #222; margin-bottom: 18px; text-align: center;">Galaxy Book Pro</div>
    @auth
      <form action="{{ route('carrinho.adicionar') }}" method="POST" style="margin-top: 8px;">
        @csrf
        <input type="hidden" name="produto_id" value="101">
        <input type="hidden" name="quantidade" value="1">
  <button type="submit" class="comprar-btn-efeito">COMPRAR</button>
      </form>
    @else
  <a href="/Login" class="comprar-btn-efeito">LOGIN PARA COMPRAR</a>
    @endauth
  </div>
  <!-- Container pequeno -->
  <div style="background: #e5e5e5; border-radius: 22px; padding: 24px 24px 18px 24px; min-width: 200px; max-width: 260px; width: 100%; display: flex; flex-direction: column; align-items: center; box-shadow: 0 2px 16px 0 rgba(0,0,0,0.06);">
  <img src="{{ asset('media/Galaxy Book ultra.png') }}" alt="Notebook 2" style="width: 120px; height: 230px; object-fit: contain; max-width: 100%; margin-bottom: 14px;">
    <div style="font-size: 1.1rem; font-weight: 600; color: #222; margin-bottom: 14px; text-align: center;">Galaxy Book ultra</div>
    @auth
      <form action="{{ route('carrinho.adicionar') }}" method="POST" style="margin-top: 4px;">
        @csrf
        <input type="hidden" name="produto_id" value="102">
        <input type="hidden" name="quantidade" value="1">
  <button type="submit" class="comprar-btn-efeito">COMPRAR</button>
      </form>
    @else
  <a href="/Login" class="comprar-btn-efeito">LOGIN PARA COMPRAR</a>
<style>
  .comprar-btn-efeito {
    background: #000;
    color: #fff;
    border: none;
    padding: 12px 24px;
    border-radius: 40px;
    font-weight: 700;
    cursor: pointer;
    font-size: 0.95rem;
    display: inline-block;
    box-shadow: 0 2px 8px 0 rgba(0,0,0,0.10);
    transition: transform 0.15s cubic-bezier(.4,0,.2,1), box-shadow 0.15s;
    outline: none;
    text-decoration: none;
  }
  .comprar-btn-efeito:hover, .comprar-btn-efeito:focus {
    transform: translateY(-4px) scale(1.04);
    box-shadow: 0 6px 18px 0 rgba(0,0,0,0.18);
    background: #222;
    color: #fff;
  }
  .comprar-btn-efeito:active {
    transform: translateY(2px) scale(0.98);
    box-shadow: 0 1px 4px 0 rgba(0,0,0,0.10);
    background: #111;
    color: #fff;
  }
</style>
    @endauth
  </div>
</div>
@endsection




<!-- vídeo demonstrativo abaixo da imagem -->

  <div class="video-wrap" id="videoWrap">
    <video id="heroVideo" class="hero-video" playsinline muted loop autoplay preload="auto">
      <source src="{{ asset('media/Video Galaxy Book.mp4') }}" type="video/mp4">
      Seu navegador não suporta o elemento de vídeo.
    </video>
  </div>
  <script>
  document.addEventListener('DOMContentLoaded', function() {
    var v = document.getElementById('heroVideo');
    if(v) {
      v.muted = true;
      v.loop = true;
      var playPromise = v.play();
      if(playPromise !== undefined) {
        playPromise.catch(function() {
          // Tenta novamente ao interagir
          var playOnInteract = function() {
            v.play();
            window.removeEventListener('click', playOnInteract);
          };
          window.addEventListener('click', playOnInteract);
        });
      }
    }
  });
  </script>

  <!-- Fullscreen-like overlay (simulado) com barra de controles personalizados -->

  @yield('after-video')
    <div id="videoOverlay" class="fullscreen-video-overlay" aria-hidden="true">
        <div class="fullscreen-video-inner">
            <div id="overlayVideoContainer" class="overlay-video-container"></div>
            <div class="overlay-controls" aria-label="Video controls">
                <button id="playPauseBtn" class="control-btn" aria-label="Play/Pause">⏯</button>
                <button id="muteBtn" class="control-btn" aria-label="Silenciar/Ativar som">🔈</button>
                <div id="videoTime" class="control-time">0:00 / 0:00</div>
                <button id="minimizeBtn" class="control-btn minimize" aria-label="Minimizar">Minimizar</button>
            </div>
        </div>
    </div>

    <script>
        // Comportamento do vídeo: autoplay (com fallback), exibir overlay somente após o usuário rolar além da imagem Galaxy S24
        (function(){
            var v = document.getElementById('heroVideo');
            if(!v) return;

            v.loop = true;
            v.muted = true;

            function tryPlay(){
                var p = v.play();
                if(p && p.catch){ p.catch(function(){ /* autoplay bloqueado */ }); }
            }
            v.addEventListener('loadedmetadata', tryPlay);
            v.addEventListener('ended', function(){ v.currentTime = 0; v.play(); });
            tryPlay();

            var overlay = document.getElementById('videoOverlay');
            var overlayContainer = document.getElementById('overlayVideoContainer');
            var playPauseBtn = document.getElementById('playPauseBtn');
            var muteBtn = document.getElementById('muteBtn');
            var timeEl = document.getElementById('videoTime');
            var minimizeBtn = document.getElementById('minimizeBtn');
            var videoWrap = document.getElementById('videoWrap');

            var opened = false;
            var userClosed = false;

            // localiza a imagem Galaxy S24 (assume .extra-image é a imagem do Galaxy)
            var galaxyEl = document.querySelector('.extra-image');

            function formatTime(s){
                if(isNaN(s)) return '0:00';
                var m = Math.floor(s/60), sec = Math.floor(s%60);
                return m + ':' + (sec < 10 ? '0' + sec : sec);
            }

            function updateTime(){
                var cur = formatTime(v.currentTime);
                var dur = formatTime(v.duration || 0);
                timeEl.textContent = cur + ' / ' + dur;
            }

            v.addEventListener('timeupdate', updateTime);
            v.addEventListener('loadedmetadata', updateTime);

            function openOverlay(){
                if(opened || userClosed) return;
                // só abrir se a imagem Galaxy foi rolada para cima (ou não existir)
                if(galaxyEl){
                    var gRect = galaxyEl.getBoundingClientRect();
                    // condição: bottom do elemento Galaxy está acima do topo da viewport (ou seja, o usuário passou por ele)
                    if(gRect.bottom > 0) return; // ainda não passou totalmente
                }
                overlayContainer.appendChild(v);
                overlay.classList.add('open');
                overlay.setAttribute('aria-hidden','false');
                opened = true;
                tryPlay();
                updateTime();
            }

            function closeOverlay(){
                if(!opened) return;
                videoWrap.appendChild(v);
                overlay.classList.remove('open');
                overlay.setAttribute('aria-hidden','true');
                opened = false;
                userClosed = true;
            }

            // Observer: monitorar quando o vídeo entra em viewport (>=50%) e tentar abrir overlay
            var io = new IntersectionObserver(function(entries){
                entries.forEach(function(entry){
                    if(entry.isIntersecting && entry.intersectionRatio >= 0.5){
                        openOverlay();
                    }
                });
            }, { threshold: [0.25, 0.5, 0.75] });
            io.observe(videoWrap);

            // controles
            playPauseBtn.addEventListener('click', function(){
                if(v.paused) { v.play(); playPauseBtn.textContent = '⏸'; }
                else { v.pause(); playPauseBtn.textContent = '▶'; }
            });
            muteBtn.addEventListener('click', function(){
                v.muted = !v.muted;
                muteBtn.textContent = v.muted ? '🔈' : '🔊';
            });
            minimizeBtn.addEventListener('click', function(e){ e.preventDefault(); closeOverlay(); });

            // ESC fecha overlay
            window.addEventListener('keydown', function(e){ if(e.key === 'Escape' && opened){ closeOverlay(); } });

            // fechar automaticamente se usuário rolar muito para longe do vídeo
            window.addEventListener('scroll', function(){
                if(!opened) return;
                var rect = overlay.getBoundingClientRect();
                if(rect.bottom < window.innerHeight * 0.25 || rect.top > window.innerHeight * 0.75){ closeOverlay(); }
            }, { passive: true });

        })();
    </script>

    <!-- imagem adicional abaixo -->
    <div class="extra-image-wrap" style="text-align:center; margin:36px 0 80px;">
        <div class="extra-image-inner" style="position:relative; display:inline-block;">
            <img class="extra-image" src="{{ asset('media/Pedro_lindo.png') }}" alt="Galaxy S24 Ultra" style="border-radius: 18px;" />
           
        </div>
    </div>
@endsection
