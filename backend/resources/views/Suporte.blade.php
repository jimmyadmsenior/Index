@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="pt-br" data-theme="light">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Baixe Nosso App</title>
  <link rel="icon" type="image/png" href="/media/Ícone_Guia_Navegador_Site.png">
  <link rel="stylesheet" href="/media/Css/Suporte.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <!-- Cursor Motion Blur Effect -->
  <link rel="stylesheet" href="/media/Cursor/EfeitoCursor/dist/style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.15.0/TweenMax.min.js"></script>
  <script src="/media/Cursor/EfeitoCursor/src/script.js" defer></script>
  <div id="cursor-blur-boxes">
    <div class="box"></div><div class="box"></div><div class="box"></div><div class="box"></div><div class="box"></div><div class="box"></div><div class="box"></div><div class="box"></div><div class="box"></div><div class="box"></div><div class="box"></div><div class="box"></div><div class="box"></div><div class="box"></div><div class="box"></div><div class="box"></div><div class="box"></div>
  </div>
  <style>
    #cursor-blur-boxes .box {
      position: absolute;
      width: 25px;
      height: 25px;
      top: 50%;
      left: 50%;
      margin: -50 0 0 -50px;
      background: rgba(255, 255, 255, 0.2);
      border-radius: 50px;
      -webkit-backface-visibility: hidden;
      opacity: 0;
      cursor: none;
      transition: box-shadow 0.2s, border 0.2s;
    }
    html[data-theme="light"] #cursor-blur-boxes .box {
      background: rgba(255, 255, 255, 0.9);
      border: 2px solid #000;
    }
    html[data-theme="dark"] #cursor-blur-boxes .box {
      background: rgba(0, 0, 0, 0.9);
      border: 2px solid #fff;
    }
  </style>
</head>
<body>
  <header>
    <div class="header-content">
      <div class="logo">
        <!-- Logo da empresa -->
        <img src="/media/Logo_Branca.png" alt="Logo da empresa">
      </div>

      <nav>
        <!-- Menu de navegação -->
        <ul class="menu">
          <li><a href="/Homepage_Smartphones">Smartphones</a></li>
          <li><a href="/Homepage_Tablets">Tablets</a></li>
          <li><a href="/Homepage_Fones">Fones</a></li>
          <li><a href="/Homepage_Relogios">Relógios</a></li>
          <li><a href="/Homepage_Notebooks">Notebooks</a></li>
        </ul>
      </nav>

      <div class="icons">
        <i class="fas fa-search"></i>
        <i class="fas fa-user"></i>
        <i class="fas fa-shopping-bag"></i>
        <i class="fas fa-box"></i> <!-- Ícone de Pedidos -->
        
        <!-- Toggle Switch para Light/Dark Mode -->
        <label class="theme-toggle">
          <input type="checkbox" id="theme-toggle">
          <span class="slider">
            <i class="fas fa-sun sun"></i>
            <i class="fas fa-moon moon"></i>
          </span>
        </label>
      </div>
    </div>
  </header>

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
            <a href="/politica-privacidade">Política de Privacidade</a>
            <a href="/termos-condicoes">Termos e Condições</a>
            <a href="/suporte">Suporte</a>
            <a href="/sobre-nos">Sobre</a>
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
            <a href="/download-app">Nosso App</a>
        </div>
    </div>
    <div class="copy">
        <p>Copyright © 2025 Index Inc. Todos os direitos reservados.</p>
    </div>
  </footer>

  <script>
    // Script para alternar entre os temas claro e escuro
    document.addEventListener('DOMContentLoaded', function() {
      // Verificar se há uma preferência de tema salva no localStorage
      const savedTheme = localStorage.getItem('theme') || 'light';
      document.documentElement.setAttribute('data-theme', savedTheme);
      
      // Definir o estado inicial do checkbox com base no tema atual
      document.getElementById('theme-toggle').checked = savedTheme === 'dark';
      
      // Adicionar evento de mudança ao toggle
      document.getElementById('theme-toggle').addEventListener('change', function(e) {
        if(e.target.checked) {
          // Mudar para o tema escuro
          document.documentElement.setAttribute('data-theme', 'dark');
          localStorage.setItem('theme', 'dark');
          
          // Animação suave para a transição do tema
          document.body.classList.add('theme-transition');
          setTimeout(() => {
            document.body.classList.remove('theme-transition');
          }, 1000);
        } else {
          // Mudar para o tema claro
          document.documentElement.setAttribute('data-theme', 'light');
          localStorage.setItem('theme', 'light');
          
          // Animação suave para a transição do tema
          document.body.classList.add('theme-transition');
          setTimeout(() => {
            document.body.classList.remove('theme-transition');
          }, 1000);
        }
      });
      
      // Verificar preferência do sistema operacional do usuário
      const prefersDarkScheme = window.matchMedia('(prefers-color-scheme: dark)');
      
      // Função para sincronizar o tema com a preferência do sistema
      function syncWithSystemTheme(e) {
        // Somente altera automaticamente se o usuário não definiu uma preferência manualmente
        if (!localStorage.getItem('theme')) {
          if (e.matches) {
            document.documentElement.setAttribute('data-theme', 'dark');
            document.getElementById('theme-toggle').checked = true;
          } else {
            document.documentElement.setAttribute('data-theme', 'light');
            document.getElementById('theme-toggle').checked = false;
          }
        }
      }
      
      // Verificar a preferência inicial
      syncWithSystemTheme(prefersDarkScheme);
      
      // Escutar por mudanças na preferência do sistema
      prefersDarkScheme.addEventListener('change', syncWithSystemTheme);
    });
  </script>
</body>
</html>
@endsection