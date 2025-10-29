@extends('layouts.app')

@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
@vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/iphone17pro.jsx'])
<script src="https://cdn.tailwindcss.com"></script>
<style>
/* Garantir fundo preto para a página React */
body {
    background: #000 !important;
    color: #fff !important;
}

html {
    background: #000 !important;
}

main {
    background: #000 !important;
    padding: 0 !important;
}

#iphone17-react {
    background: #000;
    min-height: 100vh;
}

/* Sobrepor estilos do layout */
.iphone17-page-wrapper {
    background: #000 !important;
}
</style>
@endsection

@section('content')
<div class="iphone17-page-wrapper">
    <div id="iphone17-react" data-authenticated="{{ auth()->check() ? 'true' : 'false' }}">
        <!-- Componente React será montado aqui -->
        <div class="flex items-center justify-center min-h-screen">
            <div class="text-white text-center">
                <div class="animate-spin rounded-full h-32 w-32 border-b-2 border-white mx-auto mb-4"></div>
                <p>Carregando iPhone 17 Pro...</p>
            </div>
        </div>
    </div>
</div>
@endsection