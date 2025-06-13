@extends('layouts.app')
@section('content')
<!-- Conteúdo original da página abaixo -->
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
@endsection
