@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-br from-gray-900 to-gray-800">
    <div class="w-full max-w-md bg-black rounded-lg shadow-lg p-8 mt-8">
        <h2 class="text-3xl font-semibold text-center text-white mb-6">Recuperação de Senha</h2>
        <p class="text-white text-center mb-6">
            Informe o seu e-mail para verificação.<br>
            Por favor, insira-o abaixo:
        </p>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="mb-6">
                <input id="email" type="email" name="email" required autofocus placeholder="Digite seu e-mail"
                    class="w-full px-4 py-3 rounded bg-transparent border border-gray-400 text-white focus:outline-none focus:border-yellow-600 placeholder-gray-400" />
            </div>
            <button type="submit"
                class="w-full py-3 rounded bg-white text-black font-bold tracking-wide hover:bg-yellow-100 transition-colors">
                ENVIAR
            </button>
        </form>
    </div>
</div>
@endsection
