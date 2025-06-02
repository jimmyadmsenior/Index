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

<header>
  <div class="header-content">
    <div class="logo">
      <img src="/media/Logo_Branca.png" alt="Logo da empresa">
    </div>

    <nav>
      <ul class="menu">
        <li><a href="#">Smartphones</a></li>
        <li><a href="#">Tablets</a></li>
        <li><a href="#">Fones</a></li>
        <li><a href="#">Relógios</a></li>
        <li><a href="#">Notebooks</a></li>
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

<main class="background">
  <div class="verification-container">
    <h1>Administrador</h1>
    <p>Seu login foi reconhecido como administrador. Enviamos um código para o seu e-mail para verificação.</p>

    <for onsubmit="return validarCampo()">
      <div class="input-container" id="campo-codigo">
        <input class="input-field" type="text" id="input-field" placeholder=" ">
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
</script>

</body>
</html>
