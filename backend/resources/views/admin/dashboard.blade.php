@extends('layouts.admin')

@section('title', 'Dashboard Administrativo')
@section('subtitle', 'Visão geral e estatísticas do sistema')

@section('content')
<div class="space-y-8">
    <!-- Cards de Estatísticas -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
        <!-- Total de Pedidos -->
        <div class="glass-card rounded-xl p-6 border-l-4 border-white relative overflow-hidden">
            <div class="flex items-center justify-between">
                <div class="flex-1 min-w-0">
                    <h3 class="text-sm font-medium text-gray-300 uppercase tracking-wide">Total de Pedidos</h3>
                    <p class="text-2xl font-bold text-white mt-2">{{ $stats['total_pedidos'] ?? 0 }}</p>
                    <p class="text-xs text-gray-400 mt-1">{{ $stats['pedidos_hoje'] ?? 0 }} hoje</p>
                </div>
                <div class="flex-shrink-0 ml-4">
                    <div class="bg-white/20 rounded-full p-3 backdrop-blur-sm">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l-1 14H6L5 9z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Receita Total -->
        <div class="glass-card rounded-xl p-6 border-l-4 border-green-400 relative overflow-hidden">
            <div class="flex items-center justify-between">
                <div class="flex-1 min-w-0">
                    <h3 class="text-sm font-medium text-gray-300 uppercase tracking-wide">Receita Total</h3>
                    <p class="text-2xl font-bold text-green-400 mt-2">R$ {{ number_format($stats['receita_total'] ?? 0, 2, ',', '.') }}</p>
                    <p class="text-xs text-gray-400 mt-1">R$ {{ number_format($stats['receita_mensal'] ?? 0, 2, ',', '.') }} este mês</p>
                </div>
                <div class="flex-shrink-0 ml-4">
                    <div class="bg-green-400/20 rounded-full p-3 backdrop-blur-sm">
                        <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total de Usuários -->
        <div class="glass-card rounded-xl p-6 border-l-4 border-purple-400 relative overflow-hidden">
            <div class="flex items-center justify-between">
                <div class="flex-1 min-w-0">
                    <h3 class="text-sm font-medium text-gray-300 uppercase tracking-wide">Usuários</h3>
                    <p class="text-2xl font-bold text-purple-400 mt-2">{{ $stats['total_usuarios'] ?? 0 }}</p>
                    <p class="text-xs text-gray-400 mt-1">{{ $stats['usuarios_ativos'] ?? 0 }} ativos</p>
                </div>
                <div class="flex-shrink-0 ml-4">
                    <div class="bg-purple-400/20 rounded-full p-3 backdrop-blur-sm">
                        <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total de Produtos -->
        <div class="glass-card rounded-xl p-6 border-l-4 border-orange-400 relative overflow-hidden">
            <div class="flex items-center justify-between">
                <div class="flex-1 min-w-0">
                    <h3 class="text-sm font-medium text-gray-300 uppercase tracking-wide">Produtos</h3>
                    <p class="text-2xl font-bold text-orange-400 mt-2">{{ $stats['total_produtos'] ?? 0 }}</p>
                    <p class="text-xs text-gray-400 mt-1">{{ $stats['produtos_ativos'] ?? 0 }} disponíveis</p>
                </div>
                <div class="flex-shrink-0 ml-4">
                    <div class="bg-orange-400/20 rounded-full p-3 backdrop-blur-sm">
                        <svg class="w-6 h-6 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Seção de Pedidos Recentes e Vendas por Mês -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Pedidos Recentes -->
        <div class="glass-card rounded-xl p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-semibold text-white">Pedidos Recentes</h2>
                <span class="text-white hover:text-gray-300 font-medium transition-colors">Ver todos →</span>
            </div>
            
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto">
                    <thead class="bg-white/10 rounded-lg">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-300 uppercase">Código</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-300 uppercase">Cliente</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-300 uppercase">Valor</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-300 uppercase">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700">
                        @forelse($pedidos_recentes as $pedido)
                        <tr class="hover:bg-white/5 transition-colors">
                            <td class="px-4 py-3 text-sm font-mono text-gray-300">{{ substr($pedido->codigo_rastreamento ?? 'N/A', 0, 12) }}...</td>
                            <td class="px-4 py-3 text-sm text-white">{{ $pedido->user->name ?? 'N/A' }}</td>
                            <td class="px-4 py-3 text-sm font-semibold text-white">R$ {{ number_format($pedido->valor_total ?? 0, 2, ',', '.') }}</td>
                            <td class="px-4 py-3 text-sm">
                                <span class="px-2 py-1 text-xs rounded-full font-medium border
                                    @if($pedido->status === 'processando') bg-yellow-400/20 text-yellow-300 border-yellow-400/30
                                    @elseif($pedido->status === 'enviado') bg-blue-400/20 text-blue-300 border-blue-400/30
                                    @elseif($pedido->status === 'entregue') bg-green-400/20 text-green-300 border-green-400/30
                                    @else bg-red-400/20 text-red-300 border-red-400/30 @endif">
                                    {{ ucfirst($pedido->status ?? 'pendente') }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-4 py-8 text-center text-gray-400">
                                <div class="text-4xl mb-2">📦</div>
                                <p class="text-sm">Nenhum pedido encontrado</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Vendas por Mês -->
        <div class="glass-card rounded-xl p-6">
            <h2 class="text-xl font-semibold text-white mb-6">Vendas por Mês ({{ date('Y') }})</h2>
            
            <div class="space-y-4">
                @php
                $meses = ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];
                $maxVenda = ($vendas_por_mes ?? collect())->max('total') ?: 1;
                @endphp
                
                @foreach($meses as $index => $mes)
                    @php
                    $venda = ($vendas_por_mes ?? collect())->firstWhere('mes', $index + 1);
                    $valor = $venda ? $venda->total : 0;
                    $porcentagem = ($valor / $maxVenda) * 100;
                    @endphp
                    
                    <div class="flex items-center">
                        <div class="w-8 text-sm font-medium text-gray-300">{{ $mes }}</div>
                        <div class="flex-1 mx-4">
                            <div class="bg-gray-700 rounded-full h-3">
                                <div class="bg-gradient-to-r from-white to-gray-300 h-3 rounded-full transition-all duration-500" style="width: {{ $porcentagem }}%"></div>
                            </div>
                        </div>
                        <div class="w-24 text-sm font-semibold text-right text-white">R$ {{ number_format($valor, 2, ',', '.') }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
// Auto-refresh das estatísticas a cada 5 minutos
setInterval(() => {
    window.location.reload();
}, 300000);

// Animação dos cards ao carregar
document.addEventListener('DOMContentLoaded', () => {
    const cards = document.querySelectorAll('.glass-card');
    cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        setTimeout(() => {
            card.style.transition = 'all 0.5s ease';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 100);
    });
});
</script>
@endpush

@endsection