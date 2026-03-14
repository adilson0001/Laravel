<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

Route::get('/', function () {
    $variavel1 = 'Gilberto';
    $var2 = 13;
    $gosto = "jogar video game";

    $arr = [10, 20, 30, 40, 50];

    $nomes = ['joão', 'maria', 'chavinho'];

    return view('app', ['nome' => $variavel1, 'idade' => $var2, 'hobbie' => $gosto, 'prof' => "programador", 'array' => $arr, 'nomes'=>$nomes]);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'dashboard')->name('dashboard');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/produtos', function () {
    return view('products');
});

require __DIR__ . '/settings.php';
