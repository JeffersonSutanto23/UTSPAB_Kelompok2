<!DOCTYPE html> 
<html lang="en"> 

<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Admin</title> 
    <style> 
        body { font-family: Arial, sans-serif; } 
        table { width: 100%; border-collapse: collapse; margin-top: 20px; } 
        th, td { padding: 8px; text-align: left; border: 1px solid #333; } 
        .header { margin-bottom: 20px; }
        .header p { margin: 0; }
        .header .bold { font-weight: bold; }
        .footer { margin-bottom: 20px; text-align: center; margin-top: 20px; }
        .footer p { margin: 0; }
        .footer .bold { font-weight: bold; }
    </style> 
</head> 

<body> 
    <div class="header">
        <p class="bold">PT. Indako Trading Coy</p>
        <p class="bold">Laporan Data Admin</p>
        <p><span class="bold">Periode:</span> 2023-2024</p>
        <p><span class="bold">Tanggal Cetak:</span> 6 November 2024</p>
    </div>

    <table> 
        <thead> 
            <tr> 
                <th>ID Admin</th> 
                <th>Nama Admin</th> 
                <th>Password</th>
                <th>Nama Departemen</th>
                <th>Email</th> 
            </tr> 
        </thead> 
        <tbody> 
            @foreach($data as $admin) 
                <tr> 
                    <td>{{ $admin->id }}</td> 
                    <td>{{ $admin->nama}}</td> 
                    <td>{{ $admin->password}}</td> 
                    <td>{{ $admin->namadepartemen}}</td> 
                    <td>{{ $admin->email}}</td> 
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
