<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Report;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::with('payment')->latest()->get();
        return view('admin.report.index', compact('reports'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'repair_order_no' => 'required|string|max:255',
            'customer'        => 'nullable|string|max:255',
            'unit_model'      => 'nullable|string|max:255',
            'qty'             => 'nullable|integer',
            'location'        => 'nullable|string|max:255',
            'document_no'     => 'nullable|string|max:255',
            'document_date'   => 'nullable|date',
            'brand'           => 'nullable|string|max:255',
            'engine'          => 'nullable|string|max:255',
            'part_no_unit'    => 'nullable|string|max:255',
            'serial_no_unit'  => 'nullable|string|max:255',
            'warranty'        => 'nullable|string|max:255',
            'gambar'          => 'nullable|image|mimes:jpeg,png,jpg|max:3000',
            'comment'         => 'nullable|string',
        ]);

        // Upload gambar utama kalau ada
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('reports/gambar', 'public');
        }

        // Simpan laporan
        $report = Report::create($data);

        // Simpan payment terkait
        Payment::create([
            'report_id' => $report->id,
            'status'    => 'pending',
        ]);

        // Simpan sections tambahan kalau ada
        if ($request->has('sections')) {
            foreach ($request->sections as $section) {
                $path = null;
                if (isset($section['gambar'])) {
                    $path = $section['gambar']->store('reports/sections', 'public');
                }

                $report->sections()->create([
                    'comment' => $section['comment'] ?? null,
                    'gambar'  => $path,
                ]);
            }
        }
        // dd($section['gambar']);


        // Redirect setelah submit
        return redirect()->route('admin.report.afterSubmit', $report->id)
                         ->with('success', 'Report berhasil disimpan.');
    }

    public function download($id)
    {
        $report = Report::with('payment')->findOrFail($id);
        $pdf = Pdf::loadView('report.pdf', compact('report'));
        return $pdf->download("laporan-{$report->repair_order_no}.pdf");
    }

    public function destroy($id)
    {
        $report = Report::with(['sections', 'payment'])->findOrFail($id);

        // Hapus gambar utama
        if ($report->gambar && Storage::disk('public')->exists($report->gambar)) {
            Storage::disk('public')->delete($report->gambar);
        }

        // Hapus gambar di sections
        foreach ($report->sections as $section) {
            if ($section->gambar && Storage::disk('public')->exists($section->gambar)) {
                Storage::disk('public')->delete($section->gambar);
            }
        }

        // Hapus sections
        $report->sections()->delete();

        // Hapus payment
        $report->payment()->delete();

        // Hapus report
        $report->delete();

        return redirect()->route('admin.report.history')
                         ->with('success', 'Laporan & pembayaran terkait berhasil dihapus.');
    }

    public function history()
    {
        $reports = Report::with('payment')->latest()->get();
        return view('admin.report.history', compact('reports'));
    }

    public function payment()
    {
        return view('admin.report.payment');
    }

    public function afterSubmit($id)
    {
        $report = Report::with('payment')->findOrFail($id);
        return view('admin.report.after-submit', compact('report'));
    }

    public function invoice($id)
    {
        $report = Report::with('payment')->findOrFail($id);
        return view('admin.report.invoice', compact('report'));
    }
}
