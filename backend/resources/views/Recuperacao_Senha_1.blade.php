@extends('layouts.app')
@section('head')
    <link rel="stylesheet" href="/media/Css/Verificacao_Custom.css">
@endsection

@section('content')
<main class="background">
  <div class="verification-container">
    <h1>RECUPERAÇÃO DE SENHA</h1>
    <p>Informe o seu e-mail para verificação.<br>Por favor, insira-o abaixo:</p>
    <form method="POST" action="/recuperacao-senha-email" onsubmit="return validarCampoEmail()">
      @csrf
      <div class="input-container group" id="campo-email">
        <input class="input-field" type="email" id="input-email" name="email" placeholder=" " required oninput="removerErroEmail()">
        <label for="input-email" class="input-label">Digite seu e-mail</label>
        <span class="input-highlight"></span>
        <div class="erro-mensagem">Este campo é obrigatório</div>
      </div>
      <button type="submit">ENVIAR</button>
    </form>
  </div>
</main>
<script>
  function validarCampoEmail() {
    const campo = document.getElementById("input-email");
    const container = document.getElementById("campo-email");
    if (campo.value.trim() === "") {
      container.classList.add("erro");
      return false;
    } else {
      container.classList.remove("erro");
      return true;
    }
  }
  function removerErroEmail() {
    const container = document.getElementById("campo-email");
    container.classList.remove("erro");
  }
</script>
@endsection

@section('footer')
<style>footer { display: none !important; }</style>
@endsection
