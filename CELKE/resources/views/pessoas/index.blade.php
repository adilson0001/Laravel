<!DOCTYPE html>
<html>
<head>
    <title>Importar CSV - CELKE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { font-family: Arial, sans-serif; max-width: 900px; margin: 0 auto; padding: 20px; }
        .form-group { margin: 20px 0; }
        input[type="file"] { padding: 10px; width: 100%; max-width: 400px; }
        button { background: #007bff; color: white; padding: 12px 24px; border: none; cursor: pointer; }
        button:hover { background: #0056b3; }
        table { width: 100%; border-collapse: collapse; margin-top: 30px; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #f2f2f2; }
        .alert { padding: 15px; margin: 20px 0; border-radius: 5px; }
        .alert-success { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .alert-error { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
    </style>
</head>
<body>
    <h1>📁 Importar Pessoas (CSV)</h1>

    {{-- MENSAGENS --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-error">{{ session('error') }}</div>
    @endif
    @if($errors->any())
        <div class="alert alert-error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- FORMULÁRIO --}}
    <div class="form-group">
        <form action="{{ route('pessoas.importar') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label><strong>📄 Selecione o arquivo CSV:</strong></label><br><br>
            <input type="file" name="file" accept=".csv" required>
            
            <br><br>
            <button type="submit">🚀 Importar CSV</button>
        </form>
    </div>

    <hr style="margin: 40px 0;">

    {{-- TABELA --}}
    <h2>👥 Pessoas Cadastradas ({{ $pessoas->count() }})</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Criado em</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pessoas as $pessoa)
                <tr>
                    <td>{{ $pessoa->id }}</td>
                    <td>{{ $pessoa->nome }}</td>
                    <td>{{ $pessoa->email }}</td>
                    <td>{{ $pessoa->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align: center; color: #666;">
                        📭 Nenhuma pessoa cadastrada. Importe um CSV!
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
