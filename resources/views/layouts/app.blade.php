<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Kanban-Board') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
    </style>

    <!-- stylesheet -->
    <!-- <link rel="stylesheet" href="{{ asset('/css/app.css') }}"> -->

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="antialiased">


    @yield('index')

    <!-- Script -->
    <!-- <script type="text/javascript" src="{{ asset('/js/app.js') }}">
    </script> -->


</body>

</html>