<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class CarrinhoController extends Controller
{
    public function index()
    {
        // Pegar itens do carrinho da sessão
        $carrinho = session()->get('carrinho', []);
        $total = 0;
        $itens = [];

        // Calcular total e buscar dados dos produtos
        foreach ($carrinho as $id => $item) {
            $produto = Produto::find($id);
            if ($produto) {
                $itens[] = [
                    'produto' => $produto,
                    'quantidade' => $item['quantidade'],
                    'subtotal' => $produto->preco * $item['quantidade']
                ];
                $total += $produto->preco * $item['quantidade'];
            }
        }

        return view('Carrinho', compact('itens', 'total'));
    }

    public function adicionar(Request $request)
    {
        try {
            Log::info('=== ADICIONAR AO CARRINHO ===');
            Log::info('Produto ID recebido: ' . $request->input('produto_id'));
            Log::info('Quantidade: ' . $request->input('quantidade', 1));
            Log::info('Usuário logado: ' . (Auth::check() ? Auth::id() : 'NÃO'));
            
            $produto_id = $request->input('produto_id');
            $quantidade = $request->input('quantidade', 1);

            $produto = Produto::find($produto_id);
            if (!$produto) {
                Log::error('Produto não encontrado. ID: ' . $produto_id);
                if ($request->ajax()) {
                    return response()->json(['success' => false, 'message' => 'Produto não encontrado.']);
                }
                return redirect()->back()->with('error', 'Produto não encontrado.');
            }
            
            Log::info('Produto encontrado: ' . $produto->nome . ' - R$ ' . $produto->preco);
        } catch (\Exception $e) {
            Log::error('Erro no carrinho: ' . $e->getMessage() . ' - Line: ' . $e->getLine());
            return redirect()->back()->with('error', 'Erro interno: ' . $e->getMessage());
        }

        $carrinho = session()->get('carrinho', []);

        if (isset($carrinho[$produto_id])) {
            $carrinho[$produto_id]['quantidade'] += $quantidade;
        } else {
            $carrinho[$produto_id] = [
                'quantidade' => $quantidade,
                'preco' => $produto->preco
            ];
        }

        session()->put('carrinho', $carrinho);
        
        // Salva a categoria do produto para "continuar comprando"
        if ($produto->categoria_id) {
            $categoria = \App\Models\Categoria::find($produto->categoria_id);
            if ($categoria) {
                $nomeCategoria = strtolower($categoria->nome);
                // Mapeia nomes de categoria para as rotas corretas
                $mapeamentoCategoria = [
                    'smartphone' => 'smartphones',
                    'smartphones' => 'smartphones',
                    'tablet' => 'tablets',
                    'tablets' => 'tablets',
                    'fone' => 'fones',
                    'fones' => 'fones',
                    'relógio' => 'relogios',
                    'relogios' => 'relogios',
                    'notebook' => 'notebooks',
                    'notebooks' => 'notebooks'
                ];
                
                foreach ($mapeamentoCategoria as $busca => $resultado) {
                    if (strpos($nomeCategoria, $busca) !== false) {
                        session(['pagina_categoria' => $resultado]);
                        break;
                    }
                }
            }
        }
        
        // Calcula o total de itens no carrinho
        $cart_count = array_sum(array_column($carrinho, 'quantidade'));
        
        if ($request->ajax()) {
            return response()->json([
                'success' => true, 
                'message' => 'Produto adicionado ao carrinho com sucesso!',
                'cart_count' => $cart_count,
                'produto_nome' => $produto->nome
            ]);
        }
        
        return redirect()->back()->with('success', 'Produto adicionado ao carrinho!');
    }

    public function remover($produto_id)
    {
        $carrinho = session()->get('carrinho', []);
        
        if (isset($carrinho[$produto_id])) {
            unset($carrinho[$produto_id]);
            session()->put('carrinho', $carrinho);
        }

        return redirect()->route('carrinho.index')->with('success', 'Produto removido do carrinho!');
    }

    public function atualizar(Request $request, $produto_id)
    {
        $quantidade = $request->input('quantidade');
        
        if ($quantidade <= 0) {
            return $this->remover($produto_id);
        }

        $carrinho = session()->get('carrinho', []);
        
        if (isset($carrinho[$produto_id])) {
            $carrinho[$produto_id]['quantidade'] = $quantidade;
            session()->put('carrinho', $carrinho);
        }

        return redirect()->route('carrinho.index')->with('success', 'Carrinho atualizado!');
    }

    public function limpar()
    {
        session()->forget('carrinho');
        return redirect()->route('carrinho.index')->with('success', 'Carrinho limpo!');
    }

    public function continuarComprando(Request $request)
    {
        // Verifica se há uma página anterior salva na sessão
        $paginaAnterior = session('pagina_categoria');
        
        // Mapeamento de categorias para suas rotas
        $categorias = [
            'smartphones' => 'categoria.smartphones',
            'tablets' => 'categoria.tablets',
            'fones' => 'categoria.fones',
            'relogios' => 'categoria.relogios',
            'notebooks' => 'categoria.notebooks'
        ];
        
        // Se temos uma categoria específica, redireciona para ela
        if ($paginaAnterior && isset($categorias[$paginaAnterior])) {
            return redirect()->route($categorias[$paginaAnterior]);
        }
        
        // Verifica o referer para tentar detectar de onde veio
        $referer = $request->headers->get('referer');
        if ($referer) {
            if (strpos($referer, 'Homepage_Smartphones') !== false) {
                return redirect()->route('categoria.smartphones');
            } elseif (strpos($referer, 'Homepage_Tablets') !== false) {
                return redirect()->route('categoria.tablets');
            } elseif (strpos($referer, 'Homepage_Fones') !== false) {
                return redirect()->route('categoria.fones');
            } elseif (strpos($referer, 'Homepage_Relógios') !== false) {
                return redirect()->route('categoria.relogios');
            } elseif (strpos($referer, 'Homepage_Notebooks') !== false) {
                return redirect()->route('categoria.notebooks');
            }
        }
        
        // Verifica se o usuário tem itens no carrinho para tentar detectar categoria
        $carrinho = session()->get('carrinho', []);
        if (!empty($carrinho)) {
            $produto_id = array_key_first($carrinho);
            $produto = \App\Models\Produto::find($produto_id);
            
            if ($produto && $produto->categoria_id) {
                $categoria = \App\Models\Categoria::find($produto->categoria_id);
                if ($categoria) {
                    $nomeCategoria = strtolower($categoria->nome);
                    // Mapeia nomes de categoria mais flexível
                    if (strpos($nomeCategoria, 'smartphone') !== false || strpos($nomeCategoria, 'celular') !== false) {
                        return redirect()->route('categoria.smartphones');
                    } elseif (strpos($nomeCategoria, 'tablet') !== false) {
                        return redirect()->route('categoria.tablets');
                    } elseif (strpos($nomeCategoria, 'fone') !== false || strpos($nomeCategoria, 'headphone') !== false) {
                        return redirect()->route('categoria.fones');
                    } elseif (strpos($nomeCategoria, 'relógio') !== false || strpos($nomeCategoria, 'watch') !== false) {
                        return redirect()->route('categoria.relogios');
                    } elseif (strpos($nomeCategoria, 'notebook') !== false || strpos($nomeCategoria, 'laptop') !== false) {
                        return redirect()->route('categoria.notebooks');
                    }
                }
            }
        }
        
        // Fallback: redireciona para homepage  
        return redirect('/');
    }

    public function finalizarCarrinho()
    {
        // Verifica se há itens no carrinho
        $carrinho = session()->get('carrinho', []);
        if (empty($carrinho)) {
            return redirect()->route('carrinho.index')->with('error', 'Seu carrinho está vazio.');
        }

        // Calcula o total
        $total = 0;
        foreach ($carrinho as $id => $item) {
            $produto = \App\Models\Produto::find($id);
            if ($produto) {
                $total += $produto->preco * $item['quantidade'];
            }
        }

        // Redireciona para a página de pagamento com o total
        return redirect('/Carrinho_Pagamento?total=' . $total);
    }
}