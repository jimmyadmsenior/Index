@extends('layouts.app')

@section('content')
<!-- Conteúdo principal da página de carrinho vazio -->
<div class="cart-empty">
    <img src="/media/cart-icon.png" alt="Carrinho vazio" class="cart-icon">
    <h1>Seu carrinho está vazio</h1>
    <p class="cart-empty-description">Se quiser continuar sua compra, navegue por nosso site ou busque por um produto específico.</p>
    <div class="button-container">
      <button class="verification-button">ADICIONAR</button>
    </div>
</div>
@endsection
