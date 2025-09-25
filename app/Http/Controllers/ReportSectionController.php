<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportSectionController extends Controller
{
    public function store(Request $request, Report $report)
    {
        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('report_sections', 'public');
        }

        $report->sections()->create([
            'comment' => $request->comment,
            'image'   => $path,
        ]);

        return back()->with('success', 'Section berhasil ditambahkan');
    }
}

