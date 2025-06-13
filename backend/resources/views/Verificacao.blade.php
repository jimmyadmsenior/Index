@extends('layouts.app')

@section('content')
<main class="background">
  <div class="verification-container" style="margin-top: -0px;">
    <h1>VERIFICAÇÃO</h1>
    <p>Um código foi enviado para o seu e-mail para verificação. Por favor insira-o abaixo:</p>
    <form method="POST" action="/verificacao" onsubmit="return validarCampo()">
      @csrf
      <div class="input-container" id="campo-codigo">
        <input class="input-field" type="text" id="input-field" name="codigo" placeholder=" " oninput="removerErro()">
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
@endsection
