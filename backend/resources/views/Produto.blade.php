@extends('layouts.app')
@section('head')
@endsection
@section('content')
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $produto->nome ?? 'Produto' }}</title>
  <link rel="icon" type="image/png" href="/media/Ícone_Guia_Navegador_Site.png">
  <link rel="stylesheet" href="/media/Css/Produto.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <style>
    .verification-btn-adm {
      display: inline-block;
      padding: 18px 40px;
      font-size: 20px;
      font-weight: 700;
      background: rgb(236, 236, 236);
      color: rgb(0, 0, 0);
      border: none;
      border-radius: 20px;
      cursor: pointer;
      font-family: 'Goeform', sans-serif;
      transition: background 0.3s, color 0.3s, transform 0.2s;
      margin-top: 20px;
      text-decoration: none;
      box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }
    .verification-btn-adm:hover {
      background: #f0f0f0;
      transform: scale(1.05);
      color: #111;
    }
    .verification-btn-adm:active {
      background: #e0e0e0;
      transform: scale(0.98);
    }
    .sobre-toggle {
      display: block;
      margin: 0;
      padding: 8px 22px;
      background: #232323;
      color: #fff;
      border: none;
      border-radius: 0;
      font-size: 1.08rem;
      font-family: 'Goeform', sans-serif;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.2s, color 0.2s;
      border-bottom: none;
    }
    .sobre-toggle:hover {
      background: #444;
      color: #33ccff;
    }
    .descricao-produto {
      background: rgba(30,30,30,0.97);
      color: #fff;
      border-radius: 0;
      margin-top: 0;
      padding: 18px 22px;
      font-size: 1.13rem;
      line-height: 1.6;
      box-shadow: none;
      border-bottom: 1px solid #232323;
    }
    .sobre-col {
      display: flex;
      flex-direction: column;
      gap: 0;
      margin-bottom: 0;
      margin-top: 0;
    }
    .sobre-toggle + .descricao-produto {
      margin-top: 0;
    }
    .descricao-produto:not(.aberta) {
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.5s cubic-bezier(0.4,0,0.2,1);
    }
    .descricao-produto.aberta {
      max-height: 500px; /* valor alto o suficiente para a transição */
      transition: max-height 0.5s cubic-bezier(0.4,0,0.2,1);
    }
  </style>
</head>
<body>
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
</body>
</html>
@endsection
