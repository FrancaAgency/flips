<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="format-detection" content="telephone=no">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">
    <meta name='author' href="https://github.com/juliansfreelance" email="juliansfreelance@gmail.com" content='Julio Cesar Calderón Garcia - Desarrollador y Diseñador Web'>
    <meta name="description" content="Compañía de Construcciones Andes Coandes S.A. es una Empresa orgullosamente colombiana que inició operaciones en la construcción hace más de 40 años.">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" href="{{ asset('img/coandes_icono.png') }}" />
    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @livewireStyles

    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="antialiased h-full w-full bg-gray-100">
    <div class="flex flex-col min-h-screen">
        <header>
        </header>
        <main class="flex-grow">
            @yield('content')
        </main>

        <footer></footer>
    </div>
    @stack('modals')
    @livewireScripts
</body>

</html>