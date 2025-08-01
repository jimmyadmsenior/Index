@extends('layouts.app')
@section('head')
@endsection
@section('content')
<main class="produto-main">
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
</main>
<script>
function toggleDescricao(id) {
  const desc = document.getElementById(id);
  desc.classList.toggle('aberta');
}
</script>
@endsection
