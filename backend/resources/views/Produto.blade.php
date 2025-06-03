<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $produto->nome ?? 'Produto' }}</title>
  <link rel="icon" type="image/png" href="/media/Ícone_Guia_Navegador_Site.png">
  <link rel="stylesheet" href="/media/Css/Produto.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
<header>
  <div class="header-content">
    <div class="logo">
      <img src="/media/Logo_Branca.png" alt="Logo da empresa">
    </div>
    <nav>
      <ul class="menu">
        <li><a href="/Smartphone">Smartphones</a></li>
        <li><a href="/Tablets">Tablets</a></li>
        <li><a href="/Fones">Fones</a></li>
        <li><a href="/Relogios">Relógios</a></li>
        <li><a href="/Notebooks">Notebooks</a></li>
      </ul>
    </nav>
    <div class="icons">
      <i class="fas fa-search"></i>
      <i class="fas fa-user"></i>
      <i class="fas fa-shopping-bag"></i>
      <i class="fas fa-box"></i>
    </div>
  </div>
</header>
<main class="produto-main">
  <div class="produto-container">
    <div class="produto-foto">
      @if($produto->foto)
        <img src="{{ $produto->foto }}" alt="Foto do produto">
      @else
        <img src="/media/placeholder_produto.png" alt="Foto do produto">
      @endif
    </div>
    <div class="produto-info">
      <h1 class="produto-nome">{{ $produto->nome }}</h1>
      <p class="produto-modelo"><strong>Modelo:</strong> {{ $produto->modelo }}</p>
      <p class="produto-marca"><strong>Marca:</strong> {{ $produto->marca }}</p>
      <p class="produto-preco"><strong>Preço:</strong> R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
      <p class="produto-descricao">{{ $produto->descricao }}</p>
    </div>
  </div>
</main>
</body>
</html>
