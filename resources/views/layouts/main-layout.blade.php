<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Meta Tags.io --}}
    {{--  Primary Meta Tags  --}}
    <title>{{ $title ?? 'Welcome' }}</title>
    <meta name="title" content="{{ $title ?? 'Welcome' }}">
    <meta name="description" content="{{ $title ?? 'Welcome' }}">
    {{--  Open Graph / Facebook  --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('') }}">
    <meta property="og:title" content="{{ $title ?? 'Welcome' }}">
    <meta property="og:description" content="{{ $title ?? 'Welcome' }}">
    <meta property="og:image" content="{{ $image ?? 'https://via.placeholder.com/640x480.png/001155?text=' }}">
    {{-- Twitter --}}
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url('') }}">
    <meta property="twitter:title" content="{{ $title ?? 'Welcome' }}">
    <meta property="twitter:description" content="{{ $title ?? 'Welcome' }}">
    <meta property="twitter:image" content="{{ $image ?? 'https://via.placeholder.com/640x480.png/001155?text=' }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- font awesome cdn latest --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
</head>
    <body class="bg-slate-400 dark:bg-gradient-to-br from-gray-800 via-slate-900 to-black font-sans">

        {{ $slot }}
    <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>