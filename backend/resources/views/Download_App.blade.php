@extends('layouts.app')

@section('content')
<main class="container" style="padding-top: 120px;">
  <div class="left">
    <h1 style="font-size: 64px; font-weight: bold; margin-bottom: 28px;">BAIXE NOSSO APP</h1>
    <p style="font-size: 24px; margin-bottom: 28px;">
      Escaneie o QrCode ou clique no botão abaixo para baixar.<br>
      Se o download não iniciar, recarregue a página e tente novamente.
    </p>
    <a href="/media/Arquivo_Test.pdf" download="index-app.apk" class="download-button" id="download-link">
      <button style="width: 140px; height: 48px; font-size: 22px;">BAIXAR</button>
    </a>
  </div>
  <div class="right">
    <img src="/media/Qr_Code_test.png" alt="QR Code" class="qrcode" style="width: 260px; height: 260px;"/>
  </div>
</main>
@endsection

@push('styles')
<link rel="stylesheet" href="/media/Css/Download_App.css">
@endpush

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const savedTheme = localStorage.getItem('theme') || 'light';
    
    setTimeout(() => {
      if (document.body) {
        document.body.classList.remove('theme-transition');
      }
    }, 100);

    const downloadButton = document.getElementById('download-link');
    if (downloadButton) {
      downloadButton.addEventListener('click', function(e) {
        console.log('Download iniciado');
      });
    }
  });
</script>
@endpush
