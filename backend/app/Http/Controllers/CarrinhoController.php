<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Facades\Session;

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
        $produto_id = $request->input('produto_id');
        $quantidade = $request->input('quantidade', 1);

        $produto = Produto::find($produto_id);
        if (!$produto) {
            return redirect()->back()->with('error', 'Produto não encontrado.');
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
}