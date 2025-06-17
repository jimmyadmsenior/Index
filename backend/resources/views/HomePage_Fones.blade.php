@extends('layouts.app')
@section('content')
<main>
  <div class="banner-navbar" style="position: relative; width: 100vw; left: 50%; right: 50%; margin-left: -50vw; margin-right: -50vw; overflow: hidden; padding: 0; border-radius: 0;">
    <img src="/media/Capa_Fones.png" alt="Banner" style="width: 100vw; min-height: 320px; height: 380px; object-fit: cover; display: block; filter: brightness(0.65);">
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.45); z-index: 1;"></div>
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; display: flex; flex-direction: column; align-items: center; justify-content: center; z-index: 2;">
      <h1 style="color: #fff; font-size: 2.8rem; font-weight: bold; letter-spacing: 2px; text-align: center; text-transform: uppercase; margin-bottom: 0; text-shadow: 0 2px 16px #000a;">OS MELHORES FONES<br>PARA VOCÊ</h1>
      <p style="color: #fff; font-size: 1.35rem; font-weight: 500; margin-top: 18px; text-align: center; text-shadow: 0 2px 12px #000a; letter-spacing: 1px; text-transform: uppercase;">Todos com qualidade altíssima para curtir cada<br>momento!</p>
    </div>
  </div>
  <!-- Carrossel de Produtos -->
  <section class="produtos" style="background: #181818; border-radius: 24px; max-width: 1700px; margin: 64px auto 64px auto; box-shadow: 0 4px 32px 0 rgba(0,0,0,0.18); padding: 36px 0 32px 0; min-height: 520px;">
    <h2 style="color: #fff; font-size: 2rem; font-weight: bold; margin-bottom: 36px; letter-spacing: 1px; text-align: center; width: 100%;">Os modelos mais vendidos</h2>
    <div class="carousel">
      <div class="carousel-inner" id="carousel-inner" style="width: 100%; justify-content: center; min-height: 320px;">
        <div class="carousel-slide active" style="justify-content: center; gap: 48px; min-height: 320px; display: flex;">
          <div class="card" style="width: 240px; height: 320px; background: #232323; border-radius: 18px; box-shadow: 0 2px 16px rgba(0,0,0,0.18); padding: 28px 18px 22px 18px; display: flex; flex-direction: column; align-items: center; transition: box-shadow 0.2s;">
            <img src="/media/AirPods.png" alt="AirPods (2ª geração)" style="width: 140px; height: 140px; margin-bottom: 18px; border-radius: 12px; box-shadow: 0 2px 12px #0005; background: #181818; object-fit: contain;">
            <p style="font-weight: bold; margin: 5px 0 0 0; color: #fff; font-size: 1.1rem; letter-spacing: 0.5px;">AirPods (2ª geração)</p>
            <span style="color: #fff; font-weight: bold; font-size: 1.15rem; margin-top: 6px; letter-spacing: 0.5px;">R$359,99</span>
          </div>
          <div class="card" style="width: 240px; height: 320px; background: #232323; border-radius: 18px; box-shadow: 0 2px 16px rgba(0,0,0,0.18); padding: 28px 18px 22px 18px; display: flex; flex-direction: column; align-items: center; transition: box-shadow 0.2s;">
            <img src="/media/galaxy-buds3-silver-mo 1.png" alt="Samsung Galaxy Buds Pro" style="width: 140px; height: 140px; margin-bottom: 18px; border-radius: 12px; box-shadow: 0 2px 12px #0005; background: #181818; object-fit: contain;">
            <p style="font-weight: bold; margin: 5px 0 0 0; color: #fff; font-size: 1.1rem; letter-spacing: 0.5px;">Samsung Galaxy Buds Pro</p>
            <span style="color: #fff; font-weight: bold; font-size: 1.15rem; margin-top: 6px; letter-spacing: 0.5px;">R$235,99</span>
          </div>
          <div class="card" style="width: 240px; height: 320px; background: #232323; border-radius: 18px; box-shadow: 0 2px 16px rgba(0,0,0,0.18); padding: 28px 18px 22px 18px; display: flex; flex-direction: column; align-items: center; transition: box-shadow 0.2s;">
            <img src="/media/airPods (2).png" alt="AirPods Estojo" style="width: 140px; height: 140px; margin-bottom: 18px; border-radius: 12px; box-shadow: 0 2px 12px #0005; background: #181818; object-fit: contain;">
            <p style="font-weight: bold; margin: 5px 0 0 0; color: #fff; font-size: 1.1rem; letter-spacing: 0.5px;">AirPods Pro</p>
            <span style="color: #fff; font-weight: bold; font-size: 1.15rem; margin-top: 6px; letter-spacing: 0.5px;">R$849,90</span>
          </div>
        </div>
        <div class="carousel-slide" style="justify-content: center; gap: 48px; min-height: 320px; display: none;">
          <div class="card" style="width: 240px; height: 320px; background: #232323; border-radius: 18px; box-shadow: 0 2px 16px rgba(0,0,0,0.18); padding: 28px 18px 22px 18px; display: flex; flex-direction: column; align-items: center; transition: box-shadow 0.2s;">
            <img src="/media/AirPods Max.png" alt="Fone A" style="width: 140px; height: 140px; margin-bottom: 18px; border-radius: 12px; box-shadow: 0 2px 12px #0005; background: #181818; object-fit: contain;">
            <p style="font-weight: bold; margin: 5px 0 0 0; color: #fff; font-size: 1.1rem; letter-spacing: 0.5px;">AirPods Max</p>
            <span style="color: #fff; font-weight: bold; font-size: 1.15rem; margin-top: 6px; letter-spacing: 0.5px;">R$4.999,99</span>
          </div>
          <div class="card" style="width: 240px; height: 320px; background: #232323; border-radius: 18px; box-shadow: 0 2px 16px rgba(0,0,0,0.18); padding: 28px 18px 22px 18px; display: flex; flex-direction: column; align-items: center; transition: box-shadow 0.2s;">
            <img src="/media/AirPods 3.png" alt="Fone B" style="width: 140px; height: 140px; margin-bottom: 18px; border-radius: 12px; box-shadow: 0 2px 12px #0005; background: #181818; object-fit: contain;">
            <p style="font-weight: bold; margin: 5px 0 0 0; color: #fff; font-size: 1.1rem; letter-spacing: 0.5px;">AirPods (3ª geração)</p>
            <span style="color: #fff; font-weight: bold; font-size: 1.15rem; margin-top: 6px; letter-spacing: 0.5px;">R$1.299,90</span>
          </div>
          <div class="card" style="width: 240px; height: 320px; background: #232323; border-radius: 18px; box-shadow: 0 2px 16px rgba(0,0,0,0.18); padding: 28px 18px 22px 18px; display: flex; flex-direction: column; align-items: center; transition: box-shadow 0.2s;">
            <img src="/media/galaxy_Buds_live.png" alt="Fone C" style="width: 140px; height: 140px; margin-bottom: 18px; border-radius: 12px; box-shadow: 0 2px 12px #0005; background: #181818; object-fit: contain;">
            <p style="font-weight: bold; margin: 5px 0 0 0; color: #fff; font-size: 1.1rem; letter-spacing: 0.5px;">Galaxy Buds Live</p>
            <span style="color: #fff; font-weight: bold; font-size: 1.15rem; margin-top: 6px; letter-spacing: 0.5px;">R$229,90</span>
          </div>
        </div>
        <div class="carousel-slide" style="justify-content: center; gap: 48px; min-height: 320px; display: none;">
          <div class="card" style="width: 240px; height: 320px; background: #232323; border-radius: 18px; box-shadow: 0 2px 16px rgba(0,0,0,0.18); padding: 28px 18px 22px 18px; display: flex; flex-direction: column; align-items: center; transition: box-shadow 0.2s;">
            <img src="/media/Galaxy Buds Pro.png" alt="Fone D" style="width: 140px; height: 140px; margin-bottom: 18px; border-radius: 12px; box-shadow: 0 2px 12px #0005; background: #181818; object-fit: contain;">
            <p style="font-weight: bold; margin: 5px 0 0 0; color: #fff; font-size: 1.1rem; letter-spacing: 0.5px;">Galaxy Buds3 Pro</p>
            <span style="color: #fff; font-weight: bold; font-size: 1.15rem; margin-top: 6px; letter-spacing: 0.5px;">R$1.290,90</span>
          </div>
          <div class="card" style="width: 240px; height: 320px; background: #232323; border-radius: 18px; box-shadow: 0 2px 16px rgba(0,0,0,0.18); padding: 28px 18px 22px 18px; display: flex; flex-direction: column; align-items: center; transition: box-shadow 0.2s;">
            <img src="/media/Galaxy Buds Live.png" alt="Fone E" style="width: 140px; height: 140px; margin-bottom: 18px; border-radius: 12px; box-shadow: 0 2px 12px #0005; background: #181818; object-fit: contain;">
            <p style="font-weight: bold; margin: 5px 0 0 0; color: #fff; font-size: 1.1rem; letter-spacing: 0.5px;">Galaxy Buds Live</p>
            <span style="color: #fff; font-weight: bold; font-size: 1.15rem; margin-top: 6px; letter-spacing: 0.5px;">R$599,99</span>
          </div>
          <div class="card" style="width: 240px; height: 320px; background: #232323; border-radius: 18px; box-shadow: 0 2px 16px rgba(0,0,0,0.18); padding: 28px 18px 22px 18px; display: flex; flex-direction: column; align-items: center; transition: box-shadow 0.2s;">
            <img src="/media/Galaxy Buds Live2.png" alt="Fone F" style="width: 140px; height: 140px; margin-bottom: 18px; border-radius: 12px; box-shadow: 0 2px 12px #0005; background: #181818; object-fit: contain;">
            <p style="font-weight: bold; margin: 5px 0 0 0; color: #fff; font-size: 1.1rem; letter-spacing: 0.5px;">Galaxy Buds Live(ANC)</p>
            <span style="color: #fff; font-weight: bold; font-size: 1.15rem; margin-top: 6px; letter-spacing: 0.5px;">R$999,99</span>
          </div>
        </div>
      </div>
      <div class="carousel-indicators" style="margin-top: 24px;">
        <button class="active" type="button" data-slide="0"></button>
        <button type="button" data-slide="1"></button>
        <button type="button" data-slide="2"></button>
      </div>
      <div style="position: relative; width: 100%; display: flex; justify-content: center; align-items: center; margin-top: 0; gap: 32px;">
        <button id="carousel-prev" class="carousel-nav-btn" style="width: 44px; height: 44px; font-size: 22px; background: #232323; color: #fff; border: none; box-shadow: 0 2px 8px #0003; border-radius: 50%; display: flex; align-items: center; justify-content: center; transition: background 0.2s;">
          <i class="fas fa-arrow-left"></i>
        </button>
        <button id="carousel-next" class="carousel-nav-btn" style="width: 44px; height: 44px; font-size: 22px; background: #232323; color: #fff; border: none; box-shadow: 0 2px 8px #0003; border-radius: 50%; display: flex; align-items: center; justify-content: center; transition: background 0.2s;">
          <i class="fas fa-arrow-right"></i>
        </button>
      </div>
    </div>
  </section>
  <!-- Seção: Destaque AirPods -->
  <section class="airpods" style="max-width: 1400px; margin: 64px auto 0 auto; display: flex; align-items: center; justify-content: space-between; gap: 48px; background: #181818; border-radius: 24px; box-shadow: 0 4px 32px 0 rgba(0,0,0,0.18); padding: 48px 48px 48px 64px;">
    <div class="text-content" style="flex: 1;">
      <h2 style="color: #fff; font-size: 2.2rem; font-weight: bold; margin-bottom: 18px;">AirPods</h2>
      <p class="sub" style="color: #b0b0b0; font-size: 1.2rem; margin-bottom: 10px;">Conforto Bluetooth. Mágico.</p>
      <p class="desc" style="color: #e0e0e0; font-size: 1.1rem;">Introduzindo os AirPods. Tecnologia e praticidade, juntos como nunca!</p>
    </div>
    <div class="img-content" style="flex: 1; display: flex; justify-content: center; align-items: center;">
      <img src="/media/Homem_fone.png" alt="Homem com AirPods" style="max-width: 380px; width: 100%; height: auto; border-radius: 18px; box-shadow: 0 4px 32px 0 rgba(0,0,0,0.28); object-fit: cover; background: #111;">
    </div>
  </section>
  <!-- Seção: Explore nosso site -->
  <section class="hero-section" style="display: flex; flex-direction: row; align-items: center; justify-content: flex-start; width: 100%; background: #000; border-radius: 24px; max-width: 1400px; margin: 64px auto 0 auto; min-height: 420px; box-shadow: 0 4px 32px 0 rgba(0,0,0,0.18); padding: 0 0 0 64px; gap: 0; overflow: hidden;">
    <div style="flex: 1; display: flex; align-items: center; height: 100%;">
      <h1 style="color: #fff; font-size: 2.6rem; font-weight: bold; letter-spacing: 1px; text-align: left; margin-bottom: 0;">Explore nosso site e descubra o luxo</h1>
    </div>
    <div style="flex: 1; display: flex; justify-content: center; align-items: center; height: 100%;">
      <img src="/media/Imagem Ana.png" alt="Banner" style="width: 90%; max-width: 700px; height: auto; display: block; object-fit: contain; background: #000; margin: 0; border-radius: 0; box-shadow: none;" />
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
<script>
    // Carrossel simples: mostra apenas o slide ativo
    const slides = document.querySelectorAll('.carousel-slide');
    const indicators = document.querySelectorAll('.carousel-indicators button');
    let currentSlide = 0;
    function showSlide(idx) {
      slides.forEach((slide, i) => {
        slide.style.display = i === idx ? 'flex' : 'none';
        if (indicators[i]) indicators[i].classList.toggle('active', i === idx);
      });
      currentSlide = idx;
    }
    function moveToSlide(idx) {
      showSlide(idx);
    }
    function prevSlide() {
      let idx = (currentSlide - 1 + slides.length) % slides.length;
      showSlide(idx);
    }
    function nextSlide() {
      let idx = (currentSlide + 1) % slides.length;
      showSlide(idx);
    }
    // Inicializa carrossel
    showSlide(0);
    // Eventos dos botões
    document.getElementById('carousel-prev').addEventListener('click', prevSlide);
    document.getElementById('carousel-next').addEventListener('click', nextSlide);
    indicators.forEach((btn, idx) => {
      btn.addEventListener('click', () => moveToSlide(idx));
    });
  </script>
@endpush
@endsection
