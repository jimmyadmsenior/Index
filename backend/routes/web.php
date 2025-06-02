<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CadastroController;

Route::view('/', 'Homepage_Sem_Cadastro');
Route::view('/login', 'Login');
Route::view('/recuperacao-senha', 'Recuperacao_Senha');
Route::view('/confirmacao-adm', 'Confirmacao_ADM');
Route::view('/compra-finalizada', 'Compra_Finalizada');

Route::get('/cadastro', [CadastroController::class, 'showCadastro']);
Route::post('/cadastro', [CadastroController::class, 'processaCadastro']);
Route::get('/verificacao', [CadastroController::class, 'showVerificacao']);
Route::post('/verificacao', [CadastroController::class, 'verificaCodigo']);
// Adicione outras rotas conforme necessário
