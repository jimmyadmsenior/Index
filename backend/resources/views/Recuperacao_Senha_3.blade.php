@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="/media/Css/Verificacao_Custom.css">
@endsection

@section('content')
<main class="background">
  <div class="verification-container">
    <h1>Recuperação de Senha</h1>
    <form method="POST" action="/recuperacao-senha-nova" onsubmit="return validarSenhas()">
      @csrf
      <div class="input-container group" style="margin-bottom: 30px; max-width:420px; width:100%;">
        <label for="nova-senha" style="display:block;text-align:left;margin-bottom:8px;">Insira sua nova senha:</label>
        <div style="position:relative;width:100%;">
          <span style="position:absolute;left:10px;top:50%;transform:translateY(-50%);color:#aaa;font-size:18px;pointer-events:none;z-index:2;"><i class="fa fa-lock"></i></span>
          <input class="input-field" type="password" id="nova-senha" name="nova_senha" placeholder="Digite sua senha" style="padding-left:60px;">
          <span onclick="toggleSenha('nova-senha')" style="position:absolute;right:10px;top:50%;transform:translateY(-50%);cursor:pointer;color:#aaa;font-size:18px;z-index:2;"><i class="fa fa-eye"></i></span>
        </div>
      </div>
      <div class="input-container group" style="margin-bottom: 40px; max-width:420px; width:100%;">
        <label for="confirma-senha" style="display:block;text-align:left;margin-bottom:8px;">Confirme sua senha:</label>
        <div style="position:relative;width:100%;">
          <span style="position:absolute;left:10px;top:50%;transform:translateY(-50%);color:#aaa;font-size:18px;pointer-events:none;z-index:2;"><i class="fa fa-lock"></i></span>
          <input class="input-field" type="password" id="confirma-senha" name="confirma_senha" placeholder="Digite novamente sua senha" style="padding-left:60px;">
          <span onclick="toggleSenha('confirma-senha')" style="position:absolute;right:10px;top:50%;transform:translateY(-50%);cursor:pointer;color:#aaa;font-size:18px;z-index:2;"><i class="fa fa-eye"></i></span>
        </div>
      </div>
      <button type="submit" style="font-weight:700;color:#3a2f0b;">CONFIRMAR</button>
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
