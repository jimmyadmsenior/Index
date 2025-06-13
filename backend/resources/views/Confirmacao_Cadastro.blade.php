@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="pt-br" data-theme="light">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Confirmação de Cadastro</title>
  <link rel="icon" type="image/png" href="/media/Ícone_Guia_Navegador_Site.png">
  <link rel="stylesheet" href="/media/Css/Homepage_Com_Cadastro.css" />
  <link rel="stylesheet" href="/media/Css/Homepage_Sem_Cadastro_Custom.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
  <main class="main-homepage" style="min-height:80vh;display:flex;flex-direction:column;justify-content:center;">
    <div style="height:20vh;"></div>
    <section style="display:flex;justify-content:center;align-items:center;flex:1;width:100vw;">
      <div class="confirmation-container" style="background:rgba(30,30,30,0.97);border-radius:24px;padding:48px 48px;box-shadow:0 8px 32px rgba(0,0,0,0.22);text-align:center;max-width:420px;width:100%;margin:0 auto;">
        <h1 class="titulo-confirmacao" style="color:#fff;font-size:2.1rem;font-weight:800;margin-bottom:18px;">Confirmação de Cadastro</h1>
        <img class="check-icon" src="/media/Ícone_Check_Branco.png" alt="Ícone de confirmação" style="width:60px;margin-bottom:18px;"/>
        <p style="color:#fff;font-size:1.18rem;margin-bottom:24px;">Seu cadastro foi concluído com sucesso! Agora você pode acessar todas as funcionalidades disponíveis.</p>
        <a href="/login"><button class="botao-entrar" style="padding:14px 38px;font-size:1.15rem;border-radius:12px;background:#fff;color:#111;font-weight:700;box-shadow:0 2px 8px #0002;transition:background 0.2s;border:none;">ENTRAR</button></a>
      </div>
    </section>
    <div style="height:18vh;"></div>
  </main>
  <link rel="stylesheet" href="/media/Cursor/EfeitoCursor/dist/style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.15.0/TweenMax.min.js"></script>
  <script src="/media/Cursor/EfeitoCursor/src/script.js" defer></script>
  <script>
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
  <div id="cursor-blur-boxes">
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
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
</body>
</html>
@endsection
