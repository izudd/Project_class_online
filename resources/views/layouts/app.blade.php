<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'DigiSolusi - Platform Pelatihan Online')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center">
                        <span class="text-2xl font-bold text-blue-600">Digi</span>
                        <span class="text-2xl font-bold text-gray-800">Solusi</span>
                    </a>
                </div>
                
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium transition">Home</a>
                    <a href="{{ route('about') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium transition">About Us</a>
                    <a href="{{ route('pelatihan') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium transition">Pelatihan</a>
                    <a href="{{ route('contact') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium transition">Contact</a>
                    
                    @auth
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('admin.dashboard') }}" class="text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg text-sm font-medium transition">
                                <i class="fas fa-tachometer-alt mr-2"></i>Admin Dashboard
                            </a>
                        @else
                            <a href="{{ route('user.dashboard') }}" class="text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg text-sm font-medium transition">
                                <i class="fas fa-user mr-2"></i>Dashboard
                            </a>
                        @endif
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-700 hover:text-red-600 px-3 py-2 text-sm font-medium transition">
                                <i class="fas fa-sign-out-alt mr-1"></i>Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium transition">Login</a>
                        <a href="{{ route('register') }}" class="text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg text-sm font-medium transition">Register</a>
                    @endauth
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-button" class="text-gray-700 hover:text-blue-600 focus:outline-none">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div id="mobile-menu" class="hidden md:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="{{ route('home') }}" class="block text-gray-700 hover:bg-blue-50 px-3 py-2 rounded-md text-base font-medium">Home</a>
                <a href="{{ route('about') }}" class="block text-gray-700 hover:bg-blue-50 px-3 py-2 rounded-md text-base font-medium">About Us</a>
                <a href="{{ route('pelatihan') }}" class="block text-gray-700 hover:bg-blue-50 px-3 py-2 rounded-md text-base font-medium">Pelatihan</a>
                <a href="{{ route('contact') }}" class="block text-gray-700 hover:bg-blue-50 px-3 py-2 rounded-md text-base font-medium">Contact</a>
                
                @auth
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" class="block text-gray-700 hover:bg-blue-50 px-3 py-2 rounded-md text-base font-medium">Admin Dashboard</a>
                    @else
                        <a href="{{ route('user.dashboard') }}" class="block text-gray-700 hover:bg-blue-50 px-3 py-2 rounded-md text-base font-medium">Dashboard</a>
                    @endif
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="block w-full text-left text-gray-700 hover:bg-blue-50 px-3 py-2 rounded-md text-base font-medium">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="block text-gray-700 hover:bg-blue-50 px-3 py-2 rounded-md text-base font-medium">Login</a>
                    <a href="{{ route('register') }}" class="block text-gray-700 hover:bg-blue-50 px-3 py-2 rounded-md text-base font-medium">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">DigiSolusi</h3>
                    <p class="text-gray-300">Platform pelatihan online terpercaya untuk mengembangkan skill digital Anda.</p>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-gray-300 hover:text-white transition">Home</a></li>
                        <li><a href="{{ route('about') }}" class="text-gray-300 hover:text-white transition">About Us</a></li>
                        <li><a href="{{ route('pelatihan') }}" class="text-gray-300 hover:text-white transition">Pelatihan</a></li>
                        <li><a href="{{ route('contact') }}" class="text-gray-300 hover:text-white transition">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Contact Us</h3>
                    <ul class="space-y-2 text-gray-300">
                        <li><i class="fas fa-envelope mr-2"></i> <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="dbb2b5bdb49bbfb2bcb2a8b4b7aea8b2f5b8b4b6">[email&#160;protected]</a></li>
                        <li><i class="fas fa-phone mr-2"></i> +62 812-3456-7890</li>
                        <li><i class="fas fa-map-marker-alt mr-2"></i> Jakarta, Indonesia</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-300">
                <p>&copy; 2024 DigiSolusi. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>
        // Mobile menu toggle
       