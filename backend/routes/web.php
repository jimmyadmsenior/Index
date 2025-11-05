<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\CarrinhoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\RecuperacaoSenhaMail;

Route::get('/', function () {
    return Auth::check() 
        ? view('Homepage_Com_Cadastro') 
        : view('Homepage_Sem_Cadastro');
});
Route::view('/login', 'Login')->name('login');
// Rota de compatibilidade para evitar erros
Route::get('/user-login', function() {
    return redirect()->route('login');
})->name('user.login');
Route::view('/recuperacao-senha', 'Recuperacao_Senha');
Route::view('/confirmacao-adm', 'Confirmacao_ADM');
Route::view('/Homepage_Com_Cadastro', 'Homepage_Com_Cadastro');
Route::get('/Homepage_Fones', [App\Http\Controllers\CategoriaController::class, 'fones'])->name('categoria.fones');
Route::get('/Homepage_Smartphones', [App\Http\Controllers\CategoriaController::class, 'smartphones'])->name('categoria.smartphones');
Route::get('/Homepage_Tablets', [App\Http\Controllers\CategoriaController::class, 'tablets'])->name('categoria.tablets');
Route::get('/Homepage_Relógios', [App\Http\Controllers\CategoriaController::class, 'relogios'])->name('categoria.relogios');
Route::get('/Homepage_Notebooks', [App\Http\Controllers\CategoriaController::class, 'notebooks'])->name('categoria.notebooks');

// Rota para iPhone 17 Pro
Route::get('/iphone17pro', function() {
    return view('iphone17pro-simple');
})->name('iphone17pro');

// Rotas de busca
Route::get('/buscar', [App\Http\Controllers\ProdutoController::class, 'buscarPagina'])->name('buscar');
Route::post('/buscar', [App\Http\Controllers\ProdutoController::class, 'buscarPagina'])->name('buscar.post');

Route::get('/cadastro', [CadastroController::class, 'showCadastro']);
Route::post('/cadastro', [CadastroController::class, 'processaCadastro']);
Route::get('/verificacao', [CadastroController::class, 'showVerificacao']);
Route::post('/verificacao', [CadastroController::class, 'verificaCodigo']);
Route::view('/confirmacao-cadastro', 'Confirmacao_Cadastro');
// Adicione outras rotas conforme necessário
Route::get('/produto/{id}', [App\Http\Controllers\ProdutoController::class, 'show'])->name('produto.show');
Route::view('/Chatbot', 'Chatbot');

// Rota do carrinho (acessível a todos)
Route::get('/Carrinho_Pagamento', function (Request $request) {
    $produto_id = $request->query('produto_id');
    $total = $request->query('total');
    
    // Se veio de um produto específico
    if ($produto_id) {
        $produto = \App\Models\Produto::find($produto_id);
        if (!$produto) {
            return redirect('/')->with('error', 'Produto não encontrado.');
        }
        return view('Carrinho_Pagamento', compact('produto'));
    }
    
    // Se veio do carrinho com total
    if ($total) {
        $carrinho = session()->get('carrinho', []);
        if (empty($carrinho)) {
            return redirect()->route('carrinho.index')->with('error', 'Seu carrinho está vazio.');
        }
        
        // Pega o primeiro produto do carrinho para compatibilidade com a view
        $primeiro_produto_id = array_key_first($carrinho);
        $produto = \App\Models\Produto::find($primeiro_produto_id);
        
        if (!$produto) {
            return redirect()->route('carrinho.index')->with('error', 'Produto não encontrado.');
        }
        
        return view('Carrinho_Pagamento', compact('produto', 'total', 'carrinho'));
    }
    
    // Fallback
    return redirect('/')->with('error', 'Selecione um produto antes de finalizar a compra.');
});

// Rotas protegidas: pagamentos e perfil
Route::middleware(['auth'])->group(function () {
    Route::get('/Pagamento_Credito', function (Request $request) {
        $produto_id = $request->query('produto_id') ?? session('produto_id');
        $total = $request->query('total');
        
        // Se veio do carrinho com total
        if ($total) {
            $carrinho = session()->get('carrinho', []);
            if (empty($carrinho)) {
                return redirect()->route('carrinho.index')->with('error', 'Seu carrinho está vazio.');
            }
            
            // Calcula o total real do carrinho
            $totalCalculado = 0;
            $produtos = [];
            foreach ($carrinho as $id => $item) {
                $produto = \App\Models\Produto::find($id);
                if ($produto) {
                    $totalCalculado += $produto->preco * $item['quantidade'];
                    $produtos[] = [
                        'produto' => $produto,
                        'quantidade' => $item['quantidade'],
                        'subtotal' => $produto->preco * $item['quantidade']
                    ];
                }
            }
            
            return view('Pagamento_Credito', ['total' => $totalCalculado, 'carrinho' => $carrinho, 'produtos' => $produtos]);
        }
        
        // Se veio de produto individual
        if ($produto_id) {
            $produto = \App\Models\Produto::find($produto_id);
            if (!$produto) {
                return redirect('/carrinho-vazio')->with('error', 'Produto não encontrado.');
            }
            session(['produto_id' => $produto_id]);
            return view('Pagamento_Credito', compact('produto'));
        }
        
        // Fallback
        return redirect('/carrinho-vazio')->with('error', 'Selecione um produto antes de finalizar a compra.');
    });
    Route::get('/Carrinho_Pix', function (Request $request) {
        $produto_id = $request->query('produto_id') ?? session('produto_id');
        $total = $request->query('total');
        
        // Se veio do carrinho com total
        if ($total) {
            $carrinho = session()->get('carrinho', []);
            if (empty($carrinho)) {
                return redirect()->route('carrinho.index')->with('error', 'Seu carrinho está vazio.');
            }
            
            // Calcula o total real do carrinho para validação
            $totalCalculado = 0;
            foreach ($carrinho as $id => $item) {
                $produto = \App\Models\Produto::find($id);
                if ($produto) {
                    $totalCalculado += $produto->preco * $item['quantidade'];
                }
            }
            
            return view('Carrinho_Pix', ['total' => $totalCalculado, 'carrinho' => $carrinho]);
        }
        
        // Se veio de produto individual
        if ($produto_id) {
            session(['produto_id' => $produto_id]);
            return view('Carrinho_Pix', ['produto_id' => $produto_id]);
        }
        
        // Fallback
        return redirect('/carrinho-vazio')->with('error', 'Selecione um produto antes de finalizar a compra.');
    });
    Route::get('/carrinho-vazio', function() {
        return redirect()->route('carrinho.index')->with('error', 'Seu carrinho está vazio.');
    });
    
    // Rota para Cartão de Débito
    Route::get('/Pagamento_Debito', function (\Illuminate\Http\Request $request) {
        $produto_id = $request->query('produto_id') ?? session('produto_id');
        $total = $request->query('total');
        
        // Se veio do carrinho com total
        if ($total) {
            $carrinho = session()->get('carrinho', []);
            if (empty($carrinho)) {
                return redirect()->route('carrinho.index')->with('error', 'Seu carrinho está vazio.');
            }
            
            // Calcula o total real do carrinho
            $totalCalculado = 0;
            $produtos = [];
            foreach ($carrinho as $id => $item) {
                $produto = \App\Models\Produto::find($id);
                if ($produto) {
                    $totalCalculado += $produto->preco * $item['quantidade'];
                    $produtos[] = [
                        'produto' => $produto,
                        'quantidade' => $item['quantidade'],
                        'subtotal' => $produto->preco * $item['quantidade']
                    ];
                }
            }
            
            return view('Pagamento_Debito', ['total' => $totalCalculado, 'carrinho' => $carrinho, 'produtos' => $produtos]);
        }
        
        // Se veio de produto individual
        if ($produto_id) {
            $produto = \App\Models\Produto::find($produto_id);
            if (!$produto) {
                return redirect('/carrinho-vazio')->with('error', 'Produto não encontrado.');
            }
            session(['produto_id' => $produto_id]);
            return view('Pagamento_Debito', compact('produto'));
        }
        
        // Fallback
        return redirect('/carrinho-vazio')->with('error', 'Selecione um produto antes de finalizar a compra.');
    });
    Route::get('/perfil', [App\Http\Controllers\PerfilController::class, 'show'])->name('perfil.show');
    Route::post('/perfil/foto', [App\Http\Controllers\PerfilController::class, 'updateFoto'])->name('perfil.updateFoto');
    Route::post('/perfil/senha', [App\Http\Controllers\PerfilController::class, 'updateSenha'])->name('perfil.updateSenha');
    Route::post('/perfil/telefone', [App\Http\Controllers\PerfilController::class, 'updateTelefone'])->name('perfil.updateTelefone');
    Route::get('/perfil/pedidos', [App\Http\Controllers\PerfilController::class, 'pedidos'])->name('perfil.pedidos');
    Route::get('/rastrear/{codigo}', [App\Http\Controllers\PerfilController::class, 'rastrearPedido'])->name('pedido.rastrear');
    Route::post('/finalizar-compra', [CompraController::class, 'finalizar'])->name('compra.finalizar');
    Route::get('/compra-finalizada/{codigo}', function($codigo) {
        return view('Compra_Finalizada', ['codigo' => $codigo]);
    })->name('compra.finalizada');
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
        return redirect('/');
    }
    return back()->withErrors(['email' => 'E-mail ou senha inválidos'])->withInput();
})->middleware('throttle:5,1');

Route::post('/logout', function(Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');

Route::view('/Chatbot', 'Chatbot');
Route::view('/Sobre_Nós', 'Sobre_Nós');
Route::view('/Download_App', 'Download_App');
Route::view('/Suporte', 'Suporte');
Route::view('/Politica_Privacidade', 'Politica_Privacidade');
Route::view('/Termos_Condicoes', 'Termos_Condicoes');
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
// Rotas do carrinho
Route::get('/carrinho', [CarrinhoController::class, 'index'])->name('carrinho.index');
Route::post('/carrinho/adicionar', [CarrinhoController::class, 'adicionar'])->name('carrinho.adicionar');
Route::delete('/carrinho/remover/{produto_id}', [CarrinhoController::class, 'remover'])->name('carrinho.remover');
Route::put('/carrinho/atualizar/{produto_id}', [CarrinhoController::class, 'atualizar'])->name('carrinho.atualizar');
Route::post('/carrinho/limpar', [CarrinhoController::class, 'limpar'])->name('carrinho.limpar');
Route::get('/continuar-comprando', [CarrinhoController::class, 'continuarComprando'])->name('carrinho.continuar');
Route::get('/finalizar-carrinho', [CarrinhoController::class, 'finalizarCarrinho'])->name('carrinho.finalizar');

// Rotas de autenticação administrativa
Route::prefix('admin')->name('admin.')->group(function () {
    // Rotas de configuração inicial (quando não há administradores)
    Route::get('/setup', [App\Http\Controllers\AdminAuthController::class, 'showSetupForm'])->name('setup');
    Route::post('/setup', [App\Http\Controllers\AdminAuthController::class, 'setup']);
    
    // Rotas de login/logout
    Route::get('/login', [App\Http\Controllers\AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [App\Http\Controllers\AdminAuthController::class, 'login']);
    Route::post('/logout', [App\Http\Controllers\AdminAuthController::class, 'logout'])->name('logout');
    
    // Rota de teste sem autenticação
    Route::get('/teste', function() {
        return 'Admin área funcionando!';
    })->name('teste');
    
    // Rota de teste com autenticação
    Route::get('/teste-auth', function() {
        if (Auth::guard('admin')->check()) {
            $admin = Auth::guard('admin')->user();
            return 'Admin logado: ' . $admin->email . ' (ID: ' . $admin->id . ')';
        } else {
            return 'Nenhum admin logado';
        }
    })->name('teste-auth');
    
    // Rotas protegidas do painel administrativo
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/pedidos', [App\Http\Controllers\AdminController::class, 'pedidos'])->name('pedidos');
        Route::patch('/pedidos/{id}/status', [App\Http\Controllers\AdminController::class, 'atualizarStatusPedido'])->name('pedidos.status');
        Route::get('/usuarios', [App\Http\Controllers\AdminController::class, 'usuarios'])->name('usuarios');
        Route::get('/produtos', [App\Http\Controllers\AdminController::class, 'produtos'])->name('produtos');
        Route::get('/logs', [App\Http\Controllers\AdminController::class, 'logs'])->name('logs');
    });
});

Route::get('/health', function () {
    return response()->json(['status' => 'ok']);
});