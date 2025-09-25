@extends('admin.report.layout')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="mb-10">
            <h1 class="text-3xl font-extrabold text-gray-900 flex items-center gap-3">
                <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center shadow-sm">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                Riwayat Laporan
            </h1>
            <p class="text-gray-600 mt-2">Kelola dan unduh laporan yang telah dibuat</p>
        </div>

        <!-- Success Alert -->
        @if (session('success'))
            <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-xl mb-8 flex items-center gap-3 shadow-sm">
                <div class="w-7 h-7 bg-green-100 rounded-full flex items-center justify-center">
                    <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Statistics -->
        <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm mb-10 hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Total Laporan</p>
                    <p class="text-4xl font-extrabold text-purple-600">{{ $reports->count() }}</p>
                </div>
                <div class="w-14 h-14 bg-purple-100 rounded-xl flex items-center justify-center">
                    <svg class="w-7 h-7 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Reports -->
        @if($reports->isEmpty())
            <div class="bg-white border border-gray-200 rounded-2xl p-12 text-center shadow-sm">
                <div class="flex flex-col items-center">
                    <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Belum ada laporan</h3>
                    <p class="text-gray-500">Laporan yang dibuat akan muncul di sini</p>
                </div>
            </div>
        @else
            <div class="grid gap-6">
                @foreach ($reports as $report)
                    <div class="bg-white border border-gray-200 rounded-2xl shadow-sm hover:shadow-lg transition transform hover:-translate-y-1 overflow-hidden animate-fade-in">
                        <div class="p-6 flex flex-col lg:flex-row gap-6">
                            <!-- Image -->
                            <div class="flex-shrink-0">
                                <div class="w-full lg:w-48 h-48 lg:h-32 bg-gray-100 rounded-lg overflow-hidden border">
                                    <img src="{{ asset('storage/' . $report->gambar) }}"
                                         class="w-full h-full object-cover hover:scale-105 transition-transform duration-300"
                                         alt="Report Image"
                                         onerror="this.src='https://via.placeholder.com/300x200/EEE/AAA?text=No+Image'">
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="flex-1 min-w-0 flex flex-col justify-between">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 mb-2">
                                        {{ $report->repair_order_no }}
                                    </h3>
                                    <div class="flex items-center text-sm text-gray-500 mb-3">
                                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 01-2 2z"></path>
                                        </svg>
                                        <span>{{ $report->created_at ? $report->created_at->format('d M Y, H:i') : '-' }}</span>
                                    </div>
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium
                                        {{ $report->payment && $report->payment->status === 'complete' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                        <svg class="w-2 h-2 mr-1.5" fill="currentColor" viewBox="0 0 8 8"><circle cx="4" cy="4" r="3"/></svg>
                                        {{ $report->payment->status ?? 'pending' }}
                                    </span>
                                </div>

                                <!-- Actions -->
                                <div class="mt-4 flex gap-3">
                                    <a href="{{ route('admin.report.download', $report->id) }}"
                                       class="flex items-center px-4 py-2 rounded-lg bg-green-600 text-white text-sm font-medium hover:bg-green-700 transition">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                        Download PDF
                                    </a>

                                    <form action="{{ route('admin.report.destroy', $report->id) }}" method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus laporan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="flex items-center px-4 py-2 rounded-lg bg-red-50 text-red-600 text-sm font-medium border border-red-200 hover:bg-red-100 transition">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if(method_exists($reports, 'hasPages') && $reports->hasPages())
                <div class="mt-10">
                    {{ $reports->links() }}
                </div>
            @endif
        @endif
    </div>


<style>
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}
.animate-fade-in {
    animation: fadeIn 0.5s ease-out forwards;
}
</style>
@endsection
