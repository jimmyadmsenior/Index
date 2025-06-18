@extends('layouts.app')

@section('content')
<!-- Conteúdo principal da página de pagamento via Pix -->
<div class="main-homepage" style="min-height:60vh;">
    <div style="height:70px;"></div>
    <section id="pix-section" style="max-width:480px;margin:48px auto 64px auto;padding:36px 28px;background:rgba(24,24,28,0.98);border-radius:28px;box-shadow:0 8px 32px rgba(0,0,0,0.22);text-align:center;">
      <p class="pix-frete" style="color:#fff;font-size:1.1rem;margin-bottom:18px;">Frete grátis para todos os nossos produtos.</p>
      <h2 class="pix-title" style="color:#fff;font-size:1.15rem;font-weight:800;margin-bottom:18px;">Use o QR Code ou o código Pix para realizar seu pagamento</h2>
      <div style="margin-bottom:10px; display: flex; justify-content: center; align-items: center; width: 100%;">
        <img id="pix-qrcode" src="/media/Qr_Code_test.png" alt="QR Code" style="width:220px; display: block; margin: 0 auto;"/>
      </div>
      <p class="pix-codigo" style="color:#fff;font-size:1.05rem;margin-bottom:24px;">123e4567-e89b-12d3-a456-426614174000</p>
      <form id="form-pix" action="/finalizar-compra" method="POST" style="margin:0;">
        @csrf
        <input type="hidden" name="produto_id" id="produto_id_pix" value="{{ session('produto_id') ?? request('produto_id') ?? (isset($produto) ? $produto->id : ($produto_id ?? '')) }}">
        <button id="pix-btn" class="featured-link" type="submit" style="display:inline-block;margin-top:10px;padding:14px 40px;font-size:1.15rem;border-radius:10px;background:#000;color:#fff;font-weight:700;text-decoration:none;cursor:pointer;border:none;transition:none;">Continuar</button>
      </form>
    </section>
    <div style="height:60px;"></div>
</div>
@endsection
