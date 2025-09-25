@extends('user.layouts.user')

@section('content')
<div class="max-w-5xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-2">📊 Progress Report</h1>
    <p class="text-gray-600 mb-4">
        {{ $report->repair_order_no }} — {{ $report->customer }}
    </p>

    @forelse($report->progress as $p)
        <div class="bg-white rounded shadow p-4 mb-3">
            <h2 class="font-semibold text-lg">{{ $p->title }}</h2>
            <p class="text-gray-700">{{ $p->description }}</p>
            @if($p->image)
                <img src="{{ asset('storage/'.$p->image) }}" class="mt-2 w-72 rounded">
            @endif
            <p class="text-xs text-gray-500 mt-2">Update: {{ $p->created_at->format('d M Y H:i') }}</p>
        </div>
    @empty
        <p class="text-gray-500">Belum ada progress untuk report ini.</p>
    @endforelse

    <a href="{{ route('user.progress.index') }}" class="inline-block mt-4 text-blue-600 hover:underline">
        ← Kembali ke semua progress
    </a>
</div>
@endsection
