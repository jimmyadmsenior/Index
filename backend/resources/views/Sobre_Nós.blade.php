@extends('layouts.app')
@section('content')
<div style="position: relative; width: 100%; max-height: 260px; overflow: hidden;">
  <img src="/media/Imagem Tecnologia Sobre.png" alt="Banner Sobre Nós" class="sobre-nos-banner" style="width: 100%; max-height: 260px; object-fit: cover; display: block; filter: brightness(0.55);">
  <h1 style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: #fff; font-size: 2.7rem; font-weight: bold; letter-spacing: 2px; text-shadow: 0 4px 24px #000, 0 1px 0 #222; margin: 0; padding: 0 16px; text-align: center; width: 100%;">Sobre Nós</h1>
</div>
<main class="sobre-nos-main" style="min-height: 60vh; display: flex; align-items: center; justify-content: center; padding: 0;">
  <section class="sobre-nos-container" style="width: 100%; max-width: 700px; margin: 0 auto; text-align: center; display: flex; flex-direction: column; align-items: center; justify-content: center;">
    <p style="font-size: 1.18rem; color: #ccc; margin-bottom: 22px; line-height: 1.7; font-weight: 400;">A Silicon Devs nasceu da união de quatro pessoas apaixonadas por tecnologia e inovação. Nosso projeto surgiu com um objetivo claro: criar um site intuitivo e eficiente para a venda de produtos tecnológicos, oferecendo aos clientes uma experiência fluida, segura e moderna.</p>
    <p style="font-size: 1.12rem; color: #bbb; margin-bottom: 22px; line-height: 1.7;">Nosso nome, Silicon Devs, é uma referência ao Vale do Silício, o maior polo tecnológico do mundo, berço das maiores inovações e startups de sucesso. Inspirados nesse ambiente de criatividade e evolução constante, buscamos trazer o melhor da tecnologia para nossos clientes, com um site que prioriza a usabilidade, rapidez e praticidade na navegação.</p>
    <p style="font-size: 1.12rem; color: #bbb; margin-bottom: 22px; line-height: 1.7;">Nosso compromisso é garantir que todos os nossos usuários encontrem facilmente os produtos que procuram, com descrições detalhadas, recomendações personalizadas e um processo de compra simplificado. Estamos sempre atentos às tendências do mercado para oferecer as últimas novidades, mantendo nossa plataforma atualizada e alinhada às necessidades dos consumidores.</p>
    <p style="font-size: 1.12rem; color: #bbb; margin-bottom: 28px; line-height: 1.7;">A Silicon Devs é mais do que um e-commerce; somos um time dedicado a transformar a experiência de compra online.</p>
  </section>
</main>
@endsection
@section('head')
  <link rel="stylesheet" href="/media/Css/Sobre_Nós.css" />
@endsection