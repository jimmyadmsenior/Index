@extends('layouts.app')
@section('head')
<style>
/* iPhone 17 Pro Page Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background: #000 !important;
    color: #fff !important;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    line-height: 1.6;
}

html {
    background: #000 !important;
}

.iphone17-page {
    background: #000 !important;
    min-height: 100vh;
    color: #fff;
}

/* Força fundo preto em todos os elementos */
main {
    background: #000 !important;
    padding: 0 !important;
}

.main-homepage {
    background: #000 !important;
}

/* Sobrepõe qualquer CSS externo */
body.iphone17-body {
    background: #000 !important;
    color: #fff !important;
    margin: 0 !important;
    padding: 0 !important;
}

/* Garante que footer também seja preto */
.footer {
    background: #000 !important;
    color: #fff !important;
}

.hero-section {
    position: relative;
    height: 100vh;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
}

.hero-img {
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
    bottom: 30px;
    left: 50%;
    transform: translateX(-50%);
    font-size: 2rem;
    animation: bounce 2s infinite;
    z-index: 10;
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% { transform: translateX(-50%) translateY(0); }
    40% { transform: translateX(-50%) translateY(-10px); }
    60% { transform: translateX(-50%) translateY(-5px); }
}

.intro-section, .highlights-section, .camspecs-section, .colors-section {
    padding: 80px 20px;
    max-width: 1200px;
    margin: 0 auto;
}

.intro-section h1 {
    font-size: 4rem;
    font-weight: bold;
    text-align: center;
    margin-bottom: 20px;
}

.gradient-text {
    background: linear-gradient(45deg, #007aff, #ff3b30);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.intro-desc {
    text-align: center;
    color: #ccc;
    font-size: 1.2rem;
    max-width: 600px;
    margin: 0 auto 40px;
}

.intro-buttons {
    display: flex;
    gap: 20px;
    justify-content: center;
    margin-bottom: 60px;
}

.btn-blue {
    background: #007aff;
    color: white;
    padding: 15px 30px;
    border: none;
    border-radius: 25px;
    font-size: 1.1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s;
}

.btn-blue:hover {
    background: #0056b3;
    transform: scale(1.05);
}

.btn-white {
    border: 2px solid #ccc;
    background: transparent;
    color: #ccc;
    padding: 15px 30px;
    border-radius: 25px;
    font-size: 1.1rem;
    cursor: pointer;
    transition: all 0.3s;
}

.btn-white:hover {
    background: #ccc;
    color: #000;
}

.intro-specs, .camspecs-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 30px;
    margin: 0 auto;
}

.spec-card {
    text-align: center;
    padding: 30px 20px;
    background: rgba(255,255,255,0.05);
    border-radius: 20px;
    transition: transform 0.3s;
}

.spec-card:hover {
    transform: translateY(-5px);
}

.text-blue { color: #007aff; }
.text-orange { color: #ff9500; }
.text-gray { color: #ccc; }

.highlights-grid, .colors-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin-bottom: 40px;
}

.card {
    background: rgba(255,255,255,0.05);
    padding: 30px;
    border-radius: 20px;
    text-align: center;
    transition: transform 0.3s;
}

.card:hover {
    transform: translateY(-5px);
}

.card-img {
    width: 100%;
    border-radius: 15px;
    margin-bottom: 20px;
}

.models-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
    margin-top: 50px;
}

.model-card {
    background: rgba(255,255,255,0.05);
    padding: 30px;
    border-radius: 20px;
}

.model-card h4 {
    font-size: 1.5rem;
    margin-bottom: 20px;
    color: #007aff;
}

.model-card ul {
    list-style: none;
}

.model-card li {
    padding: 8px 0;
    border-bottom: 1px solid rgba(255,255,255,0.1);
}

.color-card {
    text-align: center;
}

.color-card img {
    width: 100%;
    border-radius: 20px;
    margin-bottom: 15px;
    transition: transform 0.3s;
}

.color-card:hover img {
    transform: scale(1.05);
}

.color-label {
    font-size: 1.2rem;
    font-weight: 600;
}

@media (max-width: 768px) {
    .intro-section h1 {
        font-size: 2.5rem;
    }
    
    .intro-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .intro-specs, .camspecs-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }
    
    .highlights-grid, .colors-grid {
        grid-template-columns: 1fr;
    }
}
</style>
@endsection

@section('content')
<script>
// Adiciona classe ao body para garantir fundo preto
document.body.classList.add('iphone17-body');
document.documentElement.style.background = '#000';
</script>
<div class="iphone17-page">
{{-- Hero Section --}}
<section class="hero-section" id="Hero">
    <img src="{{ asset('media/hero.jpg') }}" alt="iPhone 17 Pro" class="hero-img" />
    <div class="hero-overlay"></div>
    <div class="arrow-down">↓</div>
</section>
{{-- Intro Section --}}
<section class="intro-section" id="Performace">
    <div class="intro-content">
        <h1>iPhone 17 Pro</h1>
        <p class="gradient-text">Titânio. Tão forte. Tão leve. Tão Pro.</p>
        <p class="intro-desc">O design mais refinado que já criamos. Titânio de grau aeroespacial. Chip A18 pro</p>
        <div class="intro-buttons">
            @auth
                <form action="{{ route('carrinho.adicionar') }}" method="POST" style="display: inline-block;">
                    @csrf
                    <input type="hidden" name="produto_id" value="4">
                    <input type="hidden" name="quantidade" value="1">
                    <button type="submit" class="btn-blue">
                        <i class="fas fa-shopping-cart"></i> Compre agora
                    </button>
                </form>
            @else
                <a href="/Login" class="btn-blue" style="text-decoration: none;">Compre agora</a>
            @endauth
            <button class="btn-white">Saiba mais</button>
        </div>
        <div class="intro-specs">
            <div class="spec-card"><strong class="text-blue">6.3</strong><p>Display Super Retina XDR</p></div>
            <div class="spec-card"><strong class="text-orange">A18 Pro</strong><p>Chip mais rápido</p></div>
            <div class="spec-card"><strong class="text-blue">48MP</strong><p>Sistema de câmera</p></div>
            <div class="spec-card"><strong class="text-orange">29h*</strong><p>De bateria</p></div>
        </div>
    </div>
</section>
{{-- Highlights Section --}}
<section class="highlights-section" id="Design">
    <div class="highlights-content">
        <h2 class="gradient-text">Design Revolucionário</h2>
        <p>Cada detalhe foi pensado para criar a melhor experiência.</p>
        <div class="highlights-grid">
            <div class="card">
                <img src="{{ asset('media/titanium-design.jpg') }}" alt="Titânio Premium" class="card-img" />
                <h3 class="gradient-text">Titânio Premium</h3>
                <p>Estrutura em titânio do grau aeroespacial. O smartphone mais forte e leve</p>
            </div>
            <div class="card">
                <img src="{{ asset('media/ios-features.jpg') }}" alt="iOS 26" class="card-img" />
                <h3 class="gradient-text">iOS 26</h3>
                <p>Sistema operacional mais avançado do mundo com IA integrada</p>
            </div>
        </div>
        <div class="card">
            <h3 class="gradient-text">A19 Pro</h3>
            <p>O chip mais poderoso em um smartphone</p>
            <img src="{{ asset('media/A19pro.jpg') }}" alt="A19 Pro" class="card-img" />
            <ul>
                <li>Performance extrema com 20% mais velocidade</li>
                <li>Eficiência energética revolucionária</li>
                <li>IA embarcada para experiências inteligentes</li>
                <li>Neural Engine de 16 núcleos</li>
            </ul>
        </div>
        <div class="card">
            <h3 class="gradient-text">Shell Titânio</h3>
            <img src="{{ asset('media/shell-titânio.webp') }}" alt="Shell Titânio" class="card-img" />
            <p>Resistência e leveza incomparáveis com acabamento premium</p>
        </div>
    </div>
</section>
{{-- CamSpecs Section --}}
<section class="camspecs-section" id="Camera">
    <div class="camspecs-content">
        <h3 class="gradient-text">Sistema de Câmera Pro avançado</h3>
        <p>Toda tecnologia em câmeras que só o iPhone tem</p>
        <div class="camspecs-grid">
            <div class="spec-card">
                <strong class="text-blue">48MP</strong>
                <h4>Principal</h4>
                <p>Sensor quad-pixel com foco automático</p>
            </div>
            <div class="spec-card">
                <strong class="text-orange">12MP</strong>
                <h4>Ultra Wide</h4>
                <p>Campo de visão de 120º com modo noturno</p>
            </div>
            <div class="spec-card">
                <strong class="text-blue">12MP</strong>
                <h4>Telefoto 5X</h4>
                <p>Zoom óptico de 5x com estabilização</p>
            </div>
        </div>
    </div>
</section>
{{-- ColorsPhone Section --}}
<section class="colors-section" id="Cores">
    <div class="colors-content">
        <h3 class="gradient-text">Escolha sua cor</h3>
        <p>Três acabamentos em titânio lindos</p>
        <div class="colors-grid">
            <div class="color-card">
                <img src="{{ asset('media/iphone-blue.jpg') }}" alt="Titânio Azul" />
                <span class="color-label text-blue">Titânio Azul</span>
            </div>
            <div class="color-card">
                <img src="{{ asset('media/iphone-silver.jpg') }}" alt="Titânio Natural" />
                <span class="color-label text-gray">Titânio Natural</span>
            </div>
            <div class="color-card">
                <img src="{{ asset('media/iphone-orange.jpg') }}" alt="Titânio Laranja" />
                <span class="color-label text-orange">Titânio Laranja</span>
            </div>
        </div>
        
        {{-- Botão de Compra Principal --}}
        <div style="text-align: center; margin-top: 60px;">
            @auth
                <form action="{{ route('carrinho.adicionar') }}" method="POST" style="display: inline-block;">
                    @csrf
                    <input type="hidden" name="produto_id" value="4">
                    <input type="hidden" name="quantidade" value="1">
                    <button type="submit" class="btn-blue" style="font-size: 1.3rem; padding: 20px 40px;">
                        <i class="fas fa-shopping-cart"></i> Comprar iPhone 17 Pro
                    </button>
                </form>
            @else
                <a href="/Login" class="btn-blue" style="font-size: 1.3rem; padding: 20px 40px; text-decoration: none; display: inline-block;">
                    Faça Login para Comprar
                </a>
            @endauth
        </div>
        <div class="models-grid">
            <div class="model-card">
                <h4>Pro Max</h4>
                <ul>
                    <li>Tela: 6.9 polegadas</li>
                    <li>Armazenamento: 256GB, 512GB ou 1TB</li>
                    <li>Bateria: 33h de vídeo*</li>
                    <li>Peso: 221g</li>
                </ul>
            </div>
            <div class="model-card">
                <h4>Pro</h4>
                <ul>
                    <li>Tela: 6.3 polegadas</li>
                    <li>Armazenamento: 128GB, 256GB ou 512GB</li>
                    <li>Bateria: 29h de vídeo*</li>
                    <li>Peso: 199g</li>
                </ul>
            </div>
        </div>
    </div>
</section>
{{-- Footer --}}
<footer class="footer">
    <div class="footer-sections">
        <div class="footer-section">
            <h5>Comprar e Saber Mais</h5>
            <ul>
                <li><a href="#">iPhone 17 pro</a></li>
                <li><a href="#">iPhone 17</a></li>
                <li><a href="#">Comprar modelos</a></li>
                <li><a href="#">Acessórios</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h5>Especificações</h5>
            <ul>
                <li><a href="#">Características técnicas</a></li>
                <li><a href="#">Câmera</a></li>
                <li><a href="#">Bateria</a></li>
                <li><a href="#">Display</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h5>Suporte</h5>
            <ul>
                <li><a href="#">Suporte ao iPhone</a></li>
                <li><a href="#">AppleCare+</a></li>
                <li><a href="#">iOS 19</a></li>
                <li><a href="#">Contato</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h5>Apple</h5>
            <ul>
                <li><a href="#">Sobre a Apple</a></li>
                <li><a href="#">Newsroom</a></li>
                <li><a href="#">Privacidade</a></li>
                <li><a href="#">Carreiras</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <p>Copyright&copy; 2025 Apple Inc. Todos os direitos reservados</p>
        <p class="footer-note">Site criado para fins educativos - Aula do Youtube</p>
        <div class="footer-links">
            <a href="#">Política de Privacidade</a>
            <a href="#">Termos de uso</a>
            <a href="#">Vendas</a>
        </div>
    </div>
</footer>
</div>
@endsection
