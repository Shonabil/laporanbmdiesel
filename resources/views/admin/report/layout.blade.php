<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs" ></script>
<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

    <!-- TomSelect CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet">
</head>

<body class="flex h-screen bg-white text-gray-95000">

    <!-- Sidebar -->
   <!-- Sidebar -->
 <aside class="w-64 bg-black shadow-md p-4 space-y-6">
        <h2 class="text-2xl font-bold text-blue-600 mb-6">Dashboard Admin</h2>

        <!-- Link langsung ke Dashboard -->
        <a href="{{ route('admin.dashboard') }}"
           class="flex items-center px-3 py-2 rounded hover:bg-blue-600 hover:text-white
           {{ request()->is('admin/dashboard') ? 'bg-blue-500 text-white' : 'text-gray-400' }}">
           <i class="fas fa-home w-5 mr-2"></i> Dashboard
        </a>

        <!-- Dropdown Dashboard -->
        <div x-data="{ open: false }">
            <!-- Button -->
            <button @click="open = !open"
                class="w-full flex items-center justify-between px-3 py-2 rounded hover:bg-blue-600 hover:text-white text-gray-400">
                <span class="flex items-center">
                    <i class="fas fa-layer-group w-5 mr-2"></i> Menu
                </span>
                <svg xmlns="http://www.w3.org/2000/svg"
                     :class="{ 'rotate-180': open }"
                     class="h-4 w-4 transition-transform"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <!-- Dropdown Items -->
            <nav x-show="open" x-transition class="ml-4 mt-2 flex flex-col space-y-2">
                <a href="{{ route('admin.report.index') }}"
                   class="px-3 py-2 rounded hover:bg-blue-600 hover:text-white {{ request()->is('admin/report*') ? 'bg-blue-500 text-white' : 'text-gray-400' }}">
                   <i class="fas fa-file-alt w-5 mr-2"></i> Laporan
                </a>
                <a href="{{ route('admin.report.history') }}"
                   class="px-3 py-2 rounded hover:bg-blue-600 hover:text-white {{ request()->is('admin/history*') ? 'bg-blue-500 text-white' : 'text-gray-400' }}">
                   <i class="fas fa-clock-rotate-left w-5 mr-2"></i> History
                </a>
                <a href="{{ route('admin.payment.index') }}"
                   class="py-2 px-3 rounded hover:bg-blue-600 hover:text-white {{ request()->is('admin/payment*') ? 'bg-blue-500 text-white' : 'text-gray-400' }}">
                   <i class="fas fa-credit-card w-5 mr-2"></i> Payment
                </a>
                <a href="{{ route('admin.progress.index') }}"
                   class="py-2 px-3 rounded hover:bg-blue-600 hover:text-white {{ request()->is('admin/progress*') ? 'bg-blue-500 text-white' : 'text-gray-400' }}">
                   <i class="fas fa-chart-line w-5 mr-2"></i> Progress
                </a>
            </nav>
        </div>
    </aside>


    <!-- Content -->
    <main class="flex-1 p-8 overflow-auto">
        @yield('content')
    </main>

    <!-- TomSelect JS -->
    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
    <script>
        // Bikin dropdown customer bisa search
        document.addEventListener("DOMContentLoaded", function () {
            let select = document.querySelector("#report_id");
            if (select) {
                new TomSelect("#report_id", {
                    create: false,
                    sortField: {
                        field: "text",
                        direction: "asc"
                    },
                    placeholder: "Cari customer..."
                });
            }
        });
    </script>
</body>
</html>
