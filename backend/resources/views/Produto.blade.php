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
      <div class="produto-entrega">
        <div style="display:flex;align-items:center;gap:10px;margin-bottom:8px;">
          <span style="font-size:1.5em;">
            <i class="fas fa-truck" style="color:#fff;"></i>
          </span>
          <span style="font-weight:600;color:#fff;">Entrega:</span>
        </div>
  <div style="margin-bottom:6px;color:#fff;">Em estoque<br>Frete grátis</div>
        <div style="margin-bottom:8px;">
          <label for="cep-input" style="font-weight:500;color:#fff;">Calcule o prazo e valor de entrega:</label><br>
          <input type="text" id="cep-input" maxlength="9" placeholder="Digite seu CEP" style="padding:6px 12px;border-radius:8px;border:1px solid #fff;width:140px;margin-top:6px;background:#222;color:#fff;">
          <button onclick="calcularFrete()" style="padding:6px 16px;border-radius:8px;border:none;background:#222;color:#fff;font-weight:600;margin-left:8px;cursor:pointer;">Calcular</button>
        </div>
    <div id="frete-resultado" style="margin-top:8px;font-size:1.08em;color:#fff;"></div>
      </div>
      <a href="/Carrinho_Pagamento?produto_id={{ $produto->id }}" class="btn-comprar verification-btn-adm">Comprar</a>
    </div>
    </div>
  </div>
<script>
// Função para consultar ViaCEP e Correios (exemplo de simulação de frete)
function calcularFrete() {
  const cep = document.getElementById('cep-input').value.replace(/\D/g, '');
  const resultado = document.getElementById('frete-resultado');
  resultado.innerHTML = '';
  if (cep.length !== 8) {
    resultado.innerHTML = '<span style="color:#ff5252;">CEP inválido. Digite 8 dígitos.</span>';
    return;
  }
  resultado.innerHTML = 'Consultando...';
  // Consulta ViaCEP para validar CEP
  fetch('https://viacep.com.br/ws/' + cep + '/json/')
    .then(res => res.json())
    .then(data => {
      if (data.erro) {
        resultado.innerHTML = '<span style="color:#ff5252;">CEP não encontrado.</span>';
        return;
      }
      // Simulação de consulta Correios (substitua por API real se desejar)
      // Exemplo: prazo 3-7 dias úteis, valor R$ 29,90 (pode variar por estado)
      let prazo = Math.floor(Math.random() * 5) + 3; // 3 a 7 dias
      let valor = 0; // Frete grátis
      resultado.innerHTML = `<span style="color:#fff;font-weight:600;">Entrega para ${data.localidade} - ${data.uf}</span><br>
        <span style="color:#fff;">Prazo estimado: <strong>${prazo} dias úteis</strong></span><br>
        <span style="color:#7fff7f;font-weight:600;">Frete: <strong>Grátis</strong></span>`;
    })
    .catch(() => {
      resultado.innerHTML = '<span style="color:#ff5252;">Erro ao consultar CEP.</span>';
    });
}
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
