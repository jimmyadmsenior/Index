@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="/media/Css/Verificacao_Custom.css">
@endsection

@section('content')
<main class="background">
  <div class="verification-container">
    <h1>Recuperação de Senha</h1>
    <p>Um código foi enviado para o seu e-mail para recuperação. Por favor, insira-o abaixo:</p>
    @if(session('debug'))
        <div style="color:yellow; background:#222; padding:10px; margin-bottom:10px; border-radius:6px; text-align:center;">
            <strong>DEBUG:</strong> {{ session('debug') }}
        </div>
    @endif
    @if($errors->has('codigo'))
        <div style="color:#ff3333; background:#222; padding:10px; margin-bottom:10px; border-radius:6px; text-align:center;">
            {{ $errors->first('codigo') }}
        </div>
    @endif
    <form method="POST" action="/recuperacao-senha-codigo" onsubmit="return validarCampoCodigo()">
      @csrf
      <div class="input-container group" id="campo-codigo">
        <input class="input-field" type="text" id="input-codigo" name="codigo" placeholder=" " required oninput="removerErroCodigo()">
        <label for="input-codigo" class="input-label">XXX-XXX</label>
        <span class="input-highlight"></span>
        <div class="erro-mensagem">Este campo é obrigatório</div>
      </div>
      <button type="submit">ENVIAR</button>
    </form>
  </div>
</main>
<script>
  function validarCampoCodigo() {
    const campo = document.getElementById("input-codigo");
    const container = document.getElementById("campo-codigo");
    if (campo.value.trim() === "") {
      container.classList.add("erro");
      return false;
    } else {
      container.classList.remove("erro");
      return true;
    }
  }
  function removerErroCodigo() {
    const container = document.getElementById("campo-codigo");
    container.classList.remove("erro");
  }
</script>
@endsection

@section('footer')
<style>footer { display: none !important; }</style>
@endsection
