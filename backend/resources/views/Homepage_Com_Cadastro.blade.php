@extends('layouts.app')

@section('head')
<meta name="page-type" content="homepage">
<style>
header, nav, .menu li a, .icons i, .navbar-btn, .navbar-btn-login, .navbar-btn-cadastro, .navbar-btn-perfil {
  background: #111 !important;
  color: #fff !important;
  border: none !important;
}
.menu li a { text-decoration: none !important; }
</style>
@endsection

@section('content')

{{-- Popup iPhone 17 Pro --}}
<div id="iphone17Popup" class="popup-overlay">
    <div class="popup-content">
        <button class="popup-close" onclick="closePopup()">&times;</button>
        <div class="popup-hero">
            <img src="{{ asset('media/hero.jpg') }}" alt="iPhone 17 Pro" class="popup-img" />
            <div class="popup-text">
                <h2 class="popup-title">🚀 NOVIDADE!</h2>
                <h3 class="popup-subtitle">iPhone 17 Pro</h3>
                <p class="popup-desc">Titânio. Tão forte. Tão leve. Tão Pro.</p>
                <p class="popup-features">✨ Chip A19 Pro • 📱 Display 6.3" • 📸 Câmera 48MP</p>
                <div class="popup-buttons">
                    <a href="{{ route('iphone17pro') }}" class="popup-btn primary">
                        <i class="fas fa-eye"></i> Ver Detalhes
                    </a>
                    <form action="{{ route('carrinho.adicionar') }}" method="POST" style="display: inline-block;">
                        @csrf
                        <input type="hidden" name="produto_id" value="4">
                        <input type="hidden" name="quantidade" value="1">
                        <button type="submit" class="popup-btn secondary">
                            <i class="fas fa-shopping-cart"></i> Comprar Agora
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.popup-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.8);
    backdrop-filter: blur(5px);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 10000;
    animation: fadeIn 0.3s ease;
}

.popup-content {
    background: linear-gradient(135deg, #1a1a1a 0%, #000 100%);
    border-radius: 20px;
    padding: 0;
    max-width: 600px;
    width: 90%;
    position: relative;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
    overflow: hidden;
    animation: slideUp 0.4s ease;
}

.popup-close {
    position: absolute;
    top: 15px;
    right: 20px;
    background: rgba(255, 255, 255, 0.2);
    border: none;
    color: #fff;
    font-size: 30px;
    cursor: pointer;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 10001;
    transition: all 0.3s;
}

.popup-close:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: scale(1.1);
}

.popup-hero {
    display: flex;
    flex-direction: column;
}

.popup-img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    opacity: 0.8;
}

.popup-text {
    padding: 30px;
    text-align: center;
    color: #fff;
}

.popup-title {
    font-size: 1.5rem;
    margin: 0 0 10px;
    background: linear-gradient(45deg, #ff6b35, #f7931e);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    font-weight: 800;
}

.popup-subtitle {
    font-size: 2.2rem;
    margin: 0 0 15px;
    background: linear-gradient(45deg, #007aff, #ff3b30);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    font-weight: bold;
}

.popup-desc {
    font-size: 1.2rem;
    margin: 0 0 15px;
    color: #ccc;
}

.popup-features {
    font-size: 1rem;
    color: #aaa;
    margin: 0 0 25px;
    font-weight: 500;
}

.popup-buttons {
    display: flex;
    gap: 15px;
    justify-content: center;
    flex-wrap: wrap;
}

.popup-btn {
    padding: 12px 25px;
    border-radius: 25px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    cursor: pointer;
    border: none;
    font-size: 1rem;
    transition: all 0.3s;
}

.popup-btn.primary {
    background: linear-gradient(45deg, #007aff, #0056b3);
    color: white;
}

.popup-btn.primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 122, 255, 0.4);
}

.popup-btn.secondary {
    background: linear-gradient(45deg, #ff3b30, #d32f2f);
    color: white;
}

.popup-btn.secondary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(255, 59, 48, 0.4);
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes slideUp {
    from { 
        opacity: 0;
        transform: translateY(50px) scale(0.9);
    }
    to { 
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

@media (max-width: 768px) {
    .popup-content {
        margin: 20px;
        width: calc(100% - 40px);
    }
    
    .popup-hero {
        flex-direction: column;
    }
    
    .popup-text {
        padding: 25px 20px;
    }
    
    .popup-subtitle {
        font-size: 1.8rem;
    }
    
    .popup-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .popup-btn {
        width: 100%;
        justify-content: center;
        max-width: 250px;
    }
}

.popup-hidden {
    display: none;
}
</style>

<script>
// Mostrar popup após 2 segundos
setTimeout(function() {
    document.getElementById('iphone17Popup').style.display = 'flex';
}, 2000);

function closePopup() {
    const popup = document.getElementById('iphone17Popup');
    popup.style.animation = 'fadeOut 0.3s ease';
    setTimeout(() => {
        popup.style.display = 'none';
    }, 300);
    
    // Salvar no localStorage para não mostrar novamente na sessão
    localStorage.setItem('iphone17PopupShown', 'true');
}

// Verificar se já foi mostrado na sessão
if (localStorage.getItem('iphone17PopupShown') === 'true') {
    document.getElementById('iphone17Popup').style.display = 'none';
}

// Fechar ao clicar fora do popup
document.getElementById('iphone17Popup').addEventListener('click', function(e) {
    if (e.target === this) {
        closePopup();
    }
});
</script>

<main class="main-homepage">
    <section class="hero-section">
      <h1 class="hero-title">Chegou o Index, o toque de classe que faltava!</h1>
      <p class="hero-subtitle">Possua os melhores modelos, com tecnologia de ponta, da Apple e Samsung</p>
    </section>
    <section class="featured-products">
      <div class="featured-iphone14">
        <h2>iPhone 14</h2>
        <p class="featured-desc">A tecnologia encontra o conforto</p>
        <div class="produto-acoes" style="display: flex; justify-content: center; margin: 20px auto; max-width: 300px;">
          <form action="{{ route('carrinho.adicionar') }}" method="POST" style="width: 100%;">
            @csrf
            <input type="hidden" name="produto_id" value="8">
            <input type="hidden" name="quantidade" value="1">
            <button type="submit" class="featured-link" style="background: #000; color: #fff; border: none; border-radius: 12px; width: 100%; font-weight: 700; display: flex; align-items: center; justify-content: center; gap: 8px; padding: 12px 20px; text-decoration: none;">
              <i class="fas fa-shopping-cart"></i>
              Adicionar ao Carrinho
            </button>
          </form>
        </div>
        <div class="featured-imgs">
          <img src="/media/Iphone_14_Capa_Homepage.png" alt="iPhone 14" class="iphone14-img"/>
        </div>
  <video class="video-fullwidth iphone-video-scroll" id="iphoneVideoScroll" autoplay muted loop style="border-radius: 18px; overflow: hidden; box-shadow: 0 2px 16px rgba(0,0,0,0.18);">
          <source src="/media/Vídeo_iPhone_Capa_Homepage.mp4" type="video/mp4">
          Seu navegador não suporta a tag de vídeo.
        </video>
      </div>
      <div class="product-grid">
        <div class="product-card dark">
          <h3>iPhone 14 Pro</h3>
          <p>Faz jus ao nome</p>
          <div class="card-buttons" style="display: flex; gap: 10px; margin: 10px 0;">
            <form action="{{ route('carrinho.adicionar') }}" method="POST" style="flex: 1;">
              @csrf
              <input type="hidden" name="produto_id" value="7">
              <input type="hidden" name="quantidade" value="1">
              <button type="submit" class="featured-link" style="background: #000; color: #fff; border: none; width: 100%; font-size: 0.9rem; padding: 10px; display: flex; align-items: center; justify-content: center; gap: 5px;">
                <i class="fas fa-shopping-cart"></i> Carrinho
              </button>
            </form>
            <a href="/produto/7" class="featured-link" style="flex: 1; font-size: 0.9rem; padding: 10px; text-align: center; background: transparent; border: 2px solid #fff; color: #fff; display: flex; align-items: center; justify-content: center;">Ver Produto</a>
          </div>
          <img src="/media/Iphone_14_Pro_Capa_Homepage.png" alt="iPhone 14 Pro"/>
        </div>
        <div class="product-card dark">
          <h3>Galaxy Book4</h3>
          <p>Desempenho nunca antes visto</p>
          <div class="card-buttons" style="display: flex; gap: 10px; margin: 10px 0;">
            <form action="{{ route('carrinho.adicionar') }}" method="POST" style="flex: 1;">
              @csrf
              <input type="hidden" name="produto_id" value="60">
              <input type="hidden" name="quantidade" value="1">
              <button type="submit" class="featured-link" style="background: #000; color: #fff; border: none; width: 100%; font-size: 0.9rem; padding: 10px; display: flex; align-items: center; justify-content: center; gap: 5px;">
                <i class="fas fa-shopping-cart"></i> Carrinho
              </button>
            </form>
            <a href="/produto/60" class="featured-link" style="flex: 1; font-size: 0.9rem; padding: 10px; text-align: center; background: transparent; border: 2px solid #fff; color: #fff; display: flex; align-items: center; justify-content: center;">Ver Produto</a>
          </div>
          <img src="/media/GalaxyBook4_Homepage.png" alt="Galaxy Book4"/>
        </div>
        <div class="product-card dark">
          <h3>Samsung Galaxy Tab S6</h3>
          <p>Profissionalismo e elegância</p>
          <div class="card-buttons" style="display: flex; gap: 10px; margin: 10px 0;">
            <form action="{{ route('carrinho.adicionar') }}" method="POST" style="flex: 1;">
              @csrf
              <input type="hidden" name="produto_id" value="167">
              <input type="hidden" name="quantidade" value="1">
              <button type="submit" class="featured-link" style="background: #000; color: #fff; border: none; width: 100%; font-size: 0.9rem; padding: 10px; display: flex; align-items: center; justify-content: center; gap: 5px;">
                <i class="fas fa-shopping-cart"></i> Carrinho
              </button>
            </form>
            <a href="/produto/167" class="featured-link" style="flex: 1; font-size: 0.9rem; padding: 10px; text-align: center; background: transparent; border: 2px solid #fff; color: #fff; display: flex; align-items: center; justify-content: center;">Ver Produto</a>
          </div>
          <img src="/media/Samsung Galaxy Tab S6.png" alt="Samsung Galaxy Tab S6"/>
        </div>
        <div class="product-card dark">
          <h3>Apple Watch Series 8</h3>
          <p>Um salto de tecnologia</p>
          <div class="card-buttons" style="display: flex; gap: 10px; margin: 10px 0;">
            <form action="{{ route('carrinho.adicionar') }}" method="POST" style="flex: 1;">
              @csrf
              <input type="hidden" name="produto_id" value="109">
              <input type="hidden" name="quantidade" value="1">
              <button type="submit" class="featured-link" style="background: #000; color: #fff; border: none; width: 100%; font-size: 0.9rem; padding: 10px; display: flex; align-items: center; justify-content: center; gap: 5px;">
                <i class="fas fa-shopping-cart"></i> Carrinho
              </button>
            </form>
            <a href="/produto/109" class="featured-link" style="flex: 1; font-size: 0.9rem; padding: 10px; text-align: center; background: transparent; border: 2px solid #fff; color: #fff; display: flex; align-items: center; justify-content: center;">Ver Produto</a>
          </div>
          <img src="/media/Watch_Series8.png" alt="Apple Watch Series 8"/>
        </div>
      </div>
    </section>
    <section class="explore-section">
      <div class="explore-banner">
        <div class="explore-text">
          <h2>Explore nosso site e descubra o luxo</h2>
        </div>
        <div class="explore-img">
            <img src="/media/Explore_Nosso_Site_E_Descubra.png" alt="Mascote Index" style="width: 100%; max-width: 1200px; height: auto; border-radius: 18px; box-shadow: 0 2px 16px rgba(0,0,0,0.18); object-fit: cover; display: block; margin: 0 auto;"/>
        </div>
      </div>
    </section>
</main>
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