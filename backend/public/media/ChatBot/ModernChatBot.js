// Lógica do novo chat: perguntas com opções clicáveis, dark/light mode, integração com lista de produtos

const chatbotFab = document.getElementById('modernChatbotFab');
const chatbotWindow = document.getElementById('modernChatbotWindow');
const chatbotClose = document.getElementById('modernChatbotClose');
const chatbotMessages = document.getElementById('modernChatbotMessages');
const chatbotFooter = document.getElementById('modernChatbotFooter');

// Lista de produtos por categoria
const produtos = {
  Smartphones: {
    Apple: [
      'iPhone 15 Pro Max', 'iPhone 15 Pro', 'iPhone 15 Plus', 'iPhone 15', 'iPhone 14 Pro Max', 'iPhone 14 Pro', 'iPhone 14 Plus', 'iPhone 14', 'iPhone 13', 'iPhone SE (3ª geração)'
    ],
    Samsung: [
      'Galaxy S24 Ultra', 'Galaxy S24+', 'Galaxy S24', 'Galaxy S23 Ultra', 'Galaxy S23+', 'Galaxy S23', 'Galaxy S23 FE', 'Galaxy Z Fold 5', 'Galaxy Z Flip 5', 'Galaxy A55', 'Galaxy A35', 'Galaxy A15'
    ]
  },
  'Fones de Ouvido': {
    Apple: [
      'AirPods Pro (2ª geração)', 'AirPods (3ª geração)', 'AirPods (2ª geração)', 'AirPods Max', 'EarPods com conector Lightning'
    ],
    Samsung: [
      'Galaxy Buds2 Pro', 'Galaxy Buds2', 'Galaxy Buds FE', 'Galaxy Buds Live'
    ]
  },
  Tablets: {
    Apple: [
      'iPad Pro 13" (M4, 2024)', 'iPad Pro 11" (M4, 2024)', 'iPad Air 13" (M2, 2024)', 'iPad Air 11" (M2, 2024)', 'iPad 10ª geração', 'iPad mini 6ª geração'
    ],
    Samsung: [
      'Galaxy Tab S9 Ultra', 'Galaxy Tab S9+', 'Galaxy Tab S9', 'Galaxy Tab S9 FE+', 'Galaxy Tab S9 FE', 'Galaxy Tab A9+', 'Galaxy Tab A9'
    ]
  },
  'Relógios (Smartwatches)': {
    Apple: [
      'Apple Watch Series 9 (41mm, 45mm)', 'Apple Watch SE (2022)', 'Apple Watch Ultra 2'
    ],
    Samsung: [
      'Galaxy Watch 6 Classic', 'Galaxy Watch 6', 'Galaxy Watch 5 Pro', 'Galaxy Watch 5'
    ]
  },
  Notebooks: {
    Apple: [
      'MacBook Air 15" (M3, 2024)', 'MacBook Air 13" (M3, 2024)', 'MacBook Pro 14" (M3, 2023)', 'MacBook Pro 16" (M3, 2023)'
    ],
    Samsung: [
      'Galaxy Book4 Ultra', 'Galaxy Book4 Pro 360', 'Galaxy Book4 Pro', 'Galaxy Book4 360', 'Galaxy Book4'
    ]
  }
};

// Detalhes dos produtos
const detalhesProdutos = {
  // Smartphones Apple
  'iPhone 15 Pro Max': 'Tela Super Retina XDR de 6,7", chip A17 Pro, câmera tripla de 48MP, Titanium, bateria de longa duração e Dynamic Island.',
  'iPhone 15 Pro': 'Tela Super Retina XDR de 6,1", chip A17 Pro, câmera tripla de 48MP, Titanium, Dynamic Island e USB-C.',
  'iPhone 15 Plus': 'Tela de 6,7", chip A16 Bionic, câmera dupla de 48MP, bateria de longa duração, Dynamic Island.',
  'iPhone 15': 'Tela de 6,1", chip A16 Bionic, câmera dupla de 48MP, Dynamic Island, USB-C.',
  'iPhone 14 Pro Max': 'Tela de 6,7", chip A16 Bionic, câmera tripla de 48MP, ProMotion, Dynamic Island.',
  'iPhone 14 Pro': 'Tela de 6,1", chip A16 Bionic, câmera tripla de 48MP, ProMotion, Dynamic Island.',
  'iPhone 14 Plus': 'Tela de 6,7", chip A15 Bionic, câmera dupla de 12MP, bateria de longa duração.',
  'iPhone 14': 'Tela de 6,1", chip A15 Bionic, câmera dupla de 12MP, design resistente.',
  'iPhone 13': 'Tela de 6,1", chip A15 Bionic, câmera dupla de 12MP, bateria para o dia todo.',
  'iPhone SE (3ª geração)': 'Tela de 4,7", chip A15 Bionic, Touch ID, design compacto, 5G.',
  // Smartphones Samsung
  'Galaxy S24 Ultra': 'Tela Dynamic AMOLED 2X de 6,8", Snapdragon 8 Gen 3, câmera quádrupla de 200MP, S Pen integrada.',
  'Galaxy S24+': 'Tela de 6,7", Snapdragon 8 Gen 3, câmera tripla de 50MP, bateria de alta capacidade.',
  'Galaxy S24': 'Tela de 6,2", Snapdragon 8 Gen 3, câmera tripla de 50MP, design premium.',
  'Galaxy S23 Ultra': 'Tela de 6,8", Snapdragon 8 Gen 2, câmera quádrupla de 200MP, S Pen.',
  'Galaxy S23+': 'Tela de 6,6", Snapdragon 8 Gen 2, câmera tripla de 50MP, bateria de longa duração.',
  'Galaxy S23': 'Tela de 6,1", Snapdragon 8 Gen 2, câmera tripla de 50MP, design compacto.',
  'Galaxy S23 FE': 'Tela de 6,4", Exynos 2200, câmera tripla de 50MP, ótimo custo-benefício.',
  'Galaxy Z Fold 5': 'Tela dobrável de 7,6", Snapdragon 8 Gen 2, multitarefa avançada, suporte à S Pen.',
  'Galaxy Z Flip 5': 'Tela dobrável de 6,7", Snapdragon 8 Gen 2, design compacto, Flex Window.',
  'Galaxy A55': 'Tela de 6,6", Exynos 1480, câmera tripla de 50MP, bateria de 5000mAh.',
  'Galaxy A35': 'Tela de 6,6", Exynos 1380, câmera tripla de 50MP, design moderno.',
  'Galaxy A15': 'Tela de 6,5", MediaTek Helio G99, câmera tripla de 50MP, ótimo custo-benefício.',
  // Fones Apple
  'AirPods Pro (2ª geração)': 'Cancelamento ativo de ruído, modo ambiente, áudio espacial, até 6h de bateria.',
  'AirPods (3ª geração)': 'Áudio espacial, resistência à água e suor, até 6h de bateria.',
  'AirPods (2ª geração)': 'Som de alta qualidade, ativação da Siri por voz, até 5h de bateria.',
  'AirPods Max': 'Fone over-ear, cancelamento ativo de ruído, áudio espacial, até 20h de bateria.',
  'EarPods com conector Lightning': 'Fone com fio, controle integrado, áudio de alta qualidade.',
  // Fones Samsung
  'Galaxy Buds2 Pro': 'Cancelamento ativo de ruído, áudio Hi-Fi, até 5h de bateria, resistente à água.',
  'Galaxy Buds2': 'Áudio equilibrado, cancelamento de ruído, até 5h de bateria.',
  'Galaxy Buds FE': 'Design confortável, cancelamento de ruído, até 6h de bateria.',
  'Galaxy Buds Live': 'Design inovador, cancelamento de ruído, até 6h de bateria.',
  // Tablets Apple
  'iPad Pro 13" (M4, 2024)': 'Tela Liquid Retina XDR de 13", chip M4, Face ID, suporte ao Apple Pencil Pro.',
  'iPad Pro 11" (M4, 2024)': 'Tela Liquid Retina de 11", chip M4, Face ID, ultrafino e leve.',
  'iPad Air 13" (M2, 2024)': 'Tela de 13", chip M2, Touch ID, suporte ao Apple Pencil.',
  'iPad Air 11" (M2, 2024)': 'Tela de 11", chip M2, Touch ID, design leve.',
  'iPad 10ª geração': 'Tela de 10,9", chip A14 Bionic, Touch ID, compatível com Apple Pencil.',
  'iPad mini 6ª geração': 'Tela de 8,3", chip A15 Bionic, Touch ID, design compacto.',
  // Tablets Samsung
  'Galaxy Tab S9 Ultra': 'Tela AMOLED de 14,6", Snapdragon 8 Gen 2, S Pen, resistência à água.',
  'Galaxy Tab S9+': 'Tela AMOLED de 12,4", Snapdragon 8 Gen 2, S Pen, bateria de longa duração.',
  'Galaxy Tab S9': 'Tela AMOLED de 11", Snapdragon 8 Gen 2, S Pen, design premium.',
  'Galaxy Tab S9 FE+': 'Tela de 12,4", Exynos 1380, S Pen, bateria de longa duração.',
  'Galaxy Tab S9 FE': 'Tela de 10,9", Exynos 1380, S Pen, ótimo custo-benefício.',
  'Galaxy Tab A9+': 'Tela de 11", Snapdragon 695, bateria de longa duração, design leve.',
  'Galaxy Tab A9': 'Tela de 8,7", MediaTek Helio G99, bateria de longa duração.',
  // Relógios Apple
  'Apple Watch Series 9 (41mm, 45mm)': 'Tela Always-On, chip S9, detecção de acidentes, oxímetro, até 18h de bateria.',
  'Apple Watch SE (2022)': 'Recursos essenciais, detecção de queda, GPS, até 18h de bateria.',
  'Apple Watch Ultra 2': 'Caixa de titânio, tela brilhante, GPS de precisão, até 36h de bateria.',
  // Relógios Samsung
  'Galaxy Watch 6 Classic': 'Design clássico, moldura giratória, monitoramento avançado de saúde.',
  'Galaxy Watch 6': 'Tela AMOLED, monitoramento de sono, bateria de longa duração.',
  'Galaxy Watch 5 Pro': 'Construção robusta, GPS avançado, bateria de até 80h.',
  'Galaxy Watch 5': 'Monitoramento de saúde, bateria de longa duração, design moderno.',
  // Notebooks Apple
  'MacBook Air 15" (M3, 2024)': 'Tela Liquid Retina de 15,3", chip M3, bateria de até 18h, ultrafino.',
  'MacBook Air 13" (M3, 2024)': 'Tela de 13,6", chip M3, bateria de até 18h, design leve.',
  'MacBook Pro 14" (M3, 2023)': 'Tela Liquid Retina XDR de 14", chip M3 Pro/Max, bateria de até 18h.',
  'MacBook Pro 16" (M3, 2023)': 'Tela de 16,2", chip M3 Pro/Max, bateria de até 22h, alto desempenho.',
  // Notebooks Samsung
  'Galaxy Book4 Ultra': 'Tela AMOLED de 16", Intel Core Ultra, GPU RTX 4050, design premium.',
  'Galaxy Book4 Pro 360': 'Tela AMOLED sensível ao toque, Intel Core Ultra, 2 em 1 com S Pen.',
  'Galaxy Book4 Pro': 'Tela AMOLED, Intel Core Ultra, leve e potente.',
  'Galaxy Book4 360': 'Conversível 2 em 1, tela sensível ao toque, Intel Core Ultra.',
  'Galaxy Book4': 'Tela Full HD, Intel Core Ultra, bateria de longa duração.'
};

// Perguntas do fluxo
const perguntas = [
  {
    texto: 'Olá! Eu sou a Índigo 😊 Qual categoria de produto você procura?',
    opcoes: Object.keys(produtos)
  },
  {
    texto: 'Prefere alguma marca?',
    opcoes: [] // Preenchido dinamicamente
  },
  {
    texto: 'Qual modelo você prefere?', // Pergunta mais curta
    opcoes: [] // Preenchido dinamicamente
  },
  {
    texto: 'Ótima escolha! Deseja ver mais detalhes ou adicionar ao carrinho?',
    opcoes: ['Ver detalhes', 'Adicionar ao carrinho', 'Procurar outro produto']
  }
];

let respostas = [];

function mostrarMensagem(texto, isUser = false) {
  const msg = document.createElement('div');
  msg.className = 'modern-chatbot-message' + (isUser ? ' user' : '');
  msg.textContent = texto;
  chatbotMessages.appendChild(msg);
  chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
}

function mostrarOpcoes(opcoes, tipo = 'botoes') {
  chatbotFooter.innerHTML = '';
  if (tipo === 'select') {
    const select = document.createElement('select');
    select.className = 'modern-chatbot-select';
    const optionDefault = document.createElement('option');
    optionDefault.value = '';
    optionDefault.textContent = 'Selecione...';
    optionDefault.disabled = true;
    optionDefault.selected = true;
    select.appendChild(optionDefault);
    opcoes.forEach(opcao => {
      const opt = document.createElement('option');
      opt.value = opcao;
      opt.textContent = opcao;
      select.appendChild(opt);
    });
    select.onchange = () => {
      if (select.value) escolherOpcao(select.value);
    };
    chatbotFooter.appendChild(select);
  } else {
    opcoes.forEach(opcao => {
      const btn = document.createElement('button');
      btn.className = 'modern-chatbot-option';
      btn.textContent = opcao;
      btn.onclick = () => escolherOpcao(opcao);
      chatbotFooter.appendChild(btn);
    });
  }
}

let etapa = 0;

function iniciarChat() {
  chatbotMessages.innerHTML = '';
  respostas = [];
  etapa = 0;
  mostrarMensagem(perguntas[0].texto);
  mostrarOpcoes(perguntas[0].opcoes);
}

function escolherOpcao(opcao) {
  mostrarMensagem(opcao, true);
  respostas.push(opcao);
  etapa++;

  if (etapa === 1) {
    // Marca
    const categoria = respostas[0];
    const marcas = Object.keys(produtos[categoria]);
    perguntas[1].opcoes = marcas;
    setTimeout(() => {
      mostrarMensagem(perguntas[1].texto);
      mostrarOpcoes(marcas);
    }, 400);
  } else if (etapa === 2) {
    // Modelos
    const categoria = respostas[0];
    const marca = respostas[1];
    const modelos = produtos[categoria][marca];
    perguntas[2].opcoes = modelos;
    setTimeout(() => {
      mostrarMensagem(perguntas[2].texto);
      mostrarOpcoes(modelos, 'select'); // Usar select aqui
    }, 400);
  } else if (etapa === 3) {
    // Ação final
    setTimeout(() => {
      mostrarMensagem(perguntas[3].texto);
      mostrarOpcoes(perguntas[3].opcoes);
    }, 400);
  } else if (etapa === 4) {
    // Finalização
    setTimeout(() => {
      if (opcao === 'Ver detalhes') {
        const modelo = respostas[2];
        const detalhes = detalhesProdutos[modelo] || 'Detalhes não disponíveis para este produto no momento.';
        mostrarMensagem('Detalhes do produto: ' + detalhes);
      } else if (opcao === 'Adicionar ao carrinho') {
        mostrarMensagem('Produto adicionado ao carrinho! 🛒');
      } else {
        mostrarMensagem('Sem problemas! Vamos começar de novo.');
        setTimeout(iniciarChat, 1000);
        return;
      }
      mostrarOpcoes(['Procurar outro produto']);
      etapa = 3; // Permite reiniciar
    }, 400);
  }
}

// FAB abre/fecha
chatbotFab.onclick = () => {
  chatbotWindow.classList.add('active');
  chatbotFab.style.display = 'none';
  iniciarChat();
};
chatbotClose.onclick = () => {
  chatbotWindow.classList.remove('active');
  chatbotFab.style.display = 'flex';
};

// Fecha ao clicar fora
window.addEventListener('mousedown', (e) => {
  if (!chatbotWindow.contains(e.target) && !chatbotFab.contains(e.target)) {
    chatbotWindow.classList.remove('active');
    chatbotFab.style.display = 'flex';
  }
});

// Suporte a dark mode dinâmico
const observer = new MutationObserver(() => {
  // Força atualização de cor se o tema mudar
  // (CSS já cobre, mas pode forçar repaint se necessário)
  chatbotWindow.style.background = '';
});
// Theme observer removed
