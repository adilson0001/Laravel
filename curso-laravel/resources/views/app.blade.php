<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>pag 1</h1>

    @if (10 > 5)
        <p>A condição é true</p>
    @endif

    <p>{{ $nome }}</p>

    @if ($nome == 'pedro')
        <p>O nome é Pedro</p>
    @else
        <p>O nome não é Pedro é {{ $nome }}</p>
    @endif

    <p>O {{ $nome }} tem {{ $idade }} anos e gosta de {{ $hobbie }}. <br> Ele quer ser um
        {{ $prof }} no Futuro.</p>

    @for ($i = 0; $i < @count($array); $i++)
        <p>{{ $array[$i] }} - {{ $i }}</p>
        @if ($i == 2)
            <p>O indiçe é {{ $i }}. <br></p>
        @endif
    @endfor

    @foreach ($nomes as $nume)
        <p>{{ $loop->index }}</p>
        <p>Nome: {{ $nume }}</p>
    @endforeach




</body>

</html>
