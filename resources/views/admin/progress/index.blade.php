@extends('admin.report.layout')

@section('content')
    <div class="p-6">
        <h1 class="text-3xl font-bold mb-6 flex items-center gap-2">
            📈 Progress Perbaikan
        </h1>

        <!-- Form Tambah Progress -->
        <div class="bg-white rounded-2xl shadow p-6 mb-8">
            <h2 class="text-lg font-semibold mb-4 border-b pb-2">Tambah Progress Baru</h2>
            <form action="{{ route('admin.progress.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium mb-1">Atas Nama (Pilih Report)</label>
                    <select id="report_id" name="report_id"
                        class="w-full border-slate-600 bg-slate-700 text-slate-200 rounded-lg shadow-sm">
                        @foreach ($reports as $report)
                            <option value="{{ $report->id }}">{{ $report->customer }} - {{ $report->repair_order_no }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Judul Progress</label>
                    <input type="text" name="title"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 p-2"
                        placeholder="Masukkan judul progress...">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Deskripsi</label>
                    <textarea name="description" rows="3"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 p-2"
                        placeholder="Tulis deskripsi progress..."></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Upload Gambar</label>
                    <input type="file" name="image"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 p-2">
                </div>
                <div class="flex justify-end">
                    <button
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded-lg shadow transition">
                        Simpan Progress
                    </button>
                </div>
            </form>
        </div>

        <!-- List Progress -->
       <h2 class="text-lg font-semibold mb-4">Daftar Progress</h2>
<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($progress as $p)
        <div class="bg-white rounded-2xl shadow hover:shadow-lg transition overflow-hidden">
            <div class="p-5">
                <h3 class="text-lg font-semibold text-gray-800 break-words">
                    {{ $p->title }}
                </h3>
                <p class="text-sm text-gray-500 mb-2 break-words">
                    ({{ $p->report->customer }})
                </p>

                <!-- Description dengan clamp max 3 baris -->
                <p class="text-gray-600 mb-3 break-words overflow-hidden
                          [display:-webkit-box] [-webkit-line-clamp:3] [-webkit-box-orient:vertical]">
                    {{ $p->description }}
                </p>

                @if ($p->image)
                    <img src="{{ asset('storage/' . $p->image) }}"
                         class="w-full h-40 object-cover rounded-lg mb-3">
                @endif

                <p class="text-xs text-gray-400 mb-3">
                    📅 {{ $p->created_at->format('d M Y H:i') }}
                </p>

                <form action="{{ route('admin.progress.destroy', $p->id) }}" method="POST"
                      onsubmit="return confirm('Yakin mau hapus progress ini?')" class="text-right">
                    @csrf
                    @method('DELETE')
                    <button
                        class="bg-red-500 hover:bg-red-600 text-white text-sm px-4 py-2 rounded-lg shadow transition">
                        🗑 Hapus
                    </button>
                </form>
            </div>
        </div>
    @empty
        <p class="text-gray-500">Belum ada progress yang ditambahkan.</p>
    @endforelse
</div>

    </div>
@endsection
