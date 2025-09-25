<!-- CONTENT -->
<div class="invoice-content">
    <!-- DETAILS utama -->
    <div class="details">
        <table>
            <tr>
                <th>ID Laporan</th>
                <td>{{ $report->id }}</td>
            </tr>
            <tr>
                <th>Repair Order No</th>
                <td>{{ $report->repair_order_no }}</td>
            </tr>
            <tr>
                <th>Customer</th>
                <td>{{ $report->customer }}</td>
            </tr>
            <tr>
                <th>Unit Model</th>
                <td>{{ $report->unit_model }}</td>
            </tr>
            <tr>
                <th>Comment</th>
                <td>{{ $report->comment }}</td>
            </tr>
        </table>
    </div>

    <!-- IMAGE utama -->
    <div class="image">
        @if ($report->gambar)
            <img src="{{ asset('storage/' . $report->gambar) }}" alt="Gambar Laporan" style="max-width:300px;">
        @else
            <p><em>Tidak ada gambar</em></p>
        @endif
    </div>
</div>

<!-- SECTION TAMBAHAN -->
<div class="details mt-6">
    <table>
        <tr>
            <th colspan="2">Section Tambahan</th>
        </tr>
        @forelse ($report->sections as $section)
            <tr>
                <th>Comment</th>
                <td>{{ $section->comment }}</td>
            </tr>
            <tr>
                <th>Gambar</th>
                <td>
                    @if($section->gambar)
    <img src="{{ asset('storage/' . $section->gambar) }}" alt="gambar" width="200">
@else
    <i>Tidak ada gambar</i>
@endif

                </td>
            </tr>
        @empty
            <tr>
                <td colspan="2"><em>Tidak ada section tambahan</em></td>
            </tr>
        @endforelse
    </table>
</div>
