<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use App\Filament\Resources\AdminResource;
use App\Filament\Resources\BarangResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Models\Order;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),  
            Actions\Action::make('cetak_laporan_order') 
            ->label('Cetak Laporan Order') 
            ->icon('heroicon-o-printer') 
            ->action(fn() => static::cetakLaporan()) 
            ->requiresConfirmation() ->modalHeading('Cetak Laporan Order') 
            ->modalSubheading('Apakah Anda yakin ingin mencetak laporan?'), 
            ];
    }
    public static function cetakLaporan() 
    {  
        $data = Order::select(
            'orders.id',
            'orders.nama',
            'orders.namabarang',
            'orders.quantityorder',
            'orders.hargaorder',
            'orders.tanggalorder',
            'orders.statusapproval',
            'barangs.satuanbarang',
            'penerimaanstoks.tanggalreceivestok',
            'penerimaanstoks.statusreceivestok'
        )
        ->join('barangs', 'orders.namabarang', '=', 'barangs.namabarang')
        ->join('penerimaanstoks', 'orders.namabarang', '=', 'penerimaanstoks.namabarang')
        ->get();
        $pdf = \PDF::loadView('laporan.cetakorder', ['data' => $data]);  
        return response()->streamDownload(fn() => print($pdf->output()), 'laporanorder.pdf'); 
    }
}
