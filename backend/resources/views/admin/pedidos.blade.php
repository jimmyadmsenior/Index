@extends('layouts.admin')@extends('layouts.admin')



@section('title', 'Gerenciar Pedidos')@section('title', 'Gerenciar Pedidos')

@section('subtitle', 'Visualize e gerencie todos os pedidos do sistema')@section('subtitle', 'Visualize e gerencie todos os pedidos do sistema')



@section('content')@section('content')

<div class="space-y-8"><div class="space-y-8">

    <!-- Filtros -->    <!-- Filtros -->

    <div class="glass-card rounded-xl p-6">    <div class="glass-card rounded-xl p-6">

        <h3 class="text-lg font-semibold text-white mb-4">Filtros de Pesquisa</h3>        <h3 class="text-lg font-semibold text-white mb-4">Filtros de Pesquisa</h3>

        <form method="GET" action="{{ route('admin.pedidos') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">        <form method="GET" action="{{ route('admin.pedidos') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">

            <div>            <div>

                <label class="block text-sm font-medium text-gray-300 mb-2">Status</label>                <label class="block text-sm font-medium text-gray-300 mb-2">Status</label>

                <select name="status" class="w-full rounded-lg bg-gray-800 border border-gray-600 text-white focus:ring-white focus:border-white">                <select name="status" class="w-full rounded-lg bg-gray-800 border border-gray-600 text-white focus:ring-white focus:border-white">

                    <option value="">Todos os status</option>                    <option value="">Todos os status</option>

                    <option value="processando" {{ request('status') === 'processando' ? 'selected' : '' }}>Processando</option>                    <option value="processando" {{ request('status') === 'processando' ? 'selected' : '' }}>Processando</option>

                    <option value="enviado" {{ request('status') === 'enviado' ? 'selected' : '' }}>Enviado</option>                    <option value="enviado" {{ request('status') === 'enviado' ? 'selected' : '' }}>Enviado</option>

                    <option value="entregue" {{ request('status') === 'entregue' ? 'selected' : '' }}>Entregue</option>                    <option value="entregue" {{ request('status') === 'entregue' ? 'selected' : '' }}>Entregue</option>

                    <option value="cancelado" {{ request('status') === 'cancelado' ? 'selected' : '' }}>Cancelado</option>                    <option value="cancelado" {{ request('status') === 'cancelado' ? 'selected' : '' }}>Cancelado</option>

                </select>                </select>

            </div>            </div>

                        

            <div>            <div>

                <label class="block text-sm font-medium text-gray-300 mb-2">Código de Rastreamento</label>                <label class="block text-sm font-medium text-gray-300 mb-2">Código de Rastreamento</label>

                <input type="text" name="codigo" value="{{ request('codigo') }}"                 <input type="text" name="codigo" value="{{ request('codigo') }}" 

                       placeholder="Digite o código..."                        placeholder="Digite o código..." 

                       class="w-full rounded-lg bg-gray-800 border border-gray-600 text-white placeholder-gray-400 focus:ring-white focus:border-white">                       class="w-full rounded-lg bg-gray-800 border border-gray-600 text-white placeholder-gray-400 focus:ring-white focus:border-white">

            </div>            </div>

                        

            <div>            <div>

                <label class="block text-sm font-medium text-gray-300 mb-2">Cliente</label>                <label class="block text-sm font-medium text-gray-300 mb-2">Cliente</label>

                <input type="text" name="cliente" value="{{ request('cliente') }}"                 <input type="text" name="cliente" value="{{ request('cliente') }}" 

                       placeholder="Nome do cliente..."                        placeholder="Nome do cliente..." 

                       class="w-full rounded-lg bg-gray-800 border border-gray-600 text-white placeholder-gray-400 focus:ring-white focus:border-white">                       class="w-full rounded-lg bg-gray-800 border border-gray-600 text-white placeholder-gray-400 focus:ring-white focus:border-white">

            </div>            </div>

                        

            <div class="flex items-end">            <div class="flex items-end">

                <button type="submit" class="w-full bg-white text-black px-4 py-2 rounded-lg hover:bg-gray-200 transition-colors font-medium">                <button type="submit" class="w-full bg-white text-black px-4 py-2 rounded-lg hover:bg-gray-200 transition-colors font-medium">

                    Filtrar Pedidos                    Filtrar Pedidos

                </button>                </button>

            </div>            </div>

        </form>        </form>

    </div>    </div>



    <!-- Lista de Pedidos -->    <!-- Tabela de Pedidos -->

    <div class="glass-card rounded-xl overflow-hidden">    <div class="bg-white rounded-lg shadow-md overflow-hidden">

        <div class="p-6 border-b border-gray-700">        <div class="overflow-x-auto">

            <h3 class="text-lg font-semibold text-white">Lista de Pedidos</h3>            <table class="min-w-full table-auto">

            <p class="text-gray-300 text-sm">{{ $pedidos->total() ?? 0 }} pedidos encontrados</p>                <thead class="bg-gray-50">

        </div>                    <tr>

                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Código</th>

        <div class="overflow-x-auto">                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cliente</th>

            <table class="min-w-full divide-y divide-gray-700">                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data</th>

                <thead class="bg-gray-800/50">                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Valor</th>

                    <tr>                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pagamento</th>

                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Código</th>                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>

                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Cliente</th>                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>

                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Data</th>                    </tr>

                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Valor</th>                </thead>

                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Pagamento</th>                <tbody class="bg-white divide-y divide-gray-200">

                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Status</th>                    @forelse($pedidos as $pedido)

                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Ações</th>                    <tr class="hover:bg-gray-50">

                    </tr>                        <td class="px-6 py-4 whitespace-nowrap text-sm font-mono text-gray-900">

                </thead>                            {{ substr($pedido->codigo_rastreamento, 0, 16) }}...

                <tbody class="divide-y divide-gray-700">                        </td>

                    @forelse($pedidos ?? [] as $pedido)                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">

                    <tr class="hover:bg-white/5 transition-colors">                            <div class="font-medium">{{ $pedido->user->name ?? 'N/A' }}</div>

                        <td class="px-6 py-4 whitespace-nowrap text-sm font-mono text-gray-300">                            <div class="text-gray-500">{{ $pedido->user->email ?? 'N/A' }}</div>

                            {{ substr($pedido->codigo_rastreamento, 0, 16) }}...                        </td>

                        </td>                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">

                        <td class="px-6 py-4 whitespace-nowrap text-sm text-white">                            {{ $pedido->created_at->format('d/m/Y H:i') }}

                            <div class="font-medium">{{ $pedido->user->name ?? 'N/A' }}</div>                        </td>

                            <div class="text-gray-400">{{ $pedido->user->email ?? 'N/A' }}</div>                        <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">

                        </td>                            R$ {{ number_format($pedido->valor_total, 2, ',', '.') }}

                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">                        </td>

                            {{ $pedido->created_at->format('d/m/Y H:i') }}                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">

                        </td>                            <span class="px-2 py-1 text-xs rounded-full

                        <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-white">                                @if($pedido->metodo_pagamento === 'pix') bg-green-100 text-green-800

                            R$ {{ number_format($pedido->valor_total, 2, ',', '.') }}                                @elseif($pedido->metodo_pagamento === 'credito') bg-blue-100 text-blue-800

                        </td>                                @else bg-purple-100 text-purple-800 @endif">

                        <td class="px-6 py-4 whitespace-nowrap text-sm">                                {{ strtoupper($pedido->metodo_pagamento) }}

                            <span class="px-2 py-1 text-xs rounded-full font-medium border                            </span>

                                @if($pedido->metodo_pagamento === 'pix') bg-green-400/20 text-green-300 border-green-400/30                        </td>

                                @elseif($pedido->metodo_pagamento === 'credito') bg-blue-400/20 text-blue-300 border-blue-400/30                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">

                                @else bg-purple-400/20 text-purple-300 border-purple-400/30 @endif">                            <form method="POST" action="{{ route('admin.pedidos.status', $pedido->id) }}" class="inline-block">

                                {{ strtoupper($pedido->metodo_pagamento) }}                                @csrf

                            </span>                                @method('PATCH')

                        </td>                                <select name="status" onchange="this.form.submit()" 

                        <td class="px-6 py-4 whitespace-nowrap text-sm">                                        class="text-xs rounded-full border-0 px-2 py-1

                            <form method="POST" action="{{ route('admin.pedidos.status', $pedido->id) }}" class="inline-block">                                        @if($pedido->status === 'processando') bg-yellow-100 text-yellow-800

                                @csrf                                        @elseif($pedido->status === 'enviado') bg-blue-100 text-blue-800

                                @method('PATCH')                                        @elseif($pedido->status === 'entregue') bg-green-100 text-green-800

                                <select name="status" onchange="this.form.submit()"                                         @else bg-red-100 text-red-800 @endif">

                                        class="text-xs rounded-full border-0 px-2 py-1 bg-gray-800 text-white                                    <option value="processando" {{ $pedido->status === 'processando' ? 'selected' : '' }}>Processando</option>

                                        @if($pedido->status === 'processando') bg-yellow-400/20 text-yellow-300                                    <option value="enviado" {{ $pedido->status === 'enviado' ? 'selected' : '' }}>Enviado</option>

                                        @elseif($pedido->status === 'enviado') bg-blue-400/20 text-blue-300                                    <option value="entregue" {{ $pedido->status === 'entregue' ? 'selected' : '' }}>Entregue</option>

                                        @elseif($pedido->status === 'entregue') bg-green-400/20 text-green-300                                    <option value="cancelado" {{ $pedido->status === 'cancelado' ? 'selected' : '' }}>Cancelado</option>

                                        @else bg-red-400/20 text-red-300 @endif">                                </select>

                                    <option value="processando" {{ $pedido->status === 'processando' ? 'selected' : '' }}>Processando</option>                            </form>

                                    <option value="enviado" {{ $pedido->status === 'enviado' ? 'selected' : '' }}>Enviado</option>                        </td>

                                    <option value="entregue" {{ $pedido->status === 'entregue' ? 'selected' : '' }}>Entregue</option>                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">

                                    <option value="cancelado" {{ $pedido->status === 'cancelado' ? 'selected' : '' }}>Cancelado</option>                            <button onclick="verDetalhes({{ $pedido->id }})" 

                                </select>                                    class="text-blue-600 hover:text-blue-900 mr-3">

                            </form>                                Ver Detalhes

                        </td>                            </button>

                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">                            <button onclick="confirmarExclusao({{ $pedido->id }})" 

                            <button onclick="verDetalhes({{ $pedido->id }})"                                     class="text-red-600 hover:text-red-900">

                                    class="text-white hover:text-gray-300 mr-3 transition-colors">                                Excluir

                                Ver Detalhes                            </button>

                            </button>                        </td>

                            <button onclick="confirmarExclusao({{ $pedido->id }})"                     </tr>

                                    class="text-red-400 hover:text-red-300 transition-colors">                    @empty

                                Excluir                    <tr>

                            </button>                        <td colspan="7" class="px-6 py-8 text-center text-gray-500">

                        </td>                            <div class="text-4xl mb-2">📦</div>

                    </tr>                            <p class="text-lg">Nenhum pedido encontrado</p>

                    @empty                            <p class="text-sm">Ajuste os filtros para ver mais resultados</p>

                    <tr>                        </td>

                        <td colspan="7" class="px-6 py-12 text-center text-gray-400">                    </tr>

                            <div class="text-6xl mb-4">📦</div>                    @endforelse

                            <p class="text-xl text-white mb-2">Nenhum pedido encontrado</p>                </tbody>

                            <p class="text-sm">Ajuste os filtros para ver mais resultados</p>            </table>

                        </td>        </div>

                    </tr>

                    @endforelse        <!-- Paginação -->

                </tbody>        @if($pedidos->hasPages())

            </table>        <div class="bg-gray-50 px-6 py-3">

        </div>            {{ $pedidos->withQueryString()->links() }}

        </div>

        <!-- Paginação -->        @endif

        @if(isset($pedidos) && $pedidos->hasPages())    </div>

        <div class="bg-gray-800/30 px-6 py-4"></div>

            <div class="flex justify-center">

                {{ $pedidos->withQueryString()->links() }}<!-- Modal de Detalhes -->

            </div><div id="modalDetalhes" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50">

        </div>    <div class="flex items-center justify-center min-h-screen p-4">

        @endif        <div class="bg-white rounded-lg shadow-xl max-w-2xl w-full max-h-screen overflow-y-auto">

    </div>            <div class="p-6">

</div>                <div class="flex items-center justify-between mb-4">

                    <h2 class="text-xl font-bold text-gray-800">Detalhes do Pedido</h2>

<!-- Modal de Detalhes -->                    <button onclick="fecharModal()" class="text-gray-500 hover:text-gray-700">

<div id="modalDetalhes" class="fixed inset-0 bg-black/70 backdrop-blur-sm hidden z-50">                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

    <div class="flex items-center justify-center min-h-screen p-4">                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>

        <div class="glass-card rounded-xl shadow-2xl max-w-2xl w-full max-h-screen overflow-y-auto">                        </svg>

            <div class="p-6">                    </button>

                <div class="flex items-center justify-between mb-6">                </div>

                    <h2 class="text-xl font-bold text-white">Detalhes do Pedido</h2>                <div id="conteudoDetalhes">

                    <button onclick="fecharModal()" class="text-gray-400 hover:text-white transition-colors">                    <!-- Conteúdo carregado via AJAX -->

                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">                </div>

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>            </div>

                        </svg>        </div>

                    </button>    </div>

                </div></div>

                <div id="conteudoDetalhes" class="text-white">

                    <!-- Conteúdo carregado via AJAX --><script>

                </div>function verDetalhes(pedidoId) {

            </div>    document.getElementById('modalDetalhes').classList.remove('hidden');

        </div>    document.getElementById('conteudoDetalhes').innerHTML = `

    </div>        <div class="text-center py-8">

</div>            <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600 mx-auto"></div>

            <p class="mt-4 text-gray-600">Carregando detalhes...</p>

@push('scripts')        </div>

<script>    `;

function verDetalhes(pedidoId) {    

    document.getElementById('modalDetalhes').classList.remove('hidden');    // Simular carregamento de detalhes (implementar AJAX real aqui)

    document.getElementById('conteudoDetalhes').innerHTML = '<div class="text-center py-8"><div class="animate-spin rounded-full h-8 w-8 border-b-2 border-white mx-auto"></div><p class="mt-2">Carregando...</p></div>';    setTimeout(() => {

            document.getElementById('conteudoDetalhes').innerHTML = `

    // Simular carregamento de detalhes            <div class="space-y-4">

    setTimeout(() => {                <div class="grid grid-cols-2 gap-4">

        document.getElementById('conteudoDetalhes').innerHTML = `                    <div>

            <div class="space-y-4">                        <label class="text-sm font-medium text-gray-600">Código de Rastreamento</label>

                <div class="grid grid-cols-2 gap-4">                        <p class="font-mono text-sm bg-gray-100 p-2 rounded">BR123456789ABC${pedidoId}</p>

                    <div>                    </div>

                        <label class="text-gray-300 text-sm">ID do Pedido</label>                    <div>

                        <p class="font-semibold">#${pedidoId}</p>                        <label class="text-sm font-medium text-gray-600">Data do Pedido</label>

                    </div>                        <p class="text-sm">${new Date().toLocaleDateString('pt-BR')}</p>

                    <div>                    </div>

                        <label class="text-gray-300 text-sm">Status</label>                </div>

                        <p class="font-semibold">Processando</p>                <div>

                    </div>                    <label class="text-sm font-medium text-gray-600">Endereço de Entrega</label>

                </div>                    <p class="text-sm bg-gray-100 p-2 rounded">Rua Exemplo, 123 - Bairro - Cidade/UF - CEP 12345-678</p>

                <div>                </div>

                    <label class="text-gray-300 text-sm">Produtos</label>                <div>

                    <div class="mt-2 space-y-2">                    <label class="text-sm font-medium text-gray-600 block mb-2">Itens do Pedido</label>

                        <div class="bg-gray-800/50 p-3 rounded-lg">                    <div class="border rounded overflow-hidden">

                            <p class="font-medium">Produto exemplo</p>                        <table class="w-full text-sm">

                            <p class="text-sm text-gray-400">Quantidade: 1 | Valor: R$ 199,90</p>                            <thead class="bg-gray-50">

                        </div>                                <tr>

                    </div>                                    <th class="text-left p-2">Produto</th>

                </div>                                    <th class="text-left p-2">Qtd</th>

            </div>                                    <th class="text-left p-2">Valor</th>

        `;                                </tr>

    }, 1000);                            </thead>

}                            <tbody>

                                <tr>

function fecharModal() {                                    <td class="p-2">Produto Exemplo</td>

    document.getElementById('modalDetalhes').classList.add('hidden');                                    <td class="p-2">2</td>

}                                    <td class="p-2">R$ 50,00</td>

                                </tr>

function confirmarExclusao(pedidoId) {                            </tbody>

    if (confirm('Tem certeza que deseja excluir este pedido? Esta ação não pode ser desfeita.')) {                        </table>

        // Implementar exclusão                    </div>

        alert('Funcionalidade de exclusão será implementada');                </div>

    }            </div>

}        `;

    }, 1000);

// Fechar modal ao clicar no fundo}

document.getElementById('modalDetalhes').addEventListener('click', function(e) {

    if (e.target === this) {function fecharModal() {

        fecharModal();    document.getElementById('modalDetalhes').classList.add('hidden');

    }}

});

</script>function confirmarExclusao(pedidoId) {

@endpush    if (confirm('Tem certeza que deseja excluir este pedido? Esta ação não pode ser desfeita.')) {

@endsection        // Implementar exclusão aqui
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