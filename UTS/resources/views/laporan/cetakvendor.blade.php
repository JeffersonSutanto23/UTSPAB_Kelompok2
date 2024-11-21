<!DOCTYPE html> 
<html lang="en"> 

<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Vendor</title> 
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
        <p class="bold">Laporan Data Vendor</p>
        <p><span class="bold">Periode:</span> 2023-2024</p>
        <p><span class="bold">Tanggal Cetak:</span> 6 November 2024</p>
    </div>

    <table> 
        <thead> 
            <tr> 
                <th>ID Vendor</th> 
                <th>Nama Vendor</th> 
                <th>Alamat Vendor</th>
                <th>No Telepon Vendor</th>
                <th>Tanggal Receive Stok</th> 
                <th>Nama Barang</th>
                <th>Quantity Order</th> 
                <th>Status Receive Stok</th>
                <th>Satuan Barang</th> 
            </tr> 
        </thead> 
        <tbody> 
            @foreach($data as $vendor) 
                <tr> 
                    <td>{{ $vendor->id }}</td> 
                    <td>{{ $vendor->namavendor}}</td> 
                    <td>{{ $vendor->alamat}}</td> 
                    <td>{{ $vendor->telepon}}</td>
                    <td>{{ $vendor->namabarang}}</td>
                    <td>{{ $vendor->tanggalreceivestok}}</td> 
                    <td>{{ $vendor->quantityorder}}</td> 
                    <td>{{ $vendor->statusreceivestok}}</td>
                    <td>{{ $vendor->satuanbarang}}</td>   
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
