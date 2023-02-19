<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page_title', 'Restaurant Name')</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <style>
        [v-cloak] {
            display: none !important;
        }
    </style>
    @yield('styles')
    @stack('after_styles')
</head>

<body>
    <div id="app">
        @include('frontend.includes.header')

        @yield('content')

        @include('frontend.includes.footer')

    </div>
    <script src="{{ mix('js/app.js') }}" defer></script>
    @yield('scripts')
    @stack('after_scripts')
</body>

</html>
