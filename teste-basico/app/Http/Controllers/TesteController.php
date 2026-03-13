<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function exibir(){
        $mensagem ='Isso veio do controller.';
        return view('teste',['texto'=>$mensagem]);
    }
}
