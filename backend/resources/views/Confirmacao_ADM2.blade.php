@extends('layouts.app')

@section('content')
<!-- Conteúdo original da página abaixo -->
<div class="background">
    <div class="titulo-wrapper">
      <h1 class="titulo-confirmacao">Administrador</h1>
    </div>
    <div class="verification-container">
      <img class="check-icon" src="/media/Ícone_Check_Branco.png" alt="Ícone de confirmação">
      <p>Seu código foi validado com sucesso.<br>Agora você pode acessar a plataforma como administrador.</p>
      <button class="botao-entrar">ENTRAR</button>
    </div>
  </div>
@endsection
