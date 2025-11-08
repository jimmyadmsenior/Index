@extends('layouts.admin')

@section('title', 'Gerenciar Pedidos')
@section('subtitle', 'Visualize e gerencie todos os pedidos do sistema')

@section('content')
<div class="space-y-6">
    <!-- Filtros -->
    <div class="glass-card rounded-xl p-6">
        <form method="GET" action="{{ route('admin.pedidos') }}" class="grid grid-cols-1 md:grid-cols-5 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Status</label>
                <select name="status" class="w-full bg-gray-800 border border-gray-600 rounded-lg px-3 py-2 text-white">
                    <option value="">Todos os Status</option>
                    <option value="processando" {{ request('status') === 'processando' ? 'selected' : '' }}>Processando</option>
                    <option value="enviado" {{ request('status') === 'enviado' ? 'selected' : '' }}>Enviado</option>
                    <option value="entregue" {{ request('status') === 'entregue' ? 'selected' : '' }}>Entregue</option>
                    <option value="cancelado" {{ request('status') === 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Método de Pagamento</label>
                <select name="pagamento" class="w-full bg-gray-800 border border-gray-600 rounded-lg px-3 py-2 text-white">
                    <option value="">Todos os Métodos</option>
                    <option value="pix" {{ request('pagamento') === 'pix' ? 'selected' : '' }}>PIX</option>
                    <option value="credito" {{ request('pagamento') === 'credito' ? 'selected' : '' }}>Cartão de Crédito</option>
                    <option value="debito" {{ request('pagamento') === 'debito' ? 'selected' : '' }}>Cartão de Débito</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Data Inicial</label>
                <input type="date" name="data_inicio" value="{{ request('data_inicio') }}" 
                       class="w-full bg-gray-800 border border-gray-600 rounded-lg px-3 py-2 text-white">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Data Final</label>
                <input type="date" name="data_fim" value="{{ request('data_fim') }}" 
                       class="w-full bg-gray-800 border border-gray-600 rounded-lg px-3 py-2 text-white">
            </div>

            <div class="flex items-end">
                <button type="submit" class="w-full bg-white text-black px-4 py-2 rounded-lg font-medium hover:bg-gray-200 transition-colors">
                    Filtrar
                </button>
            </div>
        </form>
    </div>

    <!-- Tabela de Pedidos -->
    <div class="glass-card rounded-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead class="bg-white/10">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Código</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Cliente</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Valor</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Pagamento</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Data</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @forelse($pedidos as $pedido)
                    <tr class="hover:bg-white/5 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-mono text-gray-300">
                            {{ substr($pedido->codigo_rastreamento, 0, 12) }}...
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                            <div class="font-medium">{{ $pedido->user->name ?? 'N/A' }}</div>
                            <div class="text-gray-400 text-xs">{{ $pedido->user->email ?? 'N/A' }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-white">
                            R$ {{ number_format($pedido->valor_total, 2, ',', '.') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <span class="px-2 py-1 text-xs rounded-full font-medium
                                @if($pedido->metodo_pagamento === 'pix') bg-green-400/20 text-green-300 border border-green-400/30
                                @elseif($pedido->metodo_pagamento === 'credito') bg-blue-400/20 text-blue-300 border border-blue-400/30
                                @else bg-purple-400/20 text-purple-300 border border-purple-400/30 @endif">
                                {{ strtoupper($pedido->metodo_pagamento) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <form method="POST" action="{{ route('admin.pedidos.status', $pedido->id) }}" class="inline-block">
                                @csrf
                                @method('PATCH')
                                <select name="status" onchange="this.form.submit()" 
                                        class="text-xs rounded-full border-0 px-2 py-1 font-medium
                                        @if($pedido->status === 'processando') bg-yellow-400/20 text-yellow-300
                                        @elseif($pedido->status === 'enviado') bg-blue-400/20 text-blue-300
                                        @elseif($pedido->status === 'entregue') bg-green-400/20 text-green-300
                                        @else bg-red-400/20 text-red-300 @endif">
                                    <option value="processando" {{ $pedido->status === 'processando' ? 'selected' : '' }}>Processando</option>
                                    <option value="enviado" {{ $pedido->status === 'enviado' ? 'selected' : '' }}>Enviado</option>
                                    <option value="entregue" {{ $pedido->status === 'entregue' ? 'selected' : '' }}>Entregue</option>
                                    <option value="cancelado" {{ $pedido->status === 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                                </select>
                            </form>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                            {{ $pedido->created_at->format('d/m/Y H:i') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <button onclick="verDetalhes({{ $pedido->id }})"
                                    class="text-white hover:text-gray-300 transition-colors mr-2">
                                Ver
                            </button>
                            <button onclick="confirmarExclusao({{ $pedido->id }})"
                                    class="text-red-400 hover:text-red-300 transition-colors">
                                Excluir
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center text-gray-400">
                            <div class="text-6xl mb-4">📦</div>
                            <p class="text-xl text-white mb-2">Nenhum pedido encontrado</p>
                            <p class="text-sm">Ajuste os filtros para ver mais resultados</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Paginação -->
    <div class="flex justify-center">
        {{ $pedidos->appends(request()->query())->links() }}
    </div>
</div>

@push('scripts')
<script>
function verDetalhes(id) {
    // Implementar modal ou redirecionamento para detalhes
    console.log('Ver detalhes do pedido:', id);
}

function confirmarExclusao(id) {
    if (confirm('Tem certeza que deseja excluir este pedido?')) {
        // Implementar exclusão
        console.log('Excluir pedido:', id);
    }
}
</script>
@endpush

@endsection