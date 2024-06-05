<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('img/logo.png') }}">
    <title>SIIL PSTE</title>
</head>

<body>

    @include('layouts.header')

    @include('layouts.sidebar')

    <div class="min-h-screen p-4 sm:ml-64 bg-gray-50">
        @yield('content')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
