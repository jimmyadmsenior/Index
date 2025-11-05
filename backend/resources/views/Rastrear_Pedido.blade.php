@extends('layouts.app')

@section('head')
<style>
.rastreamento-container {
    max-width: 700px;
    margin: 100px auto 50px;
    padding: 20px;
}

.pedido-header {
    background: rgba(30,30,30,0.95);
    border-radius: 16px;
    padding: 24px;
    margin-bottom: 30px;
    text-align: center;
    border: 1px solid rgba(255,255,255,0.1);
}

.codigo-destaque {
    font-size: 1.8rem;
    font-weight: 800;
    color: #00bfff;
    margin-bottom: 8px;
}

.progress-container {
    background: rgba(30,30,30,0.95);
    border-radius: 16px;
    padding: 24px;
    margin-bottom: 30px;
    border: 1px solid rgba(255,255,255,0.1);
}

.progress-bar {
    width: 100%;
    height: 8px;
    background: rgba(255,255,255,0.1);
    border-radius: 4px;
    margin: 20px 0;
    overflow: hidden;
}

.progress-fill {
    height: 100%;
    background: linear-gradient(90deg, #00bfff, #4db5ff);
    border-radius: 4px;
    transition: width 0.8s ease;
}

.status-steps {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
    flex-wrap: wrap;
    gap: 10px;
}

.step {
    display: flex;
    flex-direction: column;
    align-items: center;
    flex: 1;
    min-width: 100px;
}

.step-icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 8px;
    font-size: 1.2rem;
    transition: all 0.3s ease;
}

.step.active .step-icon {
    background: linear-gradient(135deg, #00bfff, #4db5ff);
    color: white;
    transform: scale(1.1);
}

.step.completed .step-icon {
    background: #00C896;
    color: white;
}

.step.pending .step-icon {
    background: rgba(255,255,255,0.1);
    color: #888;
}

.step-label {
    font-size: 0.85rem;
    text-align: center;
    font-weight: 600;
}

.step.active .step-label {
    color: #00bfff;
}

.step.completed .step-label {
    color: #00C896;
}

.step.pending .step-label {
    color: #888;
}

.historico-container {
    background: rgba(30,30,30,0.95);
    border-radius: 16px;
    padding: 24px;
    margin-bottom: 30px;
    border: 1px solid rgba(255,255,255,0.1);
}

.historico-item {
    display: flex;
    align-items: flex-start;
    gap: 16px;
    padding: 16px 0;
    border-bottom: 1px solid rgba(255,255,255,0.1);
}

.historico-item:last-child {
    border-bottom: none;
}

.historico-icon {
    width: 12px;
    height: 12px;
    background: #00bfff;
    border-radius: 50%;
    margin-top: 6px;
    flex-shrink: 0;
}

.historico-content {
    flex: 1;
}

.historico-data {
    font-size: 0.85rem;
    color: #888;
    margin-bottom: 4px;
}

.historico-evento {
    font-weight: 600;
    color: #fff;
    margin-bottom: 4px;
}

.historico-descricao {
    color: #ccc;
    font-size: 0.9rem;
    line-height: 1.4;
}

.historico-local {
    color: #888;
    font-size: 0.85rem;
    margin-top: 4px;
}

.info-pedido {
    background: rgba(30,30,30,0.95);
    border-radius: 16px;
    padding: 24px;
    margin-bottom: 30px;
    border: 1px solid rgba(255,255,255,0.1);
}

.info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin-bottom: 20px;
}

.info-item {
    text-align: center;
}

.info-label {
    color: #888;
    font-size: 0.9rem;
    margin-bottom: 4px;
}

.info-value {
    color: #fff;
    font-weight: 600;
    font-size: 1.1rem;
}

@media (max-width: 768px) {
    .rastreamento-container {
        margin: 80px 15px 30px;
        padding: 15px;
    }
    
    .status-steps {
        flex-direction: column;
        align-items: center;
        gap: 20px;
    }
    
    .step {
        flex-direction: row;
        min-width: auto;
        width: 100%;
        justify-content: flex-start;
        gap: 12px;
    }
    
    .step-label {
        text-align: left;
    }
}
</style>
@endsection

@section('content')
<div class="rastreamento-container">
    <div class="pedido-header">
        <h1 style="color: #fff; font-size: 1.8rem; font-weight: 800; margin-bottom: 12px;">Rastreamento do Pedido</h1>
        <div class="codigo-destaque">📦 {{ $pedido->codigo_rastreamento }}</div>
        <p style="color: #888; margin-bottom: 20px;">
            Pedido realizado em {{ $pedido->created_at->format('d/m/Y à\s H:i') }}
        </p>
        
        <div class="info-grid">
            <div class="info-item">
                <div class="info-label">Valor Total</div>
                <div class="info-value">R$ {{ number_format($pedido->valor_total, 2, ',', '.') }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Transportadora</div>
                <div class="info-value">{{ $pedido->transportadora }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Status Atual</div>
                <div class="info-value" style="color: #00bfff;">{{ ucfirst($pedido->progresso['descricao']) }}</div>
            </div>
        </div>
    </div>

    <div class="progress-container">
        <h3 style="color: #fff; margin-bottom: 16px; text-align: center;">Progresso da Entrega</h3>
        
        <div class="progress-bar">
            <div class="progress-fill" style="width: {{ $pedido->progresso['porcentagem'] }}%"></div>
        </div>
        
        <div style="text-align: center; margin-bottom: 20px;">
            <strong style="color: #00bfff;">{{ $pedido->progresso['porcentagem'] }}% Concluído</strong>
            <br>
            <span style="color: #888; font-size: 0.9rem;">{{ $pedido->progresso['proxima_atualizacao'] }}</span>
        </div>

        <div class="status-steps">
            <div class="step {{ $pedido->progresso['porcentagem'] >= 25 ? 'completed' : 'pending' }}">
                <div class="step-icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="step-label">Processando</div>
            </div>
            
            <div class="step {{ $pedido->progresso['porcentagem'] >= 50 ? 'completed' : ($pedido->progresso['porcentagem'] >= 25 ? 'active' : 'pending') }}">
                <div class="step-icon">
                    <i class="fas fa-box"></i>
                </div>
                <div class="step-label">Separação</div>
            </div>
            
            <div class="step {{ $pedido->progresso['porcentagem'] >= 75 ? 'completed' : ($pedido->progresso['porcentagem'] >= 50 ? 'active' : 'pending') }}">
                <div class="step-icon">
                    <i class="fas fa-truck"></i>
                </div>
                <div class="step-label">Transporte</div>
            </div>
            
            <div class="step {{ $pedido->progresso['porcentagem'] >= 100 ? 'completed' : ($pedido->progresso['porcentagem'] >= 75 ? 'active' : 'pending') }}">
                <div class="step-icon">
                    <i class="fas fa-home"></i>
                </div>
                <div class="step-label">Entregue</div>
            </div>
        </div>
    </div>

    <div class="historico-container">
        <h3 style="color: #fff; margin-bottom: 20px;">Histórico de Movimentação</h3>
        
        @foreach($pedido->historico as $evento)
        <div class="historico-item">
            <div class="historico-icon"></div>
            <div class="historico-content">
                <div class="historico-data">{{ $evento['data']->format('d/m/Y - H:i') }}</div>
                <div class="historico-evento">{{ $evento['evento'] }}</div>
                <div class="historico-descricao">{{ $evento['descricao'] }}</div>
                <div class="historico-local">📍 {{ $evento['local'] }}</div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="info-pedido">
        <h3 style="color: #fff; margin-bottom: 20px;">Produtos do Pedido</h3>
        
        @foreach($pedido->produtos as $produto)
        <div style="display: flex; justify-content: space-between; align-items: center; padding: 12px 0; border-bottom: 1px solid rgba(255,255,255,0.1);">
            <div>
                <div style="color: #fff; font-weight: 600;">{{ $produto['nome'] }}</div>
                <div style="color: #888; font-size: 0.9rem;">Quantidade: {{ $produto['quantidade'] }}</div>
            </div>
            <div style="color: #00bfff; font-weight: 600;">
                R$ {{ number_format($produto['subtotal'], 2, ',', '.') }}
            </div>
        </div>
        @endforeach
    </div>

    <div style="text-align: center; margin-top: 40px;">
        <a href="{{ route('perfil.pedidos') }}" style="color: #888; text-decoration: none; font-size: 0.9rem; margin-right: 20px;">
            <i class="fas fa-arrow-left"></i> Voltar aos Pedidos
        </a>
        <a href="{{ route('perfil.show') }}" style="color: #888; text-decoration: none; font-size: 0.9rem;">
            <i class="fas fa-user"></i> Ir ao Perfil
        </a>
    </div>
</div>

<script>
// Atualiza a página a cada 30 segundos para simular atualizações do rastreamento
setTimeout(() => {
    location.reload();
}, 30000);
</script>
@endsection