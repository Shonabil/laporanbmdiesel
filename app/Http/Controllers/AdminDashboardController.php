<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Payment;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Statistik laporan
        $totalReports = Report::count();
        $reportsThisMonth = Report::whereYear('created_at', now()->year)
                                  ->whereMonth('created_at', now()->month)
                                  ->count();

        // ✅ Statistik pembayaran (cover semua kemungkinan format status)
        $paymentsPending = Payment::whereIn('status', [0, '0', 'pending'])->count();
        $paymentsPaid    = Payment::whereIn('status', [2, '2', 'paid', 'completed'])->count();

        // Chart data
        $reportsPerMonth = $this->getReportsPerMonth();

        // Data untuk chart Payment
        $paymentStatus = [
            'pending' => $paymentsPending,
            'paid'    => $paymentsPaid,
        ];

        // Analytics tambahan
        $averageReportsPerMonth = $totalReports > 0 ? round($totalReports / 12, 1) : 0;
        $completionRate = ($paymentsPending + $paymentsPaid) > 0
            ? round(($paymentsPaid / ($paymentsPending + $paymentsPaid)) * 100, 1)
            : 0;

        return view('admin.dashboard', compact(
            'totalReports',
            'reportsThisMonth',
            'paymentsPending',
            'paymentsPaid',
            'reportsPerMonth',
            'paymentStatus',
            'averageReportsPerMonth',
            'completionRate'
        ));
    }

    private function getReportsPerMonth()
    {
        $reportsData = Report::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->whereYear('created_at', now()->year)
            ->groupBy('month')
            ->pluck('total', 'month')
            ->toArray();

        $reportsPerMonth = [];
        for ($i = 1; $i <= 12; $i++) {
            $reportsPerMonth[$i] = $reportsData[$i] ?? 0;
        }

        return $reportsPerMonth;
    }
}
