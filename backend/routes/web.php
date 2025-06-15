<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\CompraController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

Route::view('/', 'Homepage_Sem_Cadastro');
Route::view('/login', 'Login')->name('login');
Route::view('/recuperacao-senha', 'Recuperacao_Senha');
Route::view('/confirmacao-adm', 'Confirmacao_ADM');
Route::view('/compra-finalizada', 'Compra_Finalizada');
Route::view('/Homepage_Com_Cadastro', 'Homepage_Com_Cadastro');
Route::view('/Carrinho_Pagamento', 'Carrinho_Pagamento');
Route::view('/Homepage_Fones', 'Homepage_Fones');
Route::view('/Homepage_Smartphones', 'Homepage_Smartphones');
Route::view('/Homepage_Tablets', 'Homepage_Tablets');
Route::view('/Homepage_Relogios', 'Relógios');
Route::view('/Homepage_Notebooks', 'Notebooks');

Route::get('/cadastro', [CadastroController::class, 'showCadastro']);
Route::post('/cadastro', [CadastroController::class, 'processaCadastro']);
Route::get('/verificacao', [CadastroController::class, 'showVerificacao']);
Route::post('/verificacao', [CadastroController::class, 'verificaCodigo']);
// Adicione outras rotas conforme necessário
Route::get('/produto/{id}', [App\Http\Controllers\ProdutoController::class, 'show'])->name('produto.show');
Route::view('/Chatbot', 'Chatbot');

// Rotas protegidas: carrinho e pagamento
Route::middleware(['auth'])->group(function () {
    Route::view('/Carrinho_Pagamento', 'Carrinho_Pagamento');
    Route::view('/Carrinho_Pix', 'Carrinho_Pix');
    Route::view('/carrinho-vazio', 'Carrinho_Vazio');
    Route::get('/pagamento-debito', function () {
        return view('Pagamento_Debito');
    });
    Route::get('/perfil', [App\Http\Controllers\PerfilController::class, 'show'])->name('perfil.show');
    Route::post('/perfil/foto', [App\Http\Controllers\PerfilController::class, 'updateFoto'])->name('perfil.updateFoto');
    Route::post('/perfil/senha', [App\Http\Controllers\PerfilController::class, 'updateSenha'])->name('perfil.updateSenha');
    Route::post('/finalizar-compra', [CompraController::class, 'finalizar'])->name('compra.finalizar');
});

Route::post('/login', function(Request $request) {
    $credentials = [
        'email' => $request->input('email'),
        'password' => $request->input('senha'),
    ];
    $remember = $request->has('lembrar');
    // O Auth::attempt já faz o hash da senha automaticamente
    if (Auth::attempt($credentials, $remember)) {
        $request->session()->regenerate();
        return redirect('/Homepage_Com_Cadastro');
    }
    return back()->withErrors(['email' => 'E-mail ou senha inválidos'])->withInput();
});

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');

Route::view('/confirmacao-cadastro', 'Confirmacao_Cadastro');
Route::view('/compra-finalizada', 'Compra_Finalizada');
Route::view('/Homepage_Com_Cadastro', 'Homepage_Com_Cadastro');
Route::view('/Homepage_Fones', 'Homepage_Fones');
Route::view('/recuperacao-senha', 'Recuperacao_Senha');
Route::view('/confirmacao-adm', 'Confirmacao_ADM');
Route::view('/Chatbot', 'Chatbot');
Route::view('/sobre-nos', 'Sobre_Nós');
Route::view('/confirmacao-adm2', 'Confirmacao_ADM2');
Route::view('/recuperacao-senha2', 'Recuperacao_Senha2');
Route::view('/Recuperacao_Senha_1', 'Recuperacao_Senha_1');
Route::post('/recuperacao-senha-email', function() {
    // Aqui você pode implementar o envio do e-mail de recuperação ou apenas simular para teste
    return back()->with('status', 'Se o e-mail existir, você receberá instruções para redefinir sua senha.');
});
