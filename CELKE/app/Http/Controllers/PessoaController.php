<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;
use League\Csv\Reader;
use League\Csv\Statement;

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
            
            // Tenta detectar se o separador é vírgula ou ponto e vírgula
            $control = $csv->fetchOne(0);
            if (str_contains($control[0], ';')) {
                $csv->setDelimiter(';');
            } else {
                $csv->setDelimiter(',');
            }

            $csv->setHeaderOffset(0); // Primeira linha = cabeçalho

            $registrosImportados = 0;

            // 3. PROCESSAR CADA LINHA
            foreach ($csv->getRecords() as $record) {
                // Limpeza básica para remover espaços em branco
                $email = trim($record['email'] ?? '');
                $nome = trim($record['nome'] ?? '');

                if (!empty($email) && !empty($nome)) {
                    // Evitar duplicatas por email
                    $pessoa = Pessoa::updateOrCreate(
                        ['email' => $email],
                        ['nome' => $nome]
                    );

                    if ($pessoa->wasRecentlyCreated) {
                        $registrosImportados++;
                    }
                }
            }

            return redirect()->back()
                ->with('success', "CSV importado! {$registrosImportados} novos registros adicionados.");

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Erro ao importar CSV: ' . $e->getMessage());
        }
    }
}