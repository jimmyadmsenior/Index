@extends('layouts.app')
@section('head')
<style>
  .faq-container {
    width: 100%;
    max-width: 700px;
    margin: 40px auto 0 auto;
    display: flex;
    flex-direction: column;
    gap: 32px;
  }
  .faq-item {
    background: #fff;
    border-radius: 18px;
    box-shadow: 0 4px 24px 0 rgba(0,0,0,0.08);
    padding: 0;
    transition: box-shadow 0.18s;
    overflow: hidden;
    position: relative;
  }
  .faq-question {
    display: flex;
    align-items: center;
    justify-content: space-between;
    cursor: pointer;
    padding: 32px 38px 32px 38px;
    font-size: 1.32rem;
    font-weight: 700;
    color: #222;
    letter-spacing: 0.5px;
    transition: background 0.18s;
  }
  .faq-question:hover {
    background: #f7f7f7;
  }
  .faq-icon {
    font-size: 2.2rem;
    font-weight: bold;
    color: #222;
    transition: transform 0.32s cubic-bezier(.4,1.4,.6,1);
    margin-left: 18px;
    user-select: none;
    display: flex;
    align-items: center;
  }
  .faq-item.expanded .faq-icon {
    transform: rotate(45deg);
  }
  .faq-answer {
    max-height: 0;
    overflow: hidden;
    padding: 0 38px;
    color: #444;
    font-size: 1.08rem;
    font-weight: 400;
    line-height: 1.7;
    background: #fafafa;
    transition: max-height 0.38s cubic-bezier(.4,1.4,.6,1), padding 0.18s;
  }
  .faq-item.expanded .faq-answer {
    max-height: 400px;
    padding: 24px 38px 32px 38px;
  }
</style>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.faq-question').forEach(function(q) {
      q.addEventListener('click', function() {
        const item = q.parentElement;
        item.classList.toggle('expanded');
      });
    });
  });
</script>
@section('content')
<div style="position: relative; width: 100%; max-height: 260px; overflow: hidden;">
  <img src="/media/Imagem Tecnologia Sobre.png" alt="Banner Sobre Nós" class="sobre-nos-banner" style="width: 100%; max-height: 260px; object-fit: cover; display: block; filter: brightness(0.55);">
  <h1 style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: #fff; font-size: 2.7rem; font-weight: bold; letter-spacing: 2px; text-shadow: 0 4px 24px #000, 0 1px 0 #222; margin: 0; padding: 0 16px; text-align: center; width: 100%;">Sobre Nós</h1>
</div>
<main class="sobre-nos-main" style="min-height: 60vh; display: flex; align-items: center; justify-content: center; padding: 0;">
  <section class="sobre-nos-container" style="width: 100%; max-width: 700px; margin: 0 auto; text-align: center; display: flex; flex-direction: column; align-items: center; justify-content: center;">
    <div class="faq-container">
      <div class="faq-item">
        <div class="faq-question">QUEM SOMOS?<span class="faq-icon">+</span></div>
        <div class="faq-answer">A Silicon Devs nasceu da união de quatro pessoas apaixonadas por tecnologia e inovação. Nosso projeto surgiu com um objetivo claro: criar um site intuitivo e eficiente para a venda de produtos tecnológicos, oferecendo aos clientes uma experiência fluida, segura e moderna.

Nosso nome, Silicon Devs, é uma referência ao Vale do Silício, o maior polo tecnológico do mundo, berço das maiores inovações e startups de sucesso. Inspirados nesse ambiente de criatividade e evolução constante, buscamos trazer o melhor da tecnologia para nossos clientes, com um site que prioriza a usabilidade, rapidez e praticidade na navegação.</div>
      </div>
      <div class="faq-item">
        <div class="faq-question">NOSSO COMPROMISSO COM SUA PRIVACIDADE<span class="faq-icon">+</span></div>
        <div class="faq-answer">Nosso compromisso é garantir que todos os nossos usuários encontrem facilmente os produtos que procuram, com descrições detalhadas, recomendações personalizadas e um processo de compra simplificado. Estamos sempre atentos às tendências do mercado para oferecer as últimas novidades, mantendo nossa plataforma atualizada e alinhada às necessidades dos consumidores.

A Silicon Devs é mais do que um e-commerce; somos um time dedicado a transformar a experiência de compra online.</div>
      </div>
      <div class="faq-item">
        <div class="faq-question">SEU COMPROMISSO COM NOSSAS CONDIÇÕES<span class="faq-icon">+</span></div>
        <div class="faq-answer">Ao utilizar nosso site, você concorda com nossos termos de uso e políticas de privacidade. Recomendamos que leia atentamente todas as condições para garantir uma navegação segura e consciente.</div>
      </div>
    </div>
  </section>
</main>
@endsection