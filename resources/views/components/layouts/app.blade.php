<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-50">

<head>
    <meta charset="utf-8">

    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? config('app.name')}}</title>


    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    @filamentStyles
    @vite('resources/css/app.css')


    @stack('styles')
</head>

<body class="h-full antialiased">

    {{$slot}}

    @filamentScripts
    @vite('resources/js/app.js')

    @stack('scripts')
    <!-- Include additional scripts from child views -->
</body>

</html>
