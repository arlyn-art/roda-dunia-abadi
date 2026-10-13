<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($title) && $title ? $title . ' | ' : '' }}{{ config('app.name') }}</title>

    {{-- icon --}}
    <link rel="icon" type="image/png" href="/img/logo-red.png">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    @include('partials.nav')

    <main class="flex-grow md:pt-0 pt-16">
        @yield('content')
    </main>

    @include('partials.footer')
    <x-floating />
</body>
</html>