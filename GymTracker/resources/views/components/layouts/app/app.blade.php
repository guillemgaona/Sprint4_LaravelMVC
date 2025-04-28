<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GymTracker</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans">
    <nav class="bg-white p-4 shadow flex space-x-4">
        <a href="{{ route('sesions.index') }}" class="font-bold">Sesiones</a>
        <a href="{{ route('ejercicios.index') }}">Ejercicios</a>
    </nav>

    <main class="container mx-auto p-4">
        @yield('content')
    </main>
</body>
</html>