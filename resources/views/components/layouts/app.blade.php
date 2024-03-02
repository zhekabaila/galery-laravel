<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? 'Page' }} | Galery Photo by Zheka Baila Arkan</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-cream">
        <x-layouts.navbar />
        {{ $slot }}
        {{ $scripts ?? null }}
    </body>
</html>
