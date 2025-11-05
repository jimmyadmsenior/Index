@extends('layouts.app')

@section('content')
<!-- Conteúdo principal da página de pagamento via Pix -->
<div class="main-homepage" style="min-height:60vh;">
    <div style="height:70px;"></div>
    <section id="pix-section" style="max-width:480px;margin:48px auto 64px auto;padding:36px 28px;background:rgba(24,24,28,0.98);border-radius:28px;box-shadow:0 8px 32px rgba(0,0,0,0.22);text-align:center;">
      
      <!-- Resumo do pedido -->
      @if(isset($total) && isset($carrinho))
        <div style="background:rgba(255,255,255,0.1);border-radius:12px;padding:20px;margin-bottom:24px;text-align:left;">
          <h3 style="color:#fff;margin-bottom:16px;font-size:1.2rem;text-align:center;">Resumo do Pedido</h3>
          <div style="color:#ccc;margin-bottom:12px;text-align:center;">
            <strong style="color:#fff;">Total: R$ {{ number_format($total, 2, ',', '.') }}</strong>
          </div>
          <div style="color:#aaa;font-size:0.9rem;text-align:center;">
            {{ count($carrinho) }} {{ count($carrinho) == 1 ? 'item' : 'itens' }} no carrinho
          </div>
        </div>
      @elseif(isset($produto_id))
        <div style="background:rgba(255,255,255,0.1);border-radius:12px;padding:20px;margin-bottom:24px;">
          <h3 style="color:#fff;margin-bottom:16px;font-size:1.2rem;">Produto Individual</h3>
        </div>
      @endif
      
      <p class="pix-frete" style="color:#fff;font-size:1.1rem;margin-bottom:18px;">Frete grátis para todos os nossos produtos.</p>
      <h2 class="pix-title" style="color:#fff;font-size:1.15rem;font-weight:800;margin-bottom:18px;">Use o QR Code ou o código Pix para realizar seu pagamento</h2>
      <div style="margin-bottom:10px; display: flex; justify-content: center; align-items: center; width: 100%;">
        <img id="pix-qrcode" src="/media/Qr_Code_test.png" alt="QR Code" style="width:220px; display: block; margin: 0 auto;"/>
      </div>
      <p class="pix-codigo" style="color:#fff;font-size:1.05rem;margin-bottom:24px;">123e4567-e89b-12d3-a456-426614174000</p>
      <form id="form-pix" action="/finalizar-compra" method="POST" style="margin:0;">
        @csrf
        <input type="hidden" name="metodo_pagamento" value="pix">
        @if(isset($total) && isset($carrinho))
          <!-- Carrinho completo -->
          <input type="hidden" name="tipo_compra" value="carrinho">
          <input type="hidden" name="total" value="{{ $total }}">
          @foreach($carrinho as $produto_id => $item)
            <input type="hidden" name="produtos[{{ $produto_id }}]" value="{{ $item['quantidade'] }}">
          @endforeach
        @else
          <!-- Produto individual -->
          <input type="hidden" name="produto_id" id="produto_id_pix" value="{{ $produto_id ?? session('produto_id') ?? request('produto_id') ?? (isset($produto) ? $produto->id : ($produto_id ?? '')) }}">
          <input type="hidden" name="tipo_compra" value="produto">
        @endif
        <button id="pix-btn" class="featured-link" type="submit" style="display:inline-block;margin-top:10px;padding:14px 40px;font-size:1.15rem;border-radius:10px;background:#000;color:#fff;font-weight:700;text-decoration:none;cursor:pointer;border:none;transition:none;">Continuar</button>
      </form>
    </section>
    <div style="height:60px;"></div>
</div>
@endsection
