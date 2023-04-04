<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $restaurant->name }}</title>

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
                <h1 style="font-family: 'Roboto', sans-serif;">{{ $restaurant->name }}</h1>
            </div>
            <div class="col-md-12 py-2">
                <h4 class="text-secondary">Last 7 Days Report</h4>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-responsive table-bordered">
                            <tr>
                                <th>Total Online Sales</th>
                                <td>{{ $online_sales }}</td>
                            </tr>
                            <tr>
                                <th>Total POS Sales</th>
                                <td>{{ $pos_sales }}</td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
