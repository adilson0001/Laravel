<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PessoaController;

Route::get('/', [PessoaController::class, 'index'])->name('pessoas.index');
Route::post('/importar', [PessoaController::class, 'importarCSV'])->name('pessoas.importar');
