<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Order</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border: 1px solid #333;
        }

        .header {
            margin-bottom: 20px;
        }

        .header p {
            margin: 0;
        }

        .header .bold {
            font-weight: bold;
        }

        .total {
            margin-top: 10px;
            font-weight: bold;
        }
        .footer { margin-bottom: 20px; text-align: center; margin-top: 20px;}
        .footer p { margin: 0; }
        .footer .bold { font-weight: bold; }
    </style>
</head>

<body>
    <div class="header">
        <p class="bold">PT. Indako Trading Coy</p>
        <p class="bold">Laporan Data Order</p>
        <p><span class="bold">Periode:</span> 2023-2024</p>
        <p><span class="bold">Tanggal Cetak:</span> 6 November 2024</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID Order</th>
                <th>Nama Admin</th>
                <th>Nama Barang</th>
                <th>Quantity Order</th>
                <th>Harga Order</th>
                <th>Tanggal Order</th>
                <th>Status Approval</th>
                <th>Satuan Barang</th>
                <th>Tanggal Receive Stok</th>
                <th>Status Receive Stok</th>
            </tr>
        </thead>
        <tbody>
            @php $totalHarga = 0; @endphp
            @foreach($data as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->nama }}</td>
                    <td>{{ $order->namabarang }}</td>
                    <td>{{ $order->quantityorder }}</td>
                    <td>{{ $order->hargaorder }}</td>
                    <td>{{ $order->tanggalorder }}</td>
                    <td>{{ $order->statusapproval }}</td>
                    <td>{{ $order->satuanbarang }}</td>
                    <td>{{ $order->tanggalreceivestok }}</td>
                    <td>{{ $order->statusreceivestok }}</td>
                </tr>
                @php $totalHarga += $order->hargaorder; @endphp
            @endforeach
        </tbody>
    </table>

    <p class="total">Total Harga Order: {{ number_format($totalHarga, 0, ',', '.') }}</p>

    <div class="footer">
        <p class="bold">PT. Indako Trading Coy</p>
        <p><span class="bold">Periode:</span> 2023-2024</p>
    </div>
</body>

</html>
