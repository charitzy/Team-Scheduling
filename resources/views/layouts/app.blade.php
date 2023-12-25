<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MovieZone</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha384-oO2DSU8qrLIZ3kRMZBA9YHy8M21OeAfG+J3Cj4l4a21nFO9aaEQ0zU4n9pz/uWc4" crossorigin="anonymous">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<!-- <body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light" style="background-color: black; height:80px">
            <div class="container">
                <a class="navbar-brand text-light" href="{{ url('/') }}">
                    <img src="/images/sample.png" alt="">
                    <strong>Team Scheduling System</strong>
                </a>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

</body> -->

</html>