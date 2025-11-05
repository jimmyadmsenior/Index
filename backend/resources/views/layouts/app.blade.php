<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Index')</title>
    <link rel="icon" type="image/png" href="/media/Ícone_Guia_Navegador_Site.png">
    <style>
        @font-face {
            font-family: 'Geoform';
            src: url('/media/Css/Geoform-Regular.ttf') format('opentype');
            font-weight: normal;
            font-style: normal;
        }
        @font-face {
            font-family: 'Geoform';
            src: url('/media/Css/Geoform-Medium.ttf') format('opentype');
            font-weight: 500;
            font-style: normal;
        }
        @font-face {
            font-family: 'Geoform';
            src: url('/media/Css/Geoform-Bold.ttf') format('opentype');
            font-weight: bold;
            font-style: normal;
        }
        * {
            font-family: 'Geoform', Arial, sans-serif !important;
        }
        body {
            font-family: 'Geoform', Arial, sans-serif !important;
        }
    </style>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Site CSS -->
    <link rel="stylesheet" href="/media/Css/Homepage_Com_Cadastro.css">
    <link rel="stylesheet" href="/media/Css/Homepage_Sem_Cadastro_Custom.css">
    <link rel="stylesheet" href="/media/Css/Perfil.css">
    <link rel="stylesheet" href="/media/Css/loading.css">
    <link rel="stylesheet" href="/media/Css/Carrinho_Botoes.css">
    
    <!-- Estilos para ícones -->
    <style>
        /* Garante que os ícones funcionem corretamente */
        .fas, .far, .fab {
            font-family: "Font Awesome 6 Free", "Font Awesome 6 Brands" !important;
            font-weight: 900 !important;
        }
        
        /* Ícone do carrinho na navbar */
        .navbar-btn-sacola i {
            font-size: 1.5rem !important;
            color: #fff !important;
        }
        
        /* Ícones nos botões de adicionar ao carrinho */
        .btn-adicionar-carrinho i,
        .featured-link i {
            font-size: 1rem !important;
            margin-right: 8px !important;
        }
        
        /* Contador do carrinho */
        .cart-count {
            font-family: 'Geoform', Arial, sans-serif !important;
            font-weight: bold !important;
        }
    </style>
    {{-- @vite('resources/css/app.css') Comentado temporariamente para deploy --}}
    @yield('head')
</head>
<body>
    @include('layouts.navbar')
    <main style="padding-bottom: 48px;">
        @yield('content')
    @hasSection('footer')
        @yield('footer')
    @else
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
                  <a href="/Sobre_Nós">Sobre nós</a>
              </div>
              <div class="footer-section">
                  <h4>Recursos</h4>
                  <a href="/Homepage_Smartphones">Smartphones</a>
                  <a href="/Homepage_Tablets">Tablets</a>
                  <a href="/Homepage_Fones">Fones</a>
                  <a href="/Homepage_Relógios">Relógios</a>
                  <a href="/Homepage_Notebooks">Notebooks</a>
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
    @endif

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="/media/Js/loading.js"></script>
    <script src="/media/Js/carrinho-interacoes.js"></script>
</body>
</html>