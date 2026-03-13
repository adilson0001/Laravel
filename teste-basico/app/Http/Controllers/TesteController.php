<?php

namespace App\Http\Controllers;
use App\Models\Tarefa;
use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function exibir()
    {
        // O Model "Tarefa" busca tudo na tabela "tarefas"
    $tarefas = Tarefa::all();

    return view('teste', [
        'minhasTarefas' => $tarefas
    ]);
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
