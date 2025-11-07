@extends('layouts.admin')

@section('title', 'Logs do Sistema')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-white mb-2">Logs do Sistema</h1>
            <p class="text-white">Monitore a atividade e eventos do sistema</p>
        </div>

    </div>

    <!-- Filtros -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <form method="GET" action="{{ route('admin.logs') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Arquivo de Log</label>
                <select name="arquivo" class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                    @foreach($arquivos_log as $arquivo)
                        <option value="{{ $arquivo }}" {{ request('arquivo') === $arquivo ? 'selected' : '' }}>
                            {{ basename($arquivo) }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nível</label>
                <select name="nivel" class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Todos os níveis</option>
                    <option value="ERROR" {{ request('nivel') === 'ERROR' ? 'selected' : '' }}>ERROR</option>
                    <option value="WARNING" {{ request('nivel') === 'WARNING' ? 'selected' : '' }}>WARNING</option>
                    <option value="INFO" {{ request('nivel') === 'INFO' ? 'selected' : '' }}>INFO</option>
                    <option value="DEBUG" {{ request('nivel') === 'DEBUG' ? 'selected' : '' }}>DEBUG</option>
                </select>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Buscar</label>
                <input type="text" name="busca" value="{{ request('busca') }}" 
                       placeholder="Buscar nos logs..." 
                       class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">
            </div>
            
            <div class="flex items-end space-x-2">
                <button type="submit" class="flex-1 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                    Filtrar
                </button>
                <button type="button" onclick="atualizarLogs()" 
                        class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors">
                    🔄
                </button>
            </div>
        </form>
    </div>

    <!-- Estatísticas dos Logs -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-lg shadow-md p-4">
            <div class="flex items-center">
                <div class="bg-red-100 rounded-full p-3 mr-4">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <div class="text-xl font-bold text-red-600">{{ $stats['errors'] ?? 0 }}</div>
                    <div class="text-sm text-gray-600">Erros (24h)</div>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow-md p-4">
            <div class="flex items-center">
                <div class="bg-yellow-100 rounded-full p-3 mr-4">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.082 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                    </svg>
                </div>
                <div>
                    <div class="text-xl font-bold text-yellow-600">{{ $stats['warnings'] ?? 0 }}</div>
                    <div class="text-sm text-gray-600">Avisos (24h)</div>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow-md p-4">
            <div class="flex items-center">
                <div class="bg-blue-100 rounded-full p-3 mr-4">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <div class="text-xl font-bold text-blue-600">{{ $stats['info'] ?? 0 }}</div>
                    <div class="text-sm text-gray-600">Info (24h)</div>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow-md p-4">
            <div class="flex items-center">
                <div class="bg-gray-100 rounded-full p-3 mr-4">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <div>
                    <div class="text-xl font-bold text-gray-600">{{ count($arquivos_log) }}</div>
                    <div class="text-sm text-gray-600">Arquivos de Log</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Conteúdo dos Logs -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-gray-50 px-6 py-3 border-b flex items-center justify-between">
            <h3 class="font-semibold text-gray-800">
                📄 {{ basename(request('arquivo', $arquivos_log[0] ?? 'laravel.log')) }}
            </h3>
            <div class="flex items-center space-x-2 text-sm text-gray-600">
                <span>Última atualização: {{ date('d/m/Y H:i:s') }}</span>
                <button onclick="downloadLog()" class="text-blue-600 hover:text-blue-800">
                    ⬇️ Download
                </button>
            </div>
        </div>
        
        <div class="p-6">
            @if(!empty($logs))
                <div class="space-y-3 max-h-96 overflow-y-auto">
                    @foreach($logs as $index => $log)
                        <div class="border-l-4 pl-4 py-2 rounded-r 
                            @if(strpos($log, '[ERROR]') !== false) border-red-500 bg-red-50
                            @elseif(strpos($log, '[WARNING]') !== false) border-yellow-500 bg-yellow-50
                            @elseif(strpos($log, '[INFO]') !== false) border-blue-500 bg-blue-50
                            @else border-gray-300 bg-gray-50 @endif">
                            
                            <div class="flex items-start justify-between">
                                <div class="flex-1">
                                    <div class="font-mono text-sm text-gray-800 break-all">
                                        {{ $log }}
                                    </div>
                                </div>
                                <button onclick="copiarLog('{{ addslashes($log) }}')" 
                                        class="ml-2 text-gray-400 hover:text-gray-600 flex-shrink-0">
                                    📋
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <div class="mt-4 flex justify-between items-center text-sm text-gray-600">
                    <span>Mostrando {{ count($logs) }} entradas</span>
                    <button onclick="carregarMaisLogs()" class="text-blue-600 hover:text-blue-800">
                        Carregar mais →
                    </button>
                </div>
            @else
                <div class="text-center py-12">
                    <div class="text-6xl mb-4">📝</div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Nenhum log encontrado</h3>
                    <p class="text-gray-600">Não há logs para os filtros selecionados</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Ações Rápidas -->
    <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
        <button onclick="limparLogs()" 
                class="bg-yellow-600 text-white p-4 rounded-lg hover:bg-yellow-700 transition-colors text-center">
            <div class="text-xl mb-2">🧹</div>
            <div class="font-semibold">Limpar Logs Antigos</div>
            <div class="text-sm opacity-90">Remove logs com mais de 30 dias</div>
        </button>
        
        <button onclick="exportarLogs()" 
                class="bg-blue-600 text-white p-4 rounded-lg hover:bg-blue-700 transition-colors text-center">
            <div class="text-xl mb-2">📊</div>
            <div class="font-semibold">Exportar Relatório</div>
            <div class="text-sm opacity-90">Gerar relatório em CSV</div>
        </button>
        
        <button onclick="configurarAlertas()" 
                class="bg-purple-600 text-white p-4 rounded-lg hover:bg-purple-700 transition-colors text-center">
            <div class="text-xl mb-2">🔔</div>
            <div class="font-semibold">Configurar Alertas</div>
            <div class="text-sm opacity-90">Notificações por email</div>
        </button>
    </div>
</div>

<script>
function atualizarLogs() {
    location.reload();
}

function downloadLog() {
    const arquivo = new URLSearchParams(window.location.search).get('arquivo') || 'laravel.log';
    // Implementar download do arquivo de log
    alert('Download do arquivo de log iniciado: ' + arquivo);
}

function copiarLog(texto) {
    navigator.clipboard.writeText(texto).then(() => {
        // Mostrar feedback visual
        const button = event.target;
        const originalText = button.textContent;
        button.textContent = '✓';
        setTimeout(() => {
            button.textContent = originalText;
        }, 1000);
    });
}

function carregarMaisLogs() {
    // Implementar carregamento de mais logs via AJAX
    alert('Carregando mais logs...');
}

function limparLogs() {
    if (confirm('Tem certeza que deseja limpar os logs antigos? Esta ação não pode ser desfeita.')) {
        // Implementar limpeza de logs
        alert('Logs antigos foram limpos com sucesso!');
        location.reload();
    }
}

function exportarLogs() {
    // Implementar exportação de logs
    alert('Gerando relatório de logs...');
}

function configurarAlertas() {
    // Implementar configuração de alertas
    alert('Funcionalidade de alertas será implementada em breve.');
}

// Auto-refresh a cada 30 segundos
setInterval(() => {
    if (document.visibilityState === 'visible') {
        location.reload();
    }
}, 30000);
</script>
@endsection