@extends('layouts.app')
@section('head')
<style>
html { margin: 0 !important; padding: 0 !important; border: none !important; box-shadow: none !important; }
body { margin: 0 !important; padding: 0 !important; }
main.main-homepage { padding: 0 !important; margin: 0 !important; }
header, nav, .menu li a, .icons i, .navbar-btn, .navbar-btn-perfil {
  background: #111 !important;
  color: #fff !important;
  border: none !important;
  box-shadow: none !important;
  border-radius: 0 !important;
}
/* Garantir que os botões de login e cadastro mantenham suas bordas */
.navbar-btn-login, .navbar-btn-cadastro {
  background: #111 !important;
  color: #fff !important;
  border: 1.5px solid #fff !important;
  box-shadow: none !important;
  border-radius: 10px !important;
  padding: 7px 22px !important;
  font-weight: 600 !important;
}
header {
  margin: 0 !important;
  padding: 0 !important;
  background: #111 !important;
  box-shadow: none !important;
  border: none !important;
  border-radius: 0 !important;
  position: relative;
  top: 0;
  left: 0;
  right: 0;
  z-index: 1000;
}
.menu li a { text-decoration: none !important; }

.comprar-btn {
  cursor: pointer;
  transition: all 0.4s ease;
  position: relative;
  overflow: hidden;
}
.comprar-btn:hover {
  transform: translateY(-3px) scale(1.02);
}
.comprar-btn:active {
  transform: translateY(-1px) scale(0.98);
}

/* Melhor espaçamento entre seções */
.hero-section {
  margin-bottom: 60px;
}
.galaxy-tab-a-banner {
  margin-top: 80px;
  margin-bottom: 60px;
}
</style>
@endsection
@section('content')

<main class="main-homepage">
  <section class="hero-section" style="display: flex; flex-direction: column; align-items: center; justify-content: center; width: 100%; background: #000; padding: 0; margin: 0 0 24px 0;">
    <h1 class="hero-title geoform-text" style="font-size: 4.2rem; font-weight: bold; margin-bottom: 18px; color: #fff; letter-spacing: 1px; text-align: center;">Galaxy Tab S9 Ultra</h1>
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
    @auth
        <div style="display: flex; gap: 20px; justify-content: center; align-items: center; flex-wrap: wrap;">
            <form action="{{ route('carrinho.adicionar') }}" method="POST" style="display: inline-block;">
                @csrf
                <input type="hidden" name="produto_id" value="39">
                <input type="hidden" name="quantidade" value="1">
                <button type="submit" class="comprar-btn" style="background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%); color: white; padding: 1.2rem 3rem; border-radius: 3rem; font-size: 1.3rem; font-weight: 700; border: none; cursor: pointer; transition: all 0.4s ease; box-shadow: 0 8px 32px rgba(37, 99, 235, 0.4); letter-spacing: 1px;">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 8px; display: inline-block; vertical-align: middle;">
                        <path d="M9 12l2 2 4-4"/>
                        <circle cx="12" cy="12" r="9"/>
                    </svg>
                    ADICIONAR AO CARRINHO
                </button>
            </form>
            <a href="/produto/39" class="comprar-btn" style="background: linear-gradient(135deg, #00ff41 0%, #00cc33 100%); color: #000; padding: 1.2rem 3rem; border-radius: 3rem; font-size: 1.3rem; font-weight: 700; text-decoration: none; display: inline-block; transition: all 0.4s ease; box-shadow: 0 8px 32px rgba(0, 255, 65, 0.4); letter-spacing: 1px;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 8px; display: inline-block; vertical-align: middle;">
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                    <circle cx="12" cy="12" r="3"/>
                </svg>
                VER PRODUTO
            </a>
        </div>
    @else
        <div style="display: flex; gap: 20px; justify-content: center; align-items: center; flex-wrap: wrap;">
            <a href="/Login" class="comprar-btn" style="background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%); color: white; padding: 1.2rem 3rem; border-radius: 3rem; font-size: 1.3rem; font-weight: 700; text-decoration: none; display: inline-block; transition: all 0.4s ease; box-shadow: 0 8px 32px rgba(220, 38, 38, 0.4); letter-spacing: 1px;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 8px; display: inline-block; vertical-align: middle;">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                    <circle cx="12" cy="7" r="4"/>
                </svg>
                FAÇA LOGIN PARA COMPRAR
            </a>
            <a href="/produto/39" class="comprar-btn" style="background: linear-gradient(135deg, #00ff41 0%, #00cc33 100%); color: #000; padding: 1.2rem 3rem; border-radius: 3rem; font-size: 1.3rem; font-weight: 700; text-decoration: none; display: inline-block; transition: all 0.4s ease; box-shadow: 0 8px 32px rgba(0, 255, 65, 0.4); letter-spacing: 1px;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 8px; display: inline-block; vertical-align: middle;">
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                    <circle cx="12" cy="12" r="3"/>
                </svg>
                VER PRODUTO
            </a>
        </div>
    @endauth
    <div style="width: 100%; display: flex; justify-content: center; align-items: center;">
      <img src="/media/Group 6.png" alt="Banner" class="group6-img" style="width: 100%; max-width: 1100px; height: auto; display: block; object-fit: contain; background: #000; margin: 0 auto; filter: none !important; mix-blend-mode: normal !important;" />
    </div>
  </section>

  {{-- Barra de Pesquisa de Tablets movida para baixo da imagem --}}
  @include('partials.product-search', ['categoria' => 'Tablets'])

  <!-- Carrossel de Tablets Moderno -->
  <section class="tablets-showcase">
    <style>
      .tablets-showcase {
        max-width: 1400px;
        margin: 80px auto;
        padding: 0 20px;
        position: relative;
      }
      
      .carousel-container {
        background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
        border-radius: 32px;
        padding: 60px 40px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.4);
        position: relative;
        overflow: hidden;
      }
      
      .carousel-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, transparent 30%, rgba(255,255,255,0.02) 50%, transparent 70%);
        pointer-events: none;
      }
      
      .carousel-title {
        text-align: center;
        color: #fff;
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 50px;
        text-shadow: 0 4px 20px rgba(0,0,0,0.3);
      }
      
      .tablets-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 40px;
        max-width: 1200px;
        margin: 0 auto;
      }
      
      .tablet-card {
        background: rgba(255,255,255,0.95);
        border-radius: 24px;
        padding: 40px 30px;
        text-align: center;
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255,255,255,0.2);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
      }
      
      .tablet-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: left 0.5s;
      }
      
      .tablet-card:hover::before {
        left: 100%;
      }
      
      .tablet-card:hover {
        transform: translateY(-12px);
        box-shadow: 0 25px 50px rgba(0,0,0,0.2);
        border-color: rgba(255,255,255,0.3);
      }
      
      .tablet-image {
        width: 140px;
        height: 140px;
        object-fit: contain;
        margin: 0 auto 25px auto;
        border-radius: 20px;
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        padding: 15px;
        box-shadow: 0 8px 32px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
      }
      
      .tablet-card:hover .tablet-image {
        transform: scale(1.05);
      }
      
      .tablet-name {
        font-size: 1.4rem;
        font-weight: 700;
        color: #1a1a2e;
        margin-bottom: 12px;
        line-height: 1.3;
      }
      
      .tablet-price {
        font-size: 1.2rem;
        font-weight: 600;
        color: #2563eb;
        margin-bottom: 25px;
      }
      
      .tablet-actions {
        display: flex;
        gap: 12px;
        justify-content: center;
        align-items: center;
      }
      
      .action-btn {
        padding: 14px 24px;
        border-radius: 16px;
        font-weight: 600;
        font-size: 0.9rem;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 8px;
        min-width: 120px;
        justify-content: center;
      }
      
      .btn-cart {
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        color: white;
        flex: 1.2;
      }
      
      .btn-cart:hover {
        background: linear-gradient(135deg, #1d4ed8, #1e40af);
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(37, 99, 235, 0.4);
      }
      
      .btn-view {
        background: linear-gradient(135deg, #00ff41, #00cc33);
        color: #000;
        flex: 1;
      }
      
      .btn-view:hover {
        background: linear-gradient(135deg, #00cc33, #009926);
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 255, 65, 0.4);
      }
      
      .btn-login {
        background: linear-gradient(135deg, #dc2626, #b91c1c);
        color: white;
        flex: 1.2;
      }
      
      .btn-login:hover {
        background: linear-gradient(135deg, #b91c1c, #991b1b);
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(220, 38, 38, 0.4);
      }
      
      @media (max-width: 768px) {
        .tablets-grid {
          grid-template-columns: 1fr;
          gap: 30px;
        }
        
        .carousel-container {
          padding: 40px 20px;
        }
        
        .tablet-actions {
          flex-direction: column;
        }
        
        .action-btn {
          min-width: auto;
          width: 100%;
        }
        
        .carousel-title {
          font-size: 2rem;
        }
      }
    </style>
    
    <div class="carousel-container">
      <h2 class="carousel-title">Coleção Premium de Tablets</h2>
      
      <div class="tablets-grid">
        <!-- iPad Pro -->
        <div class="tablet-card">
          <img src="/media/ipad_pro.png" alt="iPad Pro" class="tablet-image">
          <h3 class="tablet-name">Apple iPad Pro</h3>
          <div class="tablet-price">R$ 13.999,00</div>
          <div class="tablet-actions">
            @auth
              <form action="{{ route('carrinho.adicionar') }}" method="POST" style="flex: 1.2;">
                @csrf
                <input type="hidden" name="produto_id" value="33">
                <input type="hidden" name="quantidade" value="1">
                <button type="submit" class="action-btn btn-cart">
                  <i class="fas fa-shopping-cart"></i>
                  Adicionar
                </button>
              </form>
            @else
              <a href="/Login" class="action-btn btn-login" style="flex: 1.2;">
                <i class="fas fa-user"></i>
                Login
              </a>
            @endauth
            <a href="/produto/33" class="action-btn btn-view">
              <i class="fas fa-eye"></i>
              Ver Produto
            </a>
          </div>
        </div>

        <!-- iPad Air -->
        <div class="tablet-card">
          <img src="/media/ipad_air.png" alt="iPad Air" class="tablet-image">
          <h3 class="tablet-name">Apple iPad Air</h3>
          <div class="tablet-price">R$ 8.999,00</div>
          <div class="tablet-actions">
            @auth
              <form action="{{ route('carrinho.adicionar') }}" method="POST" style="flex: 1.2;">
                @csrf
                <input type="hidden" name="produto_id" value="35">
                <input type="hidden" name="quantidade" value="1">
                <button type="submit" class="action-btn btn-cart">
                  <i class="fas fa-shopping-cart"></i>
                  Adicionar
                </button>
              </form>
            @else
              <a href="/Login" class="action-btn btn-login" style="flex: 1.2;">
                <i class="fas fa-user"></i>
                Login
              </a>
            @endauth
            <a href="/produto/35" class="action-btn btn-view">
              <i class="fas fa-eye"></i>
              Ver Produto
            </a>
          </div>
        </div>

        <!-- iPad Mini -->
        <div class="tablet-card">
          <img src="/media/Ipad_mini.png" alt="iPad Mini" class="tablet-image">
          <h3 class="tablet-name">Apple iPad Mini</h3>
          <div class="tablet-price">R$ 5.499,00</div>
          <div class="tablet-actions">
            @auth
              <form action="{{ route('carrinho.adicionar') }}" method="POST" style="flex: 1.2;">
                @csrf
                <input type="hidden" name="produto_id" value="38">
                <input type="hidden" name="quantidade" value="1">
                <button type="submit" class="action-btn btn-cart">
                  <i class="fas fa-shopping-cart"></i>
                  Adicionar
                </button>
              </form>
            @else
              <a href="/Login" class="action-btn btn-login" style="flex: 1.2;">
                <i class="fas fa-user"></i>
                Login
              </a>
            @endauth
            <a href="/produto/38" class="action-btn btn-view">
              <i class="fas fa-eye"></i>
              Ver Produto
            </a>
          </div>
        </div>

        <!-- Galaxy Tab S9 Ultra -->
        <div class="tablet-card">
          <img src="/media/Galaxy_tab.png" alt="Galaxy Tab S9 Ultra" class="tablet-image">
          <h3 class="tablet-name">Samsung Galaxy Tab S9 Ultra</h3>
          <div class="tablet-price">R$ 7.999,00</div>
          <div class="tablet-actions">
            @auth
              <form action="{{ route('carrinho.adicionar') }}" method="POST" style="flex: 1.2;">
                @csrf
                <input type="hidden" name="produto_id" value="39">
                <input type="hidden" name="quantidade" value="1">
                <button type="submit" class="action-btn btn-cart">
                  <i class="fas fa-shopping-cart"></i>
                  Adicionar
                </button>
              </form>
            @else
              <a href="/Login" class="action-btn btn-login" style="flex: 1.2;">
                <i class="fas fa-user"></i>
                Login
              </a>
            @endauth
            <a href="/produto/39" class="action-btn btn-view">
              <i class="fas fa-eye"></i>
              Ver Produto
            </a>
          </div>
        </div>

        <!-- Galaxy Tab FE -->
        <div class="tablet-card">
          <img src="/media/Galaxy_tab_fe.png" alt="Galaxy Tab FE" class="tablet-image">
          <h3 class="tablet-name">Samsung Galaxy Tab FE</h3>
          <div class="tablet-price">R$ 3.999,00</div>
          <div class="tablet-actions">
            @auth
              <form action="{{ route('carrinho.adicionar') }}" method="POST" style="flex: 1.2;">
                @csrf
                <input type="hidden" name="produto_id" value="43">
                <input type="hidden" name="quantidade" value="1">
                <button type="submit" class="action-btn btn-cart">
                  <i class="fas fa-shopping-cart"></i>
                  Adicionar
                </button>
              </form>
            @else
              <a href="/Login" class="action-btn btn-login" style="flex: 1.2;">
                <i class="fas fa-user"></i>
                Login
              </a>
            @endauth
            <a href="/produto/43" class="action-btn btn-view">
              <i class="fas fa-eye"></i>
              Ver Produto
            </a>
          </div>
        </div>

        <!-- Galaxy Tab S6 -->
        <div class="tablet-card">
          <img src="/media/Samsung Galaxy Tab S6.png" alt="Galaxy Tab S6" class="tablet-image">
          <h3 class="tablet-name">Samsung Galaxy Tab S6</h3>
          <div class="tablet-price">R$ 2.999,00</div>
          <div class="tablet-actions">
            @auth
              <form action="{{ route('carrinho.adicionar') }}" method="POST" style="flex: 1.2;">
                @csrf
                <input type="hidden" name="produto_id" value="46">
                <input type="hidden" name="quantidade" value="1">
                <button type="submit" class="action-btn btn-cart">
                  <i class="fas fa-shopping-cart"></i>
                  Adicionar
                </button>
              </form>
            @else
              <a href="/Login" class="action-btn btn-login" style="flex: 1.2;">
                <i class="fas fa-user"></i>
                Login
              </a>
            @endauth
            <a href="/produto/46" class="action-btn btn-view">
              <i class="fas fa-eye"></i>
              Ver Produto
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Seção: Destaque Galaxy Tab A -->
  <section class="galaxy-tab-a-banner" style="background: #000; width: 100vw; display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 0; position: relative; min-height: 700px;">
    <div style="position: relative; width: 100vw; height: 700px; max-width: 100vw; min-height: 700px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
      <img src="/media/selecao de tablets.png" alt="Samsung Galaxy Tab A" style="position: absolute; left: 0; top: 0; width: 100vw; height: 700px; max-width: 100vw; max-height: 100%; min-width: 0; min-height: 0; margin: 0; display: block; object-fit: cover; background: transparent; z-index: 2;" />
      <div style="position: absolute; left: 0; right: 0; top: 50%; transform: translateY(-50%); z-index: 3; text-align: center;">
        <h2 class="geoform-text" style="font-size: 4.2rem; font-weight: bold; color: #fff; margin-bottom: 32px; line-height: 1.1; text-shadow: 0 2px 12px rgba(0,0,0,0.35);">Samsung Galaxy<br>Tab A</h2>
        <div style="display: flex; gap: 20px; justify-content: center; align-items: center; flex-wrap: wrap;">
          @auth
              <form action="{{ route('carrinho.adicionar') }}" method="POST" style="display: inline-block;">
                  @csrf
                  <input type="hidden" name="produto_id" value="44">
                  <input type="hidden" name="quantidade" value="1">
                  <button type="submit" class="comprar-btn" style="background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%); color: white; padding: 1.2rem 3rem; border-radius: 3rem; font-size: 1.4rem; font-weight: 700; border: none; cursor: pointer; transition: all 0.4s ease; box-shadow: 0 12px 40px rgba(37, 99, 235, 0.5); letter-spacing: 1px;" onmouseover="this.style.transform='translateY(-3px) scale(1.02)'; this.style.boxShadow='0 16px 48px rgba(37, 99, 235, 0.7)';" onmouseout="this.style.transform='translateY(0) scale(1)'; this.style.boxShadow='0 12px 40px rgba(37, 99, 235, 0.5)';">
                      <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 10px; display: inline-block; vertical-align: middle;">
                          <path d="M9 12l2 2 4-4"/>
                          <circle cx="12" cy="12" r="9"/>
                      </svg>
                      ADICIONAR AO CARRINHO
                  </button>
              </form>
          @else
              <a href="/Login" class="comprar-btn" style="background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%); color: white; padding: 1.2rem 3rem; border-radius: 3rem; font-size: 1.4rem; font-weight: 700; text-decoration: none; display: inline-block; transition: all 0.4s ease; box-shadow: 0 12px 40px rgba(220, 38, 38, 0.5); letter-spacing: 1px;" onmouseover="this.style.transform='translateY(-3px) scale(1.02)'; this.style.boxShadow='0 16px 48px rgba(220, 38, 38, 0.7)';" onmouseout="this.style.transform='translateY(0) scale(1)'; this.style.boxShadow='0 12px 40px rgba(220, 38, 38, 0.5)';">
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 10px; display: inline-block; vertical-align: middle;">
                      <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                      <circle cx="12" cy="7" r="4"/>
                  </svg>
                  FAÇA LOGIN PARA COMPRAR
              </a>
          @endauth
          <a href="/produto/44" class="comprar-btn" style="background: linear-gradient(135deg, #00ff41 0%, #00cc33 100%); color: #000; padding: 1.2rem 3rem; border-radius: 3rem; font-size: 1.4rem; font-weight: 700; text-decoration: none; display: inline-block; transition: all 0.4s ease; letter-spacing: 1px; box-shadow: 0 12px 40px rgba(0, 255, 65, 0.4);" onmouseover="this.style.background='linear-gradient(135deg, #00ff00 0%, #00bb22 100%)'; this.style.transform='translateY(-3px) scale(1.02)'; this.style.boxShadow='0 16px 48px rgba(0, 255, 65, 0.6)';" onmouseout="this.style.background='linear-gradient(135deg, #00ff41 0%, #00cc33 100%)'; this.style.transform='translateY(0) scale(1)'; this.style.boxShadow='0 12px 40px rgba(0, 255, 65, 0.4)';">
              VER PRODUTO
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Seção: Explore nosso site -->
  <section class="explore-section" style="margin: 100px 0 80px 0; padding: 40px 0;">
    <div class="explore-banner">
      <div class="explore-text">
        <h2>Explore nosso site e descubra o luxo</h2>
      </div>
      <div class="explore-img">
        <img src="/media/Imagem Ana.png" alt="Mascote Index"/>
      </div>
    </div>
  </section>
</main>

<script>
function adicionarAoCarrinho(produto) {
  // Redireciona diretamente para a página do produto específico
  if (produto === 'galaxy-tab-s9-ultra') {
    // Galaxy Tab S9 Ultra tem ID 39
    window.location.href = '/produto/39';
  } else if (produto === 'galaxy-tab-a') {
    // Galaxy Tab A9+ tem ID 44
    window.location.href = '/produto/44';
  } else {
    // Fallback para página de carrinho
    window.location.href = '/carrinho';
  }
}
</script>

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


