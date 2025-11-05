@extends('layouts.app')

@section('head')
<style>
.pedidos-container {
    max-width: 800px;
    margin: 100px auto 50px;
    padding: 20px;
}

.pedido-card {
    background: rgba(30,30,30,0.95);
    border-radius: 16px;
    padding: 24px;
    margin-bottom: 20px;
    border: 1px solid rgba(255,255,255,0.1);
    transition: all 0.3s ease;
}

.pedido-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.3);
}

.pedido-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 16px;
    flex-wrap: wrap;
    gap: 10px;
}

.codigo-rastreamento {
    font-weight: 600;
    color: #00bfff;
    font-size: 1.1rem;
}

.status-badge {
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 600;
    text-transform: uppercase;
}

.status-processando { background: #ff9500; color: white; }
.status-separacao { background: #007AFF; color: white; }
.status-transporte { background: #34C759; color: white; }
.status-entregue { background: #00C896; color: white; }

.pedido-info {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
    margin-bottom: 16px;
}

.info-item {
    color: #ccc;
}

.info-label {
    font-size: 0.9rem;
    color: #888;
    margin-bottom: 4px;
}

.info-value {
    font-weight: 600;
    color: #fff;
}

.produtos-resumo {
    background: rgba(255,255,255,0.05);
    border-radius: 8px;
    padding: 12px;
    margin-bottom: 16px;
}

.btn-rastrear {
    background: linear-gradient(135deg, #00bfff, #4db5ff);
    color: white;
    padding: 10px 20px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
}

.btn-rastrear:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 15px rgba(0,191,255,0.3);
}

.empty-state {
    text-align: center;
    padding: 60px 20px;
    color: #888;
}

@media (max-width: 768px) {
    .pedidos-container {
        margin: 80px 15px 30px;
        padding: 15px;
    }
    
    .pedido-info {
        grid-template-columns: 1fr;
        gap: 12px;
    }
    
    .pedido-header {
        flex-direction: column;
        align-items: flex-start;
    }
}
</style>
@endsection

@section('content')
<div class="pedidos-container">
    <div style="text-align: center; margin-bottom: 40px;">
        <h1 style="color: #fff; font-size: 2.2rem; font-weight: 800; margin-bottom: 8px;">Meus Pedidos</h1>
        <p style="color: #888; font-size: 1.1rem;">Acompanhe todos os seus pedidos e rastreamentos</p>
    </div>

    @if($pedidos->count() > 0)
        @foreach($pedidos as $pedido)
        <div class="pedido-card">
            <div class="pedido-header">
                <div>
                    <div class="codigo-rastreamento">📦 {{ $pedido->codigo_rastreamento }}</div>
                    <div style="color: #888; font-size: 0.9rem; margin-top: 4px;">
                        Pedido realizado em {{ $pedido->created_at->format('d/m/Y à\s H:i') }}
                    </div>
                </div>
                <div class="status-badge status-{{ $pedido->progresso['status'] }}">
                    {{ ucfirst($pedido->progresso['status']) }}
                </div>
            </div>

            <div class="pedido-info">
                <div class="info-item">
                    <div class="info-label">Valor Total</div>
                    <div class="info-value">R$ {{ number_format($pedido->valor_total, 2, ',', '.') }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Transportadora</div>
                    <div class="info-value">{{ $pedido->transportadora }}</div>
                </div>
            </div>

            <div class="produtos-resumo">
                <div style="color: #fff; font-weight: 600; margin-bottom: 8px;">Produtos:</div>
                @foreach($pedido->produtos as $produto)
                    <div style="color: #ccc; font-size: 0.9rem;">
                        • {{ $produto['nome'] }} ({{ $produto['quantidade'] }}x) - R$ {{ number_format($produto['subtotal'], 2, ',', '.') }}
                    </div>
                @endforeach
            </div>

            <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px;">
                <div style="color: #888; font-size: 0.9rem;">
                    <strong>{{ $pedido->progresso['descricao'] }}</strong><br>
                    {{ $pedido->progresso['proxima_atualizacao'] }}
                </div>
                <a href="{{ route('pedido.rastrear', $pedido->codigo_rastreamento) }}" class="btn-rastrear">
                    <i class="fas fa-search"></i>
                    Rastrear Pedido
                </a>
            </div>
        </div>
        @endforeach
    @else
        <div class="empty-state">
            <i class="fas fa-shopping-bag" style="font-size: 4rem; color: #555; margin-bottom: 20px;"></i>
            <h3 style="color: #888; margin-bottom: 12px;">Nenhum pedido encontrado</h3>
            <p style="color: #666;">Você ainda não fez nenhuma compra. Que tal dar uma olhada em nossos produtos?</p>
            <a href="/" style="display: inline-block; margin-top: 20px; padding: 12px 24px; background: linear-gradient(135deg, #00bfff, #4db5ff); color: white; text-decoration: none; border-radius: 8px; font-weight: 600;">
                Começar a Comprar
            </a>
        </div>
    @endif

    <div style="text-align: center; margin-top: 40px;">
        <a href="{{ route('perfil.show') }}" style="color: #888; text-decoration: none; font-size: 0.9rem;">
            <i class="fas fa-arrow-left"></i> Voltar ao Perfil
        </a>
    </div>
</div>
@endsection