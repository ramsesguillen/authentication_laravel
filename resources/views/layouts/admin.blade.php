<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Curso Labsol')</title>
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('css/footer') }}"> --}}
    <script type = "text/javascript"
         src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>

    <header>
        @include('layouts.templates.navbar')
    </header>


    <main>
        @yield('contenido')
    </main>

    @include('layouts.templates.footer')

    @include('notifications.notification')
    <!-- Compiled and minified JavaScript -->

</body>
</html>
