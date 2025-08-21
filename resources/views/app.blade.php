<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale() ?? 'ar') }}" dir="{{ (app()->getLocale() ?? 'ar') === 'ar' ? 'rtl' : 'ltr' }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Bookly') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @if(file_exists(public_path('build/manifest.json')))
            @vite(['src/assets/main.css', 'src/main.ts'])
        @else
            <!-- Development mode - load assets directly -->
            <link rel="stylesheet" href="{{ asset('src/assets/main.css') }}" />
            <script type="module" src="{{ asset('src/main.ts') }}"></script>
        @endif
    </head>
    <body class="font-sans antialiased">
        <div id="app"></div>
    </body>
</html>
