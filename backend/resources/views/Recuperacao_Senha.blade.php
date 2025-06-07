<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recuperação de senha </title>
  <link rel="icon" type="image/png" href="/media/Ícone_Guia_Navegador_Site.png">
  <link rel="stylesheet" href="/media/Css/Recuperacao_Senha.css" />
  <link rel="stylesheet" href="/media/Css/Recuperacao_Senha_Custom.css" />
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
        <li><a href="/Homepage_Smartphones">Smartphones</a></li>
        <li><a href="/Homepage_Tablets">Tablets</a></li>
        <li><a href="/Homepage_Fones">Fones</a></li>
        <li><a href="/Homepage_Relogios">Relógios</a></li>
        <li><a href="/Homepage_Notebooks">Notebooks</a></li>
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
    <h1>Recuperação de senha</h1>
    <p>Informe o seu e-mail para verificação.<br>Por favor, insira-o abaixo:</p>

    <form onsubmit="return validarCampo()">
      <div class="input-container" id="input-wrapper">
        <input placeholder=" " class="input-field" type="text" id="input-field" oninput="removerErro()">
        <label for="input-field" class="input-label">Digite seu e-mail</label>
        <span class="input-highlight"></span>
        <div id="mensagem-erro" class="erro-mensagem">Este campo é obrigatório</div>
      </div>

      <button type="submit">ENVIAR</button>
    </form>
  </div>
</main>

<script>
function validarCampo() {
  const campo = document.getElementById("input-field");
  const wrapper = document.getElementById("input-wrapper");
  if (campo.value.trim() === "") {
    wrapper.classList.add("erro");
    return false;
  } else {
    wrapper.classList.remove("erro");
    return true;
  }
}
function removerErro() {
  const wrapper = document.getElementById("input-wrapper");
  wrapper.classList.remove("erro");
}
</script>
<style>
.input-container.erro .input-field {
  border: 2px solid #d13447 !important;
  box-shadow: 0 0 0 2px #d1344733 !important;
}
.input-container .erro-mensagem {
  color: #d13447;
  font-size: 14px;
  margin-top: 4px;
  display: none;
}
.input-container.erro .erro-mensagem {
  display: block;
}
</style>

</body>
</html>
