<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\testeMVC;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/teste',[TesteController::class,'exibir'])->name('exibir');

Route::get('/pagina1', [testeMVC::class,'pagina1'] )->name('rota.pagina1');

Route::get('/pagina2', [testeMVC::class,'pagina2'] )->name('rota.pagina2');



Route::get('/teste', function () {
    return response()->json([
        'mensagem' => 'Conexão com o backend funcionando!',
        'status' => 'sucesso'
    ]);
});
