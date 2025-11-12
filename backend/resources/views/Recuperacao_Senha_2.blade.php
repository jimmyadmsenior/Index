@extends('layouts.app')
@section('head')
<style>
  .verification-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 70vh;
    margin-top: 0;
  }
  .verification-container h1 {
    font-size: 2.2rem;
    margin-bottom: 12px;
    text-align: center;
  }
  .verification-container p {
    font-size: 1.1rem;
    margin-bottom: 24px;
    text-align: center;
    color: #ccc;
  }
  .input-container {
    width: 320px;
    margin-bottom: 24px;
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: stretch;
  }
  .input-field {
    width: 100%;
    padding: 14px 16px;
    border: 2px solid #fff;
    border-radius: 12px;
    background: #222;
    color: #fff;
    font-size: 18px;
    outline: none;
    transition: border-color 0.2s;
  }
  .input-field:focus {
    border-color: #ffe082;
    background: #1a1a1a;
  }
  .input-label {
    position: absolute;
    left: 18px;
    top: 8px;
    color: #aaa;
    font-size: 15px;
    pointer-events: none;
    transition: 0.2s;
    background: transparent;
  }
  .input-field:focus + .input-label,
  .input-field:not(:placeholder-shown) + .input-label {
    top: -18px;
    left: 8px;
    font-size: 13px;
    color: #ffe082;
    background: #222;
    padding: 0 4px;
  }
  .erro .input-field {
    border-color: #ff5252;
  }
  .erro-mensagem {
    color: #ff5252;
    font-size: 14px;
    margin-top: 6px;
    display: none;
  }
  .erro .erro-mensagem {
    display: block;
  }
  button[type="submit"] {
    width: 100%;
    padding: 14px 0;
    border: none;
    border-radius: 10px;
    background: #ececec;
    color: #3a2f0b;
    font-weight: 700;
    font-size: 18px;
    margin-top: 8px;
    transition: background 0.2s;
  }
  button[type="submit"]:hover {
    background: #ffe082;
  }
</style>
@endsection

@section('content')
<main class="background">
  <div class="verification-container">
    <h1>RECUPERAÇÃO DE SENHA</h1>
    <p>Um código foi enviado para o seu e-mail para recuperação.<br>Por favor, insira-o abaixo:</p>
    
    @if($errors->any())
      <div style="background-color: #ff4444; color: white; padding: 12px; border-radius: 8px; margin-bottom: 20px; text-align: center; width: 320px;">
        @foreach($errors->all() as $error)
          {{ $error }}<br>
        @endforeach
      </div>
    @endif
    
    <form method="POST" action="/recuperacao-senha-codigo" onsubmit="return validarCampo()">
      @csrf
      <div class="input-container" id="campo-codigo">
        <input class="input-field" type="text" id="input-field" name="codigo" placeholder=" " autocomplete="one-time-code">
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
  
  // Remove erro quando o usuário começa a digitar
  document.getElementById("input-field").addEventListener('input', removerErro);
</script>
@endsection
