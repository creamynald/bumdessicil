<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Daftar Pemesanan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .no-data {
            text-align: center;
            padding: 20px;
            font-size: 18px;
            font-weight: bold;
            color: #ff0000; /* Red color for emphasis */
        }
    </style>
</head>
<body>
    <h2>Daftar Pemesanan</h2>
    
    @if($pemesanan->isEmpty())
        <p class="no-data">Data Not Found</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jenis Beras</th>
                    <th>Customer</th>
                    <th>Status</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pemesanan as $index => $row)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $row->beras->jenisBeras->nama }} ({{ $row->berat }} Kg)</td>
                        <td>{{ $row->user->name }}</td>
                        <td>{{ $row->status }}</td>
                        <td>{{ formatRupiah($row->total_harga) }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4" class="text-center">Total Penjualan</th>
                    <th>{{ formatRupiah($total_pendapatan) }}</th>
                </tr>
            </tfoot>
        </table>
    @endif
</body>
</html>