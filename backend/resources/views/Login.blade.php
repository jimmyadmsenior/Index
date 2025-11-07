@extends('layouts.app')
@php($hideFooter = true)

@section('content')
<main class="main-login">
  <section class="login-left">
    <form class="login-form" autocomplete="off" method="POST" action="/login">
      @csrf
      <h1>
        <img src="/media/Icon Login.png" alt="Ícone Login" style="height: 38px;">
        Faça seu login
      </h1>
      <p>Entre com suas informações de login.</p>
      
      @if($errors->any())
        <div class="alert alert-error">
          {{ $errors->first() }}
        </div>
      @endif
      
      <div class="form-group">
        <label class="form-label" for="email">E-mail</label>
        <div class="input-wrapper">
          <i class="fas fa-envelope"></i>
          <input class="form-input" type="email" id="email" name="email" placeholder="Digite seu e-mail" required value="{{ old('email') }}">
        </div>
      </div>
      
      <div class="form-group">
        <label class="form-label" for="senha">Senha</label>
        <div class="input-wrapper">
          <i class="fas fa-lock"></i>
          <input class="form-input" type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
          <button type="button" class="toggle-password" onclick="togglePassword()">
            <i class="fas fa-eye"></i>
          </button>
        </div>
      </div>
      
      <div class="form-options">
        <label class="lembrar-label">
          <input type="checkbox" name="lembrar"> Lembre-me
        </label>
        <a href="/Recuperacao_Senha_1" class="esqueci-senha-link">Esqueci minha senha</a>
      </div>
      
      <button class="login-btn" type="submit">ENTRAR</button>
      
      <div class="register-link">
        Não tem uma conta? <a href="/cadastro">Cadastre-se</a>
      </div>
    </form>
  </section>
  
  <section class="login-right">
    <img src="/media/Imagem homem deitado.png" alt="Login Ilustração" />
  </section>
</main>
@endsection

@push('scripts')
<script>
function togglePassword() {
  const senhaInput = document.getElementById('senha');
  const btn = document.querySelector('.toggle-password i');
  if (senhaInput.type === 'password') {
    senhaInput.type = 'text';
    btn.classList.remove('fa-eye');
    btn.classList.add('fa-eye-slash');
  } else {
    senhaInput.type = 'password';
    btn.classList.remove('fa-eye-slash');
    btn.classList.add('fa-eye');
  }
}
</script>
@endpush

