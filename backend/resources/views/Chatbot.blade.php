<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chatbot - Index</title>
  <link rel="icon" type="image/png" href="/media/Ícone_Guia_Navegador_Site.png">
  <link rel="stylesheet" href="/media/Css/Homepage_Sem_Cadastro.css" />
  <link rel="stylesheet" href="/media/ChatBot/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <style>
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
      overflow-x: hidden;
      overflow-y: auto;
    }
    body {
      min-height: 100vh;
      box-sizing: border-box;
      overflow-x: hidden;
      overflow-y: auto;
    }
    main {
      width: 100%;
      overflow: visible;
    }
    .chatbot-apresentacao {
      max-width: 700px;
      margin: 100px auto 0 auto;
      background: rgba(30,30,30,0.95);
      border-radius: 18px;
      box-shadow: 0 4px 32px 0 rgba(0,0,0,0.18);
      padding: 40px 32px 32px 32px;
      color: #fff;
      text-align: center;
    }
    .chatbot-apresentacao h1 {
      font-size: 2.2rem;
      font-weight: bold;
      margin-bottom: 18px;
    }
    .chatbot-apresentacao p {
      font-size: 1.15rem;
      color: #bdbdbd;
      margin-bottom: 24px;
    }
    .chatbot-demo {
      margin-top: 32px;
      display: flex;
      justify-content: center;
    }
    .chatbot-demo iframe {
      border: none;
      border-radius: 12px;
      width: 350px;
      height: 500px;
      background: #181818;
    }
    .spline-3d-container {
      width: 100%;
      max-width: 900px;
      margin: 40px auto 0 auto;
      display: flex;
      justify-content: center;
      overflow: visible;
    }
    spline-viewer {
      width: 100% !important;
      min-height: 400px !important;
      height: 60vh !important;
      border: none !important;
      border-radius: 18px !important;
      box-shadow: 0 4px 32px 0 rgba(0,0,0,0.18) !important;
      display: block;
    }
  </style>
</head>
<body>
<header>
  <div class="header-content">
    <div class="logo">
      <img src="/media/Logo_Branca.png" alt="Logo da empresa">
    </div>
    <nav>
      <ul class="menu">
        <li><a href="/">Início</a></li>
        <li><a href="/Smartphone">Smartphones</a></li>
        <li><a href="/Tablets">Tablets</a></li>
        <li><a href="/Homepage_Fones">Fones</a></li>
        <li><a href="/Relogios">Relógios</a></li>
        <li><a href="/Notebooks">Notebooks</a></li>
        <li><a href="/Chatbot" class="active">Chatbot</a></li>
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
<main>
  <!-- Spline Animation no topo, ocupando 100% da largura -->
  <script type="module" src="https://unpkg.com/@splinetool/viewer@1.10.2/build/spline-viewer.js"></script>
  <div style="width:100vw;max-width:100vw;margin:0;padding:0;position:relative;left:50%;transform:translateX(-50%);overflow:hidden;">
    <spline-viewer url="https://prod.spline.design/pqcyaw6dPVwZ56WD/scene.splinecode" style="width:100vw;min-height:400px;height:60vh;border:none;border-radius:0;box-shadow:none;display:block;"></spline-viewer>
  </div>
  <div class="chatbot-apresentacao">
    <h1>Conheça o Chatbot Índigo</h1>
    <p>O Chatbot Índigo é o assistente virtual inteligente do Index! Ele foi desenvolvido para:
      <ul style="text-align:left;max-width:500px;margin:16px auto 24px auto;">
        <li>• Responder dúvidas sobre produtos, compras e entregas.</li>
        <li>• Ajudar na navegação do site e encontrar ofertas.</li>
        <li>• Oferecer suporte rápido e personalizado 24h.</li>
        <li>• Simular conversas naturais, tornando sua experiência mais fluida.</li>
      </ul>
      Você pode acessar o Índigo em qualquer página pelo ícone no canto inferior direito.<br>
      Experimente conversar com ele agora mesmo!
    </p>
    <div class="chatbot-demo">
      <iframe src="/media/ChatBot/demo.html" title="Demonstração do Chatbot Índigo"></iframe>
    </div>
  </div>
</main>
</body>
</html>
