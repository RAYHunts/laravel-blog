<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- icon --}}
    <link rel="icon" href="{{ asset('img/logo/icon.png') }}">
    {{-- css --}}
    {{-- Meta Tags.io --}}
    {{--  Primary Meta Tags  --}}
    <title>{{ $title ?? config('app.name', 'Laravel') }}</title>
    <meta name="title" content="{{ $title ?? config('app.name', null) }}">
    @if(isset($description))
        <meta name="description" content="{{ $description }}">
    @endif
    <meta name="keywords" content="{{ $keywords ?? null }}">
    {{-- author --}}
    @if(isset($author))
        <meta name="author" content="{{ $author }}">
    @endif
    {{-- Open Graph / Facebook --}}
    {{-- Open Graph / Facebook --}}
    {{--  Open Graph / Facebook  --}}
    {{-- app id --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $title ?? config('app.name', null) }}">
    <meta property="og:description" content="{{ $description ?? null }}">
    <meta property="og:image" content="{{ asset('storage/'.$thumb) }}">
    {{-- Twitter --}}

    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="{{ $description ?? null }}">
    <meta property="twitter:description" content="{{ $thumb ?? 'Welcome' }}">
    <meta property="twitter:image" content="{{ asset('storage/'.$thumb) }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- font awesome cdn latest --}}
    <link href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro-v6@18657a9/css/all.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/trix.css') }}">
    <script type="text/javascript" src="{{  asset('js/trix.js') }}"></script>
</head>
    <body class="bg-slate-400 dark:bg-gradient-to-br from-gray-800 via-slate-900 to-black font-monts scroll-y-beautify">
        
        {{ $slot }}
    <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>