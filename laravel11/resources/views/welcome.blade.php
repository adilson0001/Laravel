<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Celke</title>




    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">

        <h1>Bem-vindo</h1>
        <p>Data Atual: {{ \Carbon\Carbon::now()->format('d/m/Y H:i:s') }}</p>
    </body>
</html>
