@extends('layouts.admin')

@section('title', 'Gerenciar Usuários')

@push('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-white mb-2">Gerenciar Usuários</h1>
            <p class="text-white">Visualize e gerencie todos os usuários do sistema</p>
        </div>

    </div>

    <!-- Filtros -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <form method="GET" action="{{ route('admin.usuarios') }}" class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Buscar por nome/email</label>
                <input type="text" name="search" value="{{ request('search') }}" 
                       placeholder="Digite o nome ou email..." 
                       class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                <select name="status" class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Todos</option>
                    <option value="ativo" {{ request('status') === 'ativo' ? 'selected' : '' }}>Ativo</option>
                    <option value="inativo" {{ request('status') === 'inativo' ? 'selected' : '' }}>Inativo</option>
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
            <div class="text-sm text-gray-600">Total de Usuários</div>
        </div>
        <div class="bg-white rounded-lg shadow-md p-4">
            <div class="text-2xl font-bold text-green-600">{{ $estatisticas['ativos'] }}</div>
            <div class="text-sm text-gray-600">Usuários Ativos</div>
        </div>
        <div class="bg-white rounded-lg shadow-md p-4">
            <div class="text-2xl font-bold text-orange-600">{{ $estatisticas['novos_mes'] }}</div>
            <div class="text-sm text-gray-600">Novos este Mês</div>
        </div>
        <div class="bg-white rounded-lg shadow-md p-4">
            <div class="text-2xl font-bold text-purple-600">{{ $estatisticas['com_pedidos'] }}</div>
            <div class="text-sm text-gray-600">Com Pedidos</div>
        </div>
    </div>

    <!-- Tabela de Usuários -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usuário</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data Cadastro</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pedidos</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Gasto</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($usuarios as $usuario)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="h-10 w-10 flex-shrink-0">
                                    @if($usuario->foto)
                                        @php
                                            $foto = $usuario->foto;
                                            $isUrl = Str::startsWith($foto, ['http', '/']);
                                        @endphp
                                        <img class="h-10 w-10 rounded-full object-cover" src="{{ $isUrl ? asset($foto) : asset('storage/' . $foto) }}" alt="{{ $usuario->name }}">
                                    @else
                                        <img class="h-10 w-10 rounded-full object-cover" src="{{ asset('media/user-default.png') }}" alt="Usuário padrão">
                                    @endif
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $usuario->name }}</div>
                                    <div class="text-sm text-gray-500">ID: {{ $usuario->id }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $usuario->email }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $usuario->created_at->format('d/m/Y') }}
                            <div class="text-xs text-gray-500">{{ $usuario->created_at->diffForHumans() }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <span class="font-semibold">{{ $usuario->pedidos_count ?? 0 }}</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                            R$ {{ number_format($usuario->total_gasto ?? 0, 2, ',', '.') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <button onclick="verDetalhesUsuario({{ $usuario->id }})" 
                                        class="text-blue-600 hover:text-blue-900">
                                    Ver Detalhes
                                </button>
                                <button onclick="confirmarExclusaoUsuario({{ $usuario->id }})" 
                                        class="text-red-600 hover:text-red-900">
                                    Excluir
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-8 text-center text-gray-500">
                            <div class="text-4xl mb-2">👥</div>
                            <p class="text-lg">Nenhum usuário encontrado</p>
                            <p class="text-sm">Ajuste os filtros para ver mais resultados</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginação -->
        @if($usuarios->hasPages())
        <div class="bg-gray-50 px-6 py-3">
            {{ $usuarios->withQueryString()->links() }}
        </div>
        @endif
    </div>
</div>

<!-- Modal de Detalhes do Usuário -->
<div id="modalDetalhesUsuario" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-gray-900 rounded-lg shadow-xl max-w-3xl w-full max-h-screen overflow-y-auto">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-bold text-white">Detalhes do Usuário</h2>
                    <button onclick="fecharModalUsuario()" class="text-gray-500 hover:text-gray-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div id="conteudoDetalhesUsuario">
                    <!-- Conteúdo carregado via JavaScript -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function verDetalhesUsuario(usuarioId) {
    document.getElementById('modalDetalhesUsuario').classList.remove('hidden');
    document.getElementById('conteudoDetalhesUsuario').innerHTML = `
        <div class="text-center py-8">
            <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600 mx-auto"></div>
            <p class="mt-4 text-gray-600">Carregando detalhes do usuário...</p>
        </div>
    `;
    
    // Buscar dados reais do usuário
    fetch(`/admin/usuarios/${usuarioId}/details`)
        .then(response => response.json())
        .then(data => {
            const pedidosHtml = data.pedidos.length > 0 ? data.pedidos.map(pedido => `
                <tr class="text-gray-100">
                    <td class="p-3">${pedido.data}</td>
                    <td class="p-3 font-mono">${pedido.codigo}</td>
                    <td class="p-3 font-semibold">${pedido.valor}</td>
                    <td class="p-3">
                        <span class="px-2 py-1 text-xs rounded-full ${getStatusClass(pedido.status)} text-white">${pedido.status}</span>
                    </td>
                </tr>
            `).join('') : '<tr class="text-gray-100"><td colspan="4" class="p-3 text-center">Nenhum pedido encontrado</td></tr>';

            document.getElementById('conteudoDetalhesUsuario').innerHTML = `
                <div class="space-y-6">
                    <div class="flex items-center space-x-4">
                        <div class="h-16 w-16 rounded-full bg-gray-700 flex items-center justify-center">
                            <span class="text-xl font-bold text-gray-100">${data.name.charAt(0).toUpperCase()}</span>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-100">${data.name}</h3>
                            <p class="text-gray-300">${data.email}</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-gray-800 p-4 rounded-lg">
                            <h4 class="font-semibold text-gray-100 mb-2">Estatísticas</h4>
                            <div class="space-y-2 text-sm">
                                <div class="flex justify-between text-gray-200">
                                    <span>Total de Pedidos:</span>
                                    <span class="font-semibold">${data.total_pedidos}</span>
                                </div>
                                <div class="flex justify-between text-gray-200">
                                    <span>Total Gasto:</span>
                                    <span class="font-semibold">${data.total_gasto}</span>
                                </div>
                                <div class="flex justify-between text-gray-200">
                                    <span>Último Pedido:</span>
                                    <span class="font-semibold">${data.ultimo_pedido}</span>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-800 p-4 rounded-lg">
                            <h4 class="font-semibold text-gray-100 mb-2">Informações</h4>
                            <div class="space-y-2 text-sm">
                                <div class="flex justify-between text-gray-200">
                                    <span>Data Cadastro:</span>
                                    <span>${data.created_at}</span>
                                </div>
                                <div class="flex justify-between text-gray-200">
                                    <span>Status:</span>
                                    <span class="px-2 py-1 text-xs rounded-full ${data.status === 'Ativo' ? 'bg-green-700' : 'bg-red-700'} text-white">${data.status}</span>
                                </div>
                                <div class="flex justify-between text-gray-200">
                                    <span>Último Acesso:</span>
                                    <span>${data.updated_at}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-100 mb-3">Histórico de Pedidos</h4>
                        <div class="border rounded overflow-hidden">
                            <table class="w-full text-sm">
                                <thead class="bg-gray-800 text-gray-100">
                                    <tr>
                                        <th class="text-left p-3">Data</th>
                                        <th class="text-left p-3">Código</th>
                                        <th class="text-left p-3">Valor</th>
                                        <th class="text-left p-3">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-700">
                                    ${pedidosHtml}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            `;
        })
        .catch(error => {
            console.error('Erro:', error);
            document.getElementById('conteudoDetalhesUsuario').innerHTML = `
                <div class="text-center py-8 text-red-400">
                    <p>Erro ao carregar detalhes do usuário. Tente novamente.</p>
                </div>
            `;
        });
}

function getStatusClass(status) {
    const statusClasses = {
        'Entregue': 'bg-green-700',
        'Enviado': 'bg-blue-700',
        'Pendente': 'bg-yellow-700',
        'Cancelado': 'bg-red-700',
        'Processando': 'bg-purple-700'
    };
    return statusClasses[status] || 'bg-gray-700';
}

function fecharModalUsuario() {
    document.getElementById('modalDetalhesUsuario').classList.add('hidden');
}

function alternarStatusUsuario(usuarioId) {
    if (confirm('Tem certeza que deseja alterar o status deste usuário?')) {
        // Implementar alteração de status aqui
        alert('Status do usuário alterado com sucesso!');
        location.reload();
    }
}

function confirmarExclusaoUsuario(usuarioId) {
    console.log('=== INICIANDO EXCLUSÃO ===');
    console.log('ID do usuário:', usuarioId);
    console.log('URL da requisição:', `/admin/usuarios/${usuarioId}`);
    
    if (confirm('⚠️ ATENÇÃO: Tem certeza que deseja excluir este usuário?\n\n🚨 IMPORTANTE: Esta ação irá:\n• Excluir o usuário permanentemente\n• Excluir TODOS os pedidos associados a ele\n• Esta ação NÃO PODE ser desfeita!\n\nDeseja continuar?')) {
        // Mostrar loading
        const button = event.target;
        const originalText = button.textContent;
        button.textContent = 'Excluindo...';
        button.disabled = true;
        
        // Verificar se o CSRF token existe
        const csrfToken = document.querySelector('meta[name="csrf-token"]');
        if (!csrfToken) {
            console.error('❌ CSRF Token não encontrado!');
            alert('❌ Erro de configuração: Token de segurança não encontrado.');
            button.textContent = originalText;
            button.disabled = false;
            return;
        }
        
        console.log('✅ CSRF Token encontrado:', csrfToken.getAttribute('content').substring(0, 10) + '...');
        
        console.log('📤 Enviando requisição...');
        fetch(`/admin/usuarios/${usuarioId}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken.getAttribute('content'),
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => {
            console.log('📡 Resposta recebida. Status:', response.status);
            console.log('📡 Status Text:', response.statusText);
            console.log('📡 Headers:', [...response.headers.entries()]);
            
            if (!response.ok) {
                console.warn(`⚠️ Status não-ok: ${response.status}`);
            }
            
            return response.text().then(text => {
                console.log('📄 Texto da resposta:', text);
                try {
                    return JSON.parse(text);
                } catch (e) {
                    console.error('❌ Erro ao parsear JSON:', e);
                    throw new Error(`Resposta inválida do servidor: ${text.substring(0, 100)}...`);
                }
            });
        })
        .then(data => {
            console.log('✅ Dados JSON processados:', data);
            if (data.success) {
                alert('✅ ' + data.message);
                location.reload();
            } else {
                alert('❌ ' + data.message);
            }
        })
        .catch(error => {
            console.error('❌ Erro na requisição:', error);
            console.error('❌ Stack trace:', error.stack);
            alert('❌ Erro de conexão: ' + error.message + '\n\nVerifique o console do navegador para mais detalhes.');
        })
        .finally(() => {
            // Restaurar botão
            console.log('🔄 Restaurando botão...');
            button.textContent = originalText;
            button.disabled = false;
        });
    } else {
        console.log('❌ Exclusão cancelada pelo usuário');
    }
}

// Fechar modal ao clicar fora
document.getElementById('modalDetalhesUsuario').addEventListener('click', function(e) {
    if (e.target === this) {
        fecharModalUsuario();
    }
});
</script>
@endsection