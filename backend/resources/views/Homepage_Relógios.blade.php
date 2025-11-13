@extends('layouts.app')

@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
footer {
    background: #fff !important;
    color: #222 !important;
}
/* Reset e Base */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background: #000 !important;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    line-height: 1.6;
}

html {
    background: #000 !important;
}

main {
    background: #000 !important;
    padding: 0 !important;
}

/* Remover linha/border da navbar */
nav, .navbar, header {
    border-bottom: none !important;
    box-shadow: none !important;
    border: none !important;
}

/* Forçar espaçamento entre navbar e conteúdo */

/* Hero Section */
.hero-section {
    position: relative;
    overflow: hidden;
    height: 60vh;
    min-height: 400px;
    margin-top: 3rem !important;
    padding-top: 2rem !important;
}

@media (min-width: 768px) {
    .hero-section {
        height: 80vh;
        min-height: 600px;
        margin-top: 4rem !important;
        padding-top: 3rem !important;
    }
}

.hero-img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: contain;
    object-position: center;
    opacity: 0.9;
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(to bottom, rgba(0,0,0,0.2) 0%, transparent 30%, transparent 70%, rgba(0,0,0,0.6) 100%);
}

/* Animações de Entrada */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(50px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

@keyframes slideInLeft {
    from {
        opacity: 0;
        transform: translateX(-50px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes zoomIn {
    from {
        opacity: 0;
        transform: scale(0.8);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

/* Classes de animação */
.animate-fade-in-up {
    animation: fadeInUp 1s ease-out;
}

.animate-fade-in {
    animation: fadeIn 1.5s ease-out;
}

.animate-slide-in-left {
    animation: slideInLeft 1s ease-out;
}

.animate-zoom-in {
    animation: zoomIn 0.8s ease-out;
}

.animate-delay-300 {
    animation-delay: 0.3s;
    animation-fill-mode: both;
}

.animate-delay-600 {
    animation-delay: 0.6s;
    animation-fill-mode: both;
}

.animate-delay-900 {
    animation-delay: 0.9s;
    animation-fill-mode: both;
}

.arrow-down {
    position: absolute;
    bottom: 2rem;
    left: 50%;
    transform: translateX(-50%);
    color: white;
    font-size: 2rem;
    animation: bounce 2s infinite;
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% { transform: translateX(-50%) translateY(0); }
    40% { transform: translateX(-50%) translateY(-10px); }
    60% { transform: translateX(-50%) translateY(-5px); }
}

/* Intro Section */
.intro-section {
    padding: 2.5rem 0.25rem;
    text-align: center;
}

@media (min-width: 768px) {
    .intro-section {
        padding: 5rem 1.5rem;
    }
}

.intro-title {
    font-size: 3rem;
    font-weight: bold;
    margin-bottom: 1.5rem;
    color: white;
}

@media (min-width: 768px) {
    .intro-title {
        font-size: 5rem;
    }
}

.intro-subtitle {
    font-size: 1.5rem;
    margin-bottom: 1rem;
    background: linear-gradient(45deg, #3b82f6, #ef4444);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

@media (min-width: 768px) {
    .intro-subtitle {
        font-size: 2.5rem;
    }
}

.intro-desc {
    font-size: 1.125rem;
    color: #d1d5db;
    margin-bottom: 2.5rem;
    max-width: 48rem;
    margin-left: auto;
    margin-right: auto;
}

@media (min-width: 768px) {
    .intro-desc {
        font-size: 1.25rem;
    }
}

/* Buttons */
.button-container {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    justify-content: center;
    align-items: center;
    margin-bottom: 4rem;
}

@media (min-width: 768px) {
    .button-container {
        flex-direction: row;
    }
}

.btn {
    padding: 0.75rem 1.5rem;
    border-radius: 1.5rem;
    font-size: 1.125rem;
    transition: all 0.3s;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
}

.btn:hover {
    transform: scale(1.05);
}

.btn-blue {
    background: #2563eb;
    color: white;
    border: 2px solid transparent;
}

.btn-blue:hover {
    background: #1d4ed8;
}

.btn-white {
    border: 2px solid #9ca3af;
    color: #9ca3af;
    background: transparent;
}

.btn-white:hover {
    border-color: #d1d5db;
    color: #d1d5db;
}

/* Specs Grid */
.specs-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1.25rem;
    width: 80%;
    margin: 0 auto;
}

@media (min-width: 768px) {
    .specs-grid {
        grid-template-columns: repeat(4, 1fr);
    }
}

.spec-card {
    background: linear-gradient(to bottom, rgba(55, 65, 81, 0.7), rgba(17, 24, 39, 0.8));
    padding: 0.75rem;
    border-radius: 1rem;
    text-align: center;
    gap: 0.5rem;
    transition: all 0.3s;
    cursor: pointer;
}

@media (min-width: 768px) {
    .spec-card {
        padding: 1.75rem;
    }
}

.spec-card:hover {
    background: #374151;
    transform: scale(1.02);
}

.spec-value {
    font-size: 1.5rem;
    font-weight: bold;
    display: block;
    margin-bottom: 0.5rem;
}

@media (min-width: 768px) {
    .spec-value {
        font-size: 2.5rem;
    }
}

.spec-value.blue { color: #2563eb; }
.spec-value.orange { color: #ea580c; }

.spec-label {
    color: white;
    text-align: center;
}

/* Highlights Section */
.highlights-section {
    padding: 1.5rem;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.highlights-container {
    max-width: 72rem;
    gap: 2.5rem;
    display: flex;
    flex-direction: column;
    margin: 0 auto;
}

.highlights-header {
    text-align: center;
    margin-bottom: 2.5rem;
}

.highlights-title {
    font-size: 1.875rem;
    font-weight: 900;
    background: linear-gradient(45deg, #3b82f6, #ef4444);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

@media (min-width: 768px) {
    .highlights-title {
        font-size: 2.25rem;
    }
}

.highlights-subtitle {
    font-size: 1.25rem;
    margin: 1.25rem 0;
    color: #9ca3af;
}

@media (min-width: 768px) {
    .highlights-subtitle {
        font-size: 1.5rem;
    }
}

.highlights-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 1.25rem;
}

@media (min-width: 768px) {
    .highlights-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

.highlight-card {
    background: linear-gradient(to bottom, rgba(55, 65, 81, 0.7), rgba(17, 24, 39, 0.8));
    text-align: center;
    padding: 1.5rem;
    border-radius: 1rem;
    transition: all 0.3s;
}

.highlight-card:hover {
    background: #374151;
    transform: scale(1.02);
}

.highlight-img {
    border-radius: 1rem;
    margin-bottom: 1rem;
    width: 100%;
    height: auto;
}

.highlight-card-title {
    font-size: 1.25rem;
    font-weight: bold;
    text-align: center;
    background: linear-gradient(45deg, #3b82f6, #ef4444);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 1rem;
}

@media (min-width: 768px) {
    .highlight-card-title {
        font-size: 1.5rem;
    }
}

.highlight-card-desc {
    text-align: center;
    color: #d1d5db;
}

/* A19 Pro Section */
.a19-section {
    background: linear-gradient(to bottom, rgba(55, 65, 81, 0.7), rgba(17, 24, 39, 0.8));
    padding: 1.5rem;
    border-radius: 1rem;
    transition: all 0.3s;
}

.a19-section:hover {
    background: #374151;
    transform: scale(1.02);
}

.a19-title {
    font-size: 1.25rem;
    font-weight: bold;
    background: linear-gradient(45deg, #3b82f6, #ef4444);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 1rem;
}

@media (min-width: 768px) {
    .a19-title {
        font-size: 1.5rem;
    }
}

.a19-desc {
    margin-bottom: 1rem;
    color: #d1d5db;
}

.a19-img {
    border-radius: 1rem;
    width: 100%;
    margin-bottom: 1rem;
}

.a19-features {
    list-style: none;
    color: #d1d5db;
}

.a19-features li {
    margin-bottom: 0.75rem;
}

/* Unibody Section */
.unibody-section {
    display: flex;
    justify-content: center;
    gap: 0.75rem;
    align-items: center;
    flex-direction: column;
    width: 100%;
    margin-top: 2.5rem;
}

.unibody-title {
    font-size: 1.875rem;
    font-weight: bold;
    background: linear-gradient(45deg, #3b82f6, #ef4444);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    text-align: center;
}

@media (min-width: 768px) {
    .unibody-title {
        font-size: 2.25rem;
    }
}

.unibody-desc {
    text-align: center;
    width: 70%;
    color: #9ca3af;
}

.unibody-img {
    border-radius: 1rem;
    width: 80%;
    margin-bottom: 0;
}
</style>
@endsection

@section('content')
<div style="background: #000; min-height: 100vh; color: #fff;">
    {{-- Hero Section --}}
    <section class="hero-section">
        <!-- Imagem do banner principal (hero) -->
        <img src="{{ asset('media/varios apples.jpg') }}" alt="iPhone 17 Pro" class="hero-img" />
        <div class="hero-overlay"></div>
        <div class="arrow-down">↓</div>
    </section>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form[action="{{ route('carrinho.adicionar') }}"]');
            const btn = document.getElementById('btn-comprar-iphone17pro');
            if (form && btn) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const formData = new FormData(form);
                    fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': formData.get('_token')
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Atualiza o contador do carrinho na navbar
                            const cartCountSpan = document.querySelector('.cart-count');
                            if (cartCountSpan) {
                                cartCountSpan.textContent = data.cart_count;
                                cartCountSpan.style.display = data.cart_count > 0 ? 'flex' : 'none';
                            } else {
                                // Se não existe, cria o span
                                const cartIcon = document.querySelector('.navbar-btn-sacola');
                                if (cartIcon) {
                                    const span = document.createElement('span');
                                    span.className = 'cart-count';
                                    span.textContent = data.cart_count;
                                    span.style = 'position:absolute;top:-8px;right:-8px;background:#ff4757;color:#fff;border-radius:50%;width:20px;height:20px;font-size:0.75rem;display:flex;align-items:center;justify-content:center;font-weight:bold;min-width:20px;';
                                    cartIcon.appendChild(span);
                                }
                            }
                            btn.innerHTML = '<span style="position: relative; z-index: 2; display: flex; align-items: center; justify-content: center; gap: 8px;"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 8px;"><path d="M20 6L9 17l-5-5"/></svg>Adicionado!</span>';
                            setTimeout(() => { btn.innerHTML = '<span style="position: relative; z-index: 2; display: flex; align-items: center; justify-content: center; gap: 8px;"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 8px;"><path d="M9 12l2 2 4-4"/><circle cx="12" cy="12" r="9"/></svg>Comprar Apple Watch</span>'; }, 2000);
                        } else {
                            btn.innerHTML = '<span style="position: relative; z-index: 2; display: flex; align-items: center; justify-content: center; gap: 8px;"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 8px;"><path d="M18 6L6 18M6 6l12 12"/></svg>Erro ao adicionar</span>';
                            setTimeout(() => { btn.innerHTML = '<span style="position: relative; z-index: 2; display: flex; align-items: center; justify-content: center; gap: 8px;"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 8px;"><path d="M9 12l2 2 4-4"/><circle cx="12" cy="12" r="9"/></svg>Comprar Apple Watch</span>'; }, 2000);
                        }
                    })
                    .catch(() => {
                        btn.innerHTML = '<span style="position: relative; z-index: 2; display: flex; align-items: center; justify-content: center; gap: 8px;"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 8px;"><path d="M18 6L6 18M6 6l12 12"/></svg>Erro ao adicionar</span>';
                        setTimeout(() => { btn.innerHTML = '<span style="position: relative; z-index: 2; display: flex; align-items: center; justify-content: center; gap: 8px;"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 8px;"><path d="M9 12l2 2 4-4"/><circle cx="12" cy="12" r="9"/></svg>Comprar Apple Watch</span>'; }, 2000);
                    });
                });
            }
        });
        </script>
        {{-- Camera Specs Section --}}
        <section class="camera-specs-section" style="padding: 3rem 1.5rem; text-align: center;">

    {{-- Intro Section --}}
    <section class="intro-section">
                <!-- ScrollMagic JS dependencies -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/ScrollMagic.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/plugins/animation.gsap.min.js"></script>
                <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var controller = new ScrollMagic.Controller({});
                    var tween1 = new TimelineMax();
                    // Animação: relógios rodam para o lado (eixo X) e giram, sem sumir
                    tween1.to('.box1', 2, {x: '350px', rotation: 120, ease:Power0.easeNone})
                        .to('.box2', 2, {x: '-350px', rotation: -120, ease:Power0.easeNone}, 0);
                    // page 1
                    var page1 = new ScrollMagic.Scene({
                        triggerElement: '.page1',
                        triggerHook: 0,
                        duration: '40%'
                    })
                    .setTween(tween1)
                    .addTo(controller);
                    // page 2
                    var page2 = new ScrollMagic.Scene({
                        triggerElement: '.page2',
                        triggerHook: 0.2,
                    })
                    .setPin('.box1')
                    .addTo(controller);
                });
                </script>
        <div style="max-width: 80rem; margin: 0 auto;">
            <div style="display: flex; align-items: center; justify-content: center; gap: 2rem; flex-wrap: wrap;">
                <div>
                    <h1 class="intro-title animate-fade-in-up">Apple Whatch</h1>
                    <p class="intro-subtitle animate-fade-in-up animate-delay-300" style="font-weight: 700;">Titânio. Tão forte. Tão leve. Tão Pro.</p>
                    <p class="intro-desc animate-fade-in-up animate-delay-600">
                        O design mais refinado que já criamos. Titânio de grau aeroespacial.
                        Chip S9 Pro
                    </p>
                    <!-- Botão movido para baixo da escrita -->
                    <div class="button-container animate-zoom-in animate-delay-900" style="margin-bottom: 2rem; margin-top: 1.5rem;">
                        <div style="width: 100%; display: flex; justify-content: center;">
                            @auth
                                <form action="{{ route('carrinho.adicionar') }}" method="POST" style="display: inline-block;">
                                    @csrf
                                        <input type="hidden" name="produto_id" value="6">
                                    <input type="hidden" name="quantidade" value="1">
                                    <button type="submit" class="btn btn-blue">Compre agora</button>
                                </form>
                            @else
                                <a href="/Login" class="btn btn-blue">Faça Login para Comprar</a>
                            @endauth
                        </div>
                    </div>
                </div>
                <!-- ScrollMagic Animation Block -->
                <div style="background:#000; padding:2rem 0; min-width:350px; max-width:400px; border-radius:1rem;">
                    <div class="page page1">
                        <div class="box1">
                            <img src="https://images.apple.com/v/watch/j/images/overview/watch_02_fallback_large.png" alt="" style="max-width:300px;width:300px;height:auto;" />
                        </div>
                        <div class="box2">
                            <img src="https://images.apple.com/v/watch/j/images/overview/watch_08_fallback_large.png" alt="" style="max-width:300px;width:300px;height:auto;" />
                        </div>
                    </div>
                    <div class="page page2">
                        <div class="box2"></div>
                    </div>
                </div>
                <!-- End ScrollMagic Animation Block -->
            </div>
        </div>
        
       
        
       
    </section>

    {{-- Highlights Section --}}
    <section id="Design" class="highlights-section">
        <div class="highlights-container">
            <div class="highlights-header animate-fade-in-up">
                <h2 class="highlights-title">Design Revolucionário</h2>
                <p class="highlights-subtitle">
                    Cada detalhe foi pensado para criar a melhor experiência.
                </p>
            </div>
            
            <div class="highlights-grid">
                <div class="highlight-card animate-slide-in-left animate-delay-300">
                    <!-- Imagens dos destaques -->
                        <img src="{{ asset('media/apple.jpg') }}" alt="titanium-design" class="highlight-img" style="width:100%;max-width:650px;height:400px;object-fit:contain;display:block;margin:0 auto;border-radius:2rem;" />
                    <h3 class="highlight-card-title">Titânio Premium</h3>
                    <p class="highlight-card-desc">
                        Estrutura em titânio do grau aeroespacial. O smartWhatch mais forte e leve
                    </p>
                </div>
                <div class="highlight-card animate-slide-in-left animate-delay-600">
                        <img src="{{ asset('media/apple what series.jpg') }}" alt="ios-features" class="highlight-img" style="width:100%;max-width:600px;height:400px;object-fit:contain;display:block;margin:0 auto;border-radius:2rem;" />
                    <h3 class="highlight-card-title">iOS 19</h3>
                    <p class="highlight-card-desc">
                        Sistema operacional mais avançado do mundo com IA integrada
                    </p>
                </div>
            </div>
            
            <div class="a19-section">
                <div class="a19-center">
                    <h3 class="a19-title" style="text-align:center; width:100%;">S9 Pro</h3>
                    <p class="a19-desc" style="text-align:center; width:100%;">O chip mais poderoso em um smartphone</p>
                    <!-- Imagem do chip -->
                    <img src="{{ asset('media/Apple-S9-SiP.jpg') }}" alt="chip-a19-pro" class="a19-img" />
                    <ul class="a19-features">
                        <li style="text-align:center;">- CPU 20% mais rápida</li>
                        <li style="text-align:center;">- GPU 25% mais eficiente</li>
                        <li style="text-align:center;">- Neural Engine com 16 núcleos</li>
                        <li style="text-align:center;">- Ray Tracing acelerado por hardware</li>
                    </ul>
                </div>
            </div>
            
            <div class="unibody-section">
                <h3 class="unibody-title">Estrutura unibody. Eles têm a força.</h3>
                <p class="unibody-desc">
                   Projetado para ser mais do que um relógio, ele é uma extensão inteligente do seu dia.
Do design ao desempenho, cada detalhe foi pensado para oferecer funcionalidade, estilo e precisão em um único dispositivo. O Apple Watch acompanha você em tudo:
do monitoramento de atividades e saúde ao controle instantâneo de chamadas e mensagens — tudo diretamente do seu pulso.
                </p>
                <!-- Imagem da estrutura unibody -->
                <img src="{{ asset('media/carcaca.png') }}" alt="shell-titânio" class="unibody-img" />
        </div>
        {{-- Colors Section (movida para baixo da unibody) --}}
        <section class="colors-section animate-fade-in-up" style="padding: 5rem 1.5rem; text-align: center;">
            <div style="max-width: 60rem; margin: 0 auto; margin-top: -4rem;">
                <h2 style="font-size: 2.5rem; font-weight: bold; margin-bottom: 1rem; background: linear-gradient(45deg, #3b82f6, #ef4444); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                    Escolha sua cor
                </h2>
                <p style="font-size: 1.25rem; color: #9ca3af; margin-bottom: 1rem;">
                    Três acabamentos em titânio lindos
                </p>
                <div style="position: relative; margin-bottom: 3rem;">
                 <!-- Imagem da cor do Apple Watch (pode ser trocada pelas opções de cor) -->
                 <img id="colorPreview" src="{{ asset('media/Apple azul.png') }}" alt="Apple Watch" 
                     style="width: 100%; max-width: 220px; height: auto; border-radius: 1rem; display: block; margin: 0 auto;" class="animate-zoom-in" id="colorPreviewImg" />
                    <div style="position: absolute; bottom: 2rem; left: 50%; transform: translateX(-50%); background: rgba(0,0,0,0.7); color: #2563eb; padding: 0.75rem 1.5rem; border-radius: 2rem; font-size: 1.125rem; font-weight: 600;">
                        <span id="colorName">Titânio Azul</span>
                    </div>
                </div>
                <div style="display: flex; justify-content: center; gap: 1rem; margin-bottom: 1rem;">
            <button class="color-btn active" id="indicator-azul" data-color="azul" data-name="Titânio Azul" data-image="{{ asset('media/Apple azul.png') }}" 
                style="width: 3rem; height: 3rem; border-radius: 50%; background: #2563eb; border: 3px solid #fff; cursor: pointer; transition: all 0.3s; box-shadow: 0 4px 15px rgba(59, 130, 246, 0.4); position: relative; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                    <!-- imagem do relógio removida do botão laranja -->
            </button>
            <button class="color-btn" id="indicator-branco" data-color="branco" data-name="Titânio Branco" data-image="{{ asset('media/Apple branco.png') }}" 
                style="width: 3rem; height: 3rem; border-radius: 50%; background: #e5e7eb; border: 3px solid #fff; cursor: pointer; transition: all 0.3s; box-shadow: 0 4px 15px rgba(128, 128, 128, 0.4); position: relative; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                    <!-- imagem do relógio removida do botão laranja -->
            </button>
            <button class="color-btn" id="indicator-preto" data-color="preto" data-name="Titânio Preto" data-image="{{ asset('media/Apple preto.png') }}" 
                style="width: 3rem; height: 3rem; border-radius: 50%; background: #222; border: 3px solid #fff; cursor: pointer; transition: all 0.3s; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.7); position: relative; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                    <!-- imagem do relógio removida do botão laranja -->
            </button>
                </div>
                <div style="display: flex; justify-content: center;">
                    <!-- Indicador removido conforme solicitado -->
                </div>
            </div>
        </section>
            </div>
        </div>
    </section>

    {{-- Botão Final de Compra --}}
    <section style="padding: 5rem 1.5rem; text-align: center;">
        @auth
            <form action="{{ route('carrinho.adicionar') }}" method="POST" style="display: inline-block;">
                @csrf
                    <input type="hidden" name="produto_id" value="125">
                    <input type="hidden" name="quantidade" value="1">
                    <button type="submit" id="btn-comprar-applewatch" style="background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%); color: white; padding: 1.2rem 4rem; border-radius: 3rem; font-size: 1.4rem; font-weight: 700; border: none; cursor: pointer; transition: all 0.4s ease; box-shadow: 0 8px 32px rgba(37, 99, 235, 0.4); position: relative; overflow: hidden;" onmouseover="this.style.transform='translateY(-3px) scale(1.02)'; this.style.boxShadow='0 12px 40px rgba(37, 99, 235, 0.6)';" onmouseout="this.style.transform='translateY(0) scale(1)'; this.style.boxShadow='0 8px 32px rgba(37, 99, 235, 0.4)';">
                        <span style="position: relative; z-index: 2; display: flex; align-items: center; justify-content: center; gap: 8px;">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 8px;">
                                <path d="M9 12l2 2 4-4"/>
                                <circle cx="12" cy="12" r="9"/>
                            </svg>
                            Comprar Apple Watch
                        </span>
                    </button>
            </form>
        @else
            <a href="/Login" style="background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%); color: white; padding: 1.2rem 4rem; border-radius: 3rem; font-size: 1.4rem; font-weight: 700; text-decoration: none; display: inline-block; transition: all 0.4s ease; box-shadow: 0 8px 32px rgba(220, 38, 38, 0.4); position: relative; overflow: hidden;" onmouseover="this.style.transform='translateY(-3px) scale(1.02)'; this.style.boxShadow='0 12px 40px rgba(220, 38, 38, 0.6)';" onmouseout="this.style.transform='translateY(0) scale(1)'; this.style.boxShadow='0 8px 32px rgba(220, 38, 38, 0.4)';">
                <span style="position: relative; z-index: 2; display: flex; align-items: center; justify-content: center; gap: 8px;">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 8px;">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                    Faça Login para Comprar
                </span>
            </a>
        @endauth
    </section>
</div>

<script>
// Funcionalidade de troca de cores
document.addEventListener('DOMContentLoaded', function() {
    const colorPreviewImg = document.getElementById('colorPreviewImg');
    const colorButtons = document.querySelectorAll('.color-btn');
    const colorPreview = document.getElementById('colorPreview');
    const colorName = document.getElementById('colorName');
    const colorIndicator = document.getElementById('color-indicator');

    function updateIndicator() {
        const activeBtn = document.querySelector('.color-btn.active');
        if (activeBtn) {
            const rect = activeBtn.getBoundingClientRect();
            const parentRect = activeBtn.parentElement.getBoundingClientRect();
            // Calcula a posição relativa da bolinha
            colorIndicator.style.left = (activeBtn.offsetLeft + activeBtn.offsetWidth/2 - 6) + 'px';
        }
    }

    colorButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            colorButtons.forEach(btn => {
                btn.classList.remove('active');
                btn.style.borderColor = '#374151';
                btn.style.boxShadow = 'none';
            });

            // Add active class to clicked button
            this.classList.add('active');
            this.style.borderColor = '#fff';

            // Update preview image and name
            const newImage = this.getAttribute('data-image');
            const newName = this.getAttribute('data-name');
            const color = this.getAttribute('data-color');

            // Fade out current image
            colorPreview.style.opacity = '0';

            setTimeout(() => {
                colorPreview.src = newImage;
                colorName.textContent = newName;

                // Update color name color based on selection
                if (color === 'azul') {
                    colorName.style.color = '#2563eb';
                    this.style.boxShadow = '0 4px 15px rgba(59, 130, 246, 0.4)';
                } else if (color === 'branco') {
                    colorName.style.color = '#e5e7eb';
                    this.style.boxShadow = '0 4px 15px rgba(128, 128, 128, 0.4)';
                } else if (color === 'preto') {
                    colorName.style.color = '#808080';
                    this.style.boxShadow = '0 4px 15px rgba(0, 0, 0, 0.7)';
                }

                // Fade in new image
                colorPreview.style.opacity = '1';
                updateIndicator();
            }, 200);
        });
    });

    // Hover effects for color buttons
    colorButtons.forEach(button => {
        button.addEventListener('mouseenter', function() {
            if (!this.classList.contains('active')) {
                this.style.transform = 'scale(1.1)';
            }
        });

        button.addEventListener('mouseleave', function() {
            if (!this.classList.contains('active')) {
                this.style.transform = 'scale(1)';
            }
        });
    });

    // Inicializa indicador na posição correta
    updateIndicator();
});
</script>
    @include('components.apple-watch')

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