<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Service Failure Report</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #000;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #000;
            padding-bottom: 5px;
            margin-bottom: 10px;
        }
        .header img {
            height: 40px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        table td, table th {
            border: 1px solid #000;
            padding: 5px;
            vertical-align: top;
        }
        .section-title {
            background: #f2f2f2;
            font-weight: bold;
            padding: 5px;
        }
        .image-box {
            width: 100%;
            text-align: center;
        }
        .image-box img {
            width: 100%;
            max-height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="header">
        <img src="{{ public_path('logo.png') }}" alt="Logo">
        <h2>SERVICE FAILURE REPORT</h2>
    </div>

    <!-- Detail Table -->
    <table>
        <tr>
            <td><strong>Repair Order No</strong></td>
            <td>{{ $report->repair_order_no }}</td>
            <td><strong>Document No</strong></td>
            <td>{{ $report->document_no }}</td>
        </tr>
        <tr>
            <td><strong>Customer</strong></td>
            <td>{{ $report->customer }}</td>
            <td><strong>Document Date</strong></td>
            <td>{{ $report->document_date }}</td>
        </tr>
        <tr>
            <td><strong>Unit Model</strong></td>
            <td>{{ $report->unit_model }}</td>
            <td><strong>Brand</strong></td>
            <td>{{ $report->brand }}</td>
        </tr>
        <tr>
            <td><strong>Qty</strong></td>
            <td>{{ $report->qty }}</td>
            <td><strong>Engine</strong></td>
            <td>{{ $report->engine }}</td>
        </tr>
        <tr>
            <td><strong>Location</strong></td>
            <td>{{ $report->location }}</td>
            <td><strong>Part No Unit</strong></td>
            <td>{{ $report->part_no_unit }}</td>
        </tr>
        <tr>
            <td><strong>Serial No Unit</strong></td>
            <td>{{ $report->serial_no_unit }}</td>
            <td><strong>Warranty</strong></td>
            <td>{{ $report->warranty }}</td>
        </tr>
    </table>

    <!-- Section 1 -->
    <table>
        <tr>
            <th class="section-title">Picture/Foto, Part/Component Dismantle & Inspection</th>
            <th class="section-title">Comment</th>
        </tr>
        <tr>
            <td class="image-box">
                @if($report->gambar)
                    <img src="{{ public_path('storage/' . $report->gambar) }}">
                @else
                    <p><em>No Image</em></p>
                @endif
            </td>
            <td>{{ $report->comment }}</td>
        </tr>
    </table>

    

</body>
</html>
