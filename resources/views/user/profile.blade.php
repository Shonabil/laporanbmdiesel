@extends('user.layouts.user')

@section('title', 'Profile')

@section('content')
    <div class="max-w-lg mx-auto">
        <div class="bg-white shadow-lg rounded-2xl p-8 text-center">
            <!-- Avatar -->
            <div class="flex justify-center mb-4">
                <div class="w-24 h-24 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-full flex items-center justify-center text-white text-3xl font-bold shadow-md">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
            </div>

            <!-- User Info -->
            <h1 class="text-2xl font-bold text-gray-800 mb-2">🙍 {{ Auth::user()->name }}</h1>
            <p class="text-gray-500 mb-6">{{ Auth::user()->email }}</p>

            <div class="border-t pt-4 space-y-2 text-left">
                <p><span class="font-semibold">📅 Bergabung:</span> {{ Auth::user()->created_at->format('d M Y') }}</p>
            </div>

            <!-- Logout Button -->
            <form action="{{ route('logout') }}" method="POST" class="mt-6">
                @csrf
                <button class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold px-4 py-2 rounded-xl shadow-md transition">
                    🚪 Logout
                </button>
            </form>
        </div>
    </div>
@endsection
