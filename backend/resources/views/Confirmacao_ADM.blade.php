<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Confirmação ADM</title>
  <link rel="icon" type="image/png" href="/media/Ícone_Guia_Navegador_Site.png">
  <link rel="stylesheet" href="/media/Css/Confirmacao_ADM.css" />
  <link rel="stylesheet" href="/media/Css/Confirmacao_ADM_Custom.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>

<header style="background:#111;box-shadow:none;border:none;">
  <div class="header-content">
    <div class="logo">
      <img src="/media/Logo_Branca.png" alt="Logo da empresa">
    </div>

    <nav style="background:#111;">
      <ul class="menu">
        <li><a href="#" style="color:#fff;background:#111;">Smartphones</a></li>
        <li><a href="#" style="color:#fff;background:#111;">Tablets</a></li>
        <li><a href="#" style="color:#fff;background:#111;">Fones</a></li>
        <li><a href="#" style="color:#fff;background:#111;">Relógios</a></li>
        <li><a href="#" style="color:#fff;background:#111;">Notebooks</a></li>
      </ul>
    </nav>

    <div class="icons">
      <i class="fas fa-search" style="color:#fff;"></i>
      <i class="fas fa-user" style="color:#fff;"></i>
      <i class="fas fa-shopping-bag" style="color:#fff;"></i>
      <i class="fas fa-box" style="color:#fff;"></i>
    </div>
  </div>
</header>

<main class="background">
  <div class="verification-container">
    <h1>Administrador</h1>
    <p>Seu login foi reconhecido como administrador. Enviamos um código para o seu e-mail para verificação.</p>

    <form onsubmit="return validarCampo()">
      <div class="input-container" id="campo-codigo">
        <input class="input-field" type="text" id="input-field" placeholder=" " oninput="removerErro()">
        <label for="input-field" class="input-label">Código de Verificação</label>
        <span class="input-highlight"></span>
        <div class="erro-mensagem">Este campo é obrigatório</div>
      </div>

      <button type="submit">ENVIAR</button>
    </form>
  </div>
</main>

<script>
  function validarCampo() {
    const campo = document.getElementById("input-field");
    const container = document.getElementById("campo-codigo");

    if (campo.value.trim() === "") {
      container.classList.add("erro");
      return false;
    } else {
      container.classList.remove("erro");
      return true;
    }
  }

  function removerErro() {
    const container = document.getElementById("campo-codigo");
    container.classList.remove("erro");
  }
</script>

</body>
</html>
