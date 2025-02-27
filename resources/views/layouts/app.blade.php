<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Task Manager')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-lime-50 text-gray-900">
    <div class="min-h-screen flex flex-col">
        <nav class="bg-lime-500 text-white py-4 shadow-md">
            <div class="container mx-auto flex justify-between items-center px-4">
                <a href="/" class="text-xl font-bold">Task Manager</a>
            </div>
        </nav>

        <main class="flex-1 container mx-auto px-4 py-6">
            @yield('content')
        </main>

        <footer class="bg-lime-400 text-white text-center py-4 mt-6">
            <p>&copy; {{ date('Y') }} LimonsitOwO. Todos los derechos reservados.</p>
        </footer>
    </div>
</body>
</html>