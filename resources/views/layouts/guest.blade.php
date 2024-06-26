<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/client/img/favicon.png') }}" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/client/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/client/plugins/fontawesome/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/client/css/feather.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/client/css/custom.css') }}">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="account-page">
    <div class="main-wrapper">

        @include('components.header')

        <div class="content top-space">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>

        @include('components.footer')
    </div>

    <!-- Bootstrap Core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <!-- Sticky Sidebar JS -->
    <script src="{{ asset('assets/client/plugins/theia-sticky-sidebar/ResizeSensor.js') }}"></script>
    <script src="{{ asset('assets/client/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"></script>

    <!-- Circle Progress JS -->
    <script src="{{ asset('assets/client/js/circle-progress.min.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('assets/client/js/script.js') }}"></script>

</body>

</html>
