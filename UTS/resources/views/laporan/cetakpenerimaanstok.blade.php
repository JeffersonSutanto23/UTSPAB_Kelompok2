<!DOCTYPE html> 
<html lang="en"> 

<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penerimaan Stok</title> 
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
        <p class="bold">Laporan Data Penerimaan Stok</p>
        <p><span class="bold">Periode:</span> 2023-2024</p>
        <p><span class="bold">Tanggal Cetak:</span> 6 November 2024</p>
    </div>

    <table> 
        <thead> 
            <tr> 
                <th>ID Penerimaan Stok</th> 
                <th>Tanggal Receive Stok</th> 
                <th>Nama Vendor</th>
                <th>Nama Barang</th>
                <th>Quantity Order</th> 
                <th>Harga Order</th>
                <th>Status Receive Stok</th>
            </tr> 
        </thead> 
        <tbody> 
            @foreach($data as $penerimaanstok) 
                <tr> 
                    <td>{{ $penerimaanstok->id }}</td> 
                    <td>{{ $penerimaanstok->tanggalreceivestok}}</td> 
                    <td>{{ $penerimaanstok->namavendor}}</td> 
                    <td>{{ $penerimaanstok->namabarang}}</td> 
                    <td>{{ $penerimaanstok->quantityorder}}</td> 
                    <td>{{ $penerimaanstok->hargaorder}}</td> 
                    <td>{{ $penerimaanstok->statusreceivestok}}</td>
                </tr> 
            @endforeach 
        </tbody> 
    </table> 
</body> 
</html>
