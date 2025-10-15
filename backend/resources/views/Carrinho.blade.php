@extends('layouts.app')

@section('head')
  <link rel="stylesheet" href="/media/Css/Carrinho.css" />
@endsection

@section('content')
<div class="carrinho-main">
  <div class="carrinho-container">
    <h1 class="carrinho-title">Meu Carrinho</h1>
    
    <!-- Mensagens de sucesso/erro -->
    @if(session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif
    
    @if(session('error'))
      <div class="alert alert-error">
        {{ session('error') }}
      </div>
    @endif

    @if(empty($itens))
      <!-- Carrinho vazio -->
      <div class="carrinho-vazio">
        <div class="carrinho-vazio-icon">
          <i class="fas fa-shopping-cart"></i>
        </div>
        <h2>Seu carrinho está vazio</h2>
        <p>Que tal dar uma olhada em nossos produtos incríveis?<br>Encontre smartphones, tablets, fones e muito mais!</p>
        <a href="{{ route('carrinho.continuar') }}" class="btn-continuar-comprando">
          <i class="fas fa-arrow-left"></i>
          Continuar Comprando
        </a>
      </div>
    @else
      <!-- Carrinho com itens -->
      <div class="carrinho-layout">
        <div class="carrinho-itens">
          @foreach($itens as $item)
            <div class="carrinho-item">
              <img src="{{ $item['produto']->imagem ?? '/media/placeholder_produto.png' }}" 
                   alt="{{ $item['produto']->nome }}" 
                   class="item-imagem">
              
              <div class="item-info">
                <h3>{{ $item['produto']->nome }}</h3>
                <p>{{ $item['produto']->marca }}</p>
              </div>
              
              <div class="item-preco">
                R$ {{ number_format($item['produto']->preco, 2, ',', '.') }}
              </div>
              
              <div class="quantidade-controle">
                <form action="{{ route('carrinho.atualizar', $item['produto']->id) }}" method="POST" style="display: inline;">
                  @csrf
                  @method('PUT')
                  <input type="hidden" name="quantidade" value="{{ $item['quantidade'] - 1 }}">
                  <button type="submit" class="quantidade-btn">-</button>
                </form>
                
                <input type="number" value="{{ $item['quantidade'] }}" 
                       class="quantidade-input" min="1" readonly>
                
                <form action="{{ route('carrinho.atualizar', $item['produto']->id) }}" method="POST" style="display: inline;">
                  @csrf
                  @method('PUT')
                  <input type="hidden" name="quantidade" value="{{ $item['quantidade'] + 1 }}">
                  <button type="submit" class="quantidade-btn">+</button>
                </form>
              </div>
              
              <div class="item-controles">
                <form action="{{ route('carrinho.remover', $item['produto']->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn-remover" onclick="return confirm('Remover este item do carrinho?')">
                    <i class="fas fa-trash"></i>
                  </button>
                </form>
              </div>
            </div>
          @endforeach
        </div>

        <!-- Resumo do carrinho -->
        <div class="carrinho-resumo">
          <h3 style="margin-bottom: 20px; color: #fff;">Resumo do Pedido</h3>
          
          <div class="resumo-linha">
            <span>Subtotal ({{ count($itens) }} {{ count($itens) > 1 ? 'itens' : 'item' }}):</span>
            <span>R$ {{ number_format($total, 2, ',', '.') }}</span>
          </div>
          
          <div class="resumo-linha">
            <span>Frete:</span>
            <span style="color: #7fff7f;">Grátis</span>
          </div>
          
          <div class="resumo-total">
            <span>Total:</span>
            <span>R$ {{ number_format($total, 2, ',', '.') }}</span>
          </div>
          
          <!-- Botões de ação principais -->
          <div style="display: flex; flex-direction: column; gap: 15px; margin-top: 20px;">
            <!-- Botão principal de finalizar -->
            <a href="{{ route('carrinho.finalizar') }}" class="btn-finalizar" style="display: flex; align-items: center; justify-content: center; gap: 8px; padding: 16px; background: linear-gradient(135deg, #00bfff, #4db5ff); color: #fff; text-decoration: none; border-radius: 12px; font-weight: 600; font-size: 1.1rem;">
              <i class="fas fa-credit-card"></i>
              Finalizar Compra
            </a>
            
            <!-- Botões secundários -->
            <div style="display: flex; gap: 10px; align-items: stretch;">
              <a href="{{ route('carrinho.continuar') }}" class="btn-continuar-comprando" style="flex: 1; display: flex; align-items: center; justify-content: center; gap: 8px; text-decoration: none; padding: 12px; background: transparent; border: 2px solid #fff; color: #fff; border-radius: 8px; font-weight: 500; min-height: 48px; box-sizing: border-box;">
                <i class="fas fa-arrow-left"></i>
                Continuar Comprando
              </a>
              
              <form action="{{ route('carrinho.limpar') }}" method="POST" style="flex: 1; display: flex;">
                @csrf
                <button type="submit" class="btn-limpar" onclick="return confirm('Limpar todo o carrinho?')" style="width: 100%; min-height: 48px; padding: 12px; background: transparent; border: 2px solid #ff6b6b; color: #ff6b6b; border-radius: 8px; font-weight: 500; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 8px; box-sizing: border-box; font-family: inherit;">
                  <i class="fas fa-trash"></i>
                  Limpar Carrinho
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    @endif
  </div>
</div>
@endsection
