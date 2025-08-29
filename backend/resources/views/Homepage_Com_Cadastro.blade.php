@extends('layouts.app')

@section('head')
<style>
header, nav, .menu li a, .icons i, .navbar-btn, .navbar-btn-login, .navbar-btn-cadastro, .navbar-btn-perfil {
  background: #111 !important;
  color: #fff !important;
  border: none !important;
}
.menu li a { text-decoration: none !important; }
</style>
@endsection

@section('content')
<main class="main-homepage">
    <section class="hero-section">
      <h1 class="hero-title">Chegou o Index, o toque de classe que faltava!</h1>
      <p class="hero-subtitle">Possua os melhores modelos, com tecnologia de ponta, da Apple e Samsung</p>
    </section>
    <section class="featured-products">
      <div class="featured-iphone14">
        <h2>iPhone 14</h2>
        <p class="featured-desc">A tecnologia encontra o conforto</p>
        <a href="/produto/8" class="featured-link">Comprar</a>
        <div class="featured-imgs">
          <img src="/media/Iphone_14_Capa_Homepage.png" alt="iPhone 14" class="iphone14-img"/>
        </div>
  <video class="video-fullwidth iphone-video-scroll" id="iphoneVideoScroll" autoplay muted loop style="border-radius: 18px; overflow: hidden; box-shadow: 0 2px 16px rgba(0,0,0,0.18);">
          <source src="/media/Vídeo_iPhone_Capa_Homepage.mp4" type="video/mp4">
          Seu navegador não suporta a tag de vídeo.
        </video>
      </div>
      <div class="product-grid">
        <div class="product-card dark">
          <h3>iPhone 14 Pro</h3>
          <p>Faz jus ao nome</p>
          <a href="/produto/6" class="featured-link">Comprar</a>
          <img src="/media/Iphone_14_Pro_Capa_Homepage.png" alt="iPhone 14 Pro"/>
        </div>
        <div class="product-card dark">
          <h3>Galaxy Book4</h3>
          <p>Desempenho nunca antes visto</p>
          <a href="/produto/60" class="featured-link">Comprar</a>
          <img src="/media/GalaxyBook4_Homepage.png" alt="Galaxy Book4"/>
        </div>
        <div class="product-card dark">
          <h3>Samsung Galaxy Tab S6</h3>
          <p>Profissionalismo e elegância</p>
          <a href="/produto/167" class="featured-link">Comprar</a>
          <img src="/media/Samsung Galaxy Tab S6.png" alt="Samsung Galaxy Tab S6"/>
        </div>
        <div class="product-card dark">
          <h3>Apple Watch Series 8</h3>
          <p>Um salto de tecnologia</p>
          <a href="/produto/109" class="featured-link">Comprar</a>
          <img src="/media/Watch_Series8.png" alt="Apple Watch Series 8"/>
        </div>
      </div>
    </section>
    <section class="explore-section">
      <div class="explore-banner">
        <div class="explore-text">
          <h2>Explore nosso site e descubra o luxo</h2>
        </div>
        <div class="explore-img">
            <img src="/media/Explore_Nosso_Site_E_Descubra.png" alt="Mascote Index" style="width: 100%; max-width: 1200px; height: auto; border-radius: 18px; box-shadow: 0 2px 16px rgba(0,0,0,0.18); object-fit: cover; display: block; margin: 0 auto;"/>
        </div>
      </div>
    </section>
</main>
@endsection