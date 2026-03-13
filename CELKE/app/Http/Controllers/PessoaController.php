<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;
use League\Csv\Reader;

class PessoaController extends Controller
{
    public function index()
    {
        $pessoas = Pessoa::all();
        return view('pessoas.index', compact('pessoas'));
    }

    public function importarCSV(Request $request)
{
    // 1. VALIDAÇÃO
    $request->validate([
        'file' => 'required|file|mimes:csv,txt|max:2048'
    ], [
        'file.required' => 'O campo arquivo é obrigatório.',
        'file.mimes' => 'Arquivo inválido. Envie apenas CSV.',
        'file.max' => 'Arquivo muito grande. Máximo 2MB.'
    ]);

    try {
        // 2. LER ARQUIVO CSV
        $file = $request->file('file');
        $csv = Reader::createFromPath($file->getPathname(), 'r');
        $csv->setHeaderOffset(0); // Primeira linha = cabeçalho

        $registrosImportados = 0;

        // 3. PROCESSAR CADA LINHA
        foreach ($csv->getRecords() as $record) {
            // Evitar duplicatas por email
            $pessoa = Pessoa::updateOrCreate(
                ['email' => $record['email']],
                [
                    'nome' => $record['nome'],
                ]
            );

            if ($pessoa->wasRecentlyCreated) {
                $registrosImportados++;
            }
        }

        return redirect()->back()
            ->with('success', "CSV importado! {$registrosImportados} registros adicionados.");

    } catch (\Exception $e) {
        return redirect()->back()
            ->with('error', 'Erro ao importar CSV: ' . $e->getMessage());
    }
}

}
