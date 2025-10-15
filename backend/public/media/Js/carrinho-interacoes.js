// JavaScript para notificações do carrinho e interações
document.addEventListener('DOMContentLoaded', function() {
    
    // Função para mostrar notificação de sucesso
    function mostrarNotificacao(mensagem, tipo = 'sucesso') {
        // Remove notificação existente se houver
        const notificacaoExistente = document.querySelector('.carrinho-feedback');
        if (notificacaoExistente) {
            notificacaoExistente.remove();
        }

        // Cria nova notificação
        const notificacao = document.createElement('div');
        notificacao.className = `carrinho-feedback ${tipo}`;
        
        const icone = tipo === 'sucesso' ? 'fas fa-check-circle' : 'fas fa-exclamation-triangle';
        notificacao.innerHTML = `
            <i class="${icone}"></i>
            <span>${mensagem}</span>
        `;

        document.body.appendChild(notificacao);

        // Remove a notificação após 3 segundos
        setTimeout(() => {
            if (notificacao.parentNode) {
                notificacao.remove();
            }
        }, 3000);
    }

    // Intercepta todos os formulários de adicionar ao carrinho
    const formsCarrinho = document.querySelectorAll('form[action*="carrinho/adicionar"]');
    
    formsCarrinho.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const botao = this.querySelector('button[type="submit"]');
            const textoOriginal = botao.innerHTML;
            
            // Mostra loading no botão
            botao.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Adicionando...';
            botao.disabled = true;

            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    mostrarNotificacao('Produto adicionado ao carrinho com sucesso!', 'sucesso');
                    
                    // Atualiza contador do carrinho na navbar se existir
                    const contadorCarrinho = document.querySelector('.cart-count');
                    if (contadorCarrinho && data.cart_count) {
                        contadorCarrinho.textContent = data.cart_count;
                        contadorCarrinho.style.display = data.cart_count > 0 ? 'block' : 'none';
                    }
                } else {
                    mostrarNotificacao(data.message || 'Erro ao adicionar produto ao carrinho', 'erro');
                }
            })
            .catch(error => {
                console.error('Erro:', error);
                mostrarNotificacao('Erro ao adicionar produto ao carrinho', 'erro');
            })
            .finally(() => {
                // Restaura o botão
                botao.innerHTML = textoOriginal;
                botao.disabled = false;
            });
        });
    });

    // Adiciona efeitos de hover para todos os botões de carrinho
    const botoesCarrinho = document.querySelectorAll('.btn-adicionar-carrinho, button[type="submit"].featured-link');
    
    botoesCarrinho.forEach(botao => {
        botao.addEventListener('mouseenter', function() {
            const icone = this.querySelector('.fas.fa-shopping-cart');
            if (icone) {
                icone.style.transform = 'scale(1.2) rotate(10deg)';
            }
        });

        botao.addEventListener('mouseleave', function() {
            const icone = this.querySelector('.fas.fa-shopping-cart');
            if (icone) {
                icone.style.transform = 'scale(1) rotate(0deg)';
            }
        });
    });

    // Adiciona animação para botões de "Ver Produto"
    const botoesVerProduto = document.querySelectorAll('a.featured-link:not([href="/Login"]):not([href="/Cadastro"])');
    
    botoesVerProduto.forEach(botao => {
        botao.addEventListener('click', function(e) {
            // Adiciona efeito de loading
            const loading = document.createElement('i');
            loading.className = 'fas fa-spinner fa-spin';
            loading.style.marginLeft = '8px';
            this.appendChild(loading);
        });
    });
});

// Função para atualizar contador do carrinho (chamada pelo backend quando necessário)
function atualizarContadorCarrinho(count) {
    const contador = document.querySelector('.cart-count');
    if (contador) {
        contador.textContent = count;
        contador.style.display = count > 0 ? 'block' : 'none';
        
        // Animação de pulso
        contador.style.animation = 'none';
        contador.offsetHeight; // trigger reflow
        contador.style.animation = 'pulse 0.6s ease-in-out';
    }
}

// CSS adicional para notificações de erro
const style = document.createElement('style');
style.textContent = `
    .carrinho-feedback.erro {
        background: linear-gradient(135deg, #ff6b6b, #ee5a52) !important;
        color: #fff !important;
    }
    
    .carrinho-feedback.sucesso {
        background: linear-gradient(135deg, #7fff7f, #51cf66) !important;
        color: #000 !important;
    }
    
    .carrinho-feedback i {
        margin-right: 8px;
        font-size: 1.1em;
    }
    
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.2); }
        100% { transform: scale(1); }
    }
`;
document.head.appendChild(style);