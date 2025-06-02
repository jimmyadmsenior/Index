<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Verificação</title>
  <link rel="icon" type="image/png" href="/media/Ícone_Guia_Navegador_Site.png">
  <link rel="stylesheet" href="/media/Css/Verificacao_Custom.css" />
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
<main>
  <div class="verificacao-container">
    <h1>Verificação</h1>
    <p>Um código foi enviado para o seu e-mail para verificação.<br>Por favor, insira-o abaixo:</p>
    <form method="POST" action="/verificacao">
      @csrf
      <input type="text" name="codigo" maxlength="6" placeholder="XXX-XXX" required class="codigo-input">
      <button type="submit">ENVIAR</button>
    </form>
    @if(session('erro'))
      <div class="erro">{{ session('erro') }}</div>
    @endif
  </div>
</main>
</body>
</html>
