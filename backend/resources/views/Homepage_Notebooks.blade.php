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
    padding-top: 80px !important; /* Espaço para a navbar fixa */
    padding-bottom: 48px !important;
}



/* Forçar espaçamento entre navbar e conteúdo */

/* Hero Section */

.hero-section {
    position: relative;
    overflow: hidden;
    height: 80vh;
    min-height: 500px;
    margin-top: 0 !important;
    padding-top: 0 !important;
    display: flex;
    align-items: stretch;
    justify-content: center;
}

.hero-img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: contain;
    object-position: center 80%;
    opacity: 0.95;
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
    bottom: 3.5rem;
    left: 50%;
    transform: translateX(-50%);
    color: white;
    font-size: 2.5rem;
    animation: bounce 2s infinite;
    z-index: 2;
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

@section('content')
<div style="background: #000; min-height: 100vh; color: #fff;">
    {{-- Hero Section --}}
    <section class="hero-section" style="background:#000;display:flex;flex-direction:column;align-items:center;justify-content:center;width:100vw;min-height:78vh;position:relative;overflow:hidden;">
        <!-- Imagem do banner principal (hero) -->
        <img src="{{ asset('media/mac.jpg') }}" alt="iPhone 17 Pro" class="hero-img" />
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
                            btn.textContent = '✅ Adicionado!';
                            setTimeout(() => { btn.textContent = '🛒 Comprar iPhone 17 Pro'; }, 2000);
                        } else {
                            btn.textContent = 'Erro ao adicionar';
                            setTimeout(() => { btn.textContent = '🛒 Comprar iPhone 17 Pro'; }, 2000);
                        }
                    })
                    .catch(() => {
                        btn.textContent = 'Erro ao adicionar';
                        setTimeout(() => { btn.textContent = '🛒 Comprar iPhone 17 Pro'; }, 2000);
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
                    <h1 class="intro-title animate-fade-in-up">MacBook  </h1>
                    <p class="intro-subtitle animate-fade-in-up animate-delay-300" style="font-weight: 700;">Titânio. Tão forte. Tão leve. Tão Pro.</p>
                    <p class="intro-desc animate-fade-in-up animate-delay-600">
                       Conecte-se ao que importa — som premium, design elegante e tecnologia Apple.
                    </p>
                    <!-- Botão movido para baixo da escrita -->
                    <div class="button-container animate-zoom-in animate-delay-900" style="margin-bottom: 2rem; margin-top: 1.5rem;">
                        <div style="width: 100%; display: flex; justify-content: center; gap: 15px;">
                            @auth
                                <form action="{{ route('carrinho.adicionar') }}" method="POST" style="display: inline-block;">
                                    @csrf
                                        <input type="hidden" name="produto_id" value="58">
                                    <input type="hidden" name="quantidade" value="1">
                                    <button type="submit" class="btn btn-blue">Compre agora</button>
                                </form>
                                <a href="{{ route('produto.show', 58) }}" class="btn" style="background: rgba(255,255,255,0.2); color: #fff; text-decoration: none; backdrop-filter: blur(10px); border: 2px solid rgba(255,255,255,0.3);">
                                    <i class="fas fa-eye"></i> Ver Produto
                                </a>
                            @else
                                <a href="/Login" class="btn btn-blue">Faça Login para Comprar</a>
                            @endauth
                        </div>
                    </div>
                </div>
                <!-- Vídeo de destaque (restaurado) + botão 3D -->
                <div style="width:100vw; height:80vh; max-width:100%; display:flex; align-items:center; justify-content:center; background:#000; overflow:hidden; border-radius:2rem; margin:2rem 0; position:relative;">
                    <video id="homepageFonesVideo" autoplay loop muted playsinline style="width:100vw; height:100%; object-fit:cover; border-radius:2rem; display:block;">
                        <source src="{{ asset('media/Mac video.mp4') }}" type="video/mp4">
                        Seu navegador não suporta a tag de vídeo.
                    </video>
                </div>
                    <!-- Botão para abrir o 3D removido -->

               

                <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var openBtn = document.getElementById('open3DBtn');
                    var viewerModal = document.getElementById('viewerModal');
                    var closeBtn = document.getElementById('close3D');
                    var video = document.getElementById('homepageFonesVideo');
                    var adModal = document.getElementById('adModal');
                    var adViewBtn = document.getElementById('adViewBtn');
                    var adCloseBtn = document.getElementById('adCloseBtn');

                    function openViewer() {
                        if(!viewerModal) return;
                        viewerModal.style.display = 'flex';
                        document.body.style.overflow = 'hidden';
                        if(video && !video.paused) video.pause();
                    }

                    function closeViewer() {
                        if(!viewerModal) return;
                        viewerModal.style.display = 'none';
                        document.body.style.overflow = '';
                        if(video && video.paused) try { video.play(); } catch(e) {}
                    }

                    function openAd() {
                        if(!adModal) return;
                        adModal.style.display = 'flex';
                        document.body.style.overflow = 'hidden';
                        if(video && !video.paused) video.pause();
                    }

                    function closeAd() {
                        if(!adModal) return;
                        adModal.style.display = 'none';
                        document.body.style.overflow = '';
                        if(video && video.paused) try { video.play(); } catch(e) {}
                    }

                    // abrir o modal de anúncio ao carregar (tipo anúncio)
                    setTimeout(function(){ openAd(); }, 700);

                    // botão sobre o vídeo abre o visualizador direto
                    if(openBtn) openBtn.addEventListener('click', openViewer);
                    if(closeBtn) closeBtn.addEventListener('click', closeViewer);

                    // ações do anúncio
                    if(adViewBtn) adViewBtn.addEventListener('click', function(){ closeAd(); openViewer(); });
                    if(adCloseBtn) adCloseBtn.addEventListener('click', function(){ closeAd(); });

                    // Fecha modal ao apertar Escape (fecha ad ou viewer se estiverem abertos)
                    document.addEventListener('keydown', function(e){
                        if(e.key === 'Escape') {
                            if(adModal && adModal.style.display === 'flex') { closeAd(); }
                            if(viewerModal && viewerModal.style.display === 'flex') { closeViewer(); }
                        }
                    });
                });
                </script>
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
                        <img src="{{ asset('media/foto.png') }}" alt="titanium-design" class="highlight-img" style="width:100%;max-width:650px;height:400px;object-fit:contain;display:block;margin:0 auto;border-radius:2rem;" />
                    <h3 class="highlight-card-title">Titânio Premium</h3>
                    <p class="highlight-card-desc">
                        Estrutura em titânio do grau aeroespacial. O MacBook  mais forte e leve
                    </p>
                </div>
                <div class="highlight-card animate-slide-in-left animate-delay-600">
                        <img src="{{ asset('media/foto 2.png') }}" alt="ios-features" class="highlight-img" style="width:100%;max-width:600px;height:400px;object-fit:contain;display:block;margin:0 auto;border-radius:2rem;" />
                    <h3 class="highlight-card-title">iOS 19</h3>
                    <p class="highlight-card-desc">
                        Sistema operacional mais avançado do mundo com IA integrada
                    </p>
                </div>
            </div>
            
            <div class="a19-section">
                <div class="a19-center">
                    <h3 class="a19-title" style="text-align:center; width:100%;">N1 Pro</h3>
                    <p class="a19-desc" style="text-align:center; width:100%;">O chip mais poderoso em um dispositivo apple</p>
                    <!-- Imagem do chip -->
                    <img src="{{ asset('media/M4.jpg') }}" alt="chip-a19-pro" class="a19-img" />
                    <ul class="a19-features">
                        <li style="text-align:center;">- CPU de 20 Núcleos</li>
                        <li style="text-align:center;">- GPU 25% mais eficiente</li>
                        <li style="text-align:center;">- Neural Engine com 16 núcleos</li>
                        <li style="text-align:center;">- Ray Tracing acelerado por hardware</li>
                    </ul>
                </div>
            </div>
            
            <div class="unibody-section">
                <h3 class="unibody-title">Estrutura unibody. Eles têm a força.</h3>
                <p class="unibody-desc">
                Criado para ir muito além de um simples notebook, o MacBook eleva cada tarefa a um novo padrão de desempenho e eficiência. Do design ao poder de processamento, cada detalhe foi pensado para oferecer fluidez, elegância e uma experiência que combina força e simplicidade em um único dispositivo. Com os chips Apple Silicon, tela de alta resolução e bateria de longa duração, ele acompanha você em tudo: do foco total no trabalho às horas de criatividade e entretenimento — sempre com a sensação de estar operando em um novo nível de produtividade e inspiração.
                <!-- Imagem da estrutura unibody -->
                <img src="{{ asset('media/MD.jpg') }}" alt="shell-titânio" class="unibody-img" />
        </div>
        {{-- Colors Section (movida para baixo da unibody) --}}
        <section class="colors-section animate-fade-in-up" style="padding: 5rem 1.5rem; text-align: center;">
            <div style="max-width: 60rem; margin: 0 auto; margin-top: -4rem;">
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
    <section style="padding: 5rem 1.5rem; text-align: center; background: linear-gradient(135deg, rgba(37, 99, 235, 0.1) 0%, rgba(0, 0, 0, 0.9) 100%); border-radius: 2rem; margin: 2rem auto; max-width: 1200px;">
        <h2 style="color: #fff; font-size: 2.5rem; font-weight: 700; margin-bottom: 1rem; background: linear-gradient(45deg, #2563eb, #ffffff); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">Experimente o Futuro da Performance</h2>
        <p style="color: #d1d5db; font-size: 1.25rem; margin-bottom: 3rem; max-width: 600px; margin-left: auto; margin-right: auto;">Uma combinação perfeita de potência, design e inteligência para acompanhar você em qualquer desafio.</p>
        @auth
            <div style="display: flex; justify-content: center; gap: 20px; flex-wrap: wrap;">
                <form action="{{ route('carrinho.adicionar') }}" method="POST" style="display: inline-block;">
                    @csrf
                        <input type="hidden" name="produto_id" value="55">
                        <input type="hidden" name="quantidade" value="1">
                        <button type="submit" id="btn-comprar-fone" style="background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%); color: white; padding: 1.25rem 3rem; border-radius: 2rem; font-size: 1.25rem; font-weight: 600; border: none; cursor: pointer; transition: all 0.4s ease; box-shadow: 0 10px 30px rgba(37, 99, 235, 0.4); position: relative; overflow: hidden;" onmouseover="this.style.background='linear-gradient(135deg, #1d4ed8 0%, #1e40af 100%)'; this.style.transform='translateY(-3px)'; this.style.boxShadow='0 15px 40px rgba(37, 99, 235, 0.6)'" onmouseout="this.style.background='linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%)'; this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 30px rgba(37, 99, 235, 0.4)'">
                            Comprar Mac Agora
                            <span style="position: absolute; top: 0; left: -100%; width: 100%; height: 100%; background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent); transition: left 0.5s;"></span>
                        </button>
                </form>
                <a href="{{ route('produto.show', 55) }}" style="background: rgba(255,255,255,0.15); color: white; padding: 1.25rem 3rem; border-radius: 2rem; font-size: 1.25rem; font-weight: 600; text-decoration: none; cursor: pointer; transition: all 0.4s ease; box-shadow: 0 10px 30px rgba(255, 255, 255, 0.1); border: 2px solid rgba(255,255,255,0.3); backdrop-filter: blur(10px); display: inline-flex; align-items: center; gap: 10px;" onmouseover="this.style.background='rgba(255,255,255,0.25)'; this.style.transform='translateY(-3px)'; this.style.boxShadow='0 15px 40px rgba(255, 255, 255, 0.2)'" onmouseout="this.style.background='rgba(255,255,255,0.15)'; this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 30px rgba(255, 255, 255, 0.1)'">
                    <i class="fas fa-eye"></i> Ver Produto
                </a>
            </div>
        @else
            <a href="/login" style="background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%); color: white; padding: 1.25rem 3rem; border-radius: 2rem; font-size: 1.25rem; font-weight: 600; text-decoration: none; display: inline-block; transition: all 0.4s ease; box-shadow: 0 10px 30px rgba(220, 38, 38, 0.4); position: relative; overflow: hidden;" onmouseover="this.style.background='linear-gradient(135deg, #b91c1c 0%, #991b1b 100%)'; this.style.transform='translateY(-3px)'; this.style.boxShadow='0 15px 40px rgba(220, 38, 38, 0.6)'" onmouseout="this.style.background='linear-gradient(135deg, #dc2626 0%, #b91c1c 100%)'; this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 30px rgba(220, 38, 38, 0.4)'">
                👤 Faça Login para Comprar
                <span style="position: absolute; top: 0; left: -100%; width: 100%; height: 100%; background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent); transition: left 0.5s;"></span>
            </a>
        @endauth
    </section>
</div>
@endsection

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
@endsection