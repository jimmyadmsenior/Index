@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="/media/Css/Verificacao_Custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
      .input-group {
        margin-bottom: 24px;
        max-width: 420px;
        width: 100%;
      }
      .input-group label {
        display: block;
        text-align: left;
        margin-bottom: 8px;
      }
      .input-flex {
        display: flex;
        align-items: center;
        position: relative;
        background: #222;
        border: 2px solid #fff;
        border-radius: 16px;
        height: 48px;
        width: 100%;
      }
      .input-flex input {
        flex: 1;
        background: transparent;
        border: none;
        color: #fff;
        font-size: 17px;
        padding: 0 12px;
        height: 100%;
        outline: none;
      }
      .input-flex input::placeholder {
        color: #ccc;
        opacity: 1;
        font-size: 16px;
      }
      .input-flex .icon-left {
        margin-left: 10px;
        color: #bdbdbd;
        font-size: 22px;
        display: flex;
        align-items: center;
        height: 100%;
      }
      .input-flex .icon-right {
        margin-right: 10px;
        color: #bdbdbd;
        cursor: pointer;
        font-size: 22px;
        display: flex;
        align-items: center;
        height: 100%;
      }
      .input-flex:focus-within {
        border-color: #ffe082;
        background: #1a1a1a;
      }
      button[type="submit"] {
        font-weight: 700;
        color: #3a2f0b;
        background: #ececec;
        border: none;
        border-radius: 10px;
        padding: 16px 0;
        width: 100%;
        font-size: 20px;
        margin-top: 10px;
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
    <h1>Recuperação de Senha</h1>
    <form method="POST" action="/recuperacao-senha-nova" onsubmit="return validarSenhas()">
      @csrf
      <div class="input-group">
        <label for="nova-senha">Insira sua nova senha:</label>
        <div class="input-flex">
          <span class="icon-left"><i class="fa fa-lock"></i></span>
          <input type="password" id="nova-senha" name="nova_senha" placeholder="Digite sua senha">
          <span class="icon-right" onclick="toggleSenha('nova-senha')"><i class="fa fa-eye"></i></span>
        </div>
      </div>
      <div class="input-group">
        <label for="confirma-senha">Confirme sua senha:</label>
        <div class="input-flex">
          <span class="icon-left"><i class="fa fa-lock"></i></span>
          <input type="password" id="confirma-senha" name="confirma_senha" placeholder="Digite novamente sua senha">
          <span class="icon-right" onclick="toggleSenha('confirma-senha')"><i class="fa fa-eye"></i></span>
        </div>
      </div>
      <button type="submit">CONFIRMAR</button>
    </form>
  </div>
</main>
<script>
function toggleSenha(id) {
  var input = document.getElementById(id);
  if (input.type === "password") {
    input.type = "text";
  } else {
    input.type = "password";
  }
}
function validarSenhas() {
  var senha = document.getElementById('nova-senha').value;
  var confirma = document.getElementById('confirma-senha').value;
  if (senha !== confirma) {
    alert('As senhas não coincidem!');
    return false;
  }
  return true;
}
</script>
@endsection

@section('footer')
<style>footer { display: none !important; }</style>
@endsection
