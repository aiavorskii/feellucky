<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Feel luck!</title>
        <link rel="stylesheet" href="/css/app.css">
        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background-color: #2d3748;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    @yield('content')
                </div>
            </div>
        </div>
        @yield('modals')
        <script src="/js/app.js"></script>
    </body>
</html>
