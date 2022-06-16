<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('titulo')</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <script type="text/javascript" src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.inputmask.min.js') }}"></script>
    </head>
    <body>
        <div class="container">
            @yield('conteudo')
        </div>
    </body>
</html>