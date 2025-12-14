<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard - DigiSolusi')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-900 text-white flex-shrink-0">
            <div class="p-6 bg-gray-800">
                <h1 class="text-2xl font-bold"><span class="text-blue-400">Digi</span>Solusi</h1>
                <p class="text-gray-400 text-sm mt-1">Admin Panel</p>
            </div>
            
            <nav class="mt-6">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-800 hover:text-white transition {{ request()->routeIs('admin.dashboard') ? 'bg-gray-800 text-white border-l-4 border-blue-500' : '' }}">
                    <i class="fas fa-tachometer-alt w-5"></i>
                    <span class="ml-3">Dashboard</span>
                </a>
                <a href="{{ route('admin.pelatihan') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-800 hover:text-white transition {{ request()->routeIs('admin.pelatihan*') ? 'bg-gray-800 text-white border-l-4 border-blue-500' : '' }}">
                    <i class="fas fa-graduation-cap w-5"></i>
                    <span class="ml-3">Pelatihan</span>
                </a>
                <a href="{{ route('admin.pendaftaran') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-800 hover:text-white transition {{ request()->routeIs('admin.pendaftaran') ? 'bg-gray-800 text-white border-l-4 border-blue-500' : '' }}">
                    <i class="fas fa-clipboard-list w-5"></i>
                    <span class="ml-3">Pendaftaran</span>
                </a>
                <hr class="my-4 border-gray-700">
                <a href="{{ route('home') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-800 hover:text-white transition">
                    <i class="fas fa-home w-5"></i>
                    <span class="ml-3">Ke Beranda</span>
                </a>
            </nav>

            <div class="absolute bottom-0 w-64 p-6">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white transition rounded-lg">
                        <i class="fas fa-sign-out-alt w-5"></i>
                        <span class="ml-3">Logout</span>
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 overflow-auto">
            <!-- Header -->
            <div class="bg-white shadow-sm">
                <div class="px-6 py-4 flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">@yield('page-title')</h2>
                    </div>
                    <div class="flex items-center">
                        <div class="mr-4">
                            <p class="text-sm text-gray-600">Admin</p>
                            <p class="font-semibold text-gray-800">{{ auth()->user()->name }}</p>
                        </div>
                        <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold">
                            {{ substr(auth()->user()->name, 0, 1) }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Page Content -->
            <div class="p-6">
                @yield('content')
            </div>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
