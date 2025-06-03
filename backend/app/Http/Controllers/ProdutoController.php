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
}
