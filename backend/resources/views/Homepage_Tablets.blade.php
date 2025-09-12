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
    <button class="comprar-btn">COMPRAR</button>
    <div style="width: 100%; display: flex; justify-content: center; align-items: center;">
      <img src="/media/Group 6.png" alt="Banner" class="group6-img" style="width: 100%; max-width: 1100px; height: auto; display: block; object-fit: contain; background: #000; margin: 0 auto; filter: none !important; mix-blend-mode: normal !important;" />
    </div>
  </section>

  <!-- Carrossel de Produtos -->
  <section class="produtos" style="background: #181818; border-radius: 24px; width: 100vw; max-width: 100vw; margin: 64px 0 64px 0; box-shadow: 0 4px 32px 0 rgba(0,0,0,0.18); padding: 36px 0 32px 0; min-height: 420px; display: flex; flex-direction: column; align-items: center; overflow-x: hidden;">
    <h2 style="color: #fff; font-size: 2.4rem; font-weight: bold; margin-bottom: 36px; letter-spacing: 1px;">Os modelos mais vendidos</h2>
    <div class="carousel" id="carousel-tablets" style="position:relative; width:100vw; max-width:100vw; margin:0; display: flex; flex-direction: column; align-items: center; overflow-x: hidden;">
      <div class="carousel-inner" id="carousel-inner" style="width: 100vw; min-width: 100vw; max-width: 100vw; display: flex; transition: transform 0.7s cubic-bezier(.7,1.5,.5,1); will-change: transform; min-height: 320px; align-items: center; justify-content: center;">
        <div class="carousel-slide active" style="justify-content: center; align-items: stretch; gap: 32px; min-height: 320px;">
          <div class="card" style="width: 220px; height: 280px; background: #232323; border-radius: 18px; box-shadow: 0 2px 12px rgba(0,0,0,0.14); padding: 18px 12px 12px 12px; display: flex; flex-direction: column; align-items: center; justify-content: space-between; transition: box-shadow 0.2s;">
            <img src="/media/ipad_air.png" alt="Ipad air" style="width: 90px; height: 90px; margin-bottom: 10px; border-radius: 10px; box-shadow: 0 2px 8px #0004; background: #181818; object-fit: contain;">
            <p style="font-weight: bold; margin: 5px 0 0 0; color: #fff; font-size: 1.3rem; letter-spacing: 0.5px;">Ipad air</p>
            <span style="color: #fff; font-weight: bold; font-size: 1.25rem; margin-top: 10px; letter-spacing: 0.5px;">R$5.119,99</span>
          </div>
          <div class="card" style="width: 220px; height: 280px; background: #232323; border-radius: 18px; box-shadow: 0 2px 12px rgba(0,0,0,0.14); padding: 18px 12px 12px 12px; display: flex; flex-direction: column; align-items: center; justify-content: space-between; transition: box-shadow 0.2s;">
            <img src="/media/ipad_11th_gen.png" alt="Ipad 11th gen" style="width: 90px; height: 90px; margin-bottom: 10px; border-radius: 10px; box-shadow: 0 2px 8px #0004; background: #181818; object-fit: contain;">
            <p style="font-weight: bold; margin: 5px 0 0 0; color: #fff; font-size: 1.3rem; letter-spacing: 0.5px;">Ipad 11th gen</p>
            <span style="color: #fff; font-weight: bold; font-size: 1.25rem; margin-top: 10px; letter-spacing: 0.5px;">R$2.899,99</span>
          </div>
          <div class="card" style="width: 220px; height: 280px; background: #232323; border-radius: 18px; box-shadow: 0 2px 12px rgba(0,0,0,0.14); padding: 18px 12px 12px 12px; display: flex; flex-direction: column; align-items: center; justify-content: space-between; transition: box-shadow 0.2s;">
            <img src="/media/ipad_pro.png" alt="Ipad Pro" style="width: 90px; height: 90px; margin-bottom: 10px; border-radius: 10px; box-shadow: 0 2px 8px #0004; background: #181818; object-fit: contain;">
            <p style="font-weight: bold; margin: 5px 0 0 0; color: #fff; font-size: 1.3rem; letter-spacing: 0.5px;">Ipad Pro</p>
            <span style="color: #fff; font-weight: bold; font-size: 1.25rem; margin-top: 10px; letter-spacing: 0.5px;">R$7.799,99</span>
          </div>
        </div>
        <div class="carousel-slide" style="justify-content: center; align-items: stretch; gap: 32px; min-height: 320px;">
          <div class="card" style="width: 220px; height: 280px; background: #232323; border-radius: 18px; box-shadow: 0 2px 12px rgba(0,0,0,0.14); padding: 18px 12px 12px 12px; display: flex; flex-direction: column; align-items: center; justify-content: space-between; transition: box-shadow 0.2s;">
            <img src="/media/Galaxy_tab_fe.png" alt="Galaxy Tab FE" style="width: 90px; height: 90px; margin-bottom: 10px; border-radius: 10px; box-shadow: 0 2px 8px #0004; background: #181818; object-fit: contain;">
            <p style="font-weight: bold; margin: 5px 0 0 0; color: #fff; font-size: 1.3rem; letter-spacing: 0.5px;">Galaxy Tab FE</p>
            <span style="color: #fff; font-weight: bold; font-size: 1.25rem; margin-top: 10px; letter-spacing: 0.5px;">R$4.999,99</span>
          </div>
          <div class="card" style="width: 220px; height: 280px; background: #232323; border-radius: 18px; box-shadow: 0 2px 12px rgba(0,0,0,0.14); padding: 18px 12px 12px 12px; display: flex; flex-direction: column; align-items: center; justify-content: space-between; transition: box-shadow 0.2s;">
            <img src="/media/Galaxy_tab.png" alt="Galaxy Tab" style="width: 90px; height: 90px; margin-bottom: 10px; border-radius: 10px; box-shadow: 0 2px 8px #0004; background: #181818; object-fit: contain;">
            <p style="font-weight: bold; margin: 5px 0 0 0; color: #fff; font-size: 1.3rem; letter-spacing: 0.5px;">Galaxy Tab</p>
            <span style="color: #fff; font-weight: bold; font-size: 1.25rem; margin-top: 10px; letter-spacing: 0.5px;">R$1.299,90</span>
          </div>
          <div class="card" style="width: 220px; height: 280px; background: #232323; border-radius: 18px; box-shadow: 0 2px 12px rgba(0,0,0,0.14); padding: 18px 12px 12px 12px; display: flex; flex-direction: column; align-items: center; justify-content: space-between; transition: box-shadow 0.2s;">
            <img src="/media/Galaxy_tab_fee.png" alt="Galaxy Tab FE+" style="width: 90px; height: 90px; margin-bottom: 10px; border-radius: 10px; box-shadow: 0 2px 8px #0004; background: #181818; object-fit: contain;">
            <p style="font-weight: bold; margin: 5px 0 0 0; color: #fff; font-size: 1.3rem; letter-spacing: 0.5px;">Galaxy Tab FE+</p>
            <span style="color: #fff; font-weight: bold; font-size: 1.25rem; margin-top: 10px; letter-spacing: 0.5px;">R$5.499,99</span>
          </div>
        </div>
        <div class="carousel-slide" style="justify-content: center; align-items: stretch; gap: 32px; min-height: 320px;">
          <div class="card" style="width: 220px; height: 280px; background: #232323; border-radius: 18px; box-shadow: 0 2px 12px rgba(0,0,0,0.14); padding: 18px 12px 12px 12px; display: flex; flex-direction: column; align-items: center; justify-content: space-between; transition: box-shadow 0.2s;">
            <img src="/media/ipad_mini.png" alt="Ipad Mini" style="width: 90px; height: 90px; margin-bottom: 10px; border-radius: 10px; box-shadow: 0 2px 8px #0004; background: #181818; object-fit: contain;">
            <p style="font-weight: bold; margin: 5px 0 0 0; color: #fff; font-size: 1.3rem; letter-spacing: 0.5px;">Ipad Mini</p>
            <span style="color: #fff; font-weight: bold; font-size: 1.25rem; margin-top: 10px; letter-spacing: 0.5px;">R$1.290,90</span>
          </div>
          <div class="card" style="width: 220px; height: 280px; background: #232323; border-radius: 18px; box-shadow: 0 2px 12px rgba(0,0,0,0.14); padding: 18px 12px 12px 12px; display: flex; flex-direction: column; align-items: center; justify-content: space-between; transition: box-shadow 0.2s;">
            <img src="/media/galaxy_s9_ultra.png" alt="Galaxy S9 Ultra" style="width: 90px; height: 90px; margin-bottom: 10px; border-radius: 10px; box-shadow: 0 2px 8px #0004; background: #181818; object-fit: contain;">
            <p style="font-weight: bold; margin: 5px 0 0 0; color: #fff; font-size: 1.3rem; letter-spacing: 0.5px;">Galaxy S9 Ultra</p>
            <span style="color: #fff; font-weight: bold; font-size: 1.25rem; margin-top: 10px; letter-spacing: 0.5px;">R$8.999,99</span>
          </div>
          <div class="card" style="width: 220px; height: 280px; background: #232323; border-radius: 18px; box-shadow: 0 2px 12px rgba(0,0,0,0.14); padding: 18px 12px 12px 12px; display: flex; flex-direction: column; align-items: center; justify-content: space-between; transition: box-shadow 0.2s;">
            <img src="/media/Galaxy_A9.png" alt="Galaxy A9" style="width: 90px; height: 90px; margin-bottom: 10px; border-radius: 10px; box-shadow: 0 2px 8px #0004; background: #181818; object-fit: contain;">
            <p style="font-weight: bold; margin: 5px 0 0 0; color: #fff; font-size: 1.3rem; letter-spacing: 0.5px;">Galaxy A9</p>
            <span style="color: #fff; font-weight: bold; font-size: 1.25rem; margin-top: 10px; letter-spacing: 0.5px;">R$999,99</span>
          </div>
        </div>
      </div>
      <div class="carousel-indicators" id="carousel-indicators" style="margin-top: 32px; display: flex; justify-content: center; align-items: center; gap: 18px;">
        <button class="carousel-dot active" onclick="moveToSlide(0)" aria-label="Slide 1"></button>
        <button class="carousel-dot" onclick="moveToSlide(1)" aria-label="Slide 2"></button>
        <button class="carousel-dot" onclick="moveToSlide(2)" aria-label="Slide 3"></button>
      </div>
      <div style="position: relative; width: 100%; display: flex; justify-content: center; align-items: center; margin-top: 0; gap: 32px;">
        <button onclick="prevSlide()" class="carousel-nav-btn" style="width: 44px; height: 44px; font-size: 22px; background: #232323; color: #fff; border: none; box-shadow: 0 2px 8px #0003; border-radius: 50%; display: flex; align-items: center; justify-content: center; transition: background 0.2s;">
          <i class="fas fa-arrow-left"></i>
        </button>
        <button onclick="nextSlide()" class="carousel-nav-btn" style="width: 44px; height: 44px; font-size: 22px; background: #232323; color: #fff; border: none; box-shadow: 0 2px 8px #0003; border-radius: 50%; display: flex; align-items: center; justify-content: center; transition: background 0.2s;">
          <i class="fas fa-arrow-right"></i>
        </button>
      </div>
    </div>
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
        <button class="comprar-btn" style="background: #fff; color: #111; font-weight: bold; font-size: 2.2rem; border: none; border-radius: 40px; padding: 22px 70px; margin-top: 24px; box-shadow: 0 4px 16px rgba(0,0,0,0.18); cursor: pointer; letter-spacing: 3px; transition: transform 0.18s, background 0.18s, box-shadow 0.18s;" onmouseover="this.style.transform='scale(1.08)';this.style.background='#e6e6e6';this.style.color='#111';this.style.boxShadow='0 4px 18px rgba(0,0,0,0.18)';" onmouseout="this.style.transform='scale(1)';this.style.background='#fff';this.style.color='#111';this.style.boxShadow='0 4px 16px rgba(0,0,0,0.18)';" onmousedown="this.style.transform='scale(0.96) translateY(2px)';this.style.background='#d1d1d1';this.style.color='#111';this.style.boxShadow='0 1px 4px rgba(0,0,0,0.12)';" onmouseup="this.style.transform='scale(1.08)';this.style.background='#e6e6e6';this.style.color='#111';this.style.boxShadow='0 4px 18px rgba(0,0,0,0.18)';">COMPRAR</button>
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
@endsection