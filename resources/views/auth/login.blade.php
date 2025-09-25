@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <div class="h-screen w-full overflow-hidden flex items-center justify-center p-40">
        <div class="max-w-md w-full">
            <!-- Logo Section -->
            <div class="text-center mb-8">
                <!-- Company Logo - Replace with your actual logo -->
                <div class="inline-flex items-center justify-center mb-6">
                    <div class="flex items-center gap-x-2">
                        <!-- Logo BM Diesel -->
                        <div class="text-center">
                            <img src="{{ asset('images/bmdiesel.png') }}" alt="BM Diesel" class="w-56 h-14 object-contain">

                            <p class="mt-2 text-xs text-gray-400 uppercase tracking-widest"> company</p>
                        </div>

                    </div>
                </div>
                <h1 class="text-2xl font-semibold text-gray-400 mb-2">Login to Dashboard</h1>
                <p class="text-gray-600">Enter your credentials to continue</p>

            </div>

            <div
                class="bg-white backdrop-blur-sm bg-opacity-95 shadow-xl rounded-2xl p-8 border border-white border-opacity-20">
                <form action="{{ route('login') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                            Email Address
                        </label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 bg-gray-50 focus:bg-white"
                            placeholder="name@email.com" required>
                        @error('email')
                            <p class="mt-2 text-sm text-red-500 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                            Password
                        </label>
                        <input type="password" id="password" name="password"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 bg-gray-50 focus:bg-white"
                            placeholder="••••••••" required>
                        @error('password')
                            <p class="mt-2 text-sm text-red-500 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input type="checkbox" id="remember" name="remember"
                                class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="remember" class="ml-2 text-sm text-gray-600">
                                Remember me
                            </label>
                        </div>

                        {{-- <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:text-blue-800 transition duration-200 font-medium">
                        Lupa password?
                    </a>
                     --}}
                    </div>
                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold py-3 px-4 rounded-xl transition duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl">
                        Sign In
                    </button>
                </form>

                <!-- Divider -->
                <div class="mt-6">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-200"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-4 bg-white text-gray-500 font-medium">OR</span>
                        </div>
                    </div>
                </div>

                <!-- Register Link -->
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        Don’t have an account?
                        <a href="{{ route('register') }}"
                            class="font-semibold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 transition duration-200">
                            Create Account
                        </a>
                    </p>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center mt-8">
                <p class="text-sm text-gray-500">
                    © 2024 YourCompany. All rights reserved.
                </p>
            </div>
        </div>
    </div>
@endsection
