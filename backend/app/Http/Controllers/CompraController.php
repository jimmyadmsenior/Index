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
        // Pegue o produto comprado (exemplo: do request ou sessão)
        $produto = Produto::find($request->produto_id); // ajuste conforme seu fluxo
        $codigoRastreamento = 'BR' . rand(100000000, 999999999) . 'SEDEX';

        // Envia o e-mail
        Mail::to($user->email)->send(new CompraFinalizadaMail($produto, $codigoRastreamento));

        // Redireciona para a página de compra finalizada
        return redirect('/compra-finalizada');
    }
}
