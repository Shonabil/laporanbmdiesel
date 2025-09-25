@extends('admin.report.layout')
@section('content')
<div class="p-6 space-y-8 bg-gradient-to-br from-slate-50 to-blue-50 min-h-screen">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Dashboard Overview</h1>
        <p class="text-gray-600">Ringkasan laporan dan status pembayaran</p>
    </div>

    <!-- Statistik Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Total Reports -->
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="bg-blue-100 p-3 rounded-full">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <div class="text-right">
                    <div class="text-3xl font-bold text-blue-600 counter" data-target="{{ $totalReports }}">0</div>
                    <p class="text-sm text-gray-600">Total Reports</p>
                </div>
            </div>
            <div class="w-full bg-blue-100 rounded-full h-2">
                <div class="bg-blue-600 h-2 rounded-full progress-bar" data-width="100"></div>
            </div>
        </div>

        <!-- Reports This Month -->
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="bg-green-100 p-3 rounded-full">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div class="text-right">
                    <div class="text-3xl font-bold text-green-600 counter" data-target="{{ $reportsThisMonth }}">0</div>
                    <p class="text-sm text-gray-600">Reports Bulan Ini</p>
                </div>
            </div>
            <div class="w-full bg-green-100 rounded-full h-2">
                <div class="bg-green-600 h-2 rounded-full progress-bar"
                     data-width="{{ $totalReports > 0 ? ($reportsThisMonth / $totalReports) * 100 : 0 }}">
                </div>
            </div>
        </div>

        <!-- Payment Pending -->
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="bg-yellow-100 p-3 rounded-full">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="text-right">
                    <div class="text-3xl font-bold text-yellow-600 counter" data-target="{{ $paymentsPending }}">0</div>
                    <p class="text-sm text-gray-600">Payment Pending</p>
                </div>
            </div>
            <div class="w-full bg-yellow-100 rounded-full h-2">
                <div class="bg-yellow-600 h-2 rounded-full progress-bar"
                     data-width="{{ $paymentsPending + $paymentsPaid > 0 ? ($paymentsPending / ($paymentsPending + $paymentsPaid)) * 100 : 0 }}">
                </div>
            </div>
        </div>

        <!-- Payment Selesai -->
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="bg-indigo-100 p-3 rounded-full">
                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="text-right">
                    <div class="text-3xl font-bold text-indigo-600 counter" data-target="{{ $paymentsPaid }}">0</div>
                    <p class="text-sm text-gray-600">Payment Selesai</p>
                </div>
            </div>
            <div class="w-full bg-indigo-100 rounded-full h-2">
                <div class="bg-indigo-600 h-2 rounded-full progress-bar"
                     data-width="{{ $paymentsPending + $paymentsPaid > 0 ? ($paymentsPaid / ($paymentsPending + $paymentsPaid)) * 100 : 0 }}">
                </div>
            </div>
        </div>
    </div>

    <!-- Charts -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
        <!-- Reports Chart -->
        <div class="xl:col-span-2 bg-white p-6 rounded-2xl shadow-lg border border-gray-100">
            <h2 class="text-xl font-bold text-gray-800 mb-2">Laporan per Bulan</h2>
            <p class="text-sm text-gray-600 mb-4">Tren laporan bulanan</p>
            <div class="h-80">
                <canvas id="reportsChart"></canvas>
            </div>
        </div>

      <!-- Payments Chart -->
<div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100">
    <h2 class="text-xl font-bold text-gray-800 mb-2">Status Payment</h2>
    <p class="text-sm text-gray-600 mb-4">Distribusi pembayaran</p>

    <!-- Chart -->
    <div class="h-64">
        <canvas id="paymentsChart"></canvas>
    </div>

    <!-- Legend & Stats -->
    <div class="mt-4 space-y-3">
        <!-- Pending -->
        <div class="flex items-center justify-between p-2 bg-yellow-50 rounded-lg">
            <span class="flex items-center space-x-2">
                <span class="w-3 h-3 bg-yellow-500 rounded-full"></span>
                <span class="text-sm">Pending</span>
            </span>
            <span class="text-sm font-bold text-yellow-600">
                {{ number_format($paymentsPending) }}
            </span>
        </div>

        <!-- Paid -->
        <div class="flex items-center justify-between p-2 bg-green-50 rounded-lg">
            <span class="flex items-center space-x-2">
                <span class="w-3 h-3 bg-green-500 rounded-full"></span>
                <span class="text-sm">Selesai</span>
            </span>
            <span class="text-sm font-bold text-green-600">
                {{ number_format($paymentsPaid) }}
            </span>
        </div>
    </div>
</div>

    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const reportsPerMonth = @json($reportsPerMonth ?? []);
    const paymentStatus   = @json($paymentStatus ?? []);

    document.addEventListener('DOMContentLoaded', () => {
        initCounters();
        initProgressBars();
        initCharts();
    });

    function initCounters() {
        document.querySelectorAll('.counter').forEach(counter => {
            const target = +counter.dataset.target || 0;
            let start = 0;
            const step = Math.max(1, Math.ceil(target / 60));
            const interval = setInterval(() => {
                start += step;
                if (start >= target) {
                    counter.textContent = target;
                    clearInterval(interval);
                } else {
                    counter.textContent = start;
                }
            }, 20);
        });
    }

    function initProgressBars() {
        document.querySelectorAll('.progress-bar').forEach(bar => {
            const width = bar.dataset.width || 0;
            bar.style.width = "0%";
            setTimeout(() => {
                bar.style.transition = "width 1.5s ease";
                bar.style.width = width + "%";
            }, 200);
        });
    }

    function initCharts() {
        // Reports
        new Chart(document.getElementById('reportsChart'), {
            type: 'bar',
            data: {
                labels: Object.keys(reportsPerMonth).map(m =>
                    ["Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agu","Sep","Okt","Nov","Des"][m-1]),
                datasets: [{
                    label: 'Jumlah Laporan',
                    data: Object.values(reportsPerMonth),
                    backgroundColor: 'rgba(59,130,246,0.7)',
                    borderRadius: 6
                }]
            },
            options: { responsive: true, maintainAspectRatio: false }
        });

        // Payments
        new Chart(document.getElementById('paymentsChart'), {
            type: 'doughnut',
            data: {
                labels: ["Pending","Selesai"],
                datasets: [{
                    data: Object.values(paymentStatus),
                    backgroundColor: ['#FACC15','#22C55E']
                }]
            },
            options: { responsive: true, maintainAspectRatio: false }
        });
    }
</script>
@endsection
