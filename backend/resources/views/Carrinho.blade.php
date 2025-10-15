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
        <a href="/" class="btn-continuar-comprando">
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
          
          <button class="btn-finalizar" onclick="window.location.href='/Carrinho_Pagamento?total={{ $total }}'">
            <i class="fas fa-credit-card"></i>
            Finalizar Compra
          </button>
          
          <form action="{{ route('carrinho.limpar') }}" method="POST">
            @csrf
            <button type="submit" class="btn-limpar" onclick="return confirm('Limpar todo o carrinho?')">
              Limpar Carrinho
            </button>
          </form>
          
          <a href="/" class="btn-continuar-comprando" style="margin-top: 15px; display: inline-flex; width: 100%; justify-content: center; text-decoration: none; padding: 12px;">
            <i class="fas fa-arrow-left"></i>
            Continuar Comprando
          </a>
        </div>
      </div>
    @endif
  </div>
</div>
@endsection
