<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Http\Response;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Lista todos os produtos com a categoria relacionada
        return Produto::with('categoria')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação simples
        $validated = $request->validate([
            'nome' => 'required|string',
            'marca' => 'required|string',
            'categoria_id' => 'required|exists:categorias,id',
        ]);
        $produto = Produto::create($validated);
        return response()->json($produto, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produto = Produto::with('categoria')->find($id);
        if (!$produto) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }
        return $produto;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $produto = Produto::find($id);
        if (!$produto) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }
        $validated = $request->validate([
            'nome' => 'sometimes|required|string',
            'marca' => 'sometimes|required|string',
            'categoria_id' => 'sometimes|required|exists:categorias,id',
        ]);
        $produto->update($validated);
        return response()->json($produto);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produto = Produto::find($id);
        if (!$produto) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }
        $produto->delete();
        return response()->json(['message' => 'Produto deletado com sucesso']);
    }
}
