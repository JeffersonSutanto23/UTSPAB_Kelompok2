<!DOCTYPE html> 
<html lang="en"> 

<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Barang</title> 
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
        <p class="bold">Laporan Data Barang</p>
        <p><span class="bold">Periode:</span> 2023-2024</p>
        <p><span class="bold">Tanggal Cetak:</span> 6 November 2024</p>
    </div>

    <table> 
        <thead> 
            <tr> 
                <th>ID Barang</th> 
                <th>Nama Barang</th> 
                <th>Satuan Barang</th>
                <th>Harga</th>
                <th>Kategori</th> 
                <th>Stok Awal</th>
                <th>Barang Masuk</th>
                <th>Barang Keluar</th> 
            </tr> 
        </thead> 
        <tbody> 
            @foreach($data as $barang) 
                <tr> 
                    <td>{{ $barang->id }}</td> 
                    <td>{{ $barang->namabarang}}</td> 
                    <td>{{ $barang->satuanbarang}}</td>
                    <td>{{ $barang->harga}}</td>
                    <td>{{ $barang->namakategori}}</td>
                    <td>{{ $barang->stockawal}}</td>
                    <td>{{ $barang->barangmasuk}}</td>
                    <td>{{ $barang->barangkeluar}}</td>
                </tr> 
            @endforeach 
        </tbody> 
    </table> 
</body> 
</html>
