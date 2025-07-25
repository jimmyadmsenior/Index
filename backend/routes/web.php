<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\CompraController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\RecuperacaoSenhaMail;

Route::view('/', 'Homepage_Sem_Cadastro');
Route::view('/login', 'Login')->name('login');
Route::view('/recuperacao-senha', 'Recuperacao_Senha');
Route::view('/confirmacao-adm', 'Confirmacao_ADM');
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
Route::view('/compra-finalizada', 'Compra_Finalizada')->name('compra.finalizada');
Route::view('/Homepage_Com_Cadastro', 'Homepage_Com_Cadastro');
Route::view('/Homepage_Fones', 'Homepage_Fones');
Route::view('/recuperacao-senha', 'Recuperacao_Senha');
Route::view('/confirmacao-adm', 'Confirmacao_ADM');
Route::view('/Chatbot', 'Chatbot');
Route::view('/sobre-nos', 'Sobre_Nós');
Route::view('/confirmacao-adm2', 'Confirmacao_ADM2');
Route::view('/recuperacao-senha2', 'Recuperacao_Senha2');
Route::view('/Recuperacao_Senha_1', 'Recuperacao_Senha_1');
Route::view('/Recuperacao_Senha_2', 'Recuperacao_Senha_2');
Route::post('/recuperacao-senha-email', function(Request $request) {
    $request->validate([
        'email' => 'required|email',
    ]);

    // Gera um código de recuperação aleatório (ex: 6 dígitos ou XXX-XXX)
    $codigo = strtoupper(substr(bin2hex(random_bytes(3)), 0, 3)) . '-' . strtoupper(substr(bin2hex(random_bytes(3)), 0, 3));

    // Envia o e-mail
    Mail::to($request->email)->send(new RecuperacaoSenhaMail($codigo));

    // Salva o código na sessão para validação posterior (ou no banco, se preferir)
    session(['codigo_recuperacao' => $codigo, 'email_recuperacao' => $request->email]);

    // Redireciona para a página de digitação do código
    return redirect('/Recuperacao_Senha_2');
});
Route::post('/recuperacao-senha-codigo', function(Request $request) {
    $request->validate([
        'codigo' => 'required',
    ]);
    $codigoSalvo = session('codigo_recuperacao');
    if ($request->codigo !== $codigoSalvo) {
        // Gera um código de erro aleatório para exibir ao usuário
        $codigoErro = strtoupper(substr(bin2hex(random_bytes(3)), 0, 6));
        return back()->withErrors(['codigo' => 'Código inválido! (Erro: ' . $codigoErro . ')'])->withInput();
    }
    return redirect('/Recuperacao_Senha_3');
});
Route::view('/Recuperacao_Senha_3', 'Recuperacao_Senha_3');
Route::post('/recuperacao-senha-nova', function(Request $request) {
    $request->validate([
        'nova_senha' => 'required|min:6',
        'confirma_senha' => 'required|same:nova_senha',
    ]);
    // Aqui você pode implementar a lógica para atualizar a senha do usuário no banco de dados
    // usando session('email_recuperacao') para identificar o usuário
    // Exemplo:
    // $user = \App\Models\User::where('email', session('email_recuperacao'))->first();
    // if ($user) {
    //     $user->password = Hash::make($request->nova_senha);
    //     $user->save();
    // }
    // Limpa a sessão de recuperação
    session()->forget(['codigo_recuperacao', 'email_recuperacao']);
    // Redireciona para a página de login
    return redirect('/login')->with('status', 'Senha redefinida com sucesso! Faça login com sua nova senha.');
});
Route::view('/carrinho', 'Carrinho');
