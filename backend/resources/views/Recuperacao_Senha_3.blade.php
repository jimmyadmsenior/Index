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
    margin-bottom: 20px;
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
  .input-container-password {
    position: relative;
    width: 320px;
    margin-bottom: 20px;
  }
  .input-field-password {
    width: 100%;
    padding: 14px 45px 14px 16px;
    border: 2px solid #fff;
    border-radius: 12px;
    background: #222;
    color: #fff;
    font-size: 18px;
    outline: none;
    transition: border-color 0.2s;
  }
  .input-field-password:focus {
    border-color: #ffe082;
    background: #1a1a1a;
  }
  .password-toggle {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: #aaa;
    cursor: pointer;
    font-size: 18px;
    transition: color 0.2s;
  }
  .password-toggle:hover {
    color: #ffe082;
  }
  .input-label-password {
    position: absolute;
    left: 18px;
    top: 8px;
    color: #aaa;
    font-size: 15px;
    pointer-events: none;
    transition: 0.2s;
    background: transparent;
  }
  .input-field-password:focus + .input-label-password,
  .input-field-password:not(:placeholder-shown) + .input-label-password {
    top: -18px;
    left: 8px;
    font-size: 13px;
    color: #ffe082;
    background: #222;
    padding: 0 4px;
  }
  .erro .input-field,
  .erro .input-field-password {
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
    width: 320px;
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
    <h1>NOVA SENHA</h1>
    <p>Digite sua nova senha abaixo:</p>
    
    @if($errors->any())
      <div style="background-color: #ff4444; color: white; padding: 12px; border-radius: 8px; margin-bottom: 20px; text-align: center; width: 320px;">
        @foreach($errors->all() as $error)
          {{ $error }}<br>
        @endforeach
      </div>
    @endif
    
    <form method="POST" action="/recuperacao-senha-nova" onsubmit="return validarSenhas()">
      @csrf
      <div class="input-container-password" id="campo-nova-senha">
        <input class="input-field-password" type="password" id="nova-senha" name="nova_senha" placeholder=" " required>
        <label for="nova-senha" class="input-label-password">Nova Senha</label>
        <span class="password-toggle" onclick="toggleSenha('nova-senha', this)">👁</span>
        <div class="erro-mensagem">Este campo é obrigatório</div>
      </div>
      
      <div class="input-container-password" id="campo-confirma-senha">
        <input class="input-field-password" type="password" id="confirma-senha" name="confirma_senha" placeholder=" " required>
        <label for="confirma-senha" class="input-label-password">Confirmar Senha</label>
        <span class="password-toggle" onclick="toggleSenha('confirma-senha', this)">👁</span>
        <div class="erro-mensagem">Este campo é obrigatório</div>
      </div>
      
      <button type="submit">CONFIRMAR</button>
    </form>
  </div>
</main>
<script>
  function toggleSenha(id, icon) {
    const input = document.getElementById(id);
    if (input.type === "password") {
      input.type = "text";
      icon.textContent = "🙈";
    } else {
      input.type = "password";
      icon.textContent = "👁";
    }
  }
  
  function validarSenhas() {
    const senha = document.getElementById('nova-senha');
    const confirmaSenha = document.getElementById('confirma-senha');
    const containerSenha = document.getElementById('campo-nova-senha');
    const containerConfirma = document.getElementById('campo-confirma-senha');
    
    let valido = true;
    
    // Validar se os campos estão preenchidos
    if (senha.value.trim() === "") {
      containerSenha.classList.add("erro");
      valido = false;
    } else {
      containerSenha.classList.remove("erro");
    }
    
    if (confirmaSenha.value.trim() === "") {
      containerConfirma.classList.add("erro");
      valido = false;
    } else {
      containerConfirma.classList.remove("erro");
    }
    
    // Validar se as senhas coincidem
    if (senha.value !== "" && confirmaSenha.value !== "" && senha.value !== confirmaSenha.value) {
      containerConfirma.classList.add("erro");
      containerConfirma.querySelector('.erro-mensagem').textContent = "As senhas não coincidem";
      valido = false;
    } else if (confirmaSenha.value !== "") {
      containerConfirma.querySelector('.erro-mensagem').textContent = "Este campo é obrigatório";
    }
    
    return valido;
  }
  
  function removerErro(containerId) {
    const container = document.getElementById(containerId);
    container.classList.remove("erro");
    if (containerId === 'campo-confirma-senha') {
      container.querySelector('.erro-mensagem').textContent = "Este campo é obrigatório";
    }
  }
  
  // Remove erro quando o usuário começa a digitar
  document.getElementById("nova-senha").addEventListener('input', () => removerErro('campo-nova-senha'));
  document.getElementById("confirma-senha").addEventListener('input', () => removerErro('campo-confirma-senha'));
</script>
@endsection
