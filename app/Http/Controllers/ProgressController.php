<?php

namespace App\Http\Controllers;

use App\Models\Progress;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgressController extends Controller
{
  public function index()
{
    $progress = Progress::with('report')->latest()->paginate(15);
    $reports  = Report::all();
    return view('admin.progress.index', compact('progress', 'reports'));
}


    public function store(Request $request)
    {
        $request->validate([
            'report_id' => 'required|exists:reports,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:3000',
        ]);

        $data = $request->only(['report_id', 'title', 'description']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('progress', 'public');
        }

        Progress::create($data);

        return back()->with('success', 'Progress berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $progress = Progress::findOrFail($id);

        if ($progress->image && Storage::disk('public')->exists($progress->image)) {
            Storage::disk('public')->delete($progress->image);
        }

        $progress->delete();

        return redirect()->route('admin.progress.index')->with('success', 'Progress berhasil dihapus!');
    }

public function userIndex(Request $request)
{
    $query = Progress::with('report')->latest();

    if ($request->filled('search')) {
        $search = $request->search;
        $query->whereHas('report', function ($q) use ($search) {
            $q->where('customer', 'like', '%' . $search . '%');
        });
    }

    $progress = $query->paginate(4)->withQueryString();

    return view('user.progress.index', compact('progress'));
}


public function userProgress($id)
{
    $report = Report::with('progress')->findOrFail($id);
    return view('user.progress.show', compact('report'));
}


}
