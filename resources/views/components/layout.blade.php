<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>English Courses</title>
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body>
        <div id="app">
            <div id="navigation">
                @include('partials._navigation')
            </div>
            <div id="router-view">
                {{$slot}}
            </div>
            <div id="footer">
                @include('partials._footer')
            </div>
        </div>
    </body>
</html>
