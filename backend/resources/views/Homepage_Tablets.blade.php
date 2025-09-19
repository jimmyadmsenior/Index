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
<main class="main-homepage">
  <section class="hero-section" style="display: flex; flex-direction: column; align-items: center; justify-content: center; width: 100%; background: #000; padding: 0; margin: 0;">
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
    <button class="comprar-btn" onclick="adicionarAoCarrinho('galaxy-tab-s9-ultra')">COMPRAR</button>
    <div style="width: 100%; display: flex; justify-content: center; align-items: center;">
      <img src="/media/Group 6.png" alt="Banner" class="group6-img" style="width: 100%; max-width: 1100px; height: auto; display: block; object-fit: contain; background: #000; margin: 0 auto; filter: none !important; mix-blend-mode: normal !important;" />
    </div>
  </section>

  <!-- Carrossel de Produtos -->
  <!-- Carrossel de Fones (cópia exata) -->
  <section class="carousel-fones-novo">
    <style>
      .carousel-fones-novo {
        max-width: 1200px;
        margin: 48px auto 0 auto;
        background: #181818;
        border-radius: 24px;
        box-shadow: 0 4px 32px 0 rgba(0,0,0,0.18);
        padding: 32px 0;
        position: relative;
      }
      .carousel-fones-novo .carousel-viewport {
        overflow: hidden;
        width: 100%;
        height: 320px;
        border-radius: 18px;
        background: transparent;
        /* Remover qualquer padding lateral */
        padding: 0;
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
        gap: 48px;
      }
      .fone-card {
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
      .fone-card img {
        width: 120px;
        height: 120px;
        object-fit: contain;
        margin-bottom: 32px;
        margin-top: 12px;
        background: none;
        border-radius: 0;
        box-shadow: none;
      }
      .fone-model {
        color: #222;
        font-size: 1.08rem;
        font-weight: 600;
        margin-bottom: 12px;
        text-align: center;
        letter-spacing: 0.2px;
      }
      .fone-price {
        color: #222;
        font-size: 1.05rem;
        font-weight: 400;
        text-align: center;
      }
      .carousel-fones-novo .carousel-indicators {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 12px;
        margin-top: 18px;
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
            <img src="/media/AirPods.png" alt="AirPods 2ª geração">
            <div class="fone-model">Apple AirPods (2ª geração)</div>
            <div class="fone-price">R$ 799,00</div>
          </div>
          <div class="fone-card">
            <img src="/media/AirPods 3.png" alt="AirPods 3ª geração">
            <div class="fone-model">Apple AirPods (3ª geração)</div>
            <div class="fone-price">R$ 1.099,00</div>
          </div>
          <div class="fone-card">
            <img src="/media/AirPods (2).png" alt="AirPods Pro">
            <div class="fone-model">Apple AirPods Pro (2ª geração)</div>
            <div class="fone-price">R$ 1.499,00</div>
          </div>
        </div>
        <div class="carousel-slide">
          <div class="fone-card">
            <img src="/media/AirPods Max.png" alt="AirPods Max">
            <div class="fone-model">Apple AirPods Max</div>
            <div class="fone-price">R$ 4.999,00</div>
          </div>
          <div class="fone-card">
            <img src="/media/Galaxy buds Live.png" alt="Galaxy Buds Live">
            <div class="fone-model">Samsung Galaxy Buds Live</div>
            <div class="fone-price">R$ 599,00</div>
          </div>
          <div class="fone-card">
            <img src="/media/Galaxy Buds Live2.png" alt="Galaxy Buds2 Pro">
            <div class="fone-model">Samsung Galaxy Buds2 Pro</div>
            <div class="fone-price">R$ 1.099,00</div>
          </div>
        </div>
        <div class="carousel-slide">
          <div class="fone-card">
            <img src="/media/Galaxy Buds Pro.png" alt="Galaxy Buds Pro">
            <div class="fone-model">Samsung Galaxy Buds Pro</div>
            <div class="fone-price">R$ 899,00</div>
          </div>
          <div class="fone-card">
            <img src="/media/galaxy-buds3-silver-mo 1.png" alt="Galaxy Buds3">
            <div class="fone-model">Samsung Galaxy Buds3</div>
            <div class="fone-price">R$ 1.299,00</div>
          </div>
          <div class="fone-card">
            <img src="/media/Galaxy_Buds_live.png" alt="Galaxy Buds FE">
            <div class="fone-model">Samsung Galaxy Buds FE</div>
            <div class="fone-price">R$ 499,00</div>
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
          interval = setInterval(nextSlide, 2000);
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
  <style>
  .carousel-inner {
    display: flex;
    transition: transform 0.7s cubic-bezier(.7,1.5,.5,1);
    will-change: transform;
    min-width: 100vw;
    max-width: 100vw;
    width: 100vw;
    align-items: center;
    justify-content: center;
  }
  .carousel-slide {
    flex: 0 0 100vw;
    min-width: 100vw;
    max-width: 100vw;
    display: flex;
    justify-content: center;
    align-items: stretch;
    gap: 32px;
    min-height: 320px;
    opacity: 1;
    transition: opacity 0.3s;
  }
  .carousel {
    width: 100vw;
    max-width: 100vw;
    margin: 0;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    align-items: center;
  }
  .carousel-indicators {
    margin-top: 32px;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 18px;
  }
  .carousel-dot {
    width: 18px;
    height: 18px;
    border-radius: 50%;
    border: none;
    background: #444;
    opacity: 0.5;
    transition: background 0.2s, opacity 0.2s, transform 0.2s;
    cursor: pointer;
    box-shadow: 0 2px 8px #0002;
    outline: none;
  }
  .carousel-dot.active {
    background: #fff;
    opacity: 1;
    transform: scale(1.18);
    box-shadow: 0 4px 16px #0003;
  }
  .carousel-dot:focus {
    outline: 2px solid #00bfff;
  }
  @media (max-width: 1200px) {
    .carousel-inner, .carousel-slide, .carousel {
      min-width: 100vw !important;
      max-width: 100vw !important;
      width: 100vw !important;
    }
  }
  </style>
  <script>
    // Carrossel com efeito de deslizar lateral
    const slides = document.querySelectorAll('.carousel-slide');
    const indicators = document.querySelectorAll('.carousel-dot');
    const carousel = document.getElementById('carousel-tablets');
    const carouselInner = document.getElementById('carousel-inner');
    let currentSlide = 0;
    let autoSlideInterval = null;
    function showSlide(idx) {
      // Efeito de deslizar
      carouselInner.style.transform = `translateX(-${idx * 100}vw)`;
      slides.forEach((slide, i) => {
        if (indicators[i]) indicators[i].classList.toggle('active', i === idx);
        // Não altera o display, todos os slides permanecem visíveis para o efeito de deslizar
      });
      currentSlide = idx;
    }
    function moveToSlide(idx) {
      showSlide(idx);
      resetAutoSlide();
    }
    function prevSlide() {
      let idx = (currentSlide - 1 + slides.length) % slides.length;
      showSlide(idx);
      resetAutoSlide();
    }
    function nextSlide() {
      let idx = (currentSlide + 1) % slides.length;
      showSlide(idx);
      resetAutoSlide();
    }
    function startAutoSlide() {
      autoSlideInterval = setInterval(() => {
        let idx = (currentSlide + 1) % slides.length;
        showSlide(idx);
      }, 2000);
    }
    function stopAutoSlide() {
      clearInterval(autoSlideInterval);
    }
    function resetAutoSlide() {
      stopAutoSlide();
      startAutoSlide();
    }
    // Pausa ao passar mouse
    if (carousel) {
      carousel.addEventListener('mouseenter', stopAutoSlide);
      carousel.addEventListener('mouseleave', startAutoSlide);
    }
    // Inicializa carrossel
    showSlide(0);
    startAutoSlide();
  </script>

  <!-- Seção: Destaque Galaxy Tab A -->
  <section class="galaxy-tab-a-banner" style="background: #000; width: 100vw; display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 0; position: relative; min-height: 700px;">
    <div style="position: relative; width: 100vw; height: 700px; max-width: 100vw; min-height: 700px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
      <img src="/media/selecao de tablets.png" alt="Samsung Galaxy Tab A" style="position: absolute; left: 0; top: 0; width: 100vw; height: 700px; max-width: 100vw; max-height: 100%; min-width: 0; min-height: 0; margin: 0; display: block; object-fit: cover; background: transparent; z-index: 2;" />
      <div style="position: absolute; left: 0; right: 0; top: 50%; transform: translateY(-50%); z-index: 3; text-align: center;">
        <h2 class="geoform-text" style="font-size: 4.2rem; font-weight: bold; color: #fff; margin-bottom: 32px; line-height: 1.1; text-shadow: 0 2px 12px rgba(0,0,0,0.35);">Samsung Galaxy<br>Tab A</h2>
        <button class="comprar-btn" onclick="adicionarAoCarrinho('galaxy-tab-a')" style="background: #fff; color: #111; font-weight: bold; font-size: 2.2rem; border: none; border-radius: 40px; padding: 22px 70px; margin-top: 24px; box-shadow: 0 4px 16px rgba(0,0,0,0.18); cursor: pointer; letter-spacing: 3px; transition: transform 0.18s, background 0.18s, box-shadow 0.18s;" onmouseover="this.style.transform='scale(1.08)';this.style.background='#e6e6e6';this.style.color='#111';this.style.boxShadow='0 4px 18px rgba(0,0,0,0.18)';" onmouseout="this.style.transform='scale(1)';this.style.background='#fff';this.style.color='#111';this.style.boxShadow='0 4px 16px rgba(0,0,0,0.18)';" onmousedown="this.style.transform='scale(0.96) translateY(2px)';this.style.background='#d1d1d1';this.style.color='#111';this.style.boxShadow='0 1px 4px rgba(0,0,0,0.12)';" onmouseup="this.style.transform='scale(1.08)';this.style.background='#e6e6e6';this.style.color='#111';this.style.boxShadow='0 4px 18px rgba(0,0,0,0.18)';">COMPRAR</button>
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

@endsection


