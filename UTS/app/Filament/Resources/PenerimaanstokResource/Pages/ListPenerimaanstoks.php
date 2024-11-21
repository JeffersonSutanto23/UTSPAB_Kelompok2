<?php

namespace App\Filament\Resources\PenerimaanstokResource\Pages;

use App\Filament\Resources\PenerimaanstokResource;
use App\Filament\Resources\VendorResource;
use App\Filament\Resources\OrderResource;
use App\Filament\Resources\BarangResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Models\PenerimaanStok;

class ListPenerimaanstoks extends ListRecords
{
    protected static string $resource = PenerimaanstokResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),  
            Actions\Action::make('cetak_laporan_penerimaanstok') 
            ->label('Cetak Laporan Penerimaan Stok') 
            ->icon('heroicon-o-printer') 
            ->action(fn() => static::cetakLaporan()) 
            ->requiresConfirmation() ->modalHeading('Cetak Laporan Penerimaan Stok') 
            ->modalSubheading('Apakah Anda yakin ingin mencetak laporan?'), 
            ];
    }
    public static function cetakLaporan() 
    {  
        

     $data = PenerimaanStok::select(
        'penerimaanstoks.id',
        'penerimaanstoks.tanggalreceivestok',
        'barangs.namabarang',
        'penerimaanstoks.namavendor',
        'penerimaanstoks.quantityorder',
        'penerimaanstoks.hargaorder',
        'penerimaanstoks.statusreceivestok',
        'penerimaanstoks.tanggalorder',
        'orders.statusapproval',
        'vendors.telepon',

    )
    ->join('orders', 'penerimaanstoks.statusapproval', '=', 'orders.statusapproval')
    ->join('vendors', 'penerimaanstoks.namavendor', '=', 'vendors.namavendor')
    ->join('barangs', 'penerimaanstoks.namabarang', '=', 'barangs.namabarang')
    ->get();

        $pdf = \PDF::loadView('laporan.cetakpenerimaanstok', ['data' => $data]);  
        return response()->streamDownload(fn() => print($pdf->output()), 'laporanpenerimaanstok.pdf'); 
    }
}
