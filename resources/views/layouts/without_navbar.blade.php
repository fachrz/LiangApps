<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />



    @yield('customhead')

    <title>@yield('pageTitle')</title>

</head>

<body>

    @yield('content')

    <!-- JavaScript Library -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://kit.fontawesome.com/eb8b44741d.js" crossorigin="anonymous"></script>
    @yield('script')
</body>

</html>