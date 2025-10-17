@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="pt-br" data-theme="light">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Confirmação de Cadastro</title>
  <link rel="icon" type="image/png" href="/media/Ícone_Guia_Navegador_Site.png">
</head>
<body>
  <main class="main-homepage" style="min-height:80vh;display:flex;flex-direction:column;justify-content:center;">
    <div style="height:20vh;"></div>
    <section style="display:flex;justify-content:center;align-items:center;flex:1;width:100vw;">
      <div class="confirmation-container" style="background:rgba(30,30,30,0.97);border-radius:24px;padding:48px 48px;box-shadow:0 8px 32px rgba(0,0,0,0.22);text-align:center;max-width:420px;width:100%;margin:0 auto;">
        <h1 class="titulo-confirmacao" style="color:#fff;font-size:2.1rem;font-weight:800;margin-bottom:18px;">Confirmação de Cadastro</h1>
        <div style="display:flex;justify-content:center;margin-bottom:18px;">
          <img class="check-icon" src="/media/Ícone_Check_Branco.png" alt="Ícone de confirmação" style="width:60px;"/>
        </div>
        <p style="color:#fff;font-size:1.18rem;margin-bottom:24px;">Seu cadastro foi concluído com sucesso! Agora você pode acessar todas as funcionalidades disponíveis.</p>
        <a href="/login"><button class="botao-entrar" style="padding:14px 38px;font-size:1.15rem;border-radius:12px;background:#fff;color:#111;font-weight:700;box-shadow:0 2px 8px #0002;transition:background 0.2s;border:none;">ENTRAR</button></a>
      </div>
    </section>
    <div style="height:18vh;"></div>
  </main>
</body>
</html>
@endsection
