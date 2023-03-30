<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $table->restaurant->name }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">


    <!-- Scripts -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body>
    <div class="container py-3">
        <div class="row">
            <div class="col-md-12 py-2 text-center">
                <h1 style="font-family: 'Roboto', sans-serif;">{{ $table->restaurant->name }}</h1>
            </div>
            <div class="col-md-12 text-center py-2">
                <h4 class="text-secondary">SCAN QR CODE FOR</h4>
            </div>
            <div class="col-md-12 py-2 text-center">
                <h2>MENU AND ORDERING</h2>
            </div>
            <div class="col-md-12 text-center">
                <h4>Table No. {{ $table->name }}</h4>
            </div>
            <div class="col-md-12 pt-3 text-center">
                <img src="{{ asset('qr-images') . '/' . $table->id . '.svg' }}" alt="{{ $table->id }}" height="300"
                    width="300" style="border: 1px solid red;border-width: 5px;
                    padding: 5px;">
            </div>
            <div class="col-md-12 pb-2 text-center">
                {{-- <h4 class="text-secondary">Powered By</h4> --}}
                <img src="{{ asset('images/logo.png') }}" alt="Mealmentor" width="200" height="100">
            </div>
        </div>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
