<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Index</title>
  <link rel="icon" type="image/png" href="/media/Ícone_Guia_Navegador_Site.png">  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="/media/Css/Login.css">
</head>
<body>
  <header>
    <div class="header-content">
      <div class="logo">
        <img src="/media/Logo_Branca.png" alt="Logo da empresa">
      </div>
      <nav>
        <ul class="menu">
          <li><a href="/Smartphone">Smartphones</a></li>
          <li><a href="/Tablets">Tablets</a></li>
          <li><a href="/Fones">Fones</a></li>
          <li><a href="/Relogios">Relógios</a></li>
          <li><a href="/Notebooks">Notebooks</a></li>
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
  <main class="main-login">
    <section class="login-left">
      <form class="login-form" autocomplete="off">
        <h1><i class="fas fa-arrow-right"></i> Faça seu login</h1>
        <p>Entre com suas informações de login.</p>
        <div class="form-group">
          <label class="form-label" for="email">E-mail</label>
          <div class="input-wrapper">
            <i class="fas fa-envelope"></i>
            <input class="form-input" type="email" id="email" name="email" placeholder="Digite seu e-mail" required>
          </div>
        </div>
        <div class="form-group">
          <label class="form-label" for="senha">Senha</label>
          <div class="input-wrapper">
            <i class="fas fa-lock"></i>
            <input class="form-input" type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
            <button type="button" class="toggle-password" onclick="togglePassword()"><i class="fas fa-eye"></i></button>
          </div>
        </div>
        <div class="form-options">
          <label><input type="checkbox" name="lembrar"> Lembre-me</label>
          <a href="#">Esqueci minha senha</a>
        </div>
        <button class="login-btn" type="submit">ENTRAR</button>
        <div class="register-link">
          Não tem uma conta? <a href="/Cadastro">Registre-se</a>
        </div>
      </form>
    </section>
    <section class="login-right">
      <img src="/media/login-bg.jpg" alt="Login background"/>
    </section>
  </main>
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
</body>
</html>
