@extends('layouts.app')

@section('content')
<!-- Conteúdo principal da página de pagamento do carrinho -->
<section class="payment-section" style="max-width:480px;margin:48px auto 64px auto;padding:36px 28px 28px 28px;background:rgba(24,24,28,0.98);border-radius:28px;box-shadow:0 8px 32px rgba(0,0,0,0.22);">
  <h2 style="text-align:center;font-size:2.1rem;font-weight:800;margin-bottom:32px;color:#fff;letter-spacing:1px;">Pagamento</h2>
  <div style="display:flex;flex-direction:column;gap:28px;">
    <!-- Cartão -->
    <div class="payment-card" style="background:linear-gradient(120deg,#23243a 60%,#2e8fff 100%);border-radius:18px;padding:24px 20px;box-shadow:0 2px 12px #2e8fff22;">
      <div style="display:flex;align-items:center;justify-content:space-between;gap:18px;">
        <div style="display:flex;align-items:center;gap:12px;">
          <i class="fas fa-credit-card" style="font-size:1.5rem;color:#fff;"></i>
          <span style="font-size:1.15rem;color:#fff;font-weight:600;display:flex;flex-direction:column;line-height:1.1;">Cartão de<br>Crédito</span>
        </div>
  <a href="/Pagamento_Credito?produto_id={{ session('produto_id') ?? request('produto_id') ?? '' }}" class="btn-anim" style="padding:12px 28px;border-radius:8px;font-weight:700;font-size:1.08rem;text-decoration:none;background:#2e8fff;color:#fff;box-shadow:0 2px 8px #2e8fff33;transition:background 0.2s;">Pagar com Cartão</a>
      </div>
    </div>
    <!-- Cartão de Débito -->
    <div class="payment-card" style="background:linear-gradient(120deg,#23243a 60%,#00bfff 100%);border-radius:18px;padding:24px 20px;box-shadow:0 2px 12px #00bfff22;display:flex;align-items:center;justify-content:space-between;gap:18px;">
      <div style="display:flex;align-items:center;gap:12px;">
        <i class="fas fa-credit-card" style="font-size:1.5rem;color:#fff;"></i>
        <span style="font-size:1.15rem;color:#fff;font-weight:600;">Cartão de Débito</span>
      </div>
      <a href="/pagamento-debito" id="btn-pagar-debito" class="btn-anim" style="padding:12px 28px;border-radius:8px;font-weight:700;font-size:1.08rem;text-decoration:none;background:#00bfff;color:#fff;box-shadow:0 2px 8px #00bfff33;transition:background 0.2s;">Pagar com Débito</a>
    </div>
    <!-- Pix -->
    <div class="payment-card" style="background:linear-gradient(120deg,#23243a 60%,#00c86f 100%);border-radius:18px;padding:24px 20px;box-shadow:0 2px 12px #00c86f22;display:flex;align-items:center;justify-content:space-between;gap:18px;">
      <div style="display:flex;align-items:center;gap:12px;">
        <img src="/media/pix2.png" alt="Pix" style="width:38px;filter:drop-shadow(0 2px 8px #00c86f88);"/>
        <span style="font-size:1.15rem;color:#fff;font-weight:600;">Pix</span>
      </div>
  <a href="/Carrinho_Pix?produto_id={{ session('produto_id') ?? request('produto_id') ?? '' }}" id="btn-pagar-pix" class="btn-anim" style="padding:12px 28px;border-radius:8px;font-weight:700;font-size:1.08rem;text-decoration:none;background:#00c86f;color:#fff;box-shadow:0 2px 8px #00c86f33;transition:background 0.2s;">Pagar com Pix</a>
    </div>
  </div>
</section>
@endsection
