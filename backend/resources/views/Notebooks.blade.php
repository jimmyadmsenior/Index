<link rel="icon" type="image/png" href="/media/Ícone_Guia_Navegador_Site.png">
<link rel="stylesheet" href="/media/Css/Notebooks.css" />
<img src="/media/Logo_Branca.png" alt="Logo da empresa">
<ul class="menu">
  <li><a href="/smartphones">Smartphones</a></li>
  <li><a href="/tablets">Tablets</a></li>
  <li><a href="/Homepage_Fones">Fones</a></li>
  <li><a href="/relogios">Relógios</a></li>
  <li><a href="/notebooks">Notebooks</a></li>
</ul>
<footer>
  <div class="footer-content">
      <div class="footer-logo">
          <p>Conheça nosso repositório</p>
          <a href="https://github.com/jimmyadmsenior/Index" target="_blank">
              <img src="/media/Github_Logo.png" alt="GitHub" class="github-icon">
          </a>
      </div>
      <div class="footer-section">
          <h4>Nossas regras</h4>
          <a href="/Politica_Privacidade">Política de Privacidade</a>
          <a href="/Termos_Condicoes">Termos e Condições</a>
          <a href="/Suporte">Suporte</a>
          <a href="/Sobre">Sobre</a>
      </div>
      <div class="footer-section">
          <h4>Recursos</h4>
          <a href="/smartphones">Smartphones</a>
          <a href="/tablets">Tablets</a>
          <a href="/fones">Fones</a>
          <a href="/relogios">Relógios</a>
          <a href="/notebooks">Notebooks</a>
      </div>
      <div class="footer-section">
          <h4>Conecte-se</h4>
          <a href="https://github.com/jimmyadmsenior/Index">Repositório</a>
          <a href="/Download_App">Nosso App</a>
      </div>
  </div>
  <div class="copy">
      <p>Copyright © 2025 Index Inc. Todos os direitos reservados.</p>
  </div>
</footer>
<script>
  // Script para alternar entre os temas claro e escuro
  document.addEventListener('DOMContentLoaded', function() {
    const savedTheme = localStorage.getItem('theme') || 'light';
    document.documentElement.setAttribute('data-theme', savedTheme);
    const themeToggle = document.getElementById('theme-toggle');
    if(themeToggle) themeToggle.checked = savedTheme === 'dark';
    if(themeToggle) themeToggle.addEventListener('change', function(e) {
      if(e.target.checked) {
        document.documentElement.setAttribute('data-theme', 'dark');
        localStorage.setItem('theme', 'dark');
        document.body.classList.add('theme-transition');
        setTimeout(() => {
          document.body.classList.remove('theme-transition');
        }, 1000);
      } else {
        document.documentElement.setAttribute('data-theme', 'light');
        localStorage.setItem('theme', 'light');
        document.body.classList.add('theme-transition');
        setTimeout(() => {
          document.body.classList.remove('theme-transition');
        }, 1000);
      }
    });
    const prefersDarkScheme = window.matchMedia('(prefers-color-scheme: dark)');
    function syncWithSystemTheme(e) {
      if (!localStorage.getItem('theme')) {
        if (e.matches) {
          document.documentElement.setAttribute('data-theme', 'dark');
          if(themeToggle) themeToggle.checked = true;
        } else {
          document.documentElement.setAttribute('data-theme', 'light');
          if(themeToggle) themeToggle.checked = false;
        }
      }
    }
    syncWithSystemTheme(prefersDarkScheme);
    prefersDarkScheme.addEventListener('change', syncWithSystemTheme);
  });
</script>