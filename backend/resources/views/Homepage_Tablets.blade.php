@extends('layouts.app')
@section('content')
<!-- Conteúdo original da página abaixo -->
<main>
<!DOCTYPE html>
<html lang="pt-br" data-theme="light">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Fones</title>
  <link rel="icon" type="image/png" href="/media/Ícone_Guia_Navegador_Site.png">
  <link rel="stylesheet" href="/media/Css/HomePage_Tablet.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <style>
    html[data-theme="dark"] .produtos .card span {
      color: #fff !important;
    }
  </style>
</head>
<body>
  <header>
    <div class="header-content">
      <div class="logo">
        <!-- Logo da empresa -->
        <img src="/media/Logo_Branca.png" alt="Logo da empresa">
      </div>

      <nav>
        <!-- Menu de navegação -->
        <ul class="menu">
          <li><a href="/Smartphone">Smartphones</a></li>
          <li><a href="/Tablets">Tablets</a></li>
          <li><a href="/Homepage_Fones">Fones</a></li>
          <li><a href="/Relógios">Relógios</a></li>
          <li><a href="/Notebooks">Notebooks</a></li>
        </ul>
      </nav>

      <div class="icons">
        <i class="fas fa-search"></i>
        <i class="fas fa-user"></i>
        <i class="fas fa-shopping-bag"></i>
        <i class="fas fa-box"></i> <!-- Ícone de Pedidos -->
        
        <!-- Toggle Switch para Light/Dark Mode -->
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

 <!-- Imagem rente à navbar -->
  <div class="banner-navbar" style="background: #000; position: relative; width: 100%; padding-top: 48px; padding-bottom: 0; display: flex; flex-direction: column; align-items: center;">
    <div class="banner-tablet-overlay" style="width: 100%; max-width: 1100px; display: flex; flex-direction: column; align-items: center; z-index: 2; position: relative;">
      <h1 class="geoform-text" style="font-size: 4.2rem; font-weight: bold; margin-bottom: 18px; color: #fff; letter-spacing: 1px; text-align: center;">Galaxy Tab S9 Ultra Mockup</h1>
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
      <button class="comprar-btn" style="background: #fff; color: #111; font-weight: bold; font-size: 2rem; border: none; border-radius: 32px; padding: 18px 64px; margin-bottom: 40px; box-shadow: 0 2px 8px rgba(0,0,0,0.12); cursor: pointer; letter-spacing: 3px;">COMPRAR</button>
    </div>
    <img src="/media/Group 6.png" alt="Banner" class="group6-img" style="width: 100%; max-width: 1100px; height: auto; display: block; object-fit: contain; background: #000; margin: 0 auto; filter: none !important; mix-blend-mode: normal !important;" />
  </div>

  <!-- Carrossel de Produtos -->
<section class="produtos">
  <h2>Os modelos mais vendidos</h2>
  <div class="carousel">
    <div class="carousel-inner" id="carousel-inner">
      <div class="carousel-slide">
        <div class="card">
          <img src="/media/ipad_air.png" alt="AirPods (2ª geração)" style="width: 150px; height: 150px; object-fit: contain;">
          <p>Ipad air </p>
          <span>R$5.119,99</span>
        </div>
        <div class="card">
          <img src="/media/ipad_11th_gen.png" alt="Samsung Galaxy Buds Pro" style="width: 150px; height: 150px; object-fit: contain;">
          <p>Ipad 11th gen </p>
          <span>R$2.899,99</span>
        </div>
        <div class="card">
          <img src="/media/ipad_pro.png" alt="AirPods Estojo" style="width: 150px; height: 150px; object-fit: contain;">
          <p style="margin-top: 28px;">Ipad Pro</p>
          <span style="margin-top: 10px; display: inline-block;">R$7.799,99</span>
        </div>
      </div>
      <div class="carousel-slide">
        <div class="card">
          <img src="/media/Galaxy_tab_fe.png" alt="Fone A" style="width: 150px; height: 150px; object-fit: contain;">
          <p>Galaxy Tab FE</p>
          </p>
          <span>R$4.999,99</span>
        </div>
        <div class="card">
          <img src="/media/Galaxy_tab.png" alt="Fone B" style="width: 150px; height: 150px; object-fit: contain;">
          <p style="margin-top: 28px;">AirPods (3ª geração)</p>
          <span style="margin-top: 0px; display: inline-block;">R$1.299,90</span>
        </div>
        <div class="card">
          <img src="/media/Galaxy_tab_fee.png" alt="Galaxy Tab FE+" style="width: 150px; height: 150px; object-fit: contain;">
          <p style="margin-top: 10px;">Galaxy Tab FE+</p>
          <span style="margin-top: 0px; display: inline-block;">R$5.499,99</span>
        </div>
      </div>
      <div class="carousel-slide">
        <div class="card">
          <img src="/media/ipad_mini.png" alt="Fone D" style="width: 150px; height: 150px; object-fit: contain;">
            <p style="margin-top: 35px;">Galaxy Buds3 Pro</p>
            <span style="margin-top: 0px; display: inline-block;">R$1.290,90</span>
        </div>
        <div class="card">
          <img src="/media/galaxy_s9_ultra.png" alt="Fone E" style="width: 150px; height: 150px; object-fit: contain; margin-top: -18px;">
          <p style="margin-top: 50px;">Galaxy s9 ultra</p>
          <span style="margin-top: 3px; display: inline-block;">R$8.99,99</span>
        </div>
        <div class="card">
            <img src="/media/Galaxy_A9.png" alt="Fone F" style="width: 150px; height: 150px; object-fit: contain;">
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

<!-- Seção: Destaque Galaxy Tab A -->
<section class="galaxy-tab-a-banner" style="background: #000; width: 100vw; display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 0; position: relative; min-height: 700px;">
  <div style="position: relative; width: 100vw; height: 700px; max-width: 100vw; min-height: 700px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
    <!-- Banner único com vários tablets -->
    <img src="/media/selecao de tablets.png" alt="Samsung Galaxy Tab A" style="position: absolute; left: 0; top: 0; width: 100vw; height: 700px; max-width: 100vw; max-height: 100%; min-width: 0; min-height: 0; margin: 0; display: block; object-fit: cover; background: transparent; z-index: 2;" />
    <!-- Texto e botão -->
    <div style="position: absolute; left: 0; right: 0; top: 50%; transform: translateY(-50%); z-index: 3; text-align: center;">
      <h2 class="geoform-text" style="font-size: 4.2rem; font-weight: bold; color: #fff; margin-bottom: 32px; line-height: 1.1; text-shadow: 0 2px 12px rgba(0,0,0,0.35);">Samsung Galaxy<br>Tab A</h2>
      <button class="comprar-btn" style="background: #fff; color: #111; font-weight: bold; font-size: 2.2rem; border: none; border-radius: 40px; padding: 22px 70px; margin-top: 24px; box-shadow: 0 4px 16px rgba(0,0,0,0.18); cursor: pointer; letter-spacing: 3px; transition: transform 0.18s, background 0.18s, box-shadow 0.18s;" onmouseover="this.style.transform='scale(1.08)';this.style.background='#e6e6e6';this.style.color='#111';this.style.boxShadow='0 4px 18px rgba(0,0,0,0.18)';" onmouseout="this.style.transform='scale(1)';this.style.background='#fff';this.style.color='#111';this.style.boxShadow='0 4px 16px rgba(0,0,0,0.18)';" onmousedown="this.style.transform='scale(0.96) translateY(2px)';this.style.background='#d1d1d1';this.style.color='#111';this.style.boxShadow='0 1px 4px rgba(0,0,0,0.12)';" onmouseup="this.style.transform='scale(1.08)';this.style.background='#e6e6e6';this.style.color='#111';this.style.boxShadow='0 4px 18px rgba(0,0,0,0.18)';">COMPRAR</button>
    </div>
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
            <a href="/Homepage_Fones">Fones</a>
            <a href="/Relógios">Relógios</a>
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

  <script>
    // Script para alternar entre os temas claro e escuro
    document.addEventListener('DOMContentLoaded', function() {
      // Verificar se há uma preferência de tema salva no localStorage
      const savedTheme = localStorage.getItem('theme') || 'light';
      document.documentElement.setAttribute('data-theme', savedTheme);
      
      // Definir o estado inicial do checkbox com base no tema atual
      document.getElementById('theme-toggle').checked = savedTheme === 'dark';
      
      // Adicionar evento de mudança ao toggle
      document.getElementById('theme-toggle').addEventListener('change', function(e) {
        if(e.target.checked) {
          // Mudar para o tema escuro
          document.documentElement.setAttribute('data-theme', 'dark');
          localStorage.setItem('theme', 'dark');
          
          // Animação suave para a transição do tema
          document.body.classList.add('theme-transition');
          setTimeout(() => {
            document.body.classList.remove('theme-transition');
          }, 1000);
        } else {
          // Mudar para o tema claro
          document.documentElement.setAttribute('data-theme', 'light');
          localStorage.setItem('theme', 'light');
          
          // Animação suave para a transição do tema
          document.body.classList.add('theme-transition');
          setTimeout(() => {
            document.body.classList.remove('theme-transition');
          }, 1000);
        }
      });
      
      // Verificar preferência do sistema operacional do usuário
      const prefersDarkScheme = window.matchMedia('(prefers-color-scheme: dark)');
      
      // Função para sincronizar o tema com a preferência do sistema
      function syncWithSystemTheme(e) {
        // Somente altera automaticamente se o usuário não definiu uma preferência manualmente
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
      
      // Verificar a preferência inicial
      syncWithSystemTheme(prefersDarkScheme);
      
      // Escutar por mudanças na preferência do sistema
      prefersDarkScheme.addEventListener('change', syncWithSystemTheme);

      // Script para download usando JavaScript (Opção 2)
      /* Descomente o código abaixo se estiver usando a Opção 2 com o botão JavaScript */
      /*
      document.getElementById('download-button').addEventListener('click', function() {
        // URL do arquivo para download (substitua pelo caminho correto do seu arquivo)
        const fileUrl = '../caminho/para/seu/arquivo.apk';
        
        // Nome que será dado ao arquivo baixado
        const fileName = 'index-app.apk';
        
        // Criar um elemento de link invisível
        const link = document.createElement('a');
        link.href = fileUrl;
        link.download = fileName;
        link.style.display = 'none';
        
        // Adicionar ao DOM, clicar nele e depois remover
        document.body.appendChild(link);
        link.click();
        
        // Pequeno delay antes de remover o elemento
        setTimeout(() => {
          document.body.removeChild(link);
        }, 100);
      });
      */
    });

    // Carrossel de Produtos
    const carousel = document.getElementById("carousel-inner");
    const carouselWrapper = document.querySelector(".carousel");
    const indicators = document.querySelectorAll(".carousel-indicators button");
    const totalSlides = document.querySelectorAll('.carousel-slide').length;
    let currentSlide = 0;
    let autoSlide;

    function moveToSlide(index) {
      carousel.style.transform = `translateX(-${index * 100}%)`;
      indicators.forEach(btn => btn.classList.remove("active"));
      if (indicators[index]) indicators[index].classList.add("active");
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
      stopAutoSlide();
      autoSlide = setInterval(() => {
        nextSlide();
      }, 2000);
    }

    function stopAutoSlide() {
      if (autoSlide) clearInterval(autoSlide);
    }

    indicators.forEach((btn, idx) => {
      btn.onclick = () => moveToSlide(idx);
    });
    window.nextSlide = nextSlide;
    window.prevSlide = prevSlide;
    window.moveToSlide = moveToSlide;

    carouselWrapper.addEventListener("mouseenter", stopAutoSlide);
    carouselWrapper.addEventListener("mouseleave", startAutoSlide);
    startAutoSlide();

    // Suporte a swipe/touch para o carrossel
    let startX = 0;
    let isSwiping = false;

    carouselWrapper.addEventListener('touchstart', function(e) {
      if (e.touches.length === 1) {
        startX = e.touches[0].clientX;
        isSwiping = true;
      }
    });

    carouselWrapper.addEventListener('touchmove', function(e) {
      if (!isSwiping) return;
      // Não faz nada, mas pode ser usado para animação futura
    });

    carouselWrapper.addEventListener('touchend', function(e) {
      if (!isSwiping) return;
      const endX = e.changedTouches[0].clientX;
      const diffX = endX - startX;
      if (Math.abs(diffX) > 50) { // threshold para swipe
        if (diffX < 0) {
          nextSlide(); // swipe para a esquerda
        } else {
          prevSlide(); // swipe para a direita
        }
      }
      isSwiping = false;
    });
  </script>
</body>
</html>
</main>
@endsection