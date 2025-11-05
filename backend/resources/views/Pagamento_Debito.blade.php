@extends('layouts.app')

@section('content')
<!-- Conteúdo principal da página de pagamento via Cartão de Débito -->
<div class="main-homepage" style="min-height:60vh;">
    <div style="height:70px;"></div>
    <section class="payment-section" style="max-width:480px;margin:48px auto 64px auto;padding:36px 28px 28px 28px;background:rgba(24,24,28,0.98);border-radius:28px;box-shadow:0 8px 32px rgba(0,0,0,0.22);">
        
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
        @elseif(isset($produto))
            <div style="background:rgba(255,255,255,0.1);border-radius:12px;padding:20px;margin-bottom:24px;">
                <h3 style="color:#fff;margin-bottom:16px;font-size:1.2rem;text-align:center;">{{ $produto->nome }}</h3>
                <div style="color:#ccc;margin-bottom:12px;text-align:center;">
                    <strong style="color:#fff;">R$ {{ number_format($produto->preco, 2, ',', '.') }}</strong>
                </div>
            </div>
        @endif
        
        <h2 style="text-align:center;font-size:2.1rem;font-weight:800;margin-bottom:32px;color:#fff;letter-spacing:1px;">Pagamento - Débito</h2>
        
        <div style="display:flex;flex-direction:column;gap:28px;">
            <div class="payment-card" style="background:linear-gradient(120deg,#23243a 60%,#00bfff 100%);border-radius:18px;padding:24px 20px;box-shadow:0 2px 12px #00bfff22;">
                <div style="display:flex;align-items:center;gap:12px;margin-bottom:18px;">
                    <i class="fas fa-credit-card" style="font-size:1.5rem;color:#fff;"></i>
                    <span style="font-size:1.15rem;color:#fff;font-weight:600;">Cartão de Débito</span>
                </div>
                
                <form id="form-debito" action="/finalizar-compra" method="POST" style="display:flex;flex-direction:column;gap:14px;">
                    @csrf
                    
                    @if(isset($total) && isset($carrinho))
                        <!-- Carrinho completo -->
                        <input type="hidden" name="tipo_compra" value="carrinho">
                        <input type="hidden" name="total" value="{{ $total }}">
                        <input type="hidden" name="metodo_pagamento" value="debito">
                        @foreach($carrinho as $produto_id => $item)
                            <input type="hidden" name="produtos[{{ $produto_id }}]" value="{{ $item['quantidade'] }}">
                        @endforeach
                    @else
                        <!-- Produto individual -->
                        <input type="hidden" name="produto_id" value="{{ $produto->id ?? request('produto_id') ?? session('produto_id') ?? '' }}">
                        <input type="hidden" name="tipo_compra" value="produto">
                        <input type="hidden" name="metodo_pagamento" value="debito">
                    @endif
                    
                    <input type="text" placeholder="Nome no cartão" name="nome_cartao" id="nome_cartao_debito" required pattern="[A-Za-zÀ-ÿ ']+" title="Apenas letras" style="padding:11px;border-radius:7px;border:1px solid #3a3a4a;background:#23243a;color:#fff;"/>
                    <input type="text" placeholder="Número do cartão" name="numero_cartao" id="numero_cartao_debito" required maxlength="19" pattern="[0-9 ]+" title="Apenas números" inputmode="numeric" autocomplete="cc-number" style="padding:11px;border-radius:7px;border:1px solid #3a3a4a;background:#23243a;color:#fff;"/>
                    
                    <div style="display:flex;gap:10px;flex-wrap:wrap;">
                        <input type="text" placeholder="Validade (MM/AA)" name="validade" id="validade_cartao_debito" required maxlength="5" pattern="(0[1-9]|1[0-2])\/[0-9]{2}" title="Formato MM/AA" inputmode="numeric" autocomplete="cc-exp" style="min-width:0;flex-basis:60%;flex-grow:1;padding:11px;border-radius:7px;border:1px solid #3a3a4a;background:#23243a;color:#fff;"/>
                        <input type="text" placeholder="CVV" name="cvv" id="cvv_cartao_debito" required maxlength="4" pattern="[0-9]{3,4}" title="Apenas números" inputmode="numeric" autocomplete="cc-csc" style="min-width:0;flex-basis:35%;flex-grow:0;padding:11px;border-radius:7px;border:1px solid #3a3a4a;background:#23243a;color:#fff;"/>
                    </div>
                    
                    <!-- Senha do cartão (específico para débito) -->
                    <input type="password" placeholder="Senha do cartão" name="senha_cartao" id="senha_cartao_debito" required maxlength="6" pattern="[0-9]{4,6}" title="Senha de 4 a 6 dígitos" inputmode="numeric" style="padding:11px;border-radius:7px;border:1px solid #3a3a4a;background:#23243a;color:#fff;"/>
                    
                    <button type="submit" class="btn-anim" style="margin-top:10px;padding:13px 0;font-size:1.08rem;border-radius:8px;border:none;background:#00bfff;color:#fff;font-weight:700;box-shadow:0 2px 8px #00bfff33;transition:background 0.2s;">Pagar com Débito</button>
                </form>
            </div>
        </div>
    </section>
    <div style="height:60px;"></div>
</div>

<script>
// Impede números no nome do cartão
document.getElementById('nome_cartao_debito').addEventListener('input', function(e) {
    e.target.value = e.target.value.replace(/[0-9]/g, '');
});

// Máscara para número do cartão (só números e espaço)
document.getElementById('numero_cartao_debito').addEventListener('input', function(e) {
    let v = e.target.value.replace(/\D/g, '');
    v = v.replace(/(\d{4})(?=\d)/g, '$1 ');
    e.target.value = v.trim();
});

// Impede letras no CVV
document.getElementById('cvv_cartao_debito').addEventListener('input', function(e) {
    e.target.value = e.target.value.replace(/\D/g, '');
});

// Máscara para validade MM/AA
document.getElementById('validade_cartao_debito').addEventListener('input', function(e) {
    let v = e.target.value.replace(/\D/g, '');
    if (v.length > 4) v = v.slice(0,4);
    if (v.length > 2) v = v.slice(0,2) + '/' + v.slice(2);
    e.target.value = v;
});

// Impede letras na senha
document.getElementById('senha_cartao_debito').addEventListener('input', function(e) {
    e.target.value = e.target.value.replace(/\D/g, '');
});
</script>
@endsection