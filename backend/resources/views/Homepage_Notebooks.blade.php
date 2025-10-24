@extends('layouts.app')

@section('head')
<link rel="stylesheet" href="{{ asset('media/Css/Homepage_Notbooks.css') }}">
@endsection

@section('content')
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

@endsection
