<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Auth;
use App\Models\Administrador;
use Illuminate\Support\Facades\Hash;

echo "=== TESTE DE LOGIN ADMIN ===\n\n";

// Verificar se o admin existe
$admin = Administrador::where('email', 'admin@sistema.com')->first();
if (!$admin) {
    echo "❌ Admin não encontrado!\n";
    exit(1);
}

echo "✅ Admin encontrado: {$admin->email}\n";
echo "ID: {$admin->id}\n";
echo "Nome: {$admin->nome}\n\n";

// Verificar senha
if (Hash::check('admin123456', $admin->password)) {
    echo "✅ Senha está correta\n\n";
} else {
    echo "❌ Senha incorreta\n\n";
}

// Tentar login com Auth::guard
echo "🔄 Tentando login com Auth::guard('admin')->attempt...\n";
$credentials = [
    'email' => 'admin@sistema.com',
    'password' => 'admin123456'
];

if (Auth::guard('admin')->attempt($credentials)) {
    echo "✅ AUTH ATTEMPT FUNCIONOU!\n";
    
    // Verificar se está logado
    if (Auth::guard('admin')->check()) {
        echo "✅ Usuário está logado com o guard admin\n";
        $user = Auth::guard('admin')->user();
        echo "Usuário logado: {$user->email} (ID: {$user->id})\n";
    } else {
        echo "❌ Usuário NÃO está logado após attempt\n";
    }
} else {
    echo "❌ AUTH ATTEMPT FALHOU\n";
}

echo "\n=== FIM DO TESTE ===\n";