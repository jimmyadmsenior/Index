@extends('layouts.app')

@section('head')
<style>
header, nav, .menu li a, .icons i, .navbar-btn, .navbar-btn-login, .navbar-btn-cadastro, .navbar-btn-perfil {
  background: #111 !important;
  color: #fff !important;
  border: none !important;
}
.menu li a { text-decoration: none !important; }

.carrinho-container {
  background: #0d0d0d;
  min-height: 100vh;
  padding: 80px 20px 60px 20px;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.carrinho-header {
  text-align: center;
  margin-bottom: 60px;
}

.carrinho-title {
  color: #fff;
  font-size: 3.5rem;
  font-weight: 800;
  margin-bottom: 16px;
  letter-spacing: 1px;
}

.carrinho-subtitle {
  color: #999;
  font-size: 1.2rem;
  font-weight: 400;
}

.carrinho-vazio {
  background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
  border-radius: 24px;
  padding: 80px 60px;
  text-align: center;
  box-shadow: 0 8px 32px rgba(0,0,0,0.3);
  border: 1px solid #333;
  max-width: 600px;
  width: 100%;
}

.carrinho-vazio-icon {
  font-size: 4rem;
  color: #666;
  margin-bottom: 32px;
}

.carrinho-vazio-title {
  color: #fff;
  font-size: 2.2rem;
  font-weight: 700;
  margin-bottom: 16px;
}

.carrinho-vazio-text {
  color: #aaa;
  font-size: 1.1rem;
  margin-bottom: 40px;
  line-height: 1.5;
}

.btn-voltar-loja {
  display: inline-flex;
  align-items: center;
  gap: 12px;
  padding: 16px 40px;
  background: linear-gradient(135deg, #2e8fff 0%, #1a73e8 100%);
  color: #fff;
  text-decoration: none;
  border-radius: 12px;
  font-weight: 700;
  font-size: 1.1rem;
  transition: all 0.3s ease;
  box-shadow: 0 4px 16px rgba(46, 143, 255, 0.3);
  letter-spacing: 0.5px;
}

.btn-voltar-loja:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 24px rgba(46, 143, 255, 0.4);
  background: linear-gradient(135deg, #1a73e8 0%, #2e8fff 100%);
}

.btn-voltar-loja:active {
  transform: translateY(0px);
}

.carrinho-sugestoes {
  margin-top: 80px;
  text-align: center;
  max-width: 800px;
  width: 100%;
}

.sugestoes-title {
  color: #fff;
  font-size: 2rem;
  font-weight: 700;
  margin-bottom: 32px;
}

.sugestoes-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 24px;
  margin-top: 32px;
}

.sugestao-card {
  background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
  border-radius: 16px;
  padding: 24px;
  text-decoration: none;
  transition: all 0.3s ease;
  border: 1px solid #333;
  text-align: center;
}

.sugestao-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 8px 32px rgba(46, 143, 255, 0.2);
  border-color: #2e8fff;
}

.sugestao-icon {
  font-size: 2.5rem;
  color: #2e8fff;
  margin-bottom: 16px;
}

.sugestao-title {
  color: #fff;
  font-size: 1.1rem;
  font-weight: 600;
  margin-bottom: 8px;
}

.sugestao-desc {
  color: #aaa;
  font-size: 0.9rem;
}

@media (max-width: 768px) {
  .carrinho-vazio {
    padding: 60px 40px;
    margin: 0 16px;
  }
  
  .carrinho-title {
    font-size: 2.8rem;
  }
  
  .sugestoes-grid {
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    gap: 16px;
  }
}
</style>
@endsection

@section('content')
<div class="carrinho-container">
    <div class="carrinho-header">
        <h1 class="carrinho-title">Seu Carrinho</h1>
        <p class="carrinho-subtitle">Gerencie seus produtos selecionados</p>
    </div>

    <div class="carrinho-vazio">
        <div class="carrinho-vazio-icon">
            <i class="fas fa-shopping-bag"></i>
        </div>
        <h2 class="carrinho-vazio-title">Carrinho Vazio</h2>
        <p class="carrinho-vazio-text">
            Parece que você ainda não adicionou nenhum produto ao seu carrinho.<br>
            Que tal explorar nossa incrível seleção de produtos?
        </p>
        <a href="/Homepage_Com_Cadastro" class="btn-voltar-loja">
            <i class="fas fa-store"></i>
            Explorar Produtos
        </a>
    </div>

    <div class="carrinho-sugestoes">
        <h2 class="sugestoes-title">Explore por Categoria</h2>
        <div class="sugestoes-grid">
            <a href="/Homepage_Smartphones" class="sugestao-card">
                <div class="sugestao-icon">
                    <i class="fas fa-mobile-alt"></i>
                </div>
                <h3 class="sugestao-title">Smartphones</h3>
                <p class="sugestao-desc">iPhone e Galaxy</p>
            </a>
            <a href="/Homepage_Tablets" class="sugestao-card">
                <div class="sugestao-icon">
                    <i class="fas fa-tablet-alt"></i>
                </div>
                <h3 class="sugestao-title">Tablets</h3>
                <p class="sugestao-desc">iPad e Galaxy Tab</p>
            </a>
            <a href="/Homepage_Fones" class="sugestao-card">
                <div class="sugestao-icon">
                    <i class="fas fa-headphones"></i>
                </div>
                <h3 class="sugestao-title">Fones</h3>
                <p class="sugestao-desc">AirPods e Galaxy Buds</p>
            </a>
            <a href="/Homepage_Notebooks" class="sugestao-card">
                <div class="sugestao-icon">
                    <i class="fas fa-laptop"></i>
                </div>
                <h3 class="sugestao-title">Notebooks</h3>
                <p class="sugestao-desc">MacBook e Galaxy Book</p>
            </a>
        </div>
    </div>
</div>
@endsection
