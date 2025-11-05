{{-- Componente de busca de produtos reutilizável --}}
<div class="product-search-container" data-categoria="{{ $categoria ?? '' }}">
    <form action="{{ route('buscar') }}" method="GET" class="search-form">
        <div class="search-input-wrapper">
            <input 
                type="text" 
                id="productSearch" 
                name="q"
                class="product-search-input" 
                placeholder="Buscar {{ strtolower($categoria ?? 'produtos') }}... Ex: iPhone, Galaxy, AirPods"
                autocomplete="off"
                value="{{ request('q') ?? '' }}"
            >
            @if($categoria)
                <input type="hidden" name="categoria" value="{{ $categoria }}">
            @endif
            <button type="submit" class="search-button">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </form>
    
    <div id="searchResults" class="search-results" style="display: none;">
        <div class="search-results-content">
            <!-- Os resultados serão inseridos aqui via JavaScript -->
        </div>
    </div>
</div>

<style>
.product-search-container {
    position: relative;
    max-width: 600px;
    margin: 20px auto;
    z-index: 1000;
}

.search-form {
    width: 100%;
}

.search-input-wrapper {
    position: relative;
    display: flex;
    align-items: center;
}

.product-search-input {
    width: 100%;
    padding: 15px 60px 15px 20px;
    border: 2px solid #e5e5e5;
    border-radius: 25px;
    font-size: 16px;
    outline: none;
    transition: all 0.3s ease;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
}

.product-search-input:focus {
    border-color: #007aff;
    box-shadow: 0 0 0 3px rgba(0, 122, 255, 0.1);
}

.search-button {
    position: absolute;
    right: 5px;
    background: #007aff;
    color: white;
    border: none;
    border-radius: 20px;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 16px;
}

.search-button:hover {
    background: #0056b3;
    transform: scale(1.05);
}

.search-results {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background: white;
    border: 1px solid #e5e5e5;
    border-radius: 15px;
    margin-top: 5px;
    max-height: 400px;
    overflow-y: auto;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(10px);
}

.search-results-content {
    padding: 10px 0;
}

.search-result-item {
    padding: 12px 20px;
    cursor: pointer;
    border-bottom: 1px solid #f5f5f5;
    transition: background-color 0.2s ease;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.search-result-item:hover {
    background-color: #f8f9fa;
}

.search-result-item:last-child {
    border-bottom: none;
}

.search-result-name {
    font-weight: 600;
    color: #333;
    font-size: 14px;
}

.search-result-brand {
    color: #666;
    font-size: 12px;
    margin-top: 2px;
}

.search-result-price {
    font-weight: 700;
    color: #007aff;
    font-size: 14px;
}

.search-no-results {
    padding: 20px;
    text-align: center;
    color: #999;
    font-style: italic;
}

.search-loading {
    padding: 20px;
    text-align: center;
    color: #666;
}

@media (max-width: 768px) {
    .product-search-container {
        margin: 15px 20px;
    }
    
    .product-search-input {
        padding: 12px 55px 12px 15px;
        font-size: 14px;
    }
    
    .search-button {
        width: 35px;
        height: 35px;
        font-size: 14px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('productSearch');
    const searchResults = document.getElementById('searchResults');
    const searchResultsContent = searchResults.querySelector('.search-results-content');
    const categoria = document.querySelector('.product-search-container').getAttribute('data-categoria');
    
    let searchTimeout;
    
    // Função para buscar produtos
    function buscarProdutos(termo) {
        if (termo.length < 2) {
            searchResults.style.display = 'none';
            return;
        }
        
        // Mostra loading
        searchResultsContent.innerHTML = '<div class="search-loading"><i class="fas fa-spinner fa-spin"></i> Buscando...</div>';
        searchResults.style.display = 'block';
        
        // Constrói a URL da API
        let url = `/api/produtos/buscar`;
        if (categoria) {
            url += `/${categoria}`;
        }
        url += `?q=${encodeURIComponent(termo)}`;
        
        fetch(url)
            .then(response => response.json())
            .then(produtos => {
                if (produtos.length === 0) {
                    searchResultsContent.innerHTML = '<div class="search-no-results">Nenhum produto encontrado</div>';
                } else {
                    let html = '';
                    produtos.forEach(produto => {
                        html += `
                            <div class="search-result-item" data-produto-id="${produto.id}">
                                <div>
                                    <div class="search-result-name">${produto.nome}</div>
                                    <div class="search-result-brand">${produto.marca}</div>
                                </div>
                                <div class="search-result-price">R$ ${parseFloat(produto.preco).toLocaleString('pt-BR', {minimumFractionDigits: 2})}</div>
                            </div>
                        `;
                    });
                    searchResultsContent.innerHTML = html;
                    
                    // Adiciona event listeners para os resultados
                    document.querySelectorAll('.search-result-item').forEach(item => {
                        item.addEventListener('click', function() {
                            const produtoId = this.getAttribute('data-produto-id');
                            const produtoNome = this.querySelector('.search-result-name').textContent;
                            
                            // Redireciona para a página do produto
                            window.location.href = `/produto/${produtoId}`;
                        });
                    });
                }
            })
            .catch(error => {
                console.error('Erro na busca:', error);
                searchResultsContent.innerHTML = '<div class="search-no-results">Erro na busca. Tente novamente.</div>';
            });
    }
    
    // Event listener para input
    searchInput.addEventListener('input', function() {
        const termo = this.value.trim();
        
        // Cancela busca anterior se ainda estiver pendente
        if (searchTimeout) {
            clearTimeout(searchTimeout);
        }
        
        // Debounce: espera 300ms após parar de digitar
        searchTimeout = setTimeout(() => {
            buscarProdutos(termo);
        }, 300);
    });
    
    // Fecha resultados ao clicar fora
    document.addEventListener('click', function(e) {
        if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
            searchResults.style.display = 'none';
        }
    });
    
    // Mostra resultados ao focar no input (se já tem conteúdo)
    searchInput.addEventListener('focus', function() {
        if (this.value.trim().length >= 2) {
            buscarProdutos(this.value.trim());
        }
    });
});
</script>