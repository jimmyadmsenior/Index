@extends('layouts.admin')

@section('title', 'Gerenciar Pedidos')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Gerenciar Pedidos</h1>
            <p class="text-gray-600">Visualize e gerencie todos os pedidos do sistema</p>
        </div>

    </div>

    <!-- Filtros -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <form method="GET" action="{{ route('admin.pedidos') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                <select name="status" class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Todos os status</option>
                    <option value="processando" {{ request('status') === 'processando' ? 'selected' : '' }}>Processando</option>
                    <option value="enviado" {{ request('status') === 'enviado' ? 'selected' : '' }}>Enviado</option>
                    <option value="entregue" {{ request('status') === 'entregue' ? 'selected' : '' }}>Entregue</option>
                    <option value="cancelado" {{ request('status') === 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                </select>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Código de Rastreamento</label>
                <input type="text" name="codigo" value="{{ request('codigo') }}" 
                       placeholder="Digite o código..." 
                       class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Cliente</label>
                <input type="text" name="cliente" value="{{ request('cliente') }}" 
                       placeholder="Nome do cliente..." 
                       class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">
            </div>
            
            <div class="flex items-end">
                <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                    Filtrar
                </button>
            </div>
        </form>
    </div>

    <!-- Tabela de Pedidos -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Código</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cliente</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Valor</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pagamento</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($pedidos as $pedido)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-mono text-gray-900">
                            {{ substr($pedido->codigo_rastreamento, 0, 16) }}...
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <div class="font-medium">{{ $pedido->user->name ?? 'N/A' }}</div>
                            <div class="text-gray-500">{{ $pedido->user->email ?? 'N/A' }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $pedido->created_at->format('d/m/Y H:i') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                            R$ {{ number_format($pedido->valor_total, 2, ',', '.') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <span class="px-2 py-1 text-xs rounded-full
                                @if($pedido->metodo_pagamento === 'pix') bg-green-100 text-green-800
                                @elseif($pedido->metodo_pagamento === 'credito') bg-blue-100 text-blue-800
                                @else bg-purple-100 text-purple-800 @endif">
                                {{ strtoupper($pedido->metodo_pagamento) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <form method="POST" action="{{ route('admin.pedidos.status', $pedido->id) }}" class="inline-block">
                                @csrf
                                @method('PATCH')
                                <select name="status" onchange="this.form.submit()" 
                                        class="text-xs rounded-full border-0 px-2 py-1
                                        @if($pedido->status === 'processando') bg-yellow-100 text-yellow-800
                                        @elseif($pedido->status === 'enviado') bg-blue-100 text-blue-800
                                        @elseif($pedido->status === 'entregue') bg-green-100 text-green-800
                                        @else bg-red-100 text-red-800 @endif">
                                    <option value="processando" {{ $pedido->status === 'processando' ? 'selected' : '' }}>Processando</option>
                                    <option value="enviado" {{ $pedido->status === 'enviado' ? 'selected' : '' }}>Enviado</option>
                                    <option value="entregue" {{ $pedido->status === 'entregue' ? 'selected' : '' }}>Entregue</option>
                                    <option value="cancelado" {{ $pedido->status === 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                                </select>
                            </form>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <button onclick="verDetalhes({{ $pedido->id }})" 
                                    class="text-blue-600 hover:text-blue-900 mr-3">
                                Ver Detalhes
                            </button>
                            <button onclick="confirmarExclusao({{ $pedido->id }})" 
                                    class="text-red-600 hover:text-red-900">
                                Excluir
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-8 text-center text-gray-500">
                            <div class="text-4xl mb-2">📦</div>
                            <p class="text-lg">Nenhum pedido encontrado</p>
                            <p class="text-sm">Ajuste os filtros para ver mais resultados</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginação -->
        @if($pedidos->hasPages())
        <div class="bg-gray-50 px-6 py-3">
            {{ $pedidos->withQueryString()->links() }}
        </div>
        @endif
    </div>
</div>

<!-- Modal de Detalhes -->
<div id="modalDetalhes" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-lg shadow-xl max-w-2xl w-full max-h-screen overflow-y-auto">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-bold text-gray-800">Detalhes do Pedido</h2>
                    <button onclick="fecharModal()" class="text-gray-500 hover:text-gray-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div id="conteudoDetalhes">
                    <!-- Conteúdo carregado via AJAX -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function verDetalhes(pedidoId) {
    document.getElementById('modalDetalhes').classList.remove('hidden');
    document.getElementById('conteudoDetalhes').innerHTML = `
        <div class="text-center py-8">
            <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600 mx-auto"></div>
            <p class="mt-4 text-gray-600">Carregando detalhes...</p>
        </div>
    `;
    
    // Simular carregamento de detalhes (implementar AJAX real aqui)
    setTimeout(() => {
        document.getElementById('conteudoDetalhes').innerHTML = `
            <div class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="text-sm font-medium text-gray-600">Código de Rastreamento</label>
                        <p class="font-mono text-sm bg-gray-100 p-2 rounded">BR123456789ABC${pedidoId}</p>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-600">Data do Pedido</label>
                        <p class="text-sm">${new Date().toLocaleDateString('pt-BR')}</p>
                    </div>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-600">Endereço de Entrega</label>
                    <p class="text-sm bg-gray-100 p-2 rounded">Rua Exemplo, 123 - Bairro - Cidade/UF - CEP 12345-678</p>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-600 block mb-2">Itens do Pedido</label>
                    <div class="border rounded overflow-hidden">
                        <table class="w-full text-sm">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="text-left p-2">Produto</th>
                                    <th class="text-left p-2">Qtd</th>
                                    <th class="text-left p-2">Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="p-2">Produto Exemplo</td>
                                    <td class="p-2">2</td>
                                    <td class="p-2">R$ 50,00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        `;
    }, 1000);
}

function fecharModal() {
    document.getElementById('modalDetalhes').classList.add('hidden');
}

function confirmarExclusao(pedidoId) {
    if (confirm('Tem certeza que deseja excluir este pedido? Esta ação não pode ser desfeita.')) {
        // Implementar exclusão aqui
        alert('Funcionalidade de exclusão será implementada');
    }
}

// Fechar modal ao clicar fora
document.getElementById('modalDetalhes').addEventListener('click', function(e) {
    if (e.target === this) {
        fecharModal();
    }
});
</script>
@endsection