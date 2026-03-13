<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Página 2</title>
    @vite(['resources/css/app.css'])
</head>
<body>
    <h1>Aqui é a página 2</h1>
    <a href="{{ route('rota.pagina1') }}">
        <button>Voltar para página 1</button>
    </a>
</body>
</html>
