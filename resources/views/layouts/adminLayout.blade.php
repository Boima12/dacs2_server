<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title', 'dacs2 server')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->

    <!-- CSS load by Vite-->
    @vite(['resources/css/app.css', 'resources/css/adminLayout/adminLayout.css'])
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
