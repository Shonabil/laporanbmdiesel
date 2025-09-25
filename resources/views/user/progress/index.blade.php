@extends('user.layouts.user')

@section('title', 'Progress')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50">
        <div class="container mx-auto px-4 py-8">

            <!-- Enhanced Header Section -->
            <div class="text-center mb-10">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full mb-4 shadow-lg">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                </div>
                <h1 class="text-4xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent mb-2">
                    Progress Perbaikan
                </h1>
                <p class="text-gray-600 text-lg">Pantau kemajuan perbaikan perangkat Anda secara real-time</p>
            </div>

            <!-- Filter & Search Section -->
            <div class="bg-white rounded-2xl shadow-xl p-6 mb-8 border border-gray-100">
                <form action="{{ route('user.progress.index') }}" method="GET" class="space-y-4">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-4">
                        <!-- Search Input -->
                        <div class="lg:col-span-6 relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                            </div>
                            <input type="text"
                                   name="search"
                                   placeholder="Cari berdasarkan nama customer atau order number..."
                                   value="{{ request('search') }}"
                                   class="w-full pl-12 pr-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                        </div>

                        <!-- Date Filter -->
                        <div class="lg:col-span-3">
                            <select name="date_filter" class="w-full py-3 px-4 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200">
                                <option value="">Semua Tanggal</option>
                                <option value="today" {{ request('date_filter') == 'today' ? 'selected' : '' }}>Hari Ini</option>
                                <option value="week" {{ request('date_filter') == 'week' ? 'selected' : '' }}>Minggu Ini</option>
                                <option value="month" {{ request('date_filter') == 'month' ? 'selected' : '' }}>Bulan Ini</option>
                            </select>
                        </div>

                        <!-- Action Buttons -->
                        <div class="lg:col-span-3 flex gap-2">
                            <button type="submit"
                                    class="flex-1 bg-gradient-to-r from-blue-600 to-purple-600 text-white py-3 px-6 rounded-xl hover:from-blue-700 hover:to-purple-700 transition-all duration-200 transform hover:scale-105 shadow-lg font-medium">
                                <span class="flex items-center justify-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
                                    Filter
                                </span>
                            </button>
                            <a href="{{ route('user.progress.index') }}"
                               class="bg-gray-100 hover:bg-gray-200 text-gray-700 py-3 px-4 rounded-xl transition-all duration-200 transform hover:scale-105 flex items-center justify-center">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl p-6 text-white shadow-xl">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-blue-100 text-sm font-medium">Total Progress</p>
                            <p class="text-3xl font-bold">{{ $progress->total() ?? $progress->count() }}</p>
                        </div>
                        <div class="w-12 h-12 bg-blue-400 bg-opacity-50 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-2xl p-6 text-white shadow-xl">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-green-100 text-sm font-medium">Update Hari Ini</p>
                            <p class="text-3xl font-bold">{{ $progress->where('created_at', '>=', today())->count() }}</p>
                        </div>
                        <div class="w-12 h-12 bg-green-400 bg-opacity-50 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl p-6 text-white shadow-xl">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-purple-100 text-sm font-medium">Dengan Foto</p>
                            <p class="text-3xl font-bold">{{ $progress->whereNotNull('image')->count() }}</p>
                        </div>
                        <div class="w-12 h-12 bg-purple-400 bg-opacity-50 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            @if ($progress->isEmpty())
                <!-- Beautiful Empty State -->
                <div class="text-center py-20">
                    <div class="bg-white rounded-3xl shadow-2xl p-12 max-w-md mx-auto border border-gray-100">
                        <div class="w-24 h-24 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full flex items-center justify-center mx-auto mb-6 animate-bounce">
                            <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">Belum Ada Progress</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Progress perbaikan akan ditampilkan di sini ketika teknisi mulai bekerja pada perangkat Anda.
                        </p>
                    </div>
                </div>
            @else
                <!-- View Toggle -->
                <div class="flex justify-between items-center mb-6">
                    <div class="flex items-center gap-2">
                        <span class="text-sm text-gray-600 font-medium">Tampilan:</span>
                        <div class="bg-gray-100 rounded-xl p-1 flex">
                            <button onclick="toggleView('grid')"
                                    id="gridBtn"
                                    class="view-btn active px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200">
                                <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                                </svg>
                                Grid
                            </button>
                            <button onclick="toggleView('list')"
                                    id="listBtn"
                                    class="view-btn px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200">
                                <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                                </svg>
                                List
                            </button>
                        </div>
                    </div>

                    <!-- Sort Options -->
                    <div class="flex items-center gap-2">
                        <span class="text-sm text-gray-600 font-medium">Urutkan:</span>
                        <select onchange="window.location.href = updateUrlParameter(window.location.href, 'sort', this.value)"
                                class="border border-gray-200 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Terbaru</option>
                            <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Terlama</option>
                            <option value="customer" {{ request('sort') == 'customer' ? 'selected' : '' }}>Customer A-Z</option>
                        </select>
                    </div>
                </div>

                <form action="{{ route('user.progress.index') }}" method="GET" class="mb-8">
                    <div class="relative group">
                        <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-600 to-purple-600 rounded-2xl blur opacity-30 group-hover:opacity-50 transition duration-300"></div>
                        <div class="relative bg-white rounded-2xl p-1">
                            <div class="flex flex-col sm:flex-row gap-2">
                                <div class="relative flex-1">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                        </svg>
                                    </div>
                                    <input type="text"
                                           name="search"
                                           placeholder="🔍 Cari berdasarkan nama customer..."
                                           value="{{ request('search') }}"
                                           class="w-full pl-12 pr-4 py-3 border-0 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-50 transition-all duration-200">
                                </div>
                                <button type="submit"
                                        class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-3 rounded-xl hover:from-blue-700 hover:to-purple-700 transition-all duration-200 transform hover:scale-105 shadow-lg font-medium">
                                    Cari Progress
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- Grid View -->
                <div id="gridView" class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-8">
                    @foreach ($progress as $item)
                        <div class="group bg-white rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border border-gray-100 overflow-hidden progress-card">

                            <!-- Image Section -->
                            @if ($item->image)
                                <div class="relative overflow-hidden h-56">
                                    <img src="{{ asset('storage/' . $item->image) }}"
                                         alt="Progress Image"
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                                         onclick="openImageModal('{{ asset('storage/' . $item->image) }}', '{{ $item->title }}')">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>

                                    <!-- Image Overlay Buttons -->
                                    <div class="absolute top-4 right-4 flex gap-2">
                                        <button onclick="openImageModal('{{ asset('storage/' . $item->image) }}', '{{ $item->title }}')"
                                                class="bg-white/20 backdrop-blur-sm text-white p-2 rounded-full hover:bg-white/30 transition-all duration-200">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                            </svg>
                                        </button>
                                        <button onclick="downloadImage('{{ asset('storage/' . $item->image) }}', '{{ $item->title }}')"
                                                class="bg-white/20 backdrop-blur-sm text-white p-2 rounded-full hover:bg-white/30 transition-all duration-200">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                            </svg>
                                        </button>
                                    </div>

                                    <!-- Status Badge -->
                                    <div class="absolute bottom-4 left-4">
                                        <span class="bg-gradient-to-r from-green-400 to-emerald-500 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                            ✅ Progress Update
                                        </span>
                                    </div>
                                </div>
                            @else
                                <div class="h-56 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center relative">
                                    <div class="text-center">
                                        <div class="w-16 h-16 bg-gray-300 rounded-full flex items-center justify-center mx-auto mb-4">
                                            <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                        <p class="text-gray-500 font-medium">Foto belum tersedia</p>
                                    </div>
                                </div>
                            @endif

                            <!-- Content -->
                            <div class="p-8 space-y-6">
                                <!-- Title & Date -->
                                <div class="flex items-start justify-between">
                                    <h2 class="font-bold text-xl text-gray-800 group-hover:text-blue-600 transition-colors duration-300 flex-1 mr-4">
                                        {{ $item->title }}
                                    </h2>
                                    <div class="text-right">
                                        <div class="text-xs text-gray-500 font-semibold">{{ $item->created_at->format('d M Y') }}</div>
                                        <div class="text-xs text-gray-400">{{ $item->created_at->format('H:i') }} WIB</div>
                                        <div class="text-xs text-blue-500 mt-1">{{ $item->created_at->diffForHumans() }}</div>
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="relative">
                                    <p class="text-gray-600 leading-relaxed overflow-hidden [display:-webkit-box] [-webkit-line-clamp:3] [-webkit-box-orient:vertical] group-hover:text-gray-700 transition-colors duration-300">
                                        {{ $item->description }}
                                    </p>
                                    @if(strlen($item->description) > 150)
                                        <button onclick="toggleDescription(this)"
                                                class="text-blue-500 text-sm font-medium mt-2 hover:text-blue-600 transition-colors duration-200">
                                            Baca selengkapnya...
                                        </button>
                                    @endif
                                </div>

                                <!-- Enhanced Tags -->
                                <div class="space-y-3">
                                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-2xl p-4 border border-blue-100">
                                        <div class="flex items-center gap-3 mb-2">
                                            <div class="w-2 h-2 bg-blue-500 rounded-full animate-pulse"></div>
                                            <span class="text-xs font-bold text-blue-700 uppercase tracking-wide">Order Information</span>
                                        </div>
                                        <div class="grid grid-cols-1 gap-3">
                                            <div class="flex items-center justify-between bg-white rounded-xl p-3 shadow-sm">
                                                <div class="flex items-center gap-3">
                                                    <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                                                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <div class="text-xs text-gray-500 font-medium">Order Number</div>
                                                        <div class="font-bold text-gray-800">{{ $item->report->repair_order_no ?? 'Tidak tersedia' }}</div>
                                                    </div>
                                                </div>
                                                @if($item->report->repair_order_no)
                                                    <button onclick="copyToClipboard('{{ $item->report->repair_order_no }}')"
                                                            class="text-blue-500 hover:text-blue-600 p-1 rounded transition-colors duration-200"
                                                            title="Copy Order Number">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                                        </svg>
                                                    </button>
                                                @endif
                                            </div>

                                            <div class="flex items-center justify-between bg-white rounded-xl p-3 shadow-sm">
                                                <div class="flex items-center gap-3">
                                                    <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                                                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <div class="text-xs text-gray-500 font-medium">Customer</div>
                                                        <div class="font-bold text-gray-800">{{ $item->report->customer ?? 'Tidak tersedia' }}</div>
                                                    </div>
                                                </div>
                                                @if($item->report->customer)
                                                    <button onclick="copyToClipboard('{{ $item->report->customer }}')"
                                                            class="text-green-500 hover:text-green-600 p-1 rounded transition-colors duration-200"
                                                            title="Copy Customer Name">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                                        </svg>
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="flex gap-2 pt-2">
                                    <button onclick="shareProgress('{{ $item->title }}', '{{ $item->description }}')"
                                            class="flex-1 bg-gradient-to-r from-blue-500 to-indigo-500 text-white py-2 px-4 rounded-xl hover:from-blue-600 hover:to-indigo-600 transition-all duration-200 text-sm font-medium">
                                        <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"/>
                                        </svg>
                                        Share
                                    </button>
                                    <button onclick="favoriteProgress('{{ $item->id }}')"
                                            class="bg-gray-100 hover:bg-red-100 text-gray-600 hover:text-red-500 py-2 px-4 rounded-xl transition-all duration-200 text-sm font-medium">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- List View -->
                <div id="listView" class="space-y-4 hidden">
                    @foreach ($progress as $item)
                        <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden">
                            <div class="flex flex-col md:flex-row">
                                <!-- Image -->
                                @if ($item->image)
                                    <div class="md:w-48 h-48 md:h-auto relative overflow-hidden">
                                        <img src="{{ asset('storage/' . $item->image) }}"
                                             alt="Progress Image"
                                             class="w-full h-full object-cover hover:scale-105 transition-transform duration-300"
                                             onclick="openImageModal('{{ asset('storage/' . $item->image) }}', '{{ $item->title }}')">
                                        <div class="absolute inset-0 bg-gradient-to-t md:bg-gradient-to-r from-black/30 to-transparent"></div>
                                    </div>
                                @endif

                                <!-- Content -->
                                <div class="flex-1 p-6">
                                    <div class="flex flex-col h-full">
                                        <div class="flex items-start justify-between mb-4">
                                            <h3 class="text-xl font-bold text-gray-800 flex-1 mr-4">{{ $item->title }}</h3>
                                            <div class="text-right">
                                                <div class="text-sm font-semibold text-gray-600">{{ $item->created_at->format('d M Y') }}</div>
                                                <div class="text-xs text-gray-400">{{ $item->created_at->diffForHumans() }}</div>
                                            </div>
                                        </div>

                                        <p class="text-gray-600 mb-4 flex-1">{{ $item->description }}</p>

                                        <div class="flex flex-wrap gap-2">
                                            <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold">
                                                📋 {{ $item->report->repair_order_no ?? 'N/A' }}
                                            </span>
                                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                                                👤 {{ $item->report->customer ?? 'N/A' }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Enhanced Pagination -->
                <div class="mt-12 flex justify-center">
                    <div class="bg-white rounded-2xl shadow-xl p-4 border border-gray-100">
                        {{ $progress->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Image Modal -->
    <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-75 hidden z-50 flex items-center justify-center p-4" onclick="closeImageModal()">
        <div class="relative max-w-4xl max-h-full">
            <img id="modalImage" src="" alt="" class="max-w-full max-h-full rounded-2xl shadow-2xl">
            <button onclick="closeImageModal()"
                    class="absolute top-4 right-4 bg-white text-gray-800 rounded-full p-2 hover:bg-gray-100 transition-colors duration-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
            <div id="modalTitle" class="absolute bottom-4 left-4 bg-black bg-opacity-75 text-white px-4 py-2 rounded-xl"></div>
        </div>
    </div>

    <!-- Toast Notification -->
    <div id="toast" class="fixed bottom-4 right-4 bg-gradient-to-r from-green-500 to-emerald-500 text-white px-6 py-3 rounded-xl shadow-lg transform translate-y-full opacity-0 transition-all duration-300 z-50">
        <div class="flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
            <span id="toastMessage">Action completed!</span>
        </div>
    </div>

    <script>
        // View Toggle Function
        function toggleView(view) {
            const gridView = document.getElementById('gridView');
            const listView = document.getElementById('listView');
            const gridBtn = document.getElementById('gridBtn');
            const listBtn = document.getElementById('listBtn');

            if (view === 'grid') {
                gridView.classList.remove('hidden');
                listView.classList.add('hidden');
                gridBtn.classList.add('active');
                listBtn.classList.remove('active');
                localStorage.setItem('preferredView', 'grid');
            } else {
                gridView.classList.add('hidden');
                listView.classList.remove('hidden');
                listBtn.classList.add('active');
                gridBtn.classList.remove('active');
                localStorage.setItem('preferredView', 'list');
            }
        }

        // Image Modal Functions
        function openImageModal(imageSrc, title) {
            const modal = document.getElementById('imageModal');
            const modalImage = document.getElementById('modalImage');
            const modalTitle = document.getElementById('modalTitle');

            modalImage.src = imageSrc;
            modalTitle.textContent = title;
            modal.classList.remove('hidden');

            // Add entrance animation
            setTimeout(() => {
                modal.style.opacity = '1';
                modalImage.style.transform = 'scale(1)';
            }, 10);
        }

        function closeImageModal() {
            const modal = document.getElementById('imageModal');
            modal.style.opacity = '0';
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }

        // Copy to Clipboard Function
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(() => {
                showToast('Berhasil disalin ke clipboard!');
            }).catch(() => {
                showToast('Gagal menyalin ke clipboard', 'error');
            });
        }

        // Share Function
        function shareProgress(title, description) {
            if (navigator.share) {
                navigator.share({
                    title: 'Progress Perbaikan: ' + title,
                    text: description,
                    url: window.location.href
                }).then(() => {
                    showToast('Progress berhasil dibagikan!');
                }).catch(() => {
                    fallbackShare(title, description);
                });
            } else {
                fallbackShare(title, description);
            }
        }

        function fallbackShare(title, description) {
            const shareText = `Progress Perbaikan: ${title}\n\n${description}\n\n${window.location.href}`;
            copyToClipboard(shareText);
            showToast('Link progress disalin ke clipboard!');
        }

        // Favorite Function
        function favoriteProgress(progressId) {
            // This would typically make an AJAX call to your backend
            showToast('Progress ditambahkan ke favorit!');

            // Visual feedback
            event.target.closest('button').innerHTML = `
                <svg class="w-4 h-4" fill="currentColor" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                </svg>
            `;
            event.target.closest('button').classList.add('text-red-500');
        }

        // Toggle Description Function
        function toggleDescription(button) {
            const description = button.previousElementSibling;
            const isExpanded = description.classList.contains('line-clamp-none');

            if (isExpanded) {
                description.classList.remove('line-clamp-none');
                description.classList.add('[-webkit-line-clamp:3]');
                button.textContent = 'Baca selengkapnya...';
            } else {
                description.classList.add('line-clamp-none');
                description.classList.remove('[-webkit-line-clamp:3]');
                button.textContent = 'Sembunyikan...';
            }
        }

        // Toast Notification Function
        function showToast(message, type = 'success') {
            const toast = document.getElementById('toast');
            const toastMessage = document.getElementById('toastMessage');

            toastMessage.textContent = message;

            if (type === 'error') {
                toast.className = toast.className.replace('from-green-500 to-emerald-500', 'from-red-500 to-pink-500');
            } else {
                toast.className = toast.className.replace('from-red-500 to-pink-500', 'from-green-500 to-emerald-500');
            }

            toast.style.transform = 'translateY(0)';
            toast.style.opacity = '1';

            setTimeout(() => {
                toast.style.transform = 'translateY(100%)';
                toast.style.opacity = '0';
            }, 3000);
        }

        // URL Parameter Helper
        function updateUrlParameter(url, param, value) {
            const urlObj = new URL(url);
            urlObj.searchParams.set(param, value);
            return urlObj.toString();
        }

        // Initialize preferred view on page load
        document.addEventListener('DOMContentLoaded', function() {
            const preferredView = localStorage.getItem('preferredView') || 'grid';
            toggleView(preferredView);

            // Add keyboard shortcuts
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && !document.getElementById('imageModal').classList.contains('hidden')) {
                    closeImageModal();
                }
                if (e.key === 'g' && e.ctrlKey) {
                    e.preventDefault();
                    toggleView('grid');
                }
                if (e.key === 'l' && e.ctrlKey) {
                    e.preventDefault();
                    toggleView('list');
                }
            });
        });

        // Download Image Function
        function downloadImage(imageSrc, title) {
            const link = document.createElement('a');
            link.href = imageSrc;
            link.download = `progress-${title.replace(/[^a-z0-9]/gi, '_').toLowerCase()}.jpg`;
            link.click();
            showToast('Gambar berhasil diunduh!');
        }

        // Auto-refresh every 30 seconds
        let autoRefreshInterval;

        function startAutoRefresh() {
            autoRefreshInterval = setInterval(() => {
                // Only refresh if no modals are open
                if (document.getElementById('imageModal').classList.contains('hidden')) {
                    window.location.reload();
                }
            }, 30000); // 30 seconds
        }

        function stopAutoRefresh() {
            if (autoRefreshInterval) {
                clearInterval(autoRefreshInterval);
            }
        }

        // Start auto-refresh on page load
        document.addEventListener('DOMContentLoaded', startAutoRefresh);

        // Stop auto-refresh when modal is open
        document.getElementById('imageModal').addEventListener('click', stopAutoRefresh);
        document.getElementById('imageModal').addEventListener('transitionend', startAutoRefresh);
    </script>

    <style>
        /* Enhanced Animations */
        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes pulse-glow {
            0%, 100% {
                box-shadow: 0 0 20px rgba(59, 130, 246, 0.3);
            }
            50% {
                box-shadow: 0 0 40px rgba(59, 130, 246, 0.5);
            }
        }

        /* Progress Card Animations */
        .progress-card {
            animation: slideInUp 0.6s ease-out forwards;
        }

        .progress-card:nth-child(even) {
            animation-delay: 0.1s;
        }

        .progress-card:nth-child(3n) {
            animation-delay: 0.2s;
        }

        /* View Button Styles */
        .view-btn {
            @apply text-gray-600 bg-transparent;
        }

        .view-btn.active {
            @apply text-white bg-gradient-to-r from-blue-500 to-purple-500 shadow-lg;
        }

        /* Line Clamp Utilities */
        .line-clamp-none {
            display: block;
            -webkit-line-clamp: unset;
            -webkit-box-orient: unset;
            overflow: visible;
        }

        /* Enhanced Hover Effects */
        .progress-card:hover {
            animation: pulse-glow 2s ease-in-out infinite;
        }

        /* Responsive Grid Improvements */
        @media (max-width: 1024px) {
            .grid {
                grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            }
        }

        @media (max-width: 640px) {
            .grid {
                grid-template-columns: 1fr;
            }
        }

        /* Custom Focus States */
        input:focus, select:focus, button:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        /* Loading Animation */
        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .animate-spin-slow {
            animation: spin 3s linear infinite;
        }

        /* Image Modal Styling */
        #imageModal {
            backdrop-filter: blur(8px);
        }

        #imageModal img {
            transform: scale(0.8);
            transition: transform 0.3s ease-out;
        }

        /* Scrollbar Styling */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            @apply bg-gray-100 rounded-lg;
        }

        ::-webkit-scrollbar-thumb {
            @apply bg-gradient-to-b from-blue-400 to-purple-500 rounded-lg;
        }

        ::-webkit-scrollbar-thumb:hover {
            @apply from-blue-500 to-purple-600;
        }
    </style>
@endsection
