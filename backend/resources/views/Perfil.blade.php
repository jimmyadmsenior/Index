@extends('layouts.app')
@section('title', 'Meu Perfil')
@section('content')
<div class="perfil-container">
    <h1>Meu Perfil</h1>
    <div class="perfil-card">
        <form action="{{ route('perfil.updateFoto') }}" method="POST" enctype="multipart/form-data" class="perfil-foto-form">
            @csrf
            <div class="perfil-foto-box">
                <img src="{{ !empty($user->foto) ? $user->foto : '/media/placeholder_produto.png' }}" alt="Foto de perfil" class="perfil-foto-preview">
                <input type="file" name="foto" id="foto" accept="image/*">
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
</div>
@endsection
@push('styles')
<link rel="stylesheet" href="/media/Css/Perfil.css">
@endpush
