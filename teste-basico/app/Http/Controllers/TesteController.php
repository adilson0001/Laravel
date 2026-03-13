<?php

namespace App\Http\Controllers;
use App\Models\Tarefa;
use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function exibir()
    {
        $mensagem = 'Isso veio do controller.';
        return view('teste', ['texto' => $mensagem]);
    }

    public function criarTarefa()
    {
        $tarefa = new Tarefa();
        $tarefa->titulo = "Aprender Laravel";
        $tarefa->concluida = false;
        $tarefa->save();

        return "Tarefa salva com sucesso!";
    }
}
