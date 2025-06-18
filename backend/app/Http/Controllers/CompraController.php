<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\CompraFinalizadaMail;
use App\Models\Produto;

class CompraController extends Controller
{
    public function finalizar(Request $request)
    {
        $user = Auth::user();
        $produto = Produto::find($request->produto_id);
        if (!$produto) {
            return redirect('/carrinho')->with('error', 'Produto não encontrado. Selecione um produto antes de finalizar a compra.');
        }
        $codigoRastreamento = 'BR' . rand(100000000, 999999999) . 'SEDEX';

        // Envia o e-mail
        Mail::to($user->email)->send(new CompraFinalizadaMail($produto, $codigoRastreamento));

        // Exibe diretamente a view de compra finalizada
        return view('Compra_Finalizada');
    }
}
