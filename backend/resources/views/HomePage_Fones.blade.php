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
  
  <!-- Carrossel de Fones 3x3 -->
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
        @if($produtos->count() > 0)
          @php
            $produtosChunks = $produtos->chunk(3); // Agrupa produtos de 3 em 3 para cada slide
          @endphp
          
          @foreach($produtosChunks as $chunk)
            <div class="carousel-slide">
              @foreach($chunk as $produto)
                <div class="fone-card" onclick="window.location.href='{{ route('produto.show', $produto->id) }}';" style="cursor: pointer;">
                  <img src="/media/{{ $produto->imagem }}" alt="{{ $produto->nome }}" onerror="this.src='/media/placeholder_produto.png'">
                  <div class="fone-model">{{ $produto->nome }}</div>
                  <div class="fone-price">R$ {{ number_format($produto->preco, 2, ',', '.') }}</div>
                  @if($produto->estoque <= 5)
                    <div style="color: #ff6b6b; font-size: 0.8rem; margin-top: 4px;">
                      {{ $produto->estoque > 0 ? 'Últimas unidades!' : 'Esgotado' }}
                    </div>
                  @endif
                </div>
              @endforeach
            </div>
          @endforeach
        @else
          <div class="carousel-slide">
            <div style="text-align: center; padding: 40px; color: #666;">
              <p>Nenhum produto encontrado nesta categoria.</p>
            </div>
          </div>
        @endif
      </div>
    </div>
    <div class="carousel-indicators">
      @if($produtos->count() > 0)
        @php
          $totalSlides = ceil($produtos->count() / 3);
        @endphp
        @for($i = 0; $i < $totalSlides; $i++)
          <button class="carousel-dot" data-slide="{{ $i }}"></button>
        @endfor
      @endif
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
  <script>
    // Carrossel automático com animação "puxando para o lado" e bolinhas
    document.addEventListener('DOMContentLoaded', function() {
      const track = document.querySelector('.carousel-track-fones');
      const slides = document.querySelectorAll('.carousel-slide-fones');
      const dots = document.querySelectorAll('.carousel-dot-fones');
      let current = 0;
      let interval = null;
      function showSlide(idx) {
        track.style.transform = `translateX(-${idx * 100}%)`;
        dots.forEach((dot, i) => {
          dot.style.background = i === idx ? '#fff' : 'transparent';
        });
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
    });
  </script>
  <section class="airpods" style="max-width: 1400px; margin: 64px auto 0 auto; display: flex; align-items: center; justify-content: space-between; gap: 48px; background: #111; border-radius: 24px; box-shadow: 0 4px 32px 0 rgba(0,0,0,0.18); padding: 48px 48px 48px 64px;">
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
  // Carrossel funcional: auto-slide, bolinhas e navegação
  document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelectorAll('.carousel-slide');
    const indicators = document.querySelectorAll('.carousel-dot');
    const prevBtn = document.getElementById('carousel-prev');
    const nextBtn = document.getElementById('carousel-next');
    const carouselWrapper = document.querySelector('.carousel');
    let currentSlide = 0;
    let autoSlideInterval = null;

    function showSlide(idx) {
      slides.forEach((slide, i) => {
        slide.style.display = i === idx ? 'flex' : 'none';
        if (indicators[i]) indicators[i].classList.toggle('active', i === idx);
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
    // Eventos
    if (prevBtn) prevBtn.addEventListener('click', prevSlide);
    if (nextBtn) nextBtn.addEventListener('click', nextSlide);
    indicators.forEach((btn, idx) => {
      btn.addEventListener('click', () => moveToSlide(idx));
    });
    if (carouselWrapper) {
      carouselWrapper.addEventListener('mouseenter', stopAutoSlide);
      carouselWrapper.addEventListener('mouseleave', startAutoSlide);
    }
    // Inicializa carrossel
    showSlide(0);
    startAutoSlide();
  });
</script>
@endpush
@endsection
