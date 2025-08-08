@extends('layouts.app')
@section('head')
@endsection

@section('content')
<div style="height:70px;"></div>
<section class="payment-section" style="max-width:480px;margin:48px auto 64px auto;padding:36px 28px 28px 28px;background:rgba(24,24,28,0.98);border-radius:28px;box-shadow:0 8px 32px rgba(0,0,0,0.22);">
  <h2 style="text-align:center;font-size:2.1rem;font-weight:800;margin-bottom:32px;color:#fff;letter-spacing:1px;">Pagamento - Débito</h2>
  <div style="display:flex;flex-direction:column;gap:28px;">
    <div class="payment-card" style="background:linear-gradient(120deg,#23243a 60%,#00bfff 100%);border-radius:18px;padding:24px 20px;box-shadow:0 2px 12px #00bfff22;">
      <div style="display:flex;align-items:center;gap:12px;margin-bottom:18px;">
        <i class="fas fa-credit-card" style="font-size:1.5rem;color:#fff;"></i>
        <span style="font-size:1.15rem;color:#fff;font-weight:600;">Cartão de Débito</span>
      </div>
      <div style="color:yellow; font-size:0.95rem; margin-bottom:10px;">
        <strong>ID do produto enviado:</strong> 1
      </div>
      <form id="form-debito" action="/finalizar-compra" method="POST" style="display:flex;flex-direction:column;gap:14px;">
        @csrf
        <input type="hidden" name="produto_id" id="produto_id_debito" value="1">
        <input type="text" placeholder="Nome no cartão" name="nome_cartao" required pattern="[A-Za-zÀ-ÿ ']+" title="Apenas letras" style="padding:11px;border-radius:7px;border:1px solid #3a3a4a;background:#23243a;color:#fff;"/>
        <input type="text" placeholder="Número do cartão" name="numero_cartao" required maxlength="19" pattern="[0-9 ]+" title="Apenas números" inputmode="numeric" style="padding:11px;border-radius:7px;border:1px solid #3a3a4a;background:#23243a;color:#fff;"/>
        <div style="display:flex;gap:10px;flex-wrap:wrap;">
          <input type="text" placeholder="Validade (MM/AA)" name="validade" required maxlength="5" pattern="(0[1-9]|1[0-2])\/[0-9]{2}" title="Formato MM/AA" inputmode="numeric" style="min-width:0;flex-basis:60%;flex-grow:1;padding:11px;border-radius:7px;border:1px solid #3a3a4a;background:#23243a;color:#fff;"/>
          <input type="text" placeholder="CVV" name="cvv" required maxlength="4" pattern="[0-9]{3,4}" title="Apenas números" inputmode="numeric" style="min-width:0;flex-basis:35%;flex-grow:0;padding:11px;border-radius:7px;border:1px solid #3a3a4a;background:#23243a;color:#fff;"/>
        </div>
        <button type="submit" class="btn-anim" style="margin-top:10px;padding:13px 0;font-size:1.08rem;border-radius:8px;border:none;background:#00bfff;color:#fff;font-weight:700;box-shadow:0 2px 8px #00bfff33;transition:background 0.2s;">Pagar com Débito</button>
      </form>
    </div>
  </div>
</section>
@endsection