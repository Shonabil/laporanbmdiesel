<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Panel - @yield('title')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-black text-white min-h-screen p-4">
        <h2 class="text-xl font-bold mb-6">👤 User Panel</h2>
        <nav class="space-y-2">
            <a href="{{ route('user.progress.index') }}" class="block px-3 py-2 rounded hover:bg-blue-800">📈 Progress</a>
            <a href="{{ route('user.profile') }}" class="block px-3 py-2 rounded hover:bg-blue-800">🙍 Profile</a>
        </nav>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-1 p-6">
        @yield('content')
    </main>

</body>
</html>
