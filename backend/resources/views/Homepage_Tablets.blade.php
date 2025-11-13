@extends('layouts.app')
@section('head')
<style>
html { margin: 0 !important; padding: 0 !important; border: none !important; box-shadow: none !important; }
body { margin: 0 !important; padding: 0 !important; }
main.main-homepage { padding: 0 !important; margin: 0 !important; }
header, nav, .menu li a, .icons i, .navbar-btn, .navbar-btn-perfil {
  background: #111 !important;
  color: #fff !important;
  border: none !important;
  box-shadow: none !important;
  border-radius: 0 !important;
}
/* Garantir que os botões de login e cadastro mantenham suas bordas */
.navbar-btn-login, .navbar-btn-cadastro {
  background: #111 !important;
  color: #fff !important;
  border: 1.5px solid #fff !important;
  box-shadow: none !important;
  border-radius: 10px !important;
  padding: 7px 22px !important;
  font-weight: 600 !important;
}
header {
  margin: 0 !important;
  padding: 0 !important;
  background: #111 !important;
  box-shadow: none !important;
  border: none !important;
  border-radius: 0 !important;
  position: relative;
  top: 0;
  left: 0;
  right: 0;
  z-index: 1000;
}
.menu li a { text-decoration: none !important; }

.comprar-btn {
  background: #fff;
  color: #111;
  font-weight: bold;
  font-size: 2rem;
  border: none;
  border-radius: 32px;
  padding: 18px 64px;
  margin-bottom: 40px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.12);
  cursor: pointer;
  letter-spacing: 3px;
  transition: transform 0.18s, background 0.18s, box-shadow 0.18s;
}
.comprar-btn:hover, .comprar-btn:focus {
  transform: scale(1.08);
  background: #e6e6e6;
  color: #111;
  box-shadow: 0 4px 18px rgba(0,0,0,0.18);
}
.comprar-btn:active {
  transform: scale(0.96) translateY(2px);
  background: #d1d1d1;
  color: #111;
  box-shadow: 0 1px 4px rgba(0,0,0,0.12);
}
</style>
@endsection
@section('content')

{{-- Barra de Pesquisa de Tablets --}}
@include('partials.product-search', ['categoria' => 'Tablets'])

<main class="main-homepage">
  <section class="hero-section" style="display: flex; flex-direction: column; align-items: center; justify-content: center; width: 100%; background: #000; padding: 0; margin: 0 0 24px 0;">
    <h1 class="hero-title geoform-text" style="font-size: 4.2rem; font-weight: bold; margin-bottom: 18px; color: #fff; letter-spacing: 1px; text-align: center;">Galaxy Tab S9 Ultra Mockup</h1>
    <div style="display: flex; gap: 28px; flex-wrap: wrap; justify-content: center; margin-bottom: 38px; align-items: center;">
      <span style="font-size: 1.25rem; color: #fff;">Tela Escalável</span>
      <span style="color: #fff; font-size: 1.5rem;">|</span>
      <span style="font-size: 1.25rem; color: #fff;">Intuitivo</span>
      <span style="color: #fff; font-size: 1.5rem;">|</span>
      <span style="font-size: 1.25rem; color: #fff;">Tecnologia de Ponta</span>
      <span style="color: #fff; font-size: 1.5rem;">|</span>
      <span style="font-size: 1.25rem; color: #fff;">Câmera Ultra-Wide</span>
      <span style="color: #fff; font-size: 1.5rem;">|</span>
      <span style="font-size: 1.25rem; color: #fff;">Tela de 12 polegadas</span>
    </div>
    @auth
        <form action="{{ route('carrinho.adicionar') }}" method="POST" style="display: inline-block;">
            @csrf
            <input type="hidden" name="produto_id" value="167">
            <input type="hidden" name="quantidade" value="1">
            <button type="submit" class="comprar-btn" style="background: #000; color: #fff;">
                <i class="fas fa-shopping-cart"></i> ADICIONAR AO CARRINHO
            </button>
        </form>
    @else
        <a href="/Login" class="comprar-btn" style="text-decoration: none;">FAÇA LOGIN PARA COMPRAR</a>
    @endauth
    <div style="width: 100%; display: flex; justify-content: center; align-items: center;">
      <img src="/media/Group 6.png" alt="Banner" class="group6-img" style="width: 100%; max-width: 1100px; height: auto; display: block; object-fit: contain; background: #000; margin: 0 auto; filter: none !important; mix-blend-mode: normal !important;" />
    </div>
  </section>

  <!-- Carrossel de Produtos -->
  <!-- Carrossel de Fones (cópia exata do HomePage_Fones) -->
  <section class="carousel-fones-novo">
    <style>
      .carousel-fones-novo {
        max-width: 1300px;
        margin: 10px auto 0 auto;
        background: #181818;
        border-radius: 28px;
        box-shadow: 0 6px 36px 0 rgba(0,0,0,0.20);
        padding: 48px 0 44px 0;
        position: relative;
      }
      .carousel-fones-novo .carousel-viewport {
        overflow: hidden;
        width: 100%;
        height: 320px;
        border-radius: 18px;
        background: transparent;
      }
      .carousel-fones-novo .carousel-track {
        display: flex;
        transition: transform 0.7s cubic-bezier(.77,0,.18,1);
        will-change: transform;
      }
      .carousel-fones-novo .carousel-slide {
        min-width: 100%;
        display: flex;
        justify-content: center;
        align-items: stretch;
        gap: 24px;
        padding: 0 120px;
        box-sizing: border-box;
      }
      .fone-card {
        background: #fff;
        border-radius: 24px;
        box-shadow: 0 4px 24px 0 rgba(0,0,0,0.10);
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 320px;
        min-height: 300px;
        padding: 40px 24px 36px 24px;
        margin: 0 0 0 0;
        transition: box-shadow 0.2s, transform 0.2s;
      }
      .fone-card img {
        width: 120px;
        height: 120px;
        object-fit: contain;
        margin-bottom: 28px;
        margin-top: 18px;
        background: none;
        border-radius: 12px;
        box-shadow: 0 2px 12px 0 rgba(0,0,0,0.06);
      }
      .fone-model {
        color: #222;
        font-size: 1.12rem;
        font-weight: 700;
        margin-bottom: 16px;
        text-align: center;
        letter-spacing: 0.3px;
      }
      .fone-price {
        color: #444;
        font-size: 1.08rem;
        font-weight: 500;
        text-align: center;
        margin-bottom: 0;
      }
      .carousel-fones-novo .carousel-indicators {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 16px;
        margin-top: 32px;
      }
      .carousel-fones-novo .carousel-dot {
        width: 16px;
        height: 16px;
        border-radius: 50%;
        border: 2px solid #fff;
        background: transparent;
        cursor: pointer;
        transition: background 0.2s;
      }
      .carousel-fones-novo .carousel-dot.active {
        background: #fff;
      }
      @media (max-width: 900px) {
        .fone-card { width: 90vw; min-height: 180px; padding: 12px 4px 12px 4px; }
        .fone-card img { width: 60px; height: 60px; margin-bottom: 10px; }
        .carousel-fones-novo .carousel-viewport { height: 110px; }
        .fone-model { font-size: 0.82rem; }
        .fone-price { font-size: 0.8rem; }
      }
    </style>
    <div class="carousel-viewport">
      <div class="carousel-track">
        <div class="carousel-slide">
          <div class="fone-card">
            <img src="/media/ipad_pro.png" alt="iPad Pro">
            <div class="fone-model">Apple iPad Pro</div>
            <div class="fone-price">R$ 13.999,00</div>
          </div>
          <div class="fone-card">
            <img src="/media/ipad_air.png" alt="iPad Air">
            <div class="fone-model">Apple iPad Air</div>
            <div class="fone-price">R$ 8.999,00</div>
          </div>
          <div class="fone-card">
            <img src="/media/Ipad_mini.png" alt="iPad Mini">
            <div class="fone-model">Apple iPad Mini</div>
            <div class="fone-price">R$ 5.499,00</div>
          </div>
        </div>
        <div class="carousel-slide">
          <div class="fone-card">
            <img src="/media/ipad_11th_gen.png" alt="iPad 11ª geração">
            <div class="fone-model">Apple iPad 11ª geração</div>
            <div class="fone-price">R$ 4.999,00</div>
          </div>
          <div class="fone-card">
            <img src="/media/Galaxy_tab.png" alt="Galaxy Tab S9 Ultra">
            <div class="fone-model">Samsung Galaxy Tab S9 Ultra</div>
            <div class="fone-price">R$ 7.999,00</div>
          </div>
          <div class="fone-card">
            <img src="/media/Galaxy_tab_fe.png" alt="Galaxy Tab FE">
            <div class="fone-model">Samsung Galaxy Tab FE</div>
            <div class="fone-price">R$ 3.999,00</div>
          </div>
        </div>
        <div class="carousel-slide">
          <div class="fone-card">
            <img src="/media/Samsung Galaxy Tab S6.png" alt="Galaxy Tab S6">
            <div class="fone-model">Samsung Galaxy Tab S6</div>
            <div class="fone-price">R$ 2.999,00</div>
          </div>
          <div class="fone-card">
            <img src="/media/Samsung Galaxy Tab S6_id_produto.png" alt="Galaxy Tab S6 (ID)">
            <div class="fone-model">Samsung Galaxy Tab S6 (ID)</div>
            <div class="fone-price">R$ 2.999,00</div>
          </div>
          <div class="fone-card">
            <img src="/media/Galaxy_tab_fee.png" alt="Galaxy Tab FEE">
            <div class="fone-model">Samsung Galaxy Tab FEE</div>
            <div class="fone-price">R$ 2.499,00</div>
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
        const track = document.querySelector('.carousel-fones-novo .carousel-track');
        const slides = document.querySelectorAll('.carousel-fones-novo .carousel-slide');
        const dots = document.querySelectorAll('.carousel-fones-novo .carousel-dot');
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

  <!-- Seção: Destaque Galaxy Tab A -->
  <section class="galaxy-tab-a-banner" style="background: #000; width: 100vw; display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 0; position: relative; min-height: 700px;">
    <div style="position: relative; width: 100vw; height: 700px; max-width: 100vw; min-height: 700px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
      <img src="/media/selecao de tablets.png" alt="Samsung Galaxy Tab A" style="position: absolute; left: 0; top: 0; width: 100vw; height: 700px; max-width: 100vw; max-height: 100%; min-width: 0; min-height: 0; margin: 0; display: block; object-fit: cover; background: transparent; z-index: 2;" />
      <div style="position: absolute; left: 0; right: 0; top: 50%; transform: translateY(-50%); z-index: 3; text-align: center;">
        <h2 class="geoform-text" style="font-size: 4.2rem; font-weight: bold; color: #fff; margin-bottom: 32px; line-height: 1.1; text-shadow: 0 2px 12px rgba(0,0,0,0.35);">Samsung Galaxy<br>Tab A</h2>
        @auth
            <form action="{{ route('carrinho.adicionar') }}" method="POST" style="display: inline-block;">
                @csrf
                <input type="hidden" name="produto_id" value="168">
                <input type="hidden" name="quantidade" value="1">
                <button type="submit" class="comprar-btn" style="background: #000; color: #fff; font-weight: bold; font-size: 2.2rem; border: none; border-radius: 40px; padding: 22px 70px; margin-top: 24px; box-shadow: 0 4px 16px rgba(0,0,0,0.18); cursor: pointer; letter-spacing: 3px; transition: transform 0.18s, background 0.18s, box-shadow 0.18s;">
                    <i class="fas fa-shopping-cart"></i> ADICIONAR AO CARRINHO
                </button>
            </form>
        @else
            <a href="/Login" class="comprar-btn" style="background: #fff; color: #111; font-weight: bold; font-size: 2.2rem; border: none; border-radius: 40px; padding: 22px 70px; margin-top: 24px; box-shadow: 0 4px 16px rgba(0,0,0,0.18); cursor: pointer; letter-spacing: 3px; text-decoration: none; display: inline-block;">FAÇA LOGIN PARA COMPRAR</a>
        @endauth
      </div>
    </div>
  </section>

  <!-- Seção: Explore nosso site -->
  <section class="explore-section" style="margin: 64px 0 64px 0;">
    <div class="explore-banner">
      <div class="explore-text">
        <h2>Explore nosso site e descubra o luxo</h2>
      </div>
      <div class="explore-img">
        <img src="/media/Imagem Ana.png" alt="Mascote Index"/>
      </div>
    </div>
  </section>
</main>

<script>
function adicionarAoCarrinho(produto) {
  // Redireciona diretamente para a página do produto específico
  if (produto === 'galaxy-tab-s9-ultra') {
    // Galaxy Tab S9 Ultra tem ID 38 baseado no seeder
    window.location.href = '/produto/38';
  } else if (produto === 'galaxy-tab-a') {
    // Galaxy Tab A9 tem ID 44 baseado no seeder
    window.location.href = '/produto/44';
  } else {
    // Fallback para página de carrinho
    window.location.href = '/carrinho';
  }
}
</script>

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


