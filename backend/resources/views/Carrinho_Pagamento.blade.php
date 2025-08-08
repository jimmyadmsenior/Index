@extends('layouts.app')

@section('content')
<!-- Conteúdo principal da página de pagamento do carrinho -->
<section class="payment-section" style="max-width:480px;margin:48px auto 64px auto;padding:36px 28px 28px 28px;background:rgba(24,24,28,0.98);border-radius:28px;box-shadow:0 8px 32px rgba(0,0,0,0.22);">
  <h2 style="text-align:center;font-size:2.1rem;font-weight:800;margin-bottom:32px;color:#fff;letter-spacing:1px;">Pagamento</h2>
  <div style="display:flex;flex-direction:column;gap:28px;">
    <!-- Cartão -->
    <div class="payment-card" style="background:linear-gradient(120deg,#23243a 60%,#2e8fff 100%);border-radius:18px;padding:24px 20px;box-shadow:0 2px 12px #2e8fff22;">
      <div style="display:flex;align-items:center;gap:12px;margin-bottom:18px;">
        <i class="fas fa-credit-card" style="font-size:1.5rem;color:#fff;"></i>
        <span style="font-size:1.15rem;color:#fff;font-weight:600;">Cartão de Crédito</span>
      </div>
      <form id="form-cartao" action="/finalizar-compra" method="POST" style="display:flex;flex-direction:column;gap:14px;">
        @csrf
  <input type="hidden" name="produto_id" id="produto_id_pagamento" value="{{ session('produto_id') ?? request('produto_id') ?? '' }}">
  <input type="text" placeholder="Nome no cartão" name="nome_cartao" id="nome_cartao" required pattern="[A-Za-zÀ-ÿ ']+" title="Apenas letras" style="padding:11px;border-radius:7px;border:1px solid #3a3a4a;background:#23243a;color:#fff;"/>
        <input type="text" placeholder="Número do cartão" name="numero_cartao" id="numero_cartao" required maxlength="19" pattern="[0-9 ]+" title="Apenas números" inputmode="numeric" autocomplete="cc-number" style="padding:11px;border-radius:7px;border:1px solid #3a3a4a;background:#23243a;color:#fff;"/>
        <div style="display:flex;gap:10px;flex-wrap:wrap;">
          <input type="text" placeholder="Validade (MM/AA)" name="validade" id="validade_cartao" required maxlength="5" pattern="(0[1-9]|1[0-2])\/[0-9]{2}" title="Formato MM/AA" inputmode="numeric" autocomplete="cc-exp" style="min-width:0;flex-basis:60%;flex-grow:1;padding:11px;border-radius:7px;border:1px solid #3a3a4a;background:#23243a;color:#fff;"/>
          <input type="text" placeholder="CVV" name="cvv" id="cvv_cartao" required maxlength="4" pattern="[0-9]{3,4}" title="Apenas números" inputmode="numeric" autocomplete="cc-csc" style="min-width:0;flex-basis:35%;flex-grow:0;padding:11px;border-radius:7px;border:1px solid #3a3a4a;background:#23243a;color:#fff;"/>
        </div>
        <script>
        // Impede números no nome do cartão
        document.getElementById('nome_cartao').addEventListener('input', function(e) {
          e.target.value = e.target.value.replace(/[0-9]/g, '');
        });
        // Máscara para número do cartão (só números e espaço)
        document.getElementById('numero_cartao').addEventListener('input', function(e) {
          let v = e.target.value.replace(/\D/g, '');
          v = v.replace(/(\d{4})(?=\d)/g, '$1 ');
          e.target.value = v.trim();
        });
        // Impede letras no CVV
        document.getElementById('cvv_cartao').addEventListener('input', function(e) {
          e.target.value = e.target.value.replace(/\D/g, '');
        });
        // Máscara para validade MM/AA
        document.getElementById('validade_cartao').addEventListener('input', function(e) {
          let v = e.target.value.replace(/\D/g, '');
          if (v.length > 4) v = v.slice(0,4);
          if (v.length > 2) v = v.slice(0,2) + '/' + v.slice(2);
          e.target.value = v;
        });
        </script>
        <button type="submit" class="btn-anim" style="margin-top:10px;padding:13px 0;font-size:1.08rem;border-radius:8px;border:none;background:#2e8fff;color:#fff;font-weight:700;box-shadow:0 2px 8px #2e8fff33;transition:background 0.2s;">Pagar com Cartão</button>
      </form>
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
