@extends('layouts.admin')

@section('title', 'Dashboard Administrativo')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Dashboard Administrativo</h1>
        <p class="text-gray-600">Visão geral do sistema</p>
    </div>

    <!-- Cards de Estatísticas -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total de Pedidos -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-blue-500">
            <div class="flex items-center">
                <div class="flex-1">
                    <h3 class="text-lg font-semibold text-gray-800">Total de Pedidos</h3>
                    <p class="text-3xl font-bold text-blue-600">{{ $stats['total_pedidos'] }}</p>
                    <p class="text-sm text-gray-500">{{ $stats['pedidos_hoje'] }} hoje</p>
                </div>
                <div class="bg-blue-100 rounded-full p-3">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l-1 14H6L5 9z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Receita Total -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-green-500">
            <div class="flex items-center">
                <div class="flex-1">
                    <h3 class="text-lg font-semibold text-gray-800">Receita Total</h3>
                    <p class="text-3xl font-bold text-green-600">R$ {{ number_format($stats['receita_total'], 2, ',', '.') }}</p>
                    <p class="text-sm text-gray-500">R$ {{ number_format($stats['receita_mensal'], 2, ',', '.') }} este mês</p>
                </div>
                <div class="bg-green-100 rounded-full p-3">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Total de Usuários -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-purple-500">
            <div class="flex items-center">
                <div class="flex-1">
                    <h3 class="text-lg font-semibold text-gray-800">Usuários</h3>
                    <p class="text-3xl font-bold text-purple-600">{{ $stats['total_usuarios'] }}</p>
                    <p class="text-sm text-gray-500">{{ $stats['usuarios_ativos'] }} ativos</p>
                </div>
                <div class="bg-purple-100 rounded-full p-3">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Total de Produtos -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-orange-500">
            <div class="flex items-center">
                <div class="flex-1">
                    <h3 class="text-lg font-semibold text-gray-800">Produtos</h3>
                    <p class="text-3xl font-bold text-orange-600">{{ $stats['total_produtos'] }}</p>
                    <p class="text-sm text-gray-500">{{ $stats['produtos_ativos'] }} disponíveis</p>
                </div>
                <div class="bg-orange-100 rounded-full p-3">
                    <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Pedidos Recentes -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-semibold text-gray-800">Pedidos Recentes</h2>
                <a href="{{ route('admin.pedidos') }}" class="text-blue-600 hover:text-blue-800 font-medium">Ver todos</a>
            </div>
            
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Código</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Cliente</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Valor</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($pedidos_recentes as $pedido)
                        <tr>
                            <td class="px-4 py-2 text-sm font-mono">{{ substr($pedido->codigo_rastreamento, 0, 12) }}...</td>
                            <td class="px-4 py-2 text-sm">{{ $pedido->user->name ?? 'N/A' }}</td>
                            <td class="px-4 py-2 text-sm font-semibold">R$ {{ number_format($pedido->valor_total, 2, ',', '.') }}</td>
                            <td class="px-4 py-2 text-sm">
                                <span class="px-2 py-1 text-xs rounded-full
                                    @if($pedido->status === 'processando') bg-yellow-100 text-yellow-800
                                    @elseif($pedido->status === 'enviado') bg-blue-100 text-blue-800
                                    @elseif($pedido->status === 'entregue') bg-green-100 text-green-800
                                    @else bg-red-100 text-red-800 @endif">
                                    {{ ucfirst($pedido->status) }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Vendas por Mês -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Vendas por Mês ({{ date('Y') }})</h2>
            
            <div class="space-y-3">
                @php
                $meses = ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];
                $maxVenda = $vendas_por_mes->max('total') ?: 1;
                @endphp
                
                @foreach($meses as $index => $mes)
                    @php
                    $venda = $vendas_por_mes->firstWhere('mes', $index + 1);
                    $valor = $venda ? $venda->total : 0;
                    $porcentagem = ($valor / $maxVenda) * 100;
                    @endphp
                    
                    <div class="flex items-center">
                        <div class="w-8 text-sm font-medium text-gray-600">{{ $mes }}</div>
                        <div class="flex-1 mx-4">
                            <div class="bg-gray-200 rounded-full h-4">
                                <div class="bg-blue-600 h-4 rounded-full transition-all duration-300" style="width: {{ $porcentagem }}%"></div>
                            </div>
                        </div>
                        <div class="w-24 text-sm font-semibold text-right">R$ {{ number_format($valor, 2, ',', '.') }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Links de Navegação -->
    <div class="mt-8 grid grid-cols-1 md:grid-cols-4 gap-4">
        <a href="{{ route('admin.pedidos') }}" class="bg-blue-600 text-white rounded-lg p-4 text-center hover:bg-blue-700 transition-colors">
            <div class="text-2xl font-bold">📦</div>
            <div class="mt-2">Gerenciar Pedidos</div>
        </a>
        
        <a href="{{ route('admin.usuarios') }}" class="bg-purple-600 text-white rounded-lg p-4 text-center hover:bg-purple-700 transition-colors">
            <div class="text-2xl font-bold">👥</div>
            <div class="mt-2">Gerenciar Usuários</div>
        </a>
        
        <a href="{{ route('admin.produtos') }}" class="bg-orange-600 text-white rounded-lg p-4 text-center hover:bg-orange-700 transition-colors">
            <div class="text-2xl font-bold">🛍️</div>
            <div class="mt-2">Gerenciar Produtos</div>
        </a>
        
        <a href="{{ route('admin.logs') }}" class="bg-gray-600 text-white rounded-lg p-4 text-center hover:bg-gray-700 transition-colors">
            <div class="text-2xl font-bold">📋</div>
            <div class="mt-2">Ver Logs</div>
        </a>
    </div>
</div>

<script>
// Auto-refresh das estatísticas a cada 5 minutos
setInterval(() => {
    window.location.reload();
}, 300000);
</script>
@endsection