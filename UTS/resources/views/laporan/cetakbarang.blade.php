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
        .footer { margin-bottom: 20px; text-align: center; margin-top: 20px;}
        .footer p { margin: 0; }
        .footer .bold { font-weight: bold; }
    </style> 
</head> 

<body> 
    <div class="header">
        <p class="bold">PT. Indako Trading Coy</p>
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
                <th>Kategori</th> 
                <th>Jumlah Stock</th>
                <th>Barang Masuk</th>
                <th>Tahun Masuk</th> 
            </tr> 
        </thead> 
        <tbody> 
            @foreach($data as $barang) 
                <tr> 
                    <td>{{ $barang->id }}</td> 
                    <td>{{ $barang->namabarang}}</td> 
                    <td>{{ $barang->satuanbarang}}</td>
                    <td>{{ $barang->namakategori}}</td>
                    <td>{{ $barang->jumlahstock}}</td>
                    <td>{{ $barang->barangmasuk}}</td>
                    <td>{{ $barang->tahunmasuk}}</td>
                </tr> 
            @endforeach 
        </tbody> 
    </table> 
    <div class="footer">
        <p class="bold">PT. Indako Trading Coy</p>
        <p><span class="bold">Periode:</span> 2023-2024</p>
    </div>
</body> 
</html>
