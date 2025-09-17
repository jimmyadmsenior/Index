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

@media (max-width: 768px) {
  .carrinho-vazio {
    padding: 60px 40px;
    margin: 0 16px;
  }
}
</style>
@endsection

@section('content')
<div class="carrinho-container">
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
</div>
@endsection
