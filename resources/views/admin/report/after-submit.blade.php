@extends('admin.report.layout')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">
    <!-- Success Header -->
    <div class="text-center mb-8">
        <div class="inline-flex items-center justify-center w-16 h-16 bg-green-100 rounded-full mb-4">
            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Laporan Berhasil Disimpan!</h1>
        <p class="text-lg text-gray-600">
            Laporan <span class="font-semibold text-gray-900">{{ $report->nama }}</span> telah berhasil dibuat dan tersimpan.
        </p>
    </div>

    <!-- Report Details Card -->
    <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6 mb-8">
        <h2 class="text-xl font-semibold text-gray-900 mb-4">Detail Laporan</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <p class="text-sm text-gray-500">Repair Order No</p>
                <p class="font-medium text-gray-900">{{ $report->repair_order_no }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Tanggal Dibuat</p>
                <p class="font-medium text-gray-900">{{ $report->created_at->format('d F Y, H:i') }}</p>
            </div>

        </div>
    </div>

    <!-- Action Buttons -->
    <div class="bg-gray-50 rounded-lg p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Aksi Selanjutnya</h3>
        <div class="flex flex-col sm:flex-row gap-4">
            <!-- Download PDF Button -->
            <a href="{{ route('admin.report.download', $report->id) }}"
               class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-sm transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                Download PDF
            </a>

            <!-- Download Invoice Button -->
            <a href="{{ route('admin.report.invoice', $report->id) }}"
               class="inline-flex items-center justify-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg shadow-sm transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                Download Invoice
            </a>

            <!-- Back to Form Button -->
            <a href="{{ route('admin.report.index') }}"
               class="inline-flex items-center justify-center px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white font-medium rounded-lg shadow-sm transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali ke Form
            </a>
        </div>
    </div>


</div>

@push('styles')
<style>
    /* Optional: Add smooth animations */
    .animate-fade-in {
        animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endpush

@push('scripts')
<script>
    // Optional: Add auto-hide success message or other interactions
    document.addEventListener('DOMContentLoaded', function() {
        // Add fade-in animation to the main container
        const container = document.querySelector('.max-w-4xl');
        if (container) {
            container.classList.add('animate-fade-in');
        }

        // Optional: Add click tracking for download buttons
        const downloadButtons = document.querySelectorAll('a[href*="download"]');
        downloadButtons.forEach(button => {
            button.addEventListener('click', function() {
                // You can add analytics tracking here
                console.log('Download button clicked:', this.href);
            });
        });
    });
</script>
@endpush
@endsection
