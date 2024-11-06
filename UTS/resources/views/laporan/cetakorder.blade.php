<!DOCTYPE html> 
<html lang="en"> 

<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Order</title> 
    <style> 
        body { font-family: Arial, sans-serif; } 
        table { width: 100%; border-collapse: collapse; margin-top: 20px; } 
        th, td { padding: 8px; text-align: left; border: 1px solid #333; } 
        .header { margin-bottom: 20px; }
        .header p { margin: 0; }
        .header .bold { font-weight: bold; }
    </style> 
</head> 

<body> 
    <div class="header">
        <p class="bold">PT. Sumatera Jaya</p>
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
                <th>Status Order</th>
                <th>Tanggal Order</th>
                <th>Tanggal Receive Order</th>
            </tr> 
        </thead> 
        <tbody> 
            @foreach($data as $order) 
                <tr> 
                    <td>{{ $order->id }}</td> 
                    <td>{{ $order->nama}}</td> 
                    <td>{{ $order->namabarang}}</td> 
                    <td>{{ $order->quantityorder}}</td> 
                    <td>{{ $order->hargaorder}}</td> 
                    <td>{{ $order->statusorder}}</td> 
                    <td>{{ $order->tanggalorder}}</td>
                    <td>{{ $order->tanggalreceiveorder}}</td> 
                </tr> 
            @endforeach 
        </tbody> 
    </table> 
</body> 
</html>
