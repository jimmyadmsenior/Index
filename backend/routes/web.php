<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CadastroController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

Route::view('/', 'Homepage_Sem_Cadastro');
Route::view('/login', 'Login')->name('login');
Route::view('/recuperacao-senha', 'Recuperacao_Senha');
Route::view('/confirmacao-adm', 'Confirmacao_ADM');
Route::view('/compra-finalizada', 'Compra_Finalizada');
Route::view('/Homepage_Com_Cadastro', 'Homepage_Com_Cadastro');
Route::view('/Carrinho_Pagamento', 'Carrinho_Pagamento');

Route::get('/cadastro', [CadastroController::class, 'showCadastro']);
Route::post('/cadastro', [CadastroController::class, 'processaCadastro']);
Route::get('/verificacao', [CadastroController::class, 'showVerificacao']);
Route::post('/verificacao', [CadastroController::class, 'verificaCodigo']);
// Adicione outras rotas conforme necessário
Route::get('/produto/{id}', [App\Http\Controllers\ProdutoController::class, 'show'])->name('produto.show');
Route::view('/Chatbot', 'Chatbot');

Route::middleware(['auth'])->group(function () {
    Route::get('/perfil', [App\Http\Controllers\PerfilController::class, 'show'])->name('perfil.show');
    Route::post('/perfil/foto', [App\Http\Controllers\PerfilController::class, 'updateFoto'])->name('perfil.updateFoto');
    Route::post('/perfil/senha', [App\Http\Controllers\PerfilController::class, 'updateSenha'])->name('perfil.updateSenha');
});

Route::post('/login', function(Request $request) {
    $credentials = $request->only('email', 'senha');
    if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['senha']])) {
        $request->session()->regenerate();
        return redirect('/Homepage_Com_Cadastro');
    }
    return back()->withErrors(['email' => 'E-mail ou senha inválidos'])->withInput();
});
