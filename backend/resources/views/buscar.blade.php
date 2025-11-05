@extends('layouts.app')

@section('head')
<style>
.buscar-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.buscar-header {
    text-align: center;
    margin-bottom: 30px;
}

.buscar-titulo {
    font-size: 2.5rem;
    font-weight: bold;
    color: #333;
    margin-bottom: 10px;
}

.buscar-subtitulo {
    font-size: 1.2rem;
    color: #666;
}

.resultados-info {
    margin: 20px 0;
    padding: 15px;
    background: #f8f9fa;
    border-radius: 10px;
    text-align: center;
}

.erro-busca {
    background: #fee;
    border: 1px solid #fcc;
    color: #c33;
    padding: 20px;
    border-radius: 10px;
    text-align: center;
    margin: 20px 0;
}

.erro-busca h3 {
    margin: 0 0 10px 0;
    font-size: 1.5rem;
}

.erro-busca p {
    margin: 0;
    font-size: 1.1rem;
}

.sugestoes-busca {
    background: #e3f2fd;
    border: 1px solid #bbdefb;
    padding: 20px;
    border-radius: 10px;
    margin-top: 20px;
}

.sugestoes-busca h4 {
    margin: 0 0 15px 0;
    color: #1976d2;
}

.sugestoes-busca ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.sugestoes-busca li {
    padding: 5px 0;
    color: #666;
}

.produtos-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 20px;
    margin-top: 30px;
}

.produto-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    cursor: pointer;
}

.produto-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

.produto-imagem {
    height: 200px;
    background: #f5f5f5;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.produto-imagem img {
    max-width: 100%;
    max-height: 100%;
    object-fit: cover;
}

.produto-info {
    padding: 20px;
}

.produto-nome {
    font-size: 1.2rem;
    font-weight: bold;
    color: #333;
    margin: 0 0 8px 0;
    line-height: 1.3;
}

.produto-marca {
    color: #666;
    font-size: 0.9rem;
    margin-bottom: 10px;
}

.produto-categoria {
    background: #e3f2fd;
    color: #1976d2;
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 0.8rem;
    display: inline-block;
    margin-bottom: 10px;
}

.produto-preco {
    font-size: 1.3rem;
    font-weight: bold;
    color: #007aff;
    margin: 0;
}

.voltar-busca {
    text-align: center;
    margin: 30px 0;
}

.btn-voltar {
    background: #007aff;
    color: white;
    padding: 12px 24px;
    border: none;
    border-radius: 25px;
    font-size: 1rem;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
    transition: background 0.3s ease;
}

.btn-voltar:hover {
    background: #0056b3;
    color: white;
    text-decoration: none;
}

.paginacao {
    display: flex;
    justify-content: center;
    margin: 40px 0;
}

@media (max-width: 768px) {
    .buscar-container {
        padding: 15px;
    }
    
    .buscar-titulo {
        font-size: 2rem;
    }
    
    .produtos-grid {
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 15px;
    }
}
</style>
@endsection

@section('content')
<div class="buscar-container">
    <div class="buscar-header">
        <h1 class="buscar-titulo">
            <i class="fas fa-search"></i> Resultados da Busca
        </h1>
        @if($termo)
            <p class="buscar-subtitulo">
                Você pesquisou por: <strong>"{{ $termo }}"</strong>
                @if($categoria)
                    em <strong>{{ $categoria }}</strong>
                @endif
            </p>
        @endif
    </div>

    {{-- Barra de Pesquisa no topo da página de resultados --}}
    @include('partials.product-search', ['categoria' => $categoria])

    @if($mensagemErro)
        <div class="erro-busca">
            <h3><i class="fas fa-exclamation-triangle"></i> Produto não encontrado</h3>
            <p>{{ $mensagemErro }}</p>
            
            <div class="sugestoes-busca">
                <h4><i class="fas fa-lightbulb"></i> Sugestões:</h4>
                <ul>
                    <li>• Verifique a ortografia das palavras</li>
                    <li>• Tente termos mais genéricos (ex: "iPhone" ao invés de "iPhone 15 Pro Max")</li>
                    <li>• Use apenas palavras-chave principais</li>
                    <li>• Navegue pelas categorias: 
                        <a href="{{ route('categoria.smartphones') }}">Smartphones</a>, 
                        <a href="{{ route('categoria.tablets') }}">Tablets</a>, 
                        <a href="{{ route('categoria.fones') }}">Fones</a>
                    </li>
                </ul>
            </div>
        </div>
    @elseif($produtos && $produtos->count() > 0)
        <div class="resultados-info">
            <p><strong>{{ $produtos->total() }}</strong> produto(s) encontrado(s)</p>
        </div>

        <div class="produtos-grid">
            @foreach($produtos as $produto)
                <div class="produto-card" onclick="window.location.href='{{ route('produto.show', $produto->id) }}'">
                    <div class="produto-imagem">
                        @if($produto->imagem && $produto->imagem !== 'default.png')
                            <img src="{{ asset('storage/' . $produto->imagem) }}" alt="{{ $produto->nome }}">
                        @else
                            <img src="{{ asset('media/placeholder_produto.png') }}" alt="{{ $produto->nome }}">
                        @endif
                    </div>
                    <div class="produto-info">
                        <h3 class="produto-nome">{{ $produto->nome }}</h3>
                        <p class="produto-marca">{{ $produto->marca }}</p>
                        <span class="produto-categoria">{{ $produto->categoria->nome }}</span>
                        <p class="produto-preco">R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Paginação --}}
        @if($produtos->hasPages())
            <div class="paginacao">
                {{ $produtos->appends(request()->query())->links() }}
            </div>
        @endif
    @endif

    <div class="voltar-busca">
        <a href="javascript:history.back()" class="btn-voltar">
            <i class="fas fa-arrow-left"></i> Voltar
        </a>
    </div>
</div>
@endsection