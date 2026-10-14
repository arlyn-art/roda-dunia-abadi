<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Dynamic Meta Description -->
    <meta name="description" content="{{ $meta['meta_description'] ?? '' }}">

    <!-- Dynamic Meta Keywords / Tags (jika meta_tag berupa array/string) -->
    @if(!empty($meta['meta_tag']) && is_array($meta['meta_tag']))
        <meta name="keywords" content="{{ implode(',', $meta['meta_tag']) }}">
    @endif

    <!-- Dynamic Title -->
    <title>
        @isset($meta['meta_title'])
            {{ $meta['meta_title'] }} | {{ config('app.name') }}
        @else
            {{ isset($title) && $title ? $title . ' | ' : '' }}{{ config('app.name') }}
        @endisset
    </title>

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