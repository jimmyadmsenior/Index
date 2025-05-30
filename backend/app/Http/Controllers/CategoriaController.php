<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    // Lista todas as categorias
    public function index()
    {
        return Categoria::all();
    }

    // Lista todos os produtos de uma categoria
    public function show($id)
    {
        $categoria = Categoria::with('produtos')->find($id);
        if (!$categoria) {
            return response()->json(['mensagem' => 'Categoria não encontrada'], 404);
        }
        return $categoria;
    }
}
