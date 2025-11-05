@extends('layouts.app')
@section('head')
@endsection
@section('title', 'Meu Perfil')
@section('content')
<div class="perfil-container" style="margin-top: 90px;">
    <h1>Meu Perfil</h1>
    <div class="perfil-card">
        <form action="{{ route('perfil.updateFoto') }}" method="POST" enctype="multipart/form-data" class="perfil-foto-form">
            @csrf
            <div class="perfil-foto-box">
                <label for="foto" class="perfil-foto-upload-label" style="cursor:pointer; display:flex; flex-direction:column; align-items:center; gap:8px;">
                    <img src="{{ !empty($user->foto) ? $user->foto . '?v=' . time() : '/media/placeholder_produto.png' }}" alt="" class="perfil-foto-preview" id="fotoPreview">
                    <span style="background:#3a7bfd; color:#fff; padding:6px 18px; border-radius:6px; font-size:1rem; font-weight:500; transition:background 0.2s;">Escolher nova foto</span>
                    <input type="file" name="foto" id="foto" accept="image/*" style="display:none;">
                </label>
                <button type="submit">Atualizar Foto</button>
            </div>
        </form>
        <div class="perfil-info">
            <p><strong>Nome:</strong> {{ $user->name }}</p>
            <p><strong>E-mail:</strong> {{ $user->email }}</p>
        </div>
        <form action="{{ route('perfil.updateSenha') }}" method="POST" class="perfil-senha-form">
            @csrf
            <h2>Alterar Senha</h2>
            <input type="password" name="senha_atual" placeholder="Senha atual" required>
            <input type="password" name="nova_senha" placeholder="Nova senha" required>
            <input type="password" name="nova_senha_confirmation" placeholder="Confirme a nova senha" required>
            <button type="submit">Alterar Senha</button>
        </form>
        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div class="alert-error">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif
    </div>
    
    <!-- Seção de Pedidos -->
    <div style="text-align: center; margin: 30px 0;">
        <h3 style="color: #fff; margin-bottom: 16px;">Meus Pedidos</h3>
        <a href="{{ route('perfil.pedidos') }}" style="display: inline-block; background: linear-gradient(135deg, #00bfff, #4db5ff); color: #fff; text-decoration: none; padding: 12px 24px; border-radius: 8px; font-weight: 600; transition: all 0.3s ease;">
            <i class="fas fa-package"></i> Ver Meus Pedidos e Rastreamentos
        </a>
    </div>
    
    <form action="/logout" method="POST" style="margin-top: 24px; text-align: center;">
        @csrf
        <button type="submit" style="background: #e74c3c; color: #fff; border: none; border-radius: 8px; padding: 10px 32px; font-size: 1.1rem; font-weight: bold; cursor: pointer; transition: background 0.2s;">Sair</button>
    </form>
</div>
@endsection
@push('styles')
<link rel="stylesheet" href="/media/Css/Perfil.css">
@endpush
@section('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const savedTheme = localStorage.getItem('theme') || 'dark';
    document.documentElement.setAttribute('data-theme', savedTheme);
    
    const themeToggle = document.querySelector('#theme-toggle');
    if(themeToggle) {
      themeToggle.checked = savedTheme === 'dark';
      
      themeToggle.addEventListener('change', function() {
        if (this.checked) {
          document.documentElement.setAttribute('data-theme', 'dark');
          localStorage.setItem('theme', 'dark');
          document.body.classList.add('theme-transition');
          setTimeout(() => {
            document.body.classList.remove('theme-transition');
          }, 1000);
        } else {
          document.documentElement.setAttribute('data-theme', 'light');
          localStorage.setItem('theme', 'light');
          document.body.classList.add('theme-transition');
          setTimeout(() => {
            document.body.classList.remove('theme-transition');
          }, 1000);
        }
      });
    }
    
    const prefersDarkScheme = window.matchMedia('(prefers-color-scheme: dark)');
    function syncWithSystemTheme(e) {
      if (!localStorage.getItem('theme')) {
        if (e.matches) {
          document.documentElement.setAttribute('data-theme', 'dark');
          if(themeToggle) themeToggle.checked = true;
        } else {
          document.documentElement.setAttribute('data-theme', 'light');
          if(themeToggle) themeToggle.checked = false;
        }
      }
    }
    syncWithSystemTheme(prefersDarkScheme);
    prefersDarkScheme.addEventListener('change', syncWithSystemTheme);
  });
</script>
<script>
  // Preview da imagem selecionada
  document.addEventListener('DOMContentLoaded', function() {
    const input = document.getElementById('foto');
    const preview = document.getElementById('fotoPreview');
    if(input && preview) {
      input.addEventListener('change', function(e) {
        if (e.target.files && e.target.files[0]) {
          const reader = new FileReader();
          reader.onload = function(ev) {
            preview.src = ev.target.result;
          }
          reader.readAsDataURL(e.target.files[0]);
        }
      });
    }
  });
</script>
@endsection

