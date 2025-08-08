@extends('layouts.app')
@section('head')
@endsection
@section('content')
<!-- Conteúdo original da página abaixo -->
<main>
  <header style="background:#111;box-shadow:none;border:none;">
    <div class="header-content">
      <div class="logo">
        <!-- Logo da empresa -->
        <img src="/media/Logo_Branca.png" alt="Logo da empresa">
      </div>
      <nav style="background:#111;">
        <!-- Menu de navegação -->
        <ul class="menu">
          <li><a href="/Homepage_Smartphones" style="color:#fff;background:#111;">Smartphones</a></li>
          <li><a href="/Homepage_Tablets" style="color:#fff;background:#111;">Tablets</a></li>
          <li><a href="/Homepage_Fones" style="color:#fff;background:#111;">Fones</a></li>
          <li><a href="/Homepage_Relogios" style="color:#fff;background:#111;">Relógios</a></li>
          <li><a href="/Homepage_Notebooks" style="color:#fff;background:#111;">Notebooks</a></li>
        </ul>
      </nav>
      <div class="icons">
        <i class="fas fa-search" style="color:#fff;"></i>
        <i class="fas fa-user" style="color:#fff;"></i>
        <i class="fas fa-shopping-bag" style="color:#fff;"></i>
        <i class="fas fa-box" style="color:#fff;"></i> <!-- Ícone de Pedidos -->
        
        <!-- Toggle Switch para Light/Dark Mode -->
        <label class="theme-toggle">
          <input type="checkbox" id="theme-toggle">
          <span class="slider">
            <i class="fas fa-sun sun" style="color:#fff;"></i>
            <i class="fas fa-moon moon" style="color:#fff;"></i>
          </span>
        </label>
      </div>
    </div>
  </header>

<center><h1>Perguntas Frequentes</h1></center>
<center><a>Termos e condições</a></center>


<section class="politica-termos">

 

  

  <div class="section">
    <div class="section-header" onclick="toggleSection(this)">
      <span>PERGUNTAS FREQUENTES SOBRE A COMPRA </span>
      <div class="toggle-icon">+</div>
    </div>
    <div class="section-content">
      <ol class="privacidade-lista">
        
          <span class="privacidade-titulo">1. Como faço para realizar uma compra?</span>
          <p>para realizar uma compra, basta nevegar pelo nosso site, escolher o produto desejado, selecionar a quantidade e clicar em "Adicionar ao Carrinho". Depois, vá para o carrinho de compras e finalize o pedido preenchendo seus dados de entrega e escolher a forma de pagamento.</p>
        
        
          <span class="privacidade-titulo">2. Posso comprar sem ter uma conta no site?</span>
          <p>Não, você não pode fazer compras como visitante. Ao criar uma conta, você terá acesso a um histórico de pedidos, facilitando para futuras compras e promoções exclusivas.</p>
        
          <span class="privacidade-titulo">3.  Como sei se meu pedido foi confirmado?</span>
          <p> Após a finalização do pedido, você receberá um e-mail de confirmação com os detalhes da compra. Além disso, você pode acompanhar o status do seu pedido na área "Meus Pedidos" do site.</p>
          
        
          <span class="privacidade-titulo">4. Quais informações preciso fornecer para finalizar a compra?</span>
          <p>Você precisará fornecer seu nome completo, endereço de entrega, e-mail, telefone e dados de pagamento (dependendo da forma de pagamento escolhida, como cartão de crédito, débito, PIX ou boleto bancário).</p>
        
          <span class="privacidade-titulo">5.  O que fazer se eu cometer um erro ao inserir meus dados?</span>
          <p>Se você perceber que cometeu um erro nos dados, entre em contato conosco o mais rápido possível para corrigirmos antes do envio do pedido. Após o envio, não será possível alterar os dados.</p>
        
          <span class="privacidade-titulo">6. Como posso alterar ou cancelar meu pedido?</span>
          <p>Caso precise alterar ou cancelar seu pedido, entre em contato imediatamente após a compra. Se o pedido já tiver sido processado e enviado, não será possível fazer alterações. Para trocas ou devoluções, consulte nossa política de trocas.</p>
          
        
          <span class="privacidade-titulo">7. Posso adicionar produtos ao meu pedido após a finalização?</span>
          <p>Infelizmente, não é possível adicionar produtos ao pedido depois que ele for finalizado. Se quiser adicionar mais itens, será necessário realizar uma nova compra.</p>

          <span class="privacidade-titulo">8. Como posso saber a disponibilidade de um produto?</span>
          <p>A disponibilidade de um produto é atualizada em tempo real no site. Se um produto estiver fora de estoque, você será informado ao tentar adicioná-lo ao carrinho. Para mais informações, entre em contato com nossa equipe de atendimento.</p>

          <span class="privacidade-titulo">9. O que acontece se eu não gostar do produto após recebê-lo?</span>
          <p>Caso não esteja satisfeito com o produto, você pode solicitar a devolução ou troca dentro de 7 dias após o recebimento, conforme nossa Política.</p>
        
      </ol>
    </div>
  </div>

  <div class="section">
    <div class="section-header" onclick="toggleSection(this)">
      <span>PERGUNTAS FREQUENTES SOBRE A ENTREGA</span>
      <div class="toggle-icon">+</div>
    </div>
    <div class="section-content">
      <ol class="condicoes-lista">
        
          <span class="condicoes-titulo">1. Qual é o prazo de entrega?</span>
          <p>O prazo de entrega depende da sua localização e da modalidade de frete escolhida. Você pode verificar o prazo exato ao finalizar a compra, inserindo seu endereço de entrega. O prazo pode variar de 2 a 15 dias úteis.</p>
        
          <span class="condicoes-titulo">2. Como posso acompanhar o status da minha entrega?</span>
          <p>Após o envio do seu pedido, você receberá um e-mail com o código de rastreamento. Basta acessar o site da transportadora e inserir o código para acompanhar a entrega em tempo real.</p>
        
          <span class="condicoes-titulo">3. Posso alterar o endereço de entrega após finalizar a compra?</span>
          <p>Infelizmente, não é possível alterar o endereço de entrega após a finalização da compra. Certifique-se de inserir o endereço corretamente antes de concluir o pedido. Se tiver cometido um erro, entre em contato conosco o mais rápido possível para verificarmos a possibilidade de alteração.</p>
        
          <span class="condicoes-titulo">4. Como sei se meu pedido foi enviado?</span>
          <p>Assim que o seu pedido for enviado, enviaremos um e-mail de confirmação de envio, juntamente com o código de rastreamento, para que você possa acompanhar a entrega.</p>
        
          <span class="condicoes-titulo">5. O que acontece se eu não estiver em casa no momento da entrega?</span>
          <p>Se você não estiver disponível para receber o pacote, a transportadora pode tentar realizar uma nova entrega ou deixar um aviso de tentativa de entrega. Em alguns casos, o pacote será redirecionado para um ponto de coleta, onde você poderá retirar o produto.</p>
        
          <span class="condicoes-titulo">6. O que faço se meu pedido não chegar dentro do prazo estimado?</span>
          <p>Se o seu pedido não chegar dentro do prazo estimado, entre em contato com nossa central de atendimento e informaremos o status da entrega. Em alguns casos, o prazo de entrega pode ser afetado por fatores externos, como condições climáticas ou problemas logísticos das transportadoras.</p>
        
          <span class="condicoes-titulo">7. Realizam entregas para todo o Brasil?</span>
          <p>Sim! Fazemos entregas para todo o território nacional.</p>
        
          <span class="condicoes-titulo">8. Posso escolher a transportadora para a entrega?</span>
          <p>Atualmente, usamos transportadoras parceiras para realizar as entregas, e a escolha da transportadora será feita com base na sua localização e na modalidade de frete selecionada.</p>
       
          <span class="condicoes-titulo">9. Como posso solicitar a troca ou devolução do meu pedido?</span>
          <p>Caso precise devolver ou trocar o produto, entre em contato conosco dentro de 7 dias corridos após o recebimento. O produto deve estar em sua embalagem original e sem sinais de uso.</p>
        
      </ol>
    </div>
  </div>

  <div class="section">
    <div class="section-header" onclick="toggleSection(this)">
      <span>PERGUNTAS FREQUENTES SOBRE O PAGAMENTO</span>
      <div class="toggle-icon">+</div>
    </div>
    <div class="section-content">
      <ol class="captamos-lista">
       
          <span class="captamos-titulo">1. Informações fornecidas pelo usuário</span>
          <p>Coletamos dados inseridos voluntariamente, como nome, e-mail, telefone e informações de pagamento, quando você preenche formulários ou realiza compras.</p>
        
          <span class="captamos-titulo">2. Cookies e Tecnologias de Rastreamento</span>
          <p>Utilizamos cookies para armazenar suas preferências, entender o comportamento de navegação e oferecer um site mais personalizado. Você pode gerenciar suas preferências de cookies nas configurações do navegador.</p>
        
          <span class="captamos-titulo">3. Dados de Navegação</span>
          <p>Informações como endereço IP, tipo de dispositivo, localização aproximada e tempo de acesso podem ser coletadas automaticamente para otimizar o funcionamento do site e melhorar a segurança.</p>
       
          <span class="captamos-titulo">4.Ferramentas de Terceiros</span>
          <p>Podemos utilizar serviços de terceiros, como Google Analytics e redes sociais, para análise de dados e campanhas publicitárias, sempre em conformidade com as leis de proteção de dados.</p>
        
      </ol>
    </div>
  </div>
</section>


  <footer>
    <div class="footer-content">
        <div class="footer-logo">
            <p>Conheça nosso repositório</p>
            <a href="https://github.com/jimmyadmsenior/Index" target="_blank">
                <img src="../VIew/Media/Github_Logo.png" alt="GitHub" class="github-icon">
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

    function toggleSection(header) {
  const icon = header.querySelector('.toggle-icon');
  const content = header.nextElementSibling;
  icon.classList.toggle('rotated');
  content.classList.toggle('visible');
  // Exibe a imagem em "QUEM SOMOS?" se existir
  if (header.innerText.includes('QUEM SOMOS?')) {
    const img = content.querySelector('.quem-somos-img');
    if (img) img.style.display = content.classList.contains('visible') ? 'block' : 'none';
  }
}
  </script>
</main>
@endsection