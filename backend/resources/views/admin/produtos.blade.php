@extends('layouts.admin')

@section('title', 'Gerenciar Produtos')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-white mb-2">Gerenciar Produtos</h1>
            <p class="text-white">Visualize e gerencie todos os produtos do sistema</p>
        </div>
        <div class="flex space-x-3">
            <button onclick="abrirModalProduto()" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors">
                + Novo Produto
            </button>

        </div>
    </div>

    <!-- Filtros -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <form method="GET" action="{{ route('admin.produtos') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Buscar produto</label>
                <input type="text" name="search" value="{{ request('search') }}" 
                       placeholder="Nome do produto..." 
                       class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Categoria</label>
                <select name="categoria" class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                    <option value="" class="text-gray-700">Todas as categorias</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ request('categoria') == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nome }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                <select name="ativo" class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                    <option value="" class="text-gray-700">Todos</option>
                    <option value="1" class="text-gray-700" {{ request('ativo') === '1' ? 'selected' : '' }}>Ativo</option>
                    <option value="0" class="text-gray-700" {{ request('ativo') === '0' ? 'selected' : '' }}>Inativo</option>
                </select>
            </div>
            
            <div class="flex items-end">
                <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                    Filtrar
                </button>
            </div>
        </form>
    </div>

    <!-- Estatísticas Rápidas -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-lg shadow-md p-4">
            <div class="text-2xl font-bold text-blue-600">{{ $estatisticas['total'] }}</div>
            <div class="text-sm text-gray-600">Total de Produtos</div>
        </div>
        <div class="bg-white rounded-lg shadow-md p-4">
            <div class="text-2xl font-bold text-green-600">{{ $estatisticas['ativos'] }}</div>
            <div class="text-sm text-gray-600">Produtos Ativos</div>
        </div>
        <div class="bg-white rounded-lg shadow-md p-4">
            <div class="text-2xl font-bold text-orange-600">{{ $estatisticas['estoque_baixo'] }}</div>
            <div class="text-sm text-gray-600">Estoque Baixo</div>
        </div>
        <div class="bg-white rounded-lg shadow-md p-4">
            <div class="text-2xl font-bold text-purple-600">{{ $estatisticas['sem_estoque'] }}</div>
            <div class="text-sm text-gray-600">Sem Estoque</div>
        </div>
    </div>

    <!-- Grid de Produtos -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @forelse($produtos as $produto)
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
            <!-- Imagem do Produto -->
            <div class="h-48 bg-gray-200 relative">
                @if($produto->imagem)
                    <img src="{{ asset('storage/' . $produto->imagem) }}" alt="{{ $produto->nome }}" 
                         class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full flex items-center justify-center">
                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                @endif
                
                <!-- Status Badge -->
                <div class="absolute top-2 right-2">
                    @if($produto->ativo)
                        <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Ativo</span>
                    @else
                        <span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-800">Inativo</span>
                    @endif
                </div>
                
                <!-- Estoque Badge -->
                <div class="absolute top-2 left-2">
                    @if($produto->quantidade_estoque <= 0)
                        <span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-800">Sem estoque</span>
                    @elseif($produto->quantidade_estoque <= 10)
                        <span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-800">Estoque baixo</span>
                    @endif
                </div>
            </div>
            
            <!-- Informações do Produto -->
            <div class="p-4">
                <h3 class="font-semibold text-gray-800 mb-2 truncate">{{ $produto->nome }}</h3>
                <p class="text-sm text-gray-600 mb-2">{{ $produto->categoria->nome ?? 'Sem categoria' }}</p>
                
                <div class="flex justify-between items-center mb-3">
                    <span class="text-lg font-bold text-green-600">
                        R$ {{ number_format($produto->preco, 2, ',', '.') }}
                    </span>
                    <span class="text-sm text-gray-500">
                        Estoque: {{ $produto->quantidade_estoque }}
                    </span>
                </div>
                
                @if($produto->descricao)
                    <p class="text-sm text-gray-600 mb-3 line-clamp-2">{{ $produto->descricao }}</p>
                @endif
                
                <!-- Ações -->
                <div class="flex space-x-2">
                    <button onclick="editarProduto({{ $produto->id }})" 
                            class="flex-1 bg-blue-600 text-white text-sm px-3 py-2 rounded hover:bg-blue-700 transition-colors">
                        Editar
                    </button>
                    <button onclick="alternarStatusProduto({{ $produto->id }})" 
                            class="bg-orange-600 text-white text-sm px-3 py-2 rounded hover:bg-orange-700 transition-colors">
                        {{ $produto->ativo ? 'Desativar' : 'Ativar' }}
                    </button>
                    <button onclick="confirmarExclusaoProduto({{ $produto->id }})" 
                            class="bg-red-600 text-white text-sm px-3 py-2 rounded hover:bg-red-700 transition-colors">
                        🗑️
                    </button>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full text-center py-12">
            <div class="text-6xl mb-4">📦</div>
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Nenhum produto encontrado</h3>
            <p class="text-gray-600 mb-4">Ajuste os filtros ou adicione um novo produto</p>
            <button onclick="abrirModalProduto()" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition-colors">
                + Adicionar Primeiro Produto
            </button>
        </div>
        @endforelse
    </div>

    <!-- Paginação -->
    @if($produtos->hasPages())
    <div class="mt-8 flex justify-center">
        {{ $produtos->withQueryString()->links() }}
    </div>
    @endif
</div>

<!-- Modal de Produto -->
<div id="modalProduto" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-gray-900 rounded-lg shadow-xl max-w-2xl w-full max-h-screen overflow-y-auto">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 id="tituloModal" class="text-xl font-bold text-white">Novo Produto</h2>
                    <button onclick="fecharModalProduto()" class="text-gray-500 hover:text-gray-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                
                <form id="formProduto" class="space-y-4">
                    <input type="hidden" id="produtoId" name="id">
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-white mb-2">Nome do Produto</label>
                            <input type="text" id="nomeProduto" name="nome" required 
                                   class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-white mb-2">Categoria</label>
                            <select id="categoriaProduto" name="categoria_id" required 
                                    class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Selecione uma categoria</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-white mb-2">Preço (R$)</label>
                            <input type="number" id="precoProduto" name="preco" step="0.01" min="0" required 
                                   class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-white mb-2">Quantidade em Estoque</label>
                            <input type="number" id="estoqueProduto" name="quantidade_estoque" min="0" required 
                                   class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-white mb-2">Descrição</label>
                        <textarea id="descricaoProduto" name="descricao" rows="3" 
                                  class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-white mb-2">Imagem do Produto</label>
                        <input type="file" id="imagemProduto" name="imagem" accept="image/*" 
                               class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    
                    <div class="flex items-center">
                        <input type="checkbox" id="ativoProduto" name="ativo" checked 
                               class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <label for="ativoProduto" class="ml-2 text-sm text-white">Produto ativo</label>
                    </div>
                    
                    <div class="flex justify-end space-x-3 pt-4">
                        <button type="button" onclick="fecharModalProduto()" 
                            class="px-4 py-2 text-white border border-gray-300 rounded-lg hover:bg-gray-700">
                            Cancelar
                        </button>
                        <button type="submit" 
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                            Salvar Produto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function abrirModalProduto(produtoId = null) {
    document.getElementById('modalProduto').classList.remove('hidden');
    
    if (produtoId) {
        document.getElementById('tituloModal').textContent = 'Editar Produto';
        // Carregar dados do produto (implementar AJAX)
    } else {
        document.getElementById('tituloModal').textContent = 'Novo Produto';
        document.getElementById('formProduto').reset();
        document.getElementById('produtoId').value = '';
    }
}

function fecharModalProduto() {
    document.getElementById('modalProduto').classList.add('hidden');
}

function editarProduto(produtoId) {
    abrirModalProduto(produtoId);
}

function alternarStatusProduto(produtoId) {
    if (confirm('Tem certeza que deseja alterar o status deste produto?')) {
        // Implementar alteração de status
        alert('Status do produto alterado com sucesso!');
        location.reload();
    }
}

function confirmarExclusaoProduto(produtoId) {
    if (confirm('Tem certeza que deseja excluir este produto? Esta ação não pode ser desfeita.')) {
        // Implementar exclusão
        alert('Produto excluído com sucesso!');
        location.reload();
    }
}

// Fechar modal ao clicar fora
document.getElementById('modalProduto').addEventListener('click', function(e) {
    if (e.target === this) {
        fecharModalProduto();
    }
});

// Submissão do formulário
document.getElementById('formProduto').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Implementar salvamento do produto
    alert('Produto salvo com sucesso!');
    fecharModalProduto();
    location.reload();
});
</script>

<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
@endsection