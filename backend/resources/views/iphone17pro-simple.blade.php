@extends('layouts.app')

@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
/* Reset e Base */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background: #000 !important;
    color: #fff !important;
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

/* Hero Section */
.hero-section {
    position: relative;
    overflow: hidden;
    height: 300px;
}

@media (min-width: 768px) {
    .hero-section {
        height: 100vh;
    }
}

.hero-img {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    opacity: 0.9;
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(to bottom, rgba(0,0,0,0.3) 0%, transparent 50%, rgba(0,0,0,0.8) 100%);
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
}
</style>
@endsection

@section('content')
<div style="background: #000; min-height: 100vh; color: #fff;">
    {{-- Hero Section --}}
    <section class="hero-section">
        <img src="{{ asset('media/hero.jpg') }}" alt="iPhone 17 Pro" class="hero-img" />
        <div class="hero-overlay"></div>
        <div class="arrow-down">↓</div>
    </section>

    {{-- Intro Section --}}
    <section class="intro-section">
        <div style="max-width: 80rem; margin: 0 auto;">
            <h1 class="intro-title">iPhone 17 Pro</h1>
            <p class="intro-subtitle">Titânio. Tão forte. Tão leve. Tão Pro.</p>
            <p class="intro-desc">
                O design mais refinado que já criamos. Titânio de grau aeroespacial.
                Chip A19 Pro
            </p>
        </div>
        
        <div class="button-container">
            @auth
                <form action="{{ route('carrinho.adicionar') }}" method="POST" style="display: inline-block;">
                    @csrf
                    <input type="hidden" name="produto_id" value="4">
                    <input type="hidden" name="quantidade" value="1">
                    <button type="submit" class="btn btn-blue">Compre agora</button>
                </form>
            @else
                <a href="/Login" class="btn btn-blue">Faça Login para Comprar</a>
            @endauth
            <a href="#Design" class="btn btn-white">Saiba mais</a>
        </div>
        
        <div class="specs-grid">
            <div class="spec-card">
                <strong class="spec-value blue">6.3</strong>
                <p class="spec-label">Display Super Retina XDR</p>
            </div>
            <div class="spec-card">
                <strong class="spec-value orange">A19 Pro</strong>
                <p class="spec-label">Chip mais rápido</p>
            </div>
            <div class="spec-card">
                <strong class="spec-value blue">48MP</strong>
                <p class="spec-label">Sistema de câmera</p>
            </div>
            <div class="spec-card">
                <strong class="spec-value orange">29h*</strong>
                <p class="spec-label">De bateria</p>
            </div>
        </div>
    </section>

    {{-- Highlights Section --}}
    <section id="Design" class="highlights-section">
        <div class="highlights-container">
            <div class="highlights-header">
                <h2 class="highlights-title">Design Revolucionário</h2>
                <p class="highlights-subtitle">
                    Cada detalhe foi pensado para criar a melhor experiência.
                </p>
            </div>
            
            <div class="highlights-grid">
                <div class="highlight-card">
                    <img src="{{ asset('media/titanium-design.jpg') }}" alt="titanium-design" class="highlight-img" />
                    <h3 class="highlight-card-title">Titânio Premium</h3>
                    <p class="highlight-card-desc">
                        Estrutura em titânio do grau aeroespacial. O smartphone mais forte e leve
                    </p>
                </div>
                <div class="highlight-card">
                    <img src="{{ asset('media/ios-features.jpg') }}" alt="ios-features" class="highlight-img" />
                    <h3 class="highlight-card-title">iOS 19</h3>
                    <p class="highlight-card-desc">
                        Sistema operacional mais avançado do mundo com IA integrada
                    </p>
                </div>
            </div>
            
            <div class="a19-section">
                <h3 class="a19-title">A19 Pro</h3>
                <p class="a19-desc">O chip mais poderoso em um smartphone</p>
                <img src="{{ asset('media/A19pro.jpg') }}" alt="chip-a19-pro" class="a19-img" />
                <ul class="a19-features">
                    <li>- CPU 20% mais rápida</li>
                    <li>- GPU 25% mais eficiente</li>
                    <li>- Neural Engine com 16 núcleos</li>
                    <li>- Ray Tracing acelerado por hardware</li>
                </ul>
            </div>
            
            <div class="unibody-section">
                <h3 class="unibody-title">Estrutura unibody. Eles têm a força.</h3>
                <p class="unibody-desc">
                    Apresentamos o iPhone 17 Pro e o iPhone 17 Pro Max. Projetados de
                    dentro para fora, eles são os modelos de iPhone mais potentes já
                    produzidos. O coração do novo design é a estrutura unibody em
                    alumínio forjado a quente que maximiza o desempenho, a capacidade da
                    bateria e a durabilidade.
                </p>
                <img src="{{ asset('media/shell-titânio.webp') }}" alt="shell-titânio" class="unibody-img" />
            </div>
        </div>
    </section>

    {{-- Botão Final de Compra --}}
    <section style="padding: 5rem 1.5rem; text-align: center;">
        @auth
            <form action="{{ route('carrinho.adicionar') }}" method="POST" style="display: inline-block;">
                @csrf
                <input type="hidden" name="produto_id" value="4">
                <input type="hidden" name="quantidade" value="1">
                <button type="submit" style="background: #2563eb; color: white; padding: 1rem 3rem; border-radius: 2rem; font-size: 1.5rem; font-weight: 600; border: none; cursor: pointer; transition: all 0.3s;" onmouseover="this.style.background='#1d4ed8'; this.style.transform='scale(1.05)'" onmouseout="this.style.background='#2563eb'; this.style.transform='scale(1)'">
                    🛒 Comprar iPhone 17 Pro
                </button>
            </form>
        @else
            <a href="/Login" style="background: #dc2626; color: white; padding: 1rem 3rem; border-radius: 2rem; font-size: 1.5rem; font-weight: 600; text-decoration: none; display: inline-block; transition: all 0.3s;" onmouseover="this.style.background='#b91c1c'; this.style.transform='scale(1.05)'" onmouseout="this.style.background='#dc2626'; this.style.transform='scale(1)'">
                👤 Faça Login para Comprar
            </a>
        @endauth
    </section>
</div>
@endsection