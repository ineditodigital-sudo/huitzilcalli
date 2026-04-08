<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="https://huitzilcalli.com/resources/img/favicon.ico">

    {!! SEO::generate() !!}

    <!-- Scripts -->
    
    
    <link rel="apple-touch-icon" sizes="128x128" href="https://huitzilcalli.com/resources/img/logo-lg.webp">
    <link rel="icon" sizes="192x192" href="https://huitzilcalli.com/resources/img/logo-lg.webp">
    
    <script src="{{ __('/resources/js/calendar-js/index.global.min.js') }}"></script>
    <script src="{{ __('/resources/js/calendar-js/es.global.min.js') }}"></script>
    <script src="{{ __('/resources/js/jquery/jquery.js') }}"></script>
    <script src="{{ __('/public/build/assets/app-d4b42df8.js') }}"></script>
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>-->
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ __('/public/build/assets/app-304379a8.css') }}?v={{ rand() }}">
    <link rel="stylesheet" href="{{ __('/resources/css/photoswipe.css') }}">
    <link rel="stylesheet" href="{{ __('/resources/css/custom.css') }}?v={{ rand() }}">
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body>
    <div id="app">
        @include('frontend.inc.nav')

        <main class="">
            @yield('content')
        </main>

        @include('frontend.inc.footer')
    </div>

    @yield('modal')

    @yield('script')
</body>
</html>