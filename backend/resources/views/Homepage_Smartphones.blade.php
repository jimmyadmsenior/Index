@extends('layouts.app')
@section('head')
<link rel="stylesheet" href="{{ asset('media/Css/HomePage_Smartphones.css') }}">
@endsection
@section('content')

{{-- Barra de Pesquisa de Smartphones --}}
@include('partials.product-search', ['categoria' => 'Smartphones'])

{{-- Hero - Homepage Smartphones --}}
<div class="iphone15-destaque">
    <p class="subtitulo">Iphone 15</p>

    <h1 class="titulo-degrade">Alta Tecnologia. <span style="font-weight:700;">Alto Padrão</span></h1>

    <p class="preco">Disponível por apenas <span class="font-semibold">R$3.285,99</span></p>

    @auth
        <form action="{{ route('carrinho.adicionar') }}" method="POST" style="display: inline-block; margin-right: 10px;">
            @csrf
            <input type="hidden" name="produto_id" value="4">
            <input type="hidden" name="quantidade" value="1">
            <button type="submit" class="comprar-btn-preto" style="background: #000; color: #fff; border: none;">
                <i class="fas fa-shopping-cart"></i> Adicionar ao Carrinho
            </button>
        </form>
        <a href="{{ route('produto.show', 4) }}" class="comprar-btn-preto" style="background: #007aff; color: #fff; text-decoration: none; display: inline-block; margin-left: 10px;">
            <i class="fas fa-eye"></i> Ver Produto
        </a>
    @else
    <a href="/login" class="comprar-btn-preto" style="text-decoration: none;">Faça Login para Comprar</a>
    @endauth

    <div class="imagens" style="margin-top:28px;">
        <img src="{{ asset('media/img-iphone-homepage.png') }}" alt="iPhone 15" />
    </div>

    <!-- imagem full-bleed inserida dentro do bloco para permitir overlay do botão -->
    <div class="imagem-bleed-wrap">
        <div class="imagem-bleed-inner">
            <img class="imagem-bleed" src="{{ asset('media/frame (1).png') }}" alt="iPhone full bleed" />
            <!-- botão sobreposto dentro da imagem -->
            @auth
                <form action="{{ route('carrinho.adicionar') }}" method="POST" style="position: absolute; bottom: 450px; left: 50%; transform: translateX(-50%);">
                    @csrf
                    <input type="hidden" name="produto_id" value="4">
                    <input type="hidden" name="quantidade" value="1">
                    <button type="submit" class="comprar-link-overlay reativo-btn">
                        <i class="fas fa-shopping-cart"></i> Adicionar ao Carrinho
                    </button>
                </form>
            @else
                <a href="/login" class="comprar-link-overlay reativo-btn" style="text-decoration: none;">Faça Login para Comprar</a>
            @endauth
        </div>
    </div>

</div>
<style>
.reativo-btn {
    background: #000;
    color: #fff;
    border: none;
    padding: 16px 48px;
    min-width: 320px;
    border-radius: 32px;
    font-weight: 700;
    cursor: pointer;
    font-size: 1.1rem;
    transition: transform 0.2s, box-shadow 0.2s;
    box-shadow: 0 2px 8px rgba(11,120,255,0.08);
    display: flex;
    align-items: center;
    gap: 12px;
    justify-content: center;
}

</style>
    <!-- imagem adicional com botão na parte inferior -->
    <div class="extra-image-wrap" style="text-align:center; margin:36px 0 80px;">
        <div class="extra-image-inner" style="position:relative; display:inline-block;">
            <img class="extra-image" src="{{ asset('media/Galaxy_Smartphone.png') }}" alt="Galaxy S24 Ultra" />
            @auth
                <div style="position: absolute; left: 50%; bottom: 18px; transform: translateX(-50%); width: 100%; max-width: 320px; display: flex; gap: 10px;">
                    <form action="{{ route('carrinho.adicionar') }}" method="POST" style="flex: 1;">
                        @csrf
                        <input type="hidden" name="produto_id" value="12">
                        <input type="hidden" name="quantidade" value="1">
                        <button type="submit" class="botao-galaxy-center" style="width: 100%; background: #000; color: #fff; border: none; border-radius: 32px; padding: 12px 0; font-size: 0.95rem; font-weight: bold; box-shadow: 0 2px 10px rgba(0,0,0,0.15); display: flex; align-items: center; justify-content: center; gap: 8px;">
                            <i class="fas fa-shopping-cart" style="font-size: 1rem;"></i>
                            <span style="font-size: 0.95rem; font-weight: bold;">CARRINHO</span>
                        </button>
                    </form>
                    <a href="{{ route('produto.show', 12) }}" class="botao-galaxy-center" style="flex: 1; text-decoration: none; background: #007aff; color: #fff; border-radius: 32px; padding: 12px 0; font-size: 0.95rem; font-weight: bold; box-shadow: 0 2px 10px rgba(0,122,255,0.15); display: flex; align-items: center; justify-content: center; gap: 8px;">
                        <i class="fas fa-eye" style="font-size: 1rem;"></i>
                        <span style="font-size: 0.95rem; font-weight: bold;">VER PRODUTO</span>
                    </a>
                </div>
            @else
                <a href="/login" class="botao-galaxy-center" style="position: absolute; left: 50%; bottom: 18px; transform: translateX(-50%); width: 100%; max-width: 320px; text-decoration: none; background: #000; color: #fff; border-radius: 32px; padding: 12px 0; font-size: 1.05rem; font-weight: bold; box-shadow: 0 2px 10px rgba(0,0,0,0.15); display: flex; align-items: center; justify-content: center; gap: 10px;">
                    <i class="fas fa-shopping-cart" style="font-size: 1.15rem;"></i>
                    <span style="font-size: 1.05rem; font-weight: bold; letter-spacing: 1px;">FAÇA LOGIN PARA COMPRAR</span>
                </a>
            @endauth
        </div>
    </div>
    <!-- vídeo demonstrativo abaixo da imagem -->
    <div class="video-wrap" id="videoWrap">
        <video id="heroVideo" class="hero-video" playsinline muted loop autoplay preload="auto">
            <source src="{{ asset('media/video_Galaxy.mov') }}" type="video/mp4">
            Seu navegador n e3o suporta o elemento de v eddeo.
        </video>
    </div>

    <!-- Fullscreen-like overlay (simulado) com barra de controles personalizados -->
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
<div class="imagem-container">
  <div style="position: relative; display: inline-block;">
    <img src="{{ asset('media/Smartphones.png') }}" alt="Smartphones" class="imagem-smartphone">
    
    <!-- 🔹 Botões Galaxy S23 (embaixo do nome "Galaxy S23| S23+") -->
    @auth
        <div style="position: absolute; bottom: 70px; left: 30%; transform: translateX(-50%); display: flex; gap: 8px;">
            <form action="{{ route('carrinho.adicionar') }}" method="POST">
                @csrf
                <input type="hidden" name="produto_id" value="15">
                <input type="hidden" name="quantidade" value="1">
                <button type="submit" class="botao-na-imagem" style="background: #000; color: #fff; border: none; padding: 8px 12px; border-radius: 20px; font-weight: 700; cursor: pointer; font-size: 0.7rem;">
                    <i class="fas fa-shopping-cart"></i> CARRINHO
                </button>
            </form>
            <a href="{{ route('produto.show', 15) }}" class="botao-na-imagem" style="background: #007aff; color: #fff; text-decoration: none; padding: 8px 12px; border-radius: 20px; font-weight: 700; display: inline-block; font-size: 0.7rem;">
                <i class="fas fa-eye"></i> VER
            </a>
        </div>
    @else
      <a href="/login" style="position: absolute; bottom: 70px; left: 34%; transform: translateX(-50%); background: #000; color: #fff; text-decoration: none; padding: 8px 16px; border-radius: 20px; font-weight: 700; display: inline-block; font-size: 0.75rem;">LOGIN PARA COMPRAR</a>
    @endauth

    <!-- 🔹 Botões Galaxy S22 Ultra (embaixo do nome "Galaxy S22 Ultra") -->
    @auth
        <div style="position: absolute; bottom: 150px; right: 16%; transform: translateX(50%); display: flex; gap: 8px;">
            <form action="{{ route('carrinho.adicionar') }}" method="POST">
                @csrf
                <input type="hidden" name="produto_id" value="170">
                <input type="hidden" name="quantidade" value="1">
                <button type="submit" class="botao-na-imagem" style="background: #000; color: #fff; border: none; padding: 8px 12px; border-radius: 20px; font-weight: 700; cursor: pointer; font-size: 0.7rem;">
                    <i class="fas fa-shopping-cart"></i> CARRINHO
                </button>
            </form>
            <a href="{{ route('produto.show', 170) }}" class="botao-na-imagem" style="background: #007aff; color: #fff; text-decoration: none; padding: 8px 12px; border-radius: 20px; font-weight: 700; display: inline-block; font-size: 0.7rem;">
                <i class="fas fa-eye"></i> VER
            </a>
        </div>
    @else
      <a href="/login" style="position: absolute; bottom: 150px; right: 16%; transform: translateX(50%); background: #000; color: #fff; text-decoration: none; padding: 8px 16px; border-radius: 20px; font-weight: 700; display: inline-block; font-size: 0.75rem;">LOGIN PARA COMPRAR</a>
    @endauth
  </div>
</div>

<!-- imagem adicional abaixo -->
    <div class="extra-image-wrap" style="text-align:center; margin:36px 0 40px;">
        <div class="extra-image-inner" style="position:relative; display:inline-block;">
            <img class="extra-image" src="{{ asset('media/Pedro_lindo.png') }}" alt="Galaxy S24 Ultra" />
           
        </div>
    </div>

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
@endsection