<?php
require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Produto;

echo "=== PRODUTOS MACBOOK ===\n\n";

$macbookPro16 = Produto::where('nome', 'like', '%MacBook Pro 16%')->first();
$macbookAir15 = Produto::where('nome', 'like', '%MacBook Air 15%')->first();

if($macbookPro16) {
    echo "MacBook Pro 16 encontrado:\n";
    echo "ID: {$macbookPro16->id}\n";
    echo "Nome: {$macbookPro16->nome}\n";
    echo "Imagem atual: {$macbookPro16->imagem}\n\n";
} else {
    echo "❌ MacBook Pro 16 não encontrado\n\n";
}

if($macbookAir15) {
    echo "MacBook Air 15 encontrado:\n";
    echo "ID: {$macbookAir15->id}\n";
    echo "Nome: {$macbookAir15->nome}\n";
    echo "Imagem atual: {$macbookAir15->imagem}\n\n";
} else {
    echo "❌ MacBook Air 15 não encontrado\n\n";
}

echo "=== ATUALIZANDO IMAGENS ===\n";

if($macbookPro16) {
    $macbookPro16->imagem = '/media/Macbook Pro 16.png';
    $macbookPro16->save();
    echo "✅ MacBook Pro 16 - imagem atualizada para: /media/Macbook Pro 16.png\n";
}

if($macbookAir15) {
    $macbookAir15->imagem = '/media/Macbook Air 15 M3.png';
    $macbookAir15->save();
    echo "✅ MacBook Air 15 - imagem atualizada para: /media/Macbook Air 15 M3.png\n";
}