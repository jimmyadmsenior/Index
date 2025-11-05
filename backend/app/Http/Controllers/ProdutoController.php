<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Http\Response;

class ProdutoController extends Controller
{
    /**
     * Exibe uma lista de todos os produtos.
     */
    public function index()
    {
        // Lista todos os produtos com a categoria relacionada
        return Produto::with('categoria')->get();
    }

    /**
     * Exibe o formulário para criar um novo produto.
     */
    public function create()
    {
        //
    }

    /**
     * Armazena um novo produto no banco de dados.
     */
    public function store(Request $requisicao)
    {
        // Validação simples
        $validado = $requisicao->validate([
            'nome' => 'required|string',
            'marca' => 'required|string',
            'categoria_id' => 'required|exists:categorias,id',
        ]);
        $produto = Produto::create($validado);
        return response()->json($produto, 201);
    }

    /**
     * Exibe um produto específico.
     */
    public function show($id)
    {
        $produto = Produto::findOrFail($id);
        return view('Produto', compact('produto'));
    }

    /**
     * Atualiza um produto específico.
     */
    public function update(Request $requisicao, string $id)
    {
        $produto = Produto::find($id);
        if (!$produto) {
            return response()->json(['mensagem' => 'Produto não encontrado'], 404);
        }
        $validado = $requisicao->validate([
            'nome' => 'sometimes|required|string',
            'marca' => 'sometimes|required|string',
            'categoria_id' => 'sometimes|required|exists:categorias,id',
        ]);
        $produto->update($validado);
        return response()->json($produto);
    }

    /**
     * Remove um produto específico.
     */
    public function destroy(string $id)
    {
        $produto = Produto::find($id);
        if (!$produto) {
            return response()->json(['mensagem' => 'Produto não encontrado'], 404);
        }
        $produto->delete();
        return response()->json(['mensagem' => 'Produto removido com sucesso']);
    }

    /**
     * Buscar produtos por nome com filtro opcional de categoria para autocomplete
     */
    public function buscar(Request $request, $categoria = null)
    {
        $termo = $request->query('q', '');
        
        if (strlen($termo) < 2) {
            return response()->json([]);
        }

        $query = Produto::with('categoria')
            ->where('nome', 'LIKE', '%' . $termo . '%')
            ->where('ativo', true);

        // Se categoria foi especificada, filtrar por ela
        if ($categoria) {
            $query->whereHas('categoria', function($q) use ($categoria) {
                $q->where('nome', 'LIKE', '%' . $categoria . '%');
            });
        }

        $produtos = $query->limit(10)->get(['id', 'nome', 'marca', 'preco', 'categoria_id']);

        return response()->json($produtos);
    }

    /**
     * Página de resultados de busca
     */
    public function buscarPagina(Request $request)
    {
        $termo = $request->input('q', '');
        $categoria = $request->input('categoria', '');
        $produtos = [];
        $mensagemErro = null;

        if ($termo) {
            $query = Produto::with('categoria')
                ->where('nome', 'LIKE', '%' . $termo . '%')
                ->where('ativo', true);

            // Se categoria foi especificada, filtrar por ela
            if ($categoria) {
                $query->whereHas('categoria', function($q) use ($categoria) {
                    $q->where('nome', 'LIKE', '%' . $categoria . '%');
                });
            }

            $produtos = $query->paginate(12);

            if ($produtos->isEmpty()) {
                $mensagemErro = "Nenhum produto encontrado para '{$termo}'";
                if ($categoria) {
                    $mensagemErro .= " na categoria {$categoria}";
                }
                $mensagemErro .= ". Tente uma busca diferente.";
            }
        }

        return view('buscar', compact('produtos', 'termo', 'categoria', 'mensagemErro'));
    }
}
