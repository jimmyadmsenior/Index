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
        mostrarMensagem('Aqui estão os detalhes do produto: ' + respostas[2]);
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
observer.observe(document.documentElement, { attributes: true, attributeFilter: ['data-theme'] });
