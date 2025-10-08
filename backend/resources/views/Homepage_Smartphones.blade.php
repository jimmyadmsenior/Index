@extends('layouts.app')
@section('head')
<link rel="stylesheet" href="{{ asset('media/Css/HomePage_Smartphones.css') }}">
@endsection
@section('content')
{{-- Hero - Homepage Smartphones --}}
<div class="iphone15-destaque">
    <p class="subtitulo">Iphone 15</p>

    <h1 class="titulo-degrade">Alta Tecnologia. <span style="font-weight:700;">Alto Padrão</span></h1>

    <p class="preco">Disponível por apenas <span class="font-semibold">R$3.285,99</span></p>

    <a href="#" class="comprar-btn-preto">Comprar</a>

    <div class="imagens" style="margin-top:28px;">
        <img src="{{ asset('media/img-iphone-homepage.png') }}" alt="iPhone 15" />
    </div>

    <!-- imagem full-bleed inserida dentro do bloco para permitir overlay do botão -->
    <div class="imagem-bleed-wrap">
        <div class="imagem-bleed-inner">
            <img class="imagem-bleed" src="{{ asset('media/frame (1).png') }}" alt="iPhone full bleed" />
            <!-- botão sobreposto dentro da imagem -->
            <a href="#" class="comprar-link-overlay">Comprar</a>
        </div>
    </div>

</div>
@endsection








