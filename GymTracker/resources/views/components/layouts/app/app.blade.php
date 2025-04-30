<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    @vite('resources/css/app.css')
    <title>GymTracker</title>
</head>
<body class="bg-gray-100 text-gray-800">
    <nav class="bg-white shadow p-4 mb-6">
        <a href="{{ route('ejercicios.index') }}" class="mr-4">Ejercicios</a>
        <a href="{{ route('sesiones.index') }}">Sesiones</a>
    </nav>
    <main class="container mx-auto px-4">
        @yield('content')
    </main>
</body>
</html>