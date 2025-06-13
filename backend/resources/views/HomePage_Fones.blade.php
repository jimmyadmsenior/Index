@extends('layouts.app')
@section('content')
<main>
  <div class="banner-navbar" style="position: relative;">
    <img src="/media/Capa_Fones.png" alt="Banner" />
    <div class="banner-texto-fone" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 100%; text-align: center; color: #fff;">
      <h1 class="geoform-text">OS MELHORES FONES</h1>
      <h1 class="geoform-text">PARA VOCÊ</h1>
      <ul class="banner-falas" style="list-style: none; padding: 0; margin: 0;">
        <h3 class="geoform-text">Todos com qualidade altíssima para curtir cada</h3>
        <h3 class="geoform-text">momento!</h3>
      </ul> 
    </div>
  </div>
  <!-- Carrossel de Produtos -->
  <section class="produtos">
    <h2>Os modelos mais vendidos</h2>
    <div class="carousel">
      <div class="carousel-inner" id="carousel-inner">
        <div class="carousel-slide">
          <div class="card">
            <img src="/media/AirPods.png" alt="AirPods (2ª geração)">
            <p>AirPods (2ª geração)</p>
            <span>R$359,99</span>
          </div>
          <div class="card">
            <img src="/media/galaxy-buds3-silver-mo 1.png" alt="Samsung Galaxy Buds Pro">
            <p>Samsung Galaxy Buds Pro</p>
            <span>R$235,99</span>
          </div>
          <div class="card">
            <img src="/media/airPods (2).png" alt="AirPods Estojo">
            <p style="margin-top: 28px;">AirPods Pro</p>
            <span style="margin-top: 10px; display: inline-block;">R$849,90</span>
          </div>
        </div>
        <div class="carousel-slide">
          <div class="card">
            <img src="/media/AirPods Max.png" alt="Fone A">
            <p>AirPods Max</p>
            <span>R$4.999,99</span>
          </div>
          <div class="card">
            <img src="/media/AirPods 3.png" alt="Fone B">
            <p style="margin-top: 28px;">AirPods (3ª geração)</p>
            <span style="margin-top: 0px; display: inline-block;">R$1.299,90</span>
          </div>
          <div class="card">
            <img src="/media/galaxy_Buds_live.png" alt="Fone C">
            <p style="margin-top: 10px;">Galaxy Buds Live</p>
            <span style="margin-top: 0px; display: inline-block;">R$229,90</span>
          </div>
        </div>
        <div class="carousel-slide">
          <div class="card">
            <img src="/media/Galaxy Buds Pro.png" alt="Fone D">
              <p style="margin-top: 40px;">Galaxy Buds3 Pro</p>
              <span style="margin-top: 0px; display: inline-block;">R$1.290,90</span>
          </div>
          <div class="card">
            <img src="/media/Galaxy Buds Live.png" alt="Fone E" style="margin-top: -18px;">
            <p style="margin-top: 0px;">Galaxy Buds Live</p>
            <span style="margin-top: 0px; display: inline-block;">R$599,99</span>
          </div>
          <div class="card">
              <img src="/media/Galaxy Buds Live2.png" alt="Fone F" style="width: 120px; height: auto;">
              <p style="margin-top: 40px;">Galaxy Buds Live(ANC)</p>
              <span style="margin-top: 0px; display: inline-block;">R$999,99</span>
          </div>
        </div>
      </div>
      <div class="carousel-indicators">
        <button class="active" onclick="moveToSlide(0)"></button>
        <button onclick="moveToSlide(1)"></button>
        <button onclick="moveToSlide(2)"></button>
      </div>
      <div style="position: absolute; width: 100%; top: 50%; left: 0; z-index: 2; display: flex; justify-content: space-between; pointer-events: none;">
        <div style="display: flex; flex-direction: column; align-items: center; margin-left: 10px; pointer-events: auto;">
          <button onclick="prevSlide()" class="carousel-nav-btn">
            <i class="fas fa-arrow-left"></i>
          </button>
        </div>
        <div style="display: flex; flex-direction: column; align-items: center; margin-right: 10px; pointer-events: auto;">
          <button onclick="nextSlide()" class="carousel-nav-btn" style="margin-bottom: 4px;">
            <i class="fas fa-arrow-right"></i>
          </button>
          <span style="font-family: 'Geoform', Arial, sans-serif; font-size: 14px; color: #333; margin-top: 2px;"></span>
        </div>
      </div>
      
    </div>
  </section>
  <!-- Seção: Destaque AirPods -->
  <section class="airpods">
    <div class="text-content">
      <h2>AirPods</h2>
      <p class="sub">Conforto Bluetooh. Mágico.</p>
      <p class="desc">Introduzindo os AirPods. Tecnologia e praticidade, juntos como nunca!</p>
    </div>
    <div class="img-content">
      <img src="/media/Homem_fone.png" alt="Homem com AirPods">
    </div>
  </section>
  <!-- Seção: Explore nosso site -->
  <section class="explore-section">
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
@push('scripts')
<script>
  // Script para alternar entre os temas claro e escuro
  document.addEventListener('DOMContentLoaded', function() {
    const savedTheme = localStorage.getItem('theme') || 'light';
    document.documentElement.setAttribute('data-theme', savedTheme);
    const themeToggle = document.getElementById('theme-toggle');
    if(themeToggle) themeToggle.checked = savedTheme === 'dark';
    if(themeToggle) themeToggle.addEventListener('change', function(e) {
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
          if(themeToggle) themeToggle.checked = true;
        } else {
          document.documentElement.setAttribute('data-theme', 'light');
          if(themeToggle) themeToggle.checked = false;
        }
      }
    }
    syncWithSystemTheme(prefersDarkScheme);
    prefersDarkScheme.addEventListener('change', syncWithSystemTheme);
  });
</script>

<script>
  const carousel = document.getElementById("carousel-inner");
  const carouselWrapper = document.querySelector(".carousel");
  const indicators = document.querySelectorAll(".carousel-indicators button");
  const totalSlides = 3;
  let currentSlide = 0;
  let autoSlide;

  function moveToSlide(index) {
    carousel.style.transform = `translateX(-${index * 100}%)`;
    indicators.forEach(btn => btn.classList.remove("active"));
    indicators[index].classList.add("active");
    currentSlide = index;
  }

  function nextSlide() {
    const next = (currentSlide + 1) % totalSlides;
    moveToSlide(next);
  }

  function prevSlide() {
    const prev = (currentSlide - 1 + totalSlides) % totalSlides;
    moveToSlide(prev);
  }

  function startAutoSlide() {
    autoSlide = setInterval(() => {
      const nextSlide = (currentSlide + 1) % totalSlides;
      moveToSlide(nextSlide);
    }, 2000);
  }

  function stopAutoSlide() {
    clearInterval(autoSlide);
  }

  carouselWrapper.addEventListener("mouseenter", stopAutoSlide);
  carouselWrapper.addEventListener("mouseleave", startAutoSlide);

  startAutoSlide();
</script>
@endpush
@endsection
