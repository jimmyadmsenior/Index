@extends('layouts.app')
@section('head')
  <link rel="stylesheet" href="/media/Css/Produto.css" />
@endsection
@section('content')
  <div class="produto-main">
    <div class="produto-container">
      <div class="produto-foto">
      <img src="{{ $produto->imagem ?? '/media/placeholder_produto.png' }}" alt="{{ $produto->nome }}">
    </div>
    <div class="produto-info">
      <h1 class="produto-nome">{{ $produto->nome }}</h1>
      <div class="sobre-col">
        <button class="sobre-toggle" onclick="toggleDescricao('descricao-modelo')">Sobre o modelo <i class='fas fa-chevron-down'></i></button>
        <div id="descricao-modelo" class="descricao-produto">
          <p>{{ $produto->descricao_modelo ?? 'Informações detalhadas sobre o modelo.' }}</p>
        </div>
        <button class="sobre-toggle" onclick="toggleDescricao('descricao-marca')">Sobre a marca <i class='fas fa-chevron-down'></i></button>
        <div id="descricao-marca" class="descricao-produto">
          <p>{{ $produto->descricao_marca ?? 'Informações detalhadas sobre a marca.' }}</p>
        </div>
        <button class="sobre-toggle" onclick="toggleDescricao('descricao-produto')">Sobre o produto <i class='fas fa-chevron-down'></i></button>
        <div id="descricao-produto" class="descricao-produto">
          <p class="produto-descricao">{{ $produto->descricao }}</p>
        </div>
      </div>
      <p class="produto-preco">
        <strong>Preço:</strong>
        <span style="text-decoration:line-through;color:#ff5252;font-weight:600;"> R$ {{ number_format($produto->preco_original ?? $produto->preco * 1.33, 2, ',', '.') }}</span>
        <span style="color:#ffffff;font-size:1.3em;font-weight:bold;"> por R$ {{ number_format($produto->preco, 2, ',', '.') }}</span>
        <br>
        <span style="color:#7fff7f;font-size:1em;font-weight:600;">à vista: R$ {{ number_format($produto->preco * 0.95, 2, ',', '.') }} (5% OFF)</span>
      </p>
      <a href="/Carrinho_Pagamento?produto_id={{ $produto->id }}" class="btn-comprar verification-btn-adm">Comprar</a>
    </div>
    </div>
  </div>
<script>
function toggleDescricao(id) {
  const desc = document.getElementById(id);
  const button = document.querySelector(`[onclick="toggleDescricao('${id}')"]`);
  const icon = button.querySelector('i');
  
  // Toggle the description
  desc.classList.toggle('aberta');
  
  // Toggle button active state
  button.classList.toggle('active');
  
  // Rotate icon
  if (desc.classList.contains('aberta')) {
    icon.style.transform = 'rotate(180deg)';
  } else {
    icon.style.transform = 'rotate(0deg)';
  }
}

// Add smooth scrolling and entrance animations
document.addEventListener('DOMContentLoaded', function() {
  // Add staggered animations to product info elements
  const infoElements = document.querySelectorAll('.produto-info > *');
  infoElements.forEach((element, index) => {
    element.style.animationDelay = `${(index + 1) * 0.1}s`;
  });
  
  // Add loading animation to product image
  const productImage = document.querySelector('.produto-foto img');
  if (productImage) {
    productImage.addEventListener('load', function() {
      this.style.opacity = '1';
    });
  }
  
  // Add click animation to buy button
  const buyButton = document.querySelector('.btn-comprar');
  if (buyButton) {
    buyButton.addEventListener('click', function(e) {
      // Create ripple effect
      const ripple = document.createElement('div');
      const rect = this.getBoundingClientRect();
      const size = Math.max(rect.width, rect.height);
      const x = e.clientX - rect.left - size / 2;
      const y = e.clientY - rect.top - size / 2;
      
      ripple.style.cssText = `
        position: absolute;
        width: ${size}px;
        height: ${size}px;
        left: ${x}px;
        top: ${y}px;
        background: rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        transform: scale(0);
        animation: ripple 0.6s ease-out;
        pointer-events: none;
      `;
      
      this.appendChild(ripple);
      
      setTimeout(() => {
        ripple.remove();
      }, 600);
    });
  }
});

// Add CSS for ripple animation
const style = document.createElement('style');
style.textContent = `
  @keyframes ripple {
    to {
      transform: scale(2);
      opacity: 0;
    }
  }
`;
document.head.appendChild(style);
</script>
@endsection
