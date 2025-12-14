@extends('layouts.app')

@section('title', 'Contact Us - DigiSolusi')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Hubungi Kami</h1>
        <p class="text-xl text-blue-100">Kami siap membantu Anda. Jangan ragu untuk menghubungi kami!</p>
    </div>
</div>

<!-- Contact Content -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
        <!-- Contact Form -->
        <div>
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Kirim Pesan</h2>
            
            @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
                <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
            </div>
            @endif

            <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                @csrf
                
                <div>
                    <label for="name" class="block text-gray-700 font-semibold mb-2">Nama Lengkap</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror">
                    @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror">
                    @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="message" class="block text-gray-700 font-semibold mb-2">Pesan</label>
                    <textarea id="message" name="message" rows="6" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('message') border-red-500 @enderror">{{ old('message') }}</textarea>
                    @error('message')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                    <i class="fas fa-paper-plane mr-2"></i>Kirim Pesan
                </button>
            </form>
        </div>

        <!-- Contact Info -->
        <div>
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Informasi Kontak</h2>
            
            <div class="space-y-6">
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-map-marker-alt text-blue-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-800 mb-2">Alamat</h3>
                            <p class="text-gray-600">
                                Jl. Sudirman No. 123<br>
                                Jakarta Selatan, 12190<br>
                                Indonesia
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-phone text-blue-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-800 mb-2">Telepon</h3>
                            <p class="text-gray-600">
                                +62 812-3456-7890<br>
                                +62 21-1234-5678
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-envelope text-blue-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-800 mb-2">Email</h3>
                            <p class="text-gray-600">
                                info@digisolusi.com<br>
                                support@digisolusi.com
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-clock text-blue-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-800 mb-2">Jam Operasional</h3>
                            <p class="text-gray-600">
                                Senin - Jumat: 09:00 - 17:00<br>
                                Sabtu: 09:00 - 13:00<br>
                                Minggu: Tutup
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Social Media -->
            <div class="mt-8">
                <h3 class="font-bold text-gray-800 mb-4">Ikuti Kami</h3>
                <div class="flex space-x-4">
                    <a href="#" class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center text-white hover:bg-blue-700 transition">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="w-12 h-12 bg-blue-400 rounded-lg flex items-center justify-center text-white hover:bg-blue-500 transition">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="w-12 h-12 bg-pink-600 rounded-lg flex items-center justify-center text-white hover:bg-pink-700 transition">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="w-12 h-12 bg-red-600 rounded-lg flex items-center justify-center text-white hover:bg-red-700 transition">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Map Section (Optional) -->
<div class="bg-gray-100 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-800 text-center mb-8">Lokasi Kami</h2>
        <div class="bg-gray-300 rounded-xl h-96 flex items-center justify-center">
            <p class="text-gray-600">
                <i class="fas fa-map-marked-alt text-4xl mb-2"></i><br>
                [Google Maps Embed Here]
            </p>
        </div>
    </div>
</div>
@endsection
