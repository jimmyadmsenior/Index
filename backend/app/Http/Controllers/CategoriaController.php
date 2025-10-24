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

    // Métodos para páginas de categoria específicas
    public function fones()
    {
        $categoria = Categoria::where('nome', 'Fones de Ouvido')->first();
        $produtos = $categoria ? $categoria->produtos()->get() : collect();
        return view('HomePage_Fones', compact('produtos', 'categoria'));
    }

    public function smartphones()
    {
        $categoria = Categoria::where('nome', 'Smartphones')->first();
        $produtos = $categoria ? $categoria->produtos()->get() : collect();
        return view('Homepage_Smartphones', compact('produtos', 'categoria'));
    }

    public function tablets()
    {
        $categoria = Categoria::where('nome', 'Tablets')->first();
        $produtos = $categoria ? $categoria->produtos()->get() : collect();
        return view('Homepage_Tablets', compact('produtos', 'categoria'));
    }

    public function relogios()
    {
        $categoria = Categoria::where('nome', 'Relógios')->first();
        $produtos = $categoria ? $categoria->produtos()->get() : collect();
        return view('Homepage_Relógios', compact('produtos', 'categoria'));
    }

    public function notebooks()
    {
        $categoria = Categoria::where('nome', 'Notebooks')->first();
        $produtos = $categoria ? $categoria->produtos()->get() : collect();
        return view('Homepage_Notebooks', compact('produtos', 'categoria'));
    }
}
