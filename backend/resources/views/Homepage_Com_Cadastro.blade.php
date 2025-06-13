@extends('layouts.app')

@section('content')
<main class="main-homepage">
    <section class="hero-section">
      <h1 class="hero-title">Chegou o Index, o toque de classe que faltava!</h1>
      <p class="hero-subtitle">Possua os melhores modelos, com tecnologia de ponta, da Apple e Samsung</p>
    </section>
    <section class="featured-products">
      @php
        $produtos = \App\Models\Produto::all();
        $produtosDestaque = [
          'iPhone 14',
          'iPhone 14 Pro',
          'Galaxy Book4',
          'Samsung Galaxy Tab S6',
          'Apple Watch Series 8',
        ];
      @endphp
      <div class="featured-iphone14">
        @php $p = $produtos->firstWhere('nome', 'iPhone 14'); @endphp
        <h2>iPhone 14</h2>
        <p class="featured-desc">A tecnologia encontra o conforto</p>
        @if($p)
          <a href="/produto/{{ $p->id }}" class="featured-link">Comprar</a>
        @else
          <a href="#" class="featured-link" style="pointer-events:none;opacity:0.5;">Indisponível</a>
        @endif
        <div class="featured-imgs">
          <img src="/media/Iphone_14_Capa_Homepage.png" alt="iPhone 14" class="iphone14-img"/>
        </div>
        <video class="video-fullwidth iphone-video-scroll" id="iphoneVideoScroll" autoplay muted loop>
          <source src="/media/Vídeo_iPhone_Capa_Homepage.mp4" type="video/mp4">
          Seu navegador não suporta a tag de vídeo.
        </video>
      </div>
      <div class="product-grid">
        @foreach([
          [
            'nome' => 'iPhone 14 Pro',
            'img' => '/media/Iphone_14_Pro_Capa_Homepage.png'
          ],
          [
            'nome' => 'Galaxy Book4',
            'img' => '/media/GalaxyBook4_Homepage.png'
          ],
          [
            'nome' => 'Samsung Galaxy Tab S6',
            'img' => '/media/Samsung Galaxy Tab S6.png'
          ],
          [
            'nome' => 'Apple Watch Series 8',
            'img' => '/media/Watch_Series8.png'
          ],
        ] as $item)
          @php $p = $produtos->firstWhere('nome', $item['nome']); @endphp
          <div class="product-card dark">
            <h3>{{ $item['nome'] }}</h3>
            <p>
              @if($item['nome'] == 'iPhone 14 Pro') Faz jus ao nome
              @elseif($item['nome'] == 'Galaxy Book4') Desempenho nunca antes visto
              @elseif($item['nome'] == 'Samsung Galaxy Tab S6') Profissionalismo e elegância
              @elseif($item['nome'] == 'Apple Watch Series 8') Um salto de tecnologia
              @endif
            </p>
            @if($p)
              <a href="/produto/{{ $p->id }}" class="featured-link">Comprar</a>
            @endif
            <img src="{{ $item['img'] }}" alt="{{ $item['nome'] }}"/>
          </div>
        @endforeach
      </div>
    </section>
    <section class="explore-section">
      <div class="explore-banner">
        <div class="explore-text">
          <h2>Explore nosso site e descubra o luxo</h2>
        </div>
        <div class="explore-img">
          <img src="/media/Explore_Nosso_Site_E_Descubra.png" alt="Mascote Index"/>
        </div>
      </div>
    </section>
</main>
<!-- Scripts e estilos específicos da página podem ser adicionados com @push('scripts') e @push('styles') se necessário -->
@endsection