<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Aqui é onde você pode registrar rotas de API para sua aplicação. Essas
| rotas são carregadas pelo RouteServiceProvider dentro de um grupo que
| é atribuído ao middleware "api". Aproveite para construir sua API!
|
*/

Route::get('/debug-api', function () {
    return ['api' => true];
});

Route::apiResource('produtos', ProdutoController::class);
Route::apiResource('categorias', CategoriaController::class)->only(['index', 'show']);