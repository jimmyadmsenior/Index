@extends('layouts.app')

@section('content')

{{-- Barra de Pesquisa de Relógios --}}
@include('partials.product-search', ['categoria' => 'Relógios'])

<div class="relogios-container">
    <h1 style="color: #000; font-size: 3rem; font-weight: bold; text-align: center; margin-top: 30px;">
        Relógios Inteligentes
    </h1>
    <p style="color: #666; font-size: 1.2rem; text-align: center; margin-bottom: 50px;">
        Descubra nossa coleção de smartwatches Apple e Samsung
    </p>
    
    <!-- Conteúdo da página será adicionado aqui -->
</div>

@endsection