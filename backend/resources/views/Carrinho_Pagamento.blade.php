@extends('layouts.app')

@section('content')
<!-- Conteúdo principal da página de pagamento do carrinho -->
<section class="payment-section" style="max-width:480px;margin:48px auto 64px auto;padding:36px 28px 28px 28px;background:rgba(24,24,28,0.98);border-radius:28px;box-shadow:0 8px 32px rgba(0,0,0,0.22);">
  <h2 style="text-align:center;font-size:2.1rem;font-weight:800;margin-bottom:32px;color:#fff;letter-spacing:1px;">Pagamento</h2>
  
  <!-- Resumo do pedido -->
  @if(isset($total) && isset($carrinho))
    <div style="background:rgba(255,255,255,0.1);border-radius:12px;padding:20px;margin-bottom:24px;">
      <h3 style="color:#fff;margin-bottom:16px;font-size:1.2rem;">Resumo do Pedido</h3>
      <div style="color:#ccc;margin-bottom:12px;">
        <strong style="color:#fff;">Total: R$ {{ number_format($total, 2, ',', '.') }}</strong>
      </div>
      <div style="color:#aaa;font-size:0.9rem;">
        {{ count($carrinho) }} {{ count($carrinho) == 1 ? 'item' : 'itens' }} no carrinho
      </div>
    </div>
  @elseif(isset($produto))
    <div style="background:rgba(255,255,255,0.1);border-radius:12px;padding:20px;margin-bottom:24px;">
      <h3 style="color:#fff;margin-bottom:16px;font-size:1.2rem;">Produto Selecionado</h3>
      <div style="color:#ccc;margin-bottom:12px;">
        <strong style="color:#fff;">{{ $produto->nome }}</strong>
      </div>
      <div style="color:#aaa;font-size:0.9rem;">
        R$ {{ number_format($produto->preco, 2, ',', '.') }}
      </div>
    </div>
  @endif
  <div style="display:flex;flex-direction:column;gap:28px;">
    <!-- Cartão -->
    <div class="payment-card" style="background:linear-gradient(120deg,#23243a 60%,#2e8fff 100%);border-radius:18px;padding:24px 20px;box-shadow:0 2px 12px #2e8fff22;">
      <div style="display:flex;align-items:center;justify-content:space-between;gap:18px;">
        <div style="display:flex;align-items:center;gap:12px;">
          <i class="fas fa-credit-card" style="font-size:1.5rem;color:#fff;"></i>
          <span style="font-size:1.15rem;color:#fff;font-weight:600;display:flex;flex-direction:column;line-height:1.1;">Cartão de<br>Crédito</span>
        </div>
  <a href="/Pagamento_Credito?{{ isset($total) ? 'total=' . urlencode($total) : 'produto_id=' . (session('produto_id') ?? request('produto_id') ?? $produto->id ?? '') }}" class="btn-anim" style="padding:12px 28px;border-radius:8px;font-weight:700;font-size:1.08rem;text-decoration:none;background:#2e8fff;color:#fff;box-shadow:0 2px 8px #2e8fff33;transition:background 0.2s;">Pagar com Cartão</a>
      </div>
    </div>
    <!-- Cartão de Débito -->
    <div class="payment-card" style="background:linear-gradient(120deg,#23243a 60%,#00bfff 100%);border-radius:18px;padding:24px 20px;box-shadow:0 2px 12px #00bfff22;display:flex;align-items:center;justify-content:space-between;gap:18px;">
      <div style="display:flex;align-items:center;gap:12px;">
        <i class="fas fa-credit-card" style="font-size:1.5rem;color:#fff;"></i>
        <span style="font-size:1.15rem;color:#fff;font-weight:600;">Cartão de Débito</span>
      </div>
      <a href="/pagamento-debito?{{ isset($total) ? 'total=' . urlencode($total) : 'produto_id=' . (session('produto_id') ?? request('produto_id') ?? $produto->id ?? '') }}" id="btn-pagar-debito" class="btn-anim" style="padding:12px 28px;border-radius:8px;font-weight:700;font-size:1.08rem;text-decoration:none;background:#00bfff;color:#fff;box-shadow:0 2px 8px #00bfff33;transition:background 0.2s;">Pagar com Débito</a>
    </div>
    <!-- Pix -->
    <div class="payment-card" style="background:linear-gradient(120deg,#23243a 60%,#00c86f 100%);border-radius:18px;padding:24px 20px;box-shadow:0 2px 12px #00c86f22;display:flex;align-items:center;justify-content:space-between;gap:18px;">
      <div style="display:flex;align-items:center;gap:12px;">
        <img src="/media/pix2.png" alt="Pix" style="width:38px;filter:drop-shadow(0 2px 8px #00c86f88);"/>
        <span style="font-size:1.15rem;color:#fff;font-weight:600;">Pix</span>
      </div>
  <a href="/Carrinho_Pix?{{ isset($total) ? 'total=' . urlencode($total) : 'produto_id=' . (session('produto_id') ?? request('produto_id') ?? $produto->id ?? '') }}" id="btn-pagar-pix" class="btn-anim" style="padding:12px 28px;border-radius:8px;font-weight:700;font-size:1.08rem;text-decoration:none;background:#00c86f;color:#fff;box-shadow:0 2px 8px #00c86f33;transition:background 0.2s;">Pagar com Pix</a>
    </div>
    
    <!-- Botão para voltar ao carrinho -->
    <div style="text-align:center;margin-top:24px;">
      <a href="{{ route('carrinho.index') }}" style="color:#aaa;text-decoration:none;font-size:0.9rem;padding:8px 16px;border:1px solid #444;border-radius:8px;transition:all 0.2s;">
        <i class="fas fa-arrow-left"></i>
        Voltar ao Carrinho
      </a>
    </div>
  </div>
</section>
@endsection
