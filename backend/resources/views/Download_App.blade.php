@extends('layouts.app')
@section('head')
<style>
.container {
  padding-top: 80px !important;
  padding-bottom: 30px !important;
}
</style>
@endsection
@section('content')
<!DOCTYPE html>
<html lang="pt-br" data-theme="light">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Baixe Nosso App</title>
  <link rel="icon" type="image/png" href="/media/Ícone_Guia_Navegador_Site.png">
  <link rel="stylesheet" href="/media/Css/Download_App.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
  <main class="container">
    <div class="left">
      <h1>BAIXE NOSSO APP</h1>
      <p>
        Escaneie o QrCode ou clique no botão abaixo para baixar. Se o download
        não iniciar, recarregue a página e tente novamente.
      </p>
      <!-- Opção 1: Botão com link direto para download -->
      <a href="/media/Arquivo_Test.pdf" download="index-app.apk" class="download-button" id="download-link">
        <button>BAIXAR</button>
      </a>
      
      <!-- Opção 2: Botão com JavaScript para download (descomente se preferir esta opção) -->
      <!-- <button id="download-button">BAIXAR</button> -->
    </div>
    <div class="right">
      <img src="/media/Qr_Code_test.png" alt="QR Code" class="qrcode"/>
    </div>
  </main>

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

      // Script para download usando JavaScript (Opção 2)
      /* Descomente o código abaixo se estiver usando a Opção 2 com o botão JavaScript */
      /*
      document.getElementById('download-button').addEventListener('click', function() {
        // URL do arquivo para download (substitua pelo caminho correto do seu arquivo)
        const fileUrl = '../caminho/para/seu/arquivo.apk';
        
        // Nome que será dado ao arquivo baixado
        const fileName = 'index-app.apk';
        
        // Criar um elemento de link invisível
        const link = document.createElement('a');
        link.href = fileUrl;
        link.download = fileName;
        link.style.display = 'none';
        
        // Adicionar ao DOM, clicar nele e depois remover
        document.body.appendChild(link);
        link.click();
        
        // Pequeno delay antes de remover o elemento
        setTimeout(() => {
          document.body.removeChild(link);
        }, 100);
      });
      */
    });
  </script>
</body>
</html>
@endsection