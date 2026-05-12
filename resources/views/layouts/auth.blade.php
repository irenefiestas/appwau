<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>AppWau - Auth</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body class="auth-body">

    <div class="auth-container">
        @yield('content')
    </div>

</body>
</html>