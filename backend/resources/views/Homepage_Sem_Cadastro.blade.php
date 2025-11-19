@extends('layouts.app')
@section('head')
<meta name="page-type" content="homepage">
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
          <a href="/Login" class="popup-btn secondary" style="text-decoration: none;">
            <i class="fas fa-user"></i> Faça Login para Comprar
          </a>
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
        <div class="produto-acoes" style="display: flex; gap: 10px; justify-content: center; margin: 20px auto; max-width: 350px;">
          <a href="/Login" class="featured-link" style="flex: 1; background: linear-gradient(135deg, #00bfff, #4db5ff); color: #fff; text-align: center; display: flex; align-items: center; justify-content: center; padding: 12px 20px; border-radius: 12px; font-weight: 700; gap: 8px; text-decoration: none;">
            <i class="fas fa-shopping-cart"></i> Faça Login para Comprar
          </a>
          <a href="/produto/9" class="featured-link" style="flex: 1.2; font-size: 0.9rem; padding: 18px 32px; text-align: center; background: transparent; border: 2px solid #00ff41; color: #00ff41; display: flex; align-items: center; justify-content: center; border-radius: 12px; text-decoration: none; font-weight: 600; min-width: 160px;">Ver Produto</a>
        </div>
        <div class="featured-imgs">
          <img src="/media/Iphone_14_Capa_Homepage.png" alt="Two hands holding a light blue iPhone 14, one showing the back with the Apple logo and dual cameras, the other displaying the lock screen with the time 941 and colorful abstract wallpaper, set against a clean white background, conveying a modern and premium feel" class="iphone14-img"/>
        </div>
        <!-- Vídeo embaixo da imagem, ocupando toda a largura -->
        <video class="video-fullwidth iphone-video-scroll" id="iphoneVideoScroll" autoplay muted loop style="border-radius: 22px; overflow: hidden;">
          <source src="/media/Vídeo_iPhone_Capa_Homepage.mp4" type="video/mp4">
          Seu navegador não suporta a tag de vídeo.
        </video>
      </div>
      <div class="product-grid">
        <div class="product-card dark">
          <h3>iPhone 14 Pro</h3>
          <p>Faz jus ao nome</p>
          <div class="card-buttons" style="display: flex; gap: 15px; margin: 15px 0;">
            <a href="/Login" class="featured-link" style="flex: 1.3; background: linear-gradient(135deg, #00bfff, #4db5ff); color: #fff; font-size: 0.85rem; padding: 16px 20px; text-align: center; display: flex; align-items: center; justify-content: center; gap: 8px; border-radius: 10px; font-weight: 600; min-width: 120px;">
              <i class="fas fa-shopping-cart"></i> Login
            </a>
            <a href="/Cadastro" class="featured-link" style="flex: 1.2; font-size: 0.85rem; padding: 16px 18px; text-align: center; background: transparent; border: 2px solid #fff; color: #fff; display: flex; align-items: center; justify-content: center; border-radius: 10px; font-weight: 600; min-width: 110px;">Cadastrar</a>
            <a href="/produto/7" class="featured-link" style="flex: 1.2; font-size: 0.85rem; padding: 16px 18px; text-align: center; background: transparent; border: 2px solid #00ff41; color: #00ff41; display: flex; align-items: center; justify-content: center; border-radius: 10px; text-decoration: none; font-weight: 600; min-width: 120px;">Ver Produto</a>
          </div>
          <img src="/media/Iphone_14_Pro_Capa_Homepage.png" alt="iPhone 14 Pro"/>
        </div>
        <div class="product-card dark">
          <h3>Galaxy Book4</h3>
          <p>Desempenho nunca antes visto</p>
          <div class="card-buttons" style="display: flex; gap: 8px; margin: 10px 0;">
            <a href="/Login" class="featured-link" style="flex: 1; background: linear-gradient(135deg, #00bfff, #4db5ff); color: #fff; font-size: 0.75rem; padding: 8px; text-align: center; display: flex; align-items: center; justify-content: center; gap: 5px; border-radius: 8px;">
              <i class="fas fa-shopping-cart"></i> Login
            </a>
            <a href="/Cadastro" class="featured-link" style="flex: 1; font-size: 0.75rem; padding: 8px; text-align: center; background: transparent; border: 2px solid #fff; color: #fff; display: flex; align-items: center; justify-content: center; border-radius: 8px;">Cadastrar</a>
            <a href="/produto/63" class="featured-link" style="flex: 1.2; font-size: 0.85rem; padding: 16px 18px; text-align: center; background: transparent; border: 2px solid #00ff41; color: #00ff41; display: flex; align-items: center; justify-content: center; border-radius: 10px; text-decoration: none; font-weight: 600; min-width: 120px;">Ver Produto</a>
          </div>
          <img src="/media/GalaxyBook4_Homepage.png" alt="Galaxy Book4"/>
        </div>
        <div class="product-card dark">
          <h3>Samsung Galaxy Tab S6</h3>
          <p>Profissionalismo e elegância</p>
          <div class="card-buttons" style="display: flex; gap: 8px; margin: 10px 0;">
            <a href="/Login" class="featured-link" style="flex: 1; background: linear-gradient(135deg, #00bfff, #4db5ff); color: #fff; font-size: 0.75rem; padding: 8px; text-align: center; display: flex; align-items: center; justify-content: center; gap: 5px; border-radius: 8px;">
              <i class="fas fa-shopping-cart"></i> Login
            </a>
            <a href="/Cadastro" class="featured-link" style="flex: 1; font-size: 0.75rem; padding: 8px; text-align: center; background: transparent; border: 2px solid #fff; color: #fff; display: flex; align-items: center; justify-content: center; border-radius: 8px;">Cadastrar</a>
            <a href="/produto/46" class="featured-link" style="flex: 1.2; font-size: 0.85rem; padding: 16px 18px; text-align: center; background: transparent; border: 2px solid #00ff41; color: #00ff41; display: flex; align-items: center; justify-content: center; border-radius: 10px; text-decoration: none; font-weight: 600; min-width: 120px;">Ver Produto</a>
          </div>
          <img src="/media/Samsung Galaxy Tab S6.png" alt="Samsung Galaxy Tab S6"/>
        </div>
        <div class="product-card dark">
          <h3><i class="fab fa-apple"></i> WATCH <span style="font-size:12px;">SERIES 8</span></h3>
          <p>Um salto de tecnologia</p>
          <div class="card-buttons" style="display: flex; gap: 8px; margin: 10px 0;">
            <a href="/Login" class="featured-link" style="flex: 1; background: linear-gradient(135deg, #00bfff, #4db5ff); color: #fff; font-size: 0.75rem; padding: 8px; text-align: center; display: flex; align-items: center; justify-content: center; gap: 5px; border-radius: 8px;">
              <i class="fas fa-shopping-cart"></i> Login
            </a>
            <a href="/Cadastro" class="featured-link" style="flex: 1; font-size: 0.75rem; padding: 8px; text-align: center; background: transparent; border: 2px solid #fff; color: #fff; display: flex; align-items: center; justify-content: center; border-radius: 8px;">Cadastrar</a>
            <a href="/produto/50" class="featured-link" style="flex: 1; font-size: 0.75rem; padding: 8px; text-align: center; background: rgba(255,255,255,0.1); border: 1px solid #ccc; color: #fff; display: flex; align-items: center; justify-content: center; border-radius: 8px; text-decoration: none;">Ver</a>
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
          <img src="/media/Explore_Nosso_Site_E_Descubra.png" alt="Mascote Index" style="max-width: 1150px; width: 100%; height: auto; display: block; margin: 12px auto;"/>
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
  <script>
    // Efeito de scroll no vídeo do iPhone
    window.addEventListener('scroll', function() {
      const video = document.getElementById('iphoneVideoScroll');
      if (!video) return;
      const rect = video.getBoundingClientRect();
      const windowHeight = window.innerHeight || document.documentElement.clientHeight;
      // Quanto do vídeo está visível na tela (0 = topo da tela, 1 = totalmente visível)
      let visible = 1 - Math.max(0, rect.top) / windowHeight;
      visible = Math.max(0, Math.min(1, visible));
      // Encurtamento máximo das laterais (em %)
      const maxInset = 20; // até 20% de cada lado
      const inset = maxInset * (1 - visible);
      video.style.clipPath = `inset(0% ${inset}% 0% ${inset}%)`;
      video.style.transition = 'clip-path 0.2s';
    });
  </script>
  <!-- Cursor Motion Blur Effect -->
  {{-- <link rel="stylesheet" href="/media/Cursor/EfeitoCursor/dist/style.css"> --}}
  {{-- <script src="/media/Cursor/EfeitoCursor/src/script.js" defer></script> --}}
  <!-- Elementos do efeito cursor -->
  {{-- <div id="cursor-blur-boxes">
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
  </div> --}}
  <!-- Fim Cursor Motion Blur Effect -->
  <!-- Modal de login obrigatório -->
  <div id="login-required-modal" class="login-modal-hidden">
    <div class="login-modal-content">
      <button class="login-modal-close" id="loginModalClose" title="Fechar">&times;</button>
      <div class="login-modal-icon"><i class="fa-solid fa-lock"></i></div>
  <h2 style="text-decoration: none;">Faça login para comprar</h2>
      <p>Você precisa estar logado para comprar um produto.</p>
      <div class="login-modal-actions">
        <a href="/login" class="login-modal-btn login">Fazer login</a>
        <a href="/cadastro" class="login-modal-btn cadastro">Cadastrar-se</a>
      </div>
    </div>
  </div>
  <style>
    #login-required-modal {
      position: fixed;
      top: 0; left: 0; width: 100vw; height: 100vh;
      background: rgba(0,0,0,0.55);
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 1000000;
      opacity: 0;
      pointer-events: none;
      transition: opacity 0.35s cubic-bezier(.4,0,.2,1);
    }
    #login-required-modal.login-modal-visible {
      opacity: 1;
      pointer-events: auto;
    }
    .login-modal-content {
      background: #181818;
      color: #fff;
      border-radius: 18px;
      box-shadow: 0 8px 32px rgba(0,0,0,0.28);
      padding: 38px 32px 28px 32px;
      min-width: 320px;
      max-width: 90vw;
      text-align: center;
      position: relative;
      transform: translateY(40px) scale(0.98);
      opacity: 0;
      transition: all 0.45s cubic-bezier(.4,0,.2,1);
      animation: modalIn 0.5s cubic-bezier(.4,0,.2,1) forwards;
    }
    #login-required-modal.login-modal-visible .login-modal-content {
      opacity: 1;
      transform: translateY(0) scale(1);
    }
    @keyframes modalIn {
      from { opacity: 0; transform: translateY(40px) scale(0.98); }
      to { opacity: 1; transform: translateY(0) scale(1); }
    }
    .login-modal-icon {
      font-size: 2.8rem;
      margin-bottom: 18px;
      color: #fff;
      background: #000;
      border-radius: 50%;
      width: 64px; height: 64px;
      display: flex; align-items: center; justify-content: center;
      margin-left: auto; margin-right: auto;
      box-shadow: 0 2px 12px 0 #0004;
      animation: iconPop 0.7s cubic-bezier(.4,0,.2,1);
    }
    @keyframes iconPop {
      0% { transform: scale(0.7); opacity: 0; }
      60% { transform: scale(1.15); opacity: 1; }
      100% { transform: scale(1); opacity: 1; }
    }
    .login-modal-content h2 {
      font-size: 1.4rem;
      font-weight: 700;
      margin-bottom: 10px;
      color: #fff;
      letter-spacing: 0.01em;
    }
    .login-modal-content p {
      color: #ccc;
      font-size: 1.05rem;
      margin-bottom: 22px;
    }
    .login-modal-actions {
      display: flex;
      gap: 16px;
      justify-content: center;
      margin-top: 10px;
    }
    .login-modal-btn {
      padding: 10px 28px;
      border-radius: 8px;
      font-weight: 700;
      font-size: 1rem;
      border: none;
      text-decoration: none;
      color: #fff;
      background: linear-gradient(90deg, #000 60%, #222 100%);
      box-shadow: 0 2px 8px 0 #0002;
      transition: background 0.2s, box-shadow 0.2s, color 0.2s, transform 0.2s;
      letter-spacing: 0.04em;
      display: inline-block;
    }
    .login-modal-btn.login {
      background: linear-gradient(90deg, #0078ff 60%, #00c6ff 100%);
      color: #fff;
    }
    .login-modal-btn.cadastro {
      background: linear-gradient(90deg, #000 60%, #222 100%);
      color: #fff;
    }
    .login-modal-btn:hover {
      filter: brightness(1.15);
      transform: scale(1.06);
      box-shadow: 0 4px 16px 0 #0078ff33;
    }
    .login-modal-close {
      position: absolute;
      top: 16px; right: 18px;
      background: none;
      border: none;
      color: #fff;
      font-size: 1.7rem;
      cursor: pointer;
      transition: color 0.2s, transform 0.2s;
      z-index: 2;
    }
    .login-modal-close:hover {
      color: #0078ff;
      transform: scale(1.2);
    }
    @media (max-width: 500px) {
      .login-modal-content {
        min-width: 0;
        width: 95vw;
        padding: 18px 4vw 18px 4vw;
      }
    }
  </style>
  <script>
    // Modal de login obrigatório
    document.addEventListener('DOMContentLoaded', function() {
      // Seleciona todos os botões "Comprar" da homepage sem cadastro
      document.querySelectorAll('.featured-link').forEach(function(btn) {
        btn.addEventListener('click', function(e) {
          e.preventDefault();
          const modal = document.getElementById('login-required-modal');
          modal.classList.add('login-modal-visible');
        });
      });
      // Fecha o modal ao clicar no X ou fora do conteúdo
      document.getElementById('loginModalClose').onclick = function() {
        document.getElementById('login-required-modal').classList.remove('login-modal-visible');
      };
      document.getElementById('login-required-modal').addEventListener('click', function(e) {
        if (e.target === this) {
          this.classList.remove('login-modal-visible');
        }
      });
    });
  </script>
@endsection